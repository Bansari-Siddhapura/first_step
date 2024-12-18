<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.header', ['title' => 'login'])
</head>

<body data-layout-mode="light"
    class="bg-gray-100 dark:bg-gray-900 bg-[url('../images/bg-body.png')] dark:bg-[url('../images/bg-body-2.png')]">
    <div class="relative flex flex-col justify-center min-h-screen overflow-hidden">
        <div
            class="w-full  m-auto bg-white dark:bg-slate-800/60 rounded shadow-lg ring-2 ring-slate-300/50 dark:ring-slate-700/50 lg:max-w-md">
            <div class="text-center p-6 bg-slate-900 rounded-t">
                <a href="index.html"><img src="assets/images/logo-sm.png" alt="" class="w-14 h-14 mx-auto mb-2"></a>
                <h3 class="font-semibold text-white text-xl mb-1">Register</h3>
            </div>

            <form class="p-6" method="POST" action="{{ route('register') }}">
                @csrf
                <div>
                    <label for="name" class="label">Username</label>
                    <input type="text" id="name"
                        class="inputbox dark:bg-slate-800/60 dark:border-slate-700/50" placeholder="Enter Username"
                        name="name" :value="old('name')" required>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <div>
                    <label for="email" class="label">Email</label>
                    <input type="email" id="email"
                        class="inputbox dark:bg-slate-800/60 dark:border-slate-700/50" placeholder="Enter Email"
                        name="email" :value="old('email')" required>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div class="mt-4">
                    <label for="password" class="label">Your password</label>
                    <input type="password" id="password"
                        class="inputbox dark:bg-slate-800/60 dark:border-slate-700/50" name="password"
                        placeholder="Enter Password" required>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <div class="mt-4">
                    <label for="password_confirmation" class="label">Confirm Password</label>
                    <input type="password" id="password_confirmation"
                        class="inputbox dark:bg-slate-800/60 dark:border-slate-700/50"
                        placeholder="Enter Confirm Password" name="password_confirmation" required>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
                {{-- <div class="block mt-4">
                    <label class="custom-label">
                        <div
                            class="bg-white border dark:bg-slate-700 dark:border-slate-600 border-slate-200 rounded w-4 h-4  inline-block leading-4 text-center -mb-[3px]">
                            <input type="checkbox" class="hidden">
                            <i class="fas fa-check hidden text-xs text-slate-700 dark:text-slate-300"></i>
                        </div>
                        <span class="text-sm text-slate-500 font-medium">By registering you agree to the T-Wind Terms of
                            Use</span>
                    </label>
                </div> --}}
                <div class="mt-6">
                    <button
                        class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-200 transform bg-blue-500 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">
                        Register
                    </button>
                </div>
            </form>
            <p class="mb-5 text-sm font-medium text-center text-slate-500"> Already have an account ? <a
                    href="{{ route('login') }}" class="font-medium text-blue-600 hover:underline">Log in</a>
            </p>
        </div>
    </div>

    <script src="assets/libs/simplebar/simplebar.min.js"></script>
</body>

</html>
{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
