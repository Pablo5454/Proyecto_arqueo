<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col items-center my-6">
            <img src="{{ asset('images/logo.jpg') }}" alt="Logo Arqueología" class="h-24 mb-4">

            <p class="text-2xl text-gray-800 font-medium">Sistema de gestión arqueológica</p>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <!-- Arqueólogos -->
                <a href="{{ route('arqueologos.index') }}" class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition text-center border">
                    <img src="{{ asset('images/arqueologo.jpg') }}" alt="Arqueólogos" class="h-16 mx-auto mb-4">
                    <h2 class="text-xl font-semibold text-gray-800">Arqueólogos</h2>
                </a>

                <!-- Yacimientos -->
                <a href="{{ route('yacimientos.index') }}" class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition text-center border">
                    <img src="{{ asset('images/yacimiento.png') }}" alt="Yacimientos" class="h-16 mx-auto mb-4">
                    <h2 class="text-xl font-semibold text-gray-800">Yacimientos</h2>
                </a>

                <!-- Piezas -->
                <a href="{{ route('piezas.index') }}" class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition text-center border">
                    <img src="{{ asset('images/pieza.jpg') }}" alt="Piezas" class="h-16 mx-auto mb-4">
                    <h2 class="text-xl font-semibold text-gray-800">Piezas</h2>
                </a>

            </div>
        </div>
    </div>
</x-app-layout>
