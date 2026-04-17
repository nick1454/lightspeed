<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register</title>

<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<div class="min-h-screen flex items-center justify-center px-4">

    <!-- CARD -->
    <div class="w-full max-w-md bg-white rounded-xl shadow-md p-6 space-y-6">
        <!-- HEADER -->
        <div class="text-center">
            <h1 class="text-2xl font-semibold">Create account</h1>
            <p class="text-gray-500 text-sm mt-1">Register to get started</p>
        </div>
        <div>
            @if ($errors->any())
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 border border-red-200" role="alert">
                    <span class="font-medium">Error!</span> Please check the form below for errors.
                    <ul class="mt-2 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <!-- FORM -->
        <form class="space-y-4" action="{{ route('register.user') }}" method="post">
            @csrf

            <!-- NAME -->
            <div>
                <label class="block text-sm font-medium text-gray-700">
                    Full Name
                </label>
                <input
                    type="text"
                    name="name"
                    placeholder="Your name"
                    class="mt-1 w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                >
            </div>

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

            <!-- CONFIRM PASSWORD -->
            <div>
                <label class="block text-sm font-medium text-gray-700">
                    Confirm Password
                </label>
                <input
                    type="password"
                    name="password_confirmation"
                    placeholder="••••••••"
                    class="mt-1 w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                >
            </div>

            <!-- TERMS -->
            <div class="flex items-start space-x-2 text-sm">
                <input type="checkbox" class="mt-1 rounded border-gray-300">
                <span class="text-gray-600">
                    I agree to the
                    <a href="#" class="text-blue-600 hover:underline">Terms</a>
                    and
                    <a href="#" class="text-blue-600 hover:underline">Privacy Policy</a>
                </span>
            </div>

            <!-- BUTTON -->
            <button
                type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition"
            >
                Create Account
            </button>

        </form>

        <!-- FOOTER -->
        <p class="text-center text-sm text-gray-500">
            Already have an account?
            <a href="{{ route('login') }}" class="text-blue-600 hover:underline">
                Login
            </a>
        </p>

    </div>

</div>

</body>
</html>
