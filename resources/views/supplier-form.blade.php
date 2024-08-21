<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supplier Registration</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-r from-green-400 to-blue-500 min-h-screen flex items-center justify-center">
<div class="bg-white p-10 rounded-xl shadow-2xl w-full max-w-4xl flex overflow-hidden">
    <!-- Logo Section -->
    <div class="w-1/2 flex flex-col items-center justify-center p-8 border-r border-gray-300 bg-gradient-to-b from-gray-100 to-gray-200">
        <img src="images/logo.jpg" alt="Logo" class="w-60 mb-6">
        <h1 class="text-4xl font-bold text-gray-900 mb-2">ReCuisine</h1>
        <p class="text-gray-600 text-center px-4">From plate to purpose, every meal matters</p>
    </div>

    <!-- Form Section -->
    <div class="w-1/2 p-8 bg-white">
        <div class="flex justify-end mb-6">
            <a href="{{ route('login') }}" class="text-gray-500 hover:text-gray-700 mr-6">Login</a>
            <a href="#" class="text-green-700 font-semibold border-b-2 border-green-700">Sign Up</a>
        </div>

        <form action="{{ route('register_supplier.update') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="business_name" class="block text-sm font-medium text-gray-700">Name of the Business</label>
                <input id="business_name" name="business_name" type="text" required autofocus class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500">
            </div>
            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                <input id="phone" name="phone" type="text" required class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500">
            </div>
            <div>
                <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                <input id="location" name="location" type="text" required class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500">
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                <input id="email" name="email" type="email" required class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500">
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input id="password" name="password" type="password" required class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500">
            </div>
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input id="password_confirmation" name="password_confirmation" type="password" required class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500">
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <label for="terms" class="flex items-center">
                        <input name="terms" id="terms" type="checkbox" required class="mr-2 rounded">
                        <span class="text-sm text-gray-600">I agree to the <a href="{{ route('terms.show') }}" target="_blank" class="text-green-600 hover:underline">Terms of Service</a> and <a href="{{ route('policy.show') }}" target="_blank" class="text-green-600 hover:underline">Privacy Policy</a></span>
                    </label>
                </div>
            @endif

            <div class="mt-6">
                <button type="submit" class="w-full bg-gradient-to-r from-green-500 to-blue-500 text-white py-2 rounded-lg shadow-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    Register
                </button>
            </div>
        </form>
        <div class="mt-4 text-center">
            <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-800">Already registered?</a>
        </div>
    </div>
</div>
</body>
</html>
