<x-guest-layout>
    <x-authentication-card>
        {{-- <x-slot name="logo">
            <x-authentication-card-logo /> 
        </x-slot> --}}

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <h4 class="text-secondary text-center" style="font-family: 'Poppins', sans-serif;font-weight:600;">¡Hola, <span class="text-primary">te damos la <br> bienvenida!</span></h4>
            </div>

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="d-block mt-1 w-100" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="d-block mt-1 w-100" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="d-block mt-4 col-4">
                <label for="remember_me" class="d-flex align-items">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600 text-end">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" style="font-size: 14px;" class="mt-3 nav-link text-center text-secondary">¿Olvidaste tu contraseña?</a>
                @endif
            </div>

            
            <div class="w-100 d-flex flex-column">  
                <button class="btn btn-primary mt-3 mb-2 text-white border-0 py-2 shadow-sm" type="submit">{{ __('Log in') }}</button>
            </div>

            <!-- LINK REGISTER -->
            <div>
                <p class="text-secondary mt-4 text-center"><a href="{{route('register')}}">¡Registrate</a> en centro de ayuda <strong class="text-secondary">TECSUP</strong></p>
            </div>

        
        </form>
    </x-authentication-card>
</x-guest-layout>
