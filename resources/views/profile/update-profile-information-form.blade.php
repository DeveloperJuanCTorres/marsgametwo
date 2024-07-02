<x-form-section submit="updateProfileInformation">
    <x-slot name="title">
        Información del Perfil
    </x-slot>

    <x-slot name="description">
        Actualice su información de perfil.
    </x-slot>
    
    <x-slot name="form">
        <!-- Profile Photo -->
        <!-- if (Laravel\Jetstream\Jetstream::managesProfilePhotos()) -->
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" id="photo" class="hidden"
                            wire:model.live="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-label for="photo" value="{{ __('Photo') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                          x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-secondary-button class="mt-2 me-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-secondary-button>
                @endif

                <x-input-error for="photo" class="mt-2" />
            </div>
        <!-- endif -->
        
        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="Nombres" />
            <x-input id="name" type="text" class="mt-1 block w-full" wire:model="state.name" required autocomplete="name" />
            <x-input-error for="name" class="mt-2" />
        </div>

        <!-- Last Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="last_name" value="Apellidos" />
            <x-input id="last_name" type="text" class="mt-1 block w-full" wire:model="state.last_name" />
            <x-input-error for="last_name" class="mt-2" />
        </div>

        <!-- User Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="username" value="User Name" />
            <x-input id="username" type="text" class="mt-1 block w-full" wire:model="state.username" required autocomplete="username" />
            <x-input-error for="username" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="username" value="Tipo Documento" />
            <select class="mt-1 block w-full" id="tipo_doc" wire:model="state.tipo_doc">
                <option value="">-Seleccionar-</option>
                <option value="DNI">DNI</option>
                <option value="PASAPORTE">PASAPORTE</option>
                <option value="CARNET">CARNET EXTRANJERIA</option>
            </select>            
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-label for="username" value="Número Documento" />
            <x-input id="numero_doc" type="text" class="mt-1 block w-full" wire:model="state.numero_doc" />
            <x-input-error for="numero_doc" class="mt-2" />
        </div>
       
        <!-- Sexo -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="sexo" value="Sexo" />
            <select class="mt-1 block w-full" id="sexo" wire:model="state.sexo">
                <option value="">-Seleccionar-</option>
                <option value="M">Masculino</option>
                <option value="F">Femenino</option>
                <option value="O">LGBTIQ+</option>
            </select>            
        </div>
        
        <!-- Edad -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="fecha_nac" value="Fecha de Nacimiento" />
            <x-input id="fecha_nacimiento" type="date" class="mt-1 block w-full" wire:model="state.fecha_nacimiento" />
            <x-input-error for="fecha_nac" class="mt-2" />
        </div>

        <!-- Telefono -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="telefono" value="Teléfono" />
            <x-input id="telefono" type="text" class="mt-1 block w-full" wire:model="state.telefono" autocomplete="telefono" />
            <x-input-error for="telefono" class="mt-2" />
        </div>

        <!-- Facebook -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="link_facebook" value="Facebook" />
            <x-input id="link_facebook" type="text" class="mt-1 block w-full" wire:model="state.link_facebook" autocomplete="link_facebook" />
            <x-input-error for="link_facebook" class="mt-2" />
        </div>

        <!-- Instagram -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="link_instagram" value="Instagram" />
            <x-input id="link_instagram" type="text" class="mt-1 block w-full" wire:model="state.link_instagram" autocomplete="link_instagram" />
            <x-input-error for="link_instagram" class="mt-2" />
        </div>

        <!-- TikTok -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="link_tiktok" value="TikTok" />
            <x-input id="link_tiktok" type="text" class="mt-1 block w-full" wire:model="state.link_tiktok" autocomplete="link_tiktok" />
            <x-input-error for="link_tiktok" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="email" value="{{ __('Email') }}" />
            <x-input id="email" type="email" class="mt-1 block w-full" wire:model="state.email" disabled required autocomplete="username" />
            <x-input-error for="email" class="mt-2" />

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())
                <p class="text-sm mt-2">
                    {{ __('Your email address is unverified.') }}

                    <button type="button" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" wire:click.prevent="sendEmailVerification">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if ($this->verificationLinkSent)
                    <p class="mt-2 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            @endif
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="me-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>
