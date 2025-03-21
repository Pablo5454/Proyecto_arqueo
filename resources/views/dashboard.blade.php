<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center my-4">
            <a href="{{ route('arqueologos.index') }}" class="btn btn-primary btn-lg mx-3">Arqueólogos</a>
            <a href="{{ route('yacimientos.index') }}" class="btn btn-primary btn-lg mx-3">Yacimientos</a>
            <a href="{{ route('piezas.index') }}" class="btn btn-primary btn-lg mx-3">Piezas</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Login correcto") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
