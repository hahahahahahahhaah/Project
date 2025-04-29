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
            'nik' => 'required|string|max:16|unique:users',
            'npwp' => 'required|string|max:15|unique:users',
            'status_langganan' => 'nullable|in:Aktif,Tidak Aktif',
            'password' => 'nullable|string|min:6',
        ]);

        $user = User::create([
            'username' => $request->username,
            'nik' => $request->nik,
            'npwp' => $request->npwp,
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


    // **Login User atau Admin**
    public function login(Request $request)
    {
        // **Login Admin menggunakan username & password**
        if ($request->has('username') && $request->has('password')) {
            $credentials = $request->validate([
                'username' => 'required|string',
                'password' => 'required|string',
            ]);

            if (Auth::attempt($credentials)) {
                $user = Auth::user();
                if ($user->role !== 'admin') {
                    Auth::logout();
                    return response()->json(['message' => 'Unauthorized'], 403);
                }

                return redirect()->route('admin.dashboard');
            }
        }

        // **Login User menggunakan NIK & NPWP**
        if ($request->has('nik') && $request->has('npwp')) {
            $user = User::where('nik', $request->nik)->where('npwp', $request->npwp)->first();

            if ($user && $user->role === 'user') {
                Auth::login($user);
                return redirect()->route('user.index'); // Redirect ke halaman index
            }

            return response()->json([
                'message' => 'Invalid credentials',
            ], 401);
        }

        throw ValidationException::withMessages([
            'error' => ['Invalid credentials'],
        ]);

    }
    // public function showUserProfileForIndex()
    // {
    //     $user = Auth::user();
    //     if (!$user || !$user->status_langganan) {
    //         return redirect()->route('login');
    //     }

    //     return view('user.index', compact('user'));
    // }

 // Di dalam AuthController.php

// public function editProfile()
// {
//     // Mengambil data pengguna yang sedang login
//     $user = Auth::user();
//     return view('user.edit', compact('user'));
// }

// public function updateProfile(Request $request)
// {
//     // Validasi data yang diterima
//     $request->validate([
//         'username' => 'required|string|max:255',
//         'profile_picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
//     ]);

//     $user = Auth::user(); // Ambil user yang sedang login
//     $user->username = $request->username;

//     if ($request->hasFile('profile_picture')) {
//         // Hapus foto lama jika ada
//         if ($user->profile_picture && Storage::exists('public/uploads/' . $user->profile_picture)) {
//             Storage::delete('public/uploads/' . $user->profile_picture);
//         }

//         // Simpan foto baru
//         $filename = time() . '.' . $request->profile_picture->extension();
//         $request->profile_picture->storeAs('public/uploads', $filename);
//         $user->profile_picture = $filename;
//     }

//     $user->save(); // Simpan perubahan

//     return redirect()->route('user.edit')->with('success', 'Profil berhasil diperbarui');
// }


// public function updateProfile(Request $request)
//     {
//         $user = Auth::user();
//         if (!$user) {
//             return response()->json(['message' => 'Unauthorized'], 401);
//         }

//         $request->validate([
//             'username' => 'sometimes|string|max:255|unique:users,username,' . $user->id,
//             'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
//         ]);

//         if ($request->has('username')) {
//             $user->username = $request->username;
//         }

//         if ($request->hasFile('profile_picture')) {
//             // ✅ Hapus foto lama jika ada
//             if ($user->profile_picture) {
//                 Storage::delete('public/uploads/' . $user->profile_picture);
//             }

//             // ✅ Simpan foto baru
//             $file = $request->file('profile_picture');
//             $filename = time() . '.' . $file->getClientOriginalExtension();
//             $file->storeAs('public/uploads', $filename);
//             $user->profile_picture = $filename;
//         }

//         $user->save();

//         return response()->json([
//             'message' => 'Profile updated successfully',
//             'user' => $user,
//             'profile_picture' => $user->profile_picture ? asset('storage/uploads/' . $user->profile_picture) : null
//         ]);
//     }

    // public function showUserProfileForIndex()
    // {
    //     $user = Auth::user();
    //     if (!$user || !$user->status_langganan) {
    //         return redirect()->route('login');
    //     }

    //     return view('user.index', compact('user'));
    // }


    // public function editProfile()
    // {
    //     $user = Auth::user();
    //     return view('user.edit', compact('user'));
    // }

    // // Mengupdate profile user
    // public function updateProfile(Request $request)
    // {
    //     // Ambil data user yang sedang login
    //     $user = Auth::user();

    //     if (!$user) {
    //         return response()->json(['message' => 'Unauthorized'], 401);
    //     }

    //     // Validasi input
    //     $request->validate([
    //         'username' => 'sometimes|string|max:255|unique:users,username,' . $user->id,
    //         'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048|dimensions:min_width=200,min_height=200,max_width=1000,max_height=1000',
    //     ]);

    //     try {
    //         // Update username jika ada
    //         if ($request->has('username')) {
    //             $user->username = $request->username;
    //         }

    //         // Update foto profil jika ada
    //         if ($request->hasFile('profile_picture')) {
    //             // Hapus foto lama jika ada
    //             if ($user->profile_picture) {
    //                 Storage::delete('public/uploads/' . $user->profile_picture);
    //             }

    //             // Simpan foto baru
    //             $file = $request->file('profile_picture');
    //             $filename = time() . '.' . $file->getClientOriginalExtension();
    //             $file->storeAs('public/uploads', $filename);
    //             $user->profile_picture = $filename;

    //         }

    //         // Simpan perubahan ke database
    //         if ($user->save()) {
    //             return response()->json([
    //                 'message' => 'Profile updated successfully',
    //                 'user' => $user,
    //                 'profile_picture' => $user->profile_picture ? asset('storage/uploads/' . $user->profile_picture) : null
    //             ]);
    //         } else {
    //             return response()->json(['message' => 'Failed to save user data'], 500);
    //         }
    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'message' => 'Failed to update profile',
    //             'error' => $e->getMessage(),
    //         ], 500);
    //     }
    // }

    // // Menampilkan profil user di halaman index
    // public function showUserProfileForIndex()
    // {
    //     $user = Auth::user();
    //     if (!$user || !$user->status_langganan) {
    //         return redirect()->route('login');
    //     }

    //     return view('user.index', compact('user'));
    // }

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
