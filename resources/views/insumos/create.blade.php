<x-app-layout>
    <div class="w-full flex items-center justify-center pt-2">
        <form class="justify-start bg-white shadow-md rounded px-12 pt-6 pb-8 mb-2" action="{{ url('insumos') }}" method="POST" enctype="multipart/form-data">
            <img src={{ asset('marmoshoplogo.png') }} alt="" class="w-48 h-40 text-gray-500">
            @csrf
            <label class="block text-gray-700 text-sm font-bold mb-2" for="Pokémon Name">
                Nome do Produto
            </label>
            <input type="text">

        </form>
    </div>







</x-app-layout>