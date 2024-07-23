<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <img class="mt-4" src="{{asset('img/logo.png')}}" width="300" alt="">
            <!-- <x-authentication-card-logo /> -->
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="Nombres" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="last_name" value="Apellidos" />
                <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" autofocus autocomplete="last_name" />
            </div>

            <div class="mt-4">
                <div class="row">
                    <!-- <x-label for="user_name" value="User Name" />       -->
                     <label style="width: auto;" for="">User Name</label>
                     <span style="width: auto;" class="d-inline-block" tabindex="0" data-toggle="popover" data-trigger="hover focus" data-content="Disabled popover">
                        <button class="btn btn-primary" type="button" disabled>!</button>
                    </span>              
                </div>
                 <x-input id="user_name" class="block mt-1 w-full" type="text" name="user_name" :value="old('user_name')" autofocus autocomplete="user_name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif
            <br>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="terminos">
                <label class="form-check-label" for="flexCheckDefault">
                    Acepto los <a style="color: blue;" href="#" target="_blank">Términos y Condiciones</a> 
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="politicas">
                <label class="form-check-label" for="flexCheckChecked">
                    Acepto las <a style="color: blue;" href="#" target="_blank">Políticas</a>  
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
