<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

<div class="bg-white p-6 rounded-lg shadow-lg w-96">
    <h2 class="text-xl font-bold mb-4">Update Profile</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Profile Picture Section -->
    <div class="flex justify-center mb-4">
        @if(auth()->user()->profile_picture)
            <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}" class="w-24 h-24 rounded-full object-cover">
        @else
            <div class="w-24 h-24 bg-gray-300 rounded-full flex items-center justify-center">
                <span class="text-gray-600">No Image</span>
            </div>
        @endif
    </div>

    <!-- Profile Picture Upload Form -->
    <form action="{{ route('user.update-picture') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="profile_picture" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">

        @error('profile_picture')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror

        <button type="submit" class="mt-4 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 w-full">Upload</button>
    </form>

    <hr class="my-4">

    <!-- Username Update Form -->
    <h3 class="text-lg font-semibold mb-2">Update Username</h3>

    <form action="{{ route('user.update-username') }}" method="POST">
        @csrf
        <input type="text" name="username" value="{{ auth()->user()->username }}" class="w-full p-2 border rounded mb-2" placeholder="New Username" required>

        @error('username')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror

        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 w-full">Update Username</button>
    </form>
</div>

</body>
</html>
