<x-app-layout>
    <div class="h-screen w-full flex flex-col">
        <!-- Parte amarela -->
        <div class="bg-yellow-200 h-1/2 flex flex-col items-center justify-center relative">
            <!-- Título -->
            <div class="text-center mb-8">
                <h1 class="text-2xl font-bold">Olá! Antes de mais nada,</h1>
                <h1 class="text-2xl font-bold">o que você vai cadastrar?</h1>
            </div>
        </div>

        <!-- Parte cinza -->
        <div class="bg-gray-100 flex-1"></div>

        <!-- Quadradinhos (sobrepostos entre amarelo e cinza) -->
        <div class="absolute inset-x-0 top-1/2 flex justify-center">
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <a href="{{ route('createinsumo') }}" wire:navigate>
                    <div class="w-32 h-32 flex flex-col items-center justify-center border rounded-lg shadow bg-white hover:shadow-lg cursor-pointer">
                        <img src={{ asset('massa.png') }} class="w-24 h-24" />

                        <span class="font-semibold">Insumos</span>
                    </div>
                </a>

                <a href="{{ route('createbrand') }}" wire:navigate>
                <div class="w-32 h-32 flex flex-col items-center justify-center border rounded-lg shadow bg-white hover:shadow-lg cursor-pointer">
                    <img src={{ asset('sait.png') }} class="w-24 h-24" />
                    <span class="font-semibold">Marcas</span>
                </div>
                </a>

                <div class="w-32 h-32 flex flex-col items-center justify-center border rounded-lg shadow bg-white hover:shadow-lg cursor-pointer">
                    <img src="https://cdn-icons-png.flaticon.com/512/616/616408.png" class="w-10 h-10 mb-2">
                    <span class="font-semibold">Categorias</span>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>