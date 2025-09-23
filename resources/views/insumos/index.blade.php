<x-app-layout>
    <div class="min-h-screen w-full flex flex-col items-center bg-gray-100 py-8">
        <!-- Título -->
        <div class="text-center mb-8 px-4">
            <h1 class="text-2xl font-bold">Lista de Insumos</h1>
            <p class="text-gray-600">Confira todos os insumos cadastrados</p>
        </div>

        <!-- Container da tabela -->
        <div class="w-full max-w-4xl px-4">
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white rounded-xl shadow-lg">
                    <thead class="bg-yellow-400 text-black">
                        <tr>
                            <th class="py-3 px-4 text-left rounded-tl-lg">Nome</th>
                            <th class="py-3 px-4 text-left">Categoria</th>
                            <th class="py-3 px-4 text-left">Unidade</th>
                            <th class="py-3 px-4 text-left">Marca</th>
                            <th class="py-3 px-4 text-left">Estoque</th>
                            <th class="py-3 px-4 text-left">Preço</th>
                            <th class="py-3 px-4 text-left rounded-tr-lg">Imagem</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($insumos as $insumo)
                        <tr>
                            <td class="py-2 px-4">{{ $insumo->name }}</td>
                            <td class="py-2 px-4">{{ $insumo->category->name ?? '-' }}</td>
                            <td class="py-2 px-4">{{ $insumo->unit->name ?? '-' }}</td>
                            <td class="py-2 px-4">{{ $insumo->brand->name ?? '-' }}</td>
                            <td class="py-2 px-4">{{ $insumo->stock }}</td>
                            <td class="py-2 px-4">
                                R${{ number_format($insumo->price, 2, ',', '.') }}
                            </td>
                            <td class="py-2 px-4">
                                @if($insumo->image)
                                <img src="{{ asset('storage/' . $insumo->image) }}"
                                    alt="{{ $insumo->name }}" class="w-16 h-16 object-cover rounded-lg">
                                @else
                                -
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="py-4 text-center text-gray-500">Nenhum insumo encontrado</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>