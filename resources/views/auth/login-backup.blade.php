<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email"
                class="block mt-1 w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-900 dark:text-white"
                type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password"
                class="block mt-1 w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-900 dark:text-white"
                type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center">
            <input id="remember_me" type="checkbox"
                class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded dark:bg-gray-900 dark:border-gray-700"
                name="remember">
            <label for="remember_me" class="ml-2 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Remember me') }}
            </label>
        </div>

        <!-- Forgot Password & Submit Button -->
        <div class="flex items-center justify-between">
            @if (Route::has('password.request'))
                <a class="text-sm text-indigo-600 dark:text-indigo-400 hover:underline"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="px-6 py-2 text-white bg-indigo-600 hover:bg-indigo-700 rounded-lg">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
