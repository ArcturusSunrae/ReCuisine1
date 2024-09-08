<x-guest-layout>
    <div class="flex items-center justify-center min-h-screen bg-[#f5e4c3]">
        <div class="flex flex-col md:flex-row bg-white shadow-lg rounded-lg overflow-hidden max-w-5xl w-full">

            <div class="w-full md:w-1/2 bg-green-100 p-12 flex items-center justify-center">
                <div class="flex flex-col items-center">

                    <img src="{{ asset('images/logo.jpg') }}" alt="ReCuisine Logo" class="w-48 h-48 rounded-full shadow-lg mb-4">
                    <h1 class="text-green-600 font-bold text-2xl">ReCuisine</h1>
                    <p class="text-gray-500 text-sm mt-2">From plate to purpose, every meal matters</p>
                </div>
            </div>

            <!-- Form Section -->
            <div class="w-full md:w-1/2 p-12 md:p-16">
                <div class="flex justify-between mb-6">
                    <a href="{{ route('login') }}" class="text-gray-500 hover:text-gray-700">Login</a>
                    <a href="{{ route('register') }}" class="text-green-500 border-b-2 border-green-500">Sign Up</a>
                </div>

                <!-- Validation Errors -->
                <x-validation-errors class="mb-4" />

                <!-- Register Form -->
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div class="mb-6">
                        <x-label for="name" value="Name" class="text-black"/>
                        <x-input id="name" class="block mt-1 w-full bg-white border border-gray-300 rounded-lg px-4 py-3 text-lg text-black" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    </div>

                    <!-- Email -->
                    <div class="mb-6">
                        <x-label for="email" value="Email" class="text-black"/>
                        <x-input id="email" class="block mt-1 w-full bg-white border border-gray-300 rounded-lg px-4 py-3 text-lg text-black" type="email" name="email" :value="old('email')" required />
                    </div>

                    <!-- Password -->
                    <div class="mb-6">
                        <x-label for="password" value="Password" class="text-black"/>
                        <x-input id="password" class="block mt-1 w-full bg-white border border-gray-300 rounded-lg px-4 py-3 text-lg text-black" type="password" name="password" required autocomplete="new-password" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-6">
                        <x-label for="password_confirmation" value="Confirm Password" class="text-black"/>
                        <x-input id="password_confirmation" class="block mt-1 w-full bg-white border border-gray-300 rounded-lg px-4 py-3 text-lg text-black" type="password" name="password_confirmation" required autocomplete="new-password" />
                    </div>

                    <!-- Already registered & Register button -->
                    <div class="flex items-center justify-between mt-6">
                        <a href="{{ route('login') }}" class="underline text-sm text-gray-600 hover:text-gray-900">Already registered?</a>
                        <x-button class="bg-green-500 text-white hover:bg-green-600 rounded-lg px-8 py-3 text-lg">
                            {{ __('Register') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
