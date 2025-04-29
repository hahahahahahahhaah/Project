<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'telp' => 'required|string|max:15|unique:users',
            // 'nik' => 'required|string|max:16|unique:users',
            // 'npwp' => 'required|string|max:15|unique:users',
            'status_langganan' => 'nullable|in:Aktif,Tidak Aktif',
            'password' => 'nullable|string|min:6',
        ]);

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'telp' => $request->telp,
            'password' => $request->password ? Hash::make($request->password) : null,
            'status_langganan' => $request->status_langganan ?? 'Tidak Aktif', // Default "Tidak Aktif"
            'role' => 'user',
        ]);

        Auth::login($user); // Auto login setelah register
        return response()->json([
            'message' => 'User registered successfully',
            'user' => $user
        ], 201);
    }


    // // **Login User atau Admin**
    // public function login(Request $request)
    // {
    //     // **Login Admin menggunakan username & password**
    //     if ($request->has('username') && $request->has('password')) {
    //         $credentials = $request->validate([
    //             'username' => 'required|string',
    //             'password' => 'required|string',
    //         ]);

    //         if (Auth::attempt($credentials)) {
    //             $user = Auth::user();
    //             if ($user->role !== 'admin') {
    //                 Auth::logout();
    //                 return response()->json(['message' => 'Unauthorized'], 403);
    //             }

    //             return redirect()->route('admin.dashboard');
    //         }
    //     }

    //     // **Login User menggunakan NIK & NPWP**
    //     if ($request->has('nik') && $request->has('npwp')) {
    //         $user = User::where('nik', $request->nik)->where('npwp', $request->npwp)->first();

    //         if ($user && $user->role === 'user') {
    //             Auth::login($user);
    //             return redirect()->route('user.index'); // Redirect ke halaman index
    //         }

    //         return response()->json([
    //             'message' => 'Invalid credentials',
    //         ], 401);
    //     }

    //     throw ValidationException::withMessages([
    //         'error' => ['Invalid credentials'],
    //     ]);

    // }

  // **Login User**
//   public function login(Request $request)
//   {
//       $credentials = $request->validate([
//           'username' => 'required|string',
//           'password' => 'required|string',
//       ]);

//       if (Auth::attempt($credentials)) {
//           return redirect()->route('user.index');
//       }

//       return response()->json([
//           'message' => 'Invalid username or password',
//       ], 401);
//   }


public function login(Request $request)
{
    $credentials = $request->validate([
        'username' => 'required|string',
        'password' => 'required|string',
    ]);

    if (Auth::attempt($credentials)) {
        $user = Auth::user(); // Ambil data user yang login

        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->role === 'kepala') {
            return redirect()->route('kepala.dashboard');
        } else {
            return redirect()->route('user.index');
        }
    }

    return response()->json([
        'message' => 'Invalid username or password',
    ], 401);
}

    public function editProfile()
    {
        return view('user.edit', ['user' => Auth::user()]);
    }

    public function updateProfilePicture(Request $request)
    {
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();

        // Hapus gambar lama jika ada
        if ($user->profile_picture) {
            Storage::delete($user->profile_picture);
        }

        // Simpan gambar baru
        $path = $request->file('profile_picture')->store('profile_pictures', 'public');

        // Update user
        $user->update(['profile_picture' => $path]);

        return redirect()->back()->with('success', 'Profile picture updated successfully!');
    }

    public function updateUsername(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . Auth::id(),
        ]);

        $user = Auth::user();
        $user->update(['username' => $request->username]);

        return redirect()->back()->with('success', 'Username updated successfully!');
    }

    public function showUserProfileForIndex()
    {
        $user = Auth::user(); // Mendapatkan data pengguna yang sedang login
        return view('user.index', compact('user')); // Pastikan path view sesuai dengan yang Anda inginkan
    }
    public function showUserHistory()
    {
        $user = Auth::user(); // Mendapatkan data pengguna yang sedang login
        return view('user.history', compact('user')); // Pastikan path view sesuai dengan yang Anda inginkan
    }


    // **Logout**
    public function logout()
    {
        Auth::logout();
        return response()->json(['message' => 'Logged out successfully']);
    }
}
