<x-guest-layout>
    <div class="w-full px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg flex justify-end">
        <div class="float-right">
            <a href="{{ route('login') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                {{ __('Iniciar Sesión') }}
            </a>
        </div>
    </div>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <!--<x-jet-validation-errors class="mb-4" />-->

        @livewire('user-register')
    </x-jet-authentication-card>
</x-guest-layout>
