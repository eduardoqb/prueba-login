<form method="POST" action="{{ route('register') }}">
    @csrf
    
    <script>
        function showAlert(text){
            Swal.fire({
                icon: 'error',
                
                html: text
            })
        }
    </script>
    
    @if ($errors->any())
        <script>
            var text = '';
            @foreach ($errors->all() as $error)
                text += '{{ $error }}</br>';
            @endforeach
            showAlert(text);
            </script>
    @endif

    <!--@if ($errors->any())
    
        <div class="font-medium text-red-600">{{ __('Algo salio mal.') }}</div>

        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    -->

    <div class="mt-4">
        <x-jet-label for="name" value="{{ __('Nombres') }}" />
        <!--<x-jet-input wire:model.lazy="name" id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />-->
        <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" autofocus autocomplete="name" />
    </div>

    <div class="mt-4">
        <x-jet-label for="last-name" value="{{ __('Apellidos') }}" />
        <x-jet-input id="last-name" class="block mt-1 w-full" type="text" name="last-name" :value="old('last-name')" autocomplete="last-name" />
    </div>

    <div class="mt-4">
        <x-jet-label for="tipo-identificacion" value="{{ __('Tipo de Identificación') }}" />
        <select id="tipo-identificacion" class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" name="tipo-identificacion" :value="old('tipo-identificacion')">
            <option>Selecciona una opción</option>
            <option value="1">Cédula de Ciudadanía</option>
            <option value="2">Cédula de Extranjería</option>
            <option value="3">Pasaporte</option>
        </select>
    </div>

    <div class="mt-4">
        <x-jet-label for="numero_identificacion" value="{{ __('Número de Identificación') }}" />
        <x-jet-input id="numero-identificacion" class="block mt-1 w-full" type="number" name="numero-identificacion" :value="old('numero-identificacion')" required autocomplete="numero-identificacion" />
    </div>

    <div class="mt-4">
        <x-jet-label for="telefono" value="{{ __('Número fijo o móvil') }}" />
        <x-jet-input id="telefono" class="block mt-1 w-full" type="number" name="telefono" :value="old('telefono')" autocomplete="telefono" />
    </div>

    <div class="mt-4">
        <x-jet-label for="email" value="{{ __('Correo Elecrónico') }}" />
        <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" />
    </div>

    <div class="mt-4">
        <x-jet-label for="password" value="{{ __('Contraseña') }}" />
        <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
    </div>

    <div class="mt-4">
        <x-jet-label for="password_confirmation" value="{{ __('Confirmar Contraseña') }}" />
        <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
    </div>
    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
        <div class="mt-4">
            <x-jet-label for="terms">
                <div class="flex items-center">
                    <x-jet-checkbox name="terms" id="terms"/>

                    <div class="ml-2">
                        {!! __('Acepto los :terms_of_service', [
                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('terminos y condiciones').'</a>'
                        ]) !!}
                    </div>
                </div>
            </x-jet-label>
        </div>
    @endif

    <div class="flex items-center justify-end mt-4">
        <x-jet-button class="ml-4">
            {{ __('Registrar') }}
        </x-jet-button>
    </div>

    <div>
        {{$telefono}}
    </div>
</form>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.19/dist/sweetalert2.min.js"></script>