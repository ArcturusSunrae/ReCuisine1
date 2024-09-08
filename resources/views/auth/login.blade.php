<x-guest-layout>
    <div class="flex items-center justify-center min-h-screen bg-[#f5e4c3]">
        <div class="flex flex-col md:flex-row bg-white shadow-lg rounded-lg overflow-hidden max-w-5xl w-full">

            <div class="w-full md:w-1/2 bg-green-100 p-12 flex items-center justify-center">
                <div class="flex flex-col items-center">
                    <img src="{{ asset('images/logo.jpg') }}" alt="Logo" class="w-32 h-32 rounded-full shadow-lg mb-4">
                    <h1 class="text-green-600 font-bold text-2xl">ReCuisine</h1>
                    <p class="text-gray-500 text-sm mt-2">From plate to purpose, every meal matters</p>
                </div>
            </div>

            <!-- Form Section with larger padding and fonts -->
            <div class="w-full md:w-1/2 p-12 md:p-16">
                <div class="flex justify-between mb-6">
                    <a href="{{ route('login') }}" class="text-green-500 border-b-2 border-green-500">Login</a>
                    <a href="{{ route('register') }}" class="text-gray-500 hover:text-gray-700">Sign Up</a>
                </div>

                <!-- Validation Errors -->
                <x-validation-errors class="mb-4" />

                <!-- Session Status -->
                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif

                <!-- Login Form -->
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div class="mb-6">
                        <x-label for="email" value="Email" />
                        <x-input id="email" class="block mt-1 w-full border border-gray-300 rounded-lg px-4 py-3 text-lg" type="email" name="email" :value="old('email')" required autofocus />
                    </div>

                    <!-- Password -->
                    <div class="mb-6">
                        <x-label for="password" value="Password" />
                        <x-input id="password" class="block mt-1 w-full border border-gray-300 rounded-lg px-4 py-3 text-lg" type="password" name="password" required />
                    </div>

                    <!-- Remember Me Checkbox -->
                    <div class="flex items-center mb-6">
                        <x-checkbox id="remember_me" name="remember" />
                        <label for="remember_me" class="ml-2 text-sm text-gray-600">
                            {{ __('Remember me') }}
                        </label>
                    </div>

                    <!-- Forgot Password and Submit Button -->
                    <div class="flex items-center justify-between mt-6">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="underline text-sm text-gray-600 hover:text-gray-900">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif

                        <x-button class="bg-green-500 text-white hover:bg-green-600 rounded-lg px-8 py-3 text-lg">
                            {{ __('Log in') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
