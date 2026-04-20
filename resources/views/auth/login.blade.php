<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
<link rel="icon" type="image/x-icon" href="{{ asset('fav.ico') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<div class="min-h-screen flex items-center justify-center px-4">
    <!-- CARD -->
    <div class="w-full max-w-md bg-white rounded-xl shadow-md p-6 space-y-6">

        <!-- HEADER -->
        <div class="text-center">
            <h1 class="text-2xl font-semibold">Welcome back</h1>
            <p class="text-gray-500 text-sm mt-1">Login to your account</p>
        </div>

        @if (session()->has('error'))
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 border border-red-200" role="alert">
            <ul class="mt-2 list-disc list-inside">
                <li>{{ session('error') }}</li>
            </ul>
        </div>
        @endif
        <div>
            @if ($errors->any())
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 border border-red-200" role="alert">
                    <ul class="mt-2 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <!-- FORM -->
        <form class="space-y-4" action="{{ route('login') }}" method="post">
            @csrf
            <!-- EMAIL -->
            <div>
                <label class="block text-sm font-medium text-gray-700">
                    Email
                </label>
                <input
                    type="email"
                    name="email"
                    placeholder="you@example.com"
                    class="mt-1 w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                >
            </div>

            <!-- PASSWORD -->
            <div>
                <label class="block text-sm font-medium text-gray-700">
                    Password
                </label>
                <input
                    type="password"
                    name="password"
                    placeholder="••••••••"
                    class="mt-1 w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                >
            </div>

            <!-- REMEMBER + FORGOT -->
            <div class="flex items-center justify-between text-sm">
                <label class="flex items-center space-x-2">
                    <input type="checkbox" class="rounded border-gray-300">
                    <span class="text-gray-600">Remember me</span>
                </label>

                <a href="#" class="text-blue-600 hover:underline">
                    Forgot password?
                </a>
            </div>

            <!-- BUTTON -->
            <button
                type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition"
            >
                Login
            </button>

        </form>

        <!-- FOOTER -->
        <p class="text-center text-sm text-gray-500">
            Don’t have an account?
            <a href="{{ route('register') }}" class="text-blue-600 hover:underline">
                Register
            </a>
        </p>

    </div>

</div>

</body>
</html>
