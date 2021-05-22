<x-guest-layout>
    
    

    <div class="flex flex-col h-screen">

        <div class="flex justify-center p-5 bg-gray-100 shadow">
            <div class="inline-flex items-center ">
                <img src="{{ asset('assets_kiki/TIME_MARKET_logo.svg') }}" class="transform w-36">
            </div>

        </div>



        <!-- welcome tron -->
        <div class="flex flex-col p-4 justify-start text-center h-64 bg-gray-100 bg-no-repeat bg-bottom space-y-2"
            style="background-image: url('{{asset("assets_kiki/vector/DataArranging_TwoColor.svg")}}');background-size: 22rem;">

        </div>


        <!-- login form -->
        <div class="container mx-auto p-4 bg-white flex-1 rounded-t-3xl">

            <span class="block f-playfair text-2xl font-bold text-center text-gray-600 mt-3">
                Halo!
            </span>
            <span class="block f-roboto text-sm text-center text-gray-600">
                Silahkan login untuk melanjutkan
            </span>

            <div class="flex mt-6 flex-col space-y-4">
                <input class="border-none shadow text-sm  p-2 w-full rounded focus:outline-none focus:ring-2 focus:ring-green-300"
                    placeholder="Email" type="text" name="email" id="email">

                <input class="border-none shadow text-sm  p-2 w-full rounded focus:outline-none focus:ring-2 focus:ring-green-300"
                    placeholder="Password" type="password" name="password" id="password">

                <input class="border-none shadow p-2 w-full rounded focus:outline-none focus:ring-2 
                focus:ring-green-300 bg-green-500  text-white
                " type="button" name="login" id="login" value="Login">
            </div>

            <div class="fixed bottom-0 inset-x-0 bg-white 
            flex justify-center text-xs text-gray-400
            space-x-4 p-2 f-roboto
            ">
                <span class="font-bold">BI Inovasi</span>
                <span class="material-icons self-center" style="font-size: 6px;">
                    fiber_manual_record
                </span>
                <span>KPw Bank Indonesia Provinsi Gorontalo</span>
            </div>

        </div>


    </div>








    


    
</x-guest-layout>





{{-- <x-auth-card>
    <x-slot name="logo">
        <a href="/">
            <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
        </a>
    </x-slot>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-label for="email" :value="__('Email')" />

            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-label for="password" :value="__('Password')" />

            <x-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-button class="ml-3">
                {{ __('Log in') }}
            </x-button>
        </div>
    </form>
</x-auth-card> --}}