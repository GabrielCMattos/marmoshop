<x-app-layout>
    <div class="h-full w-full overflow-hidden flex flex-col items-center justify-center bg-gradient-to-b from-yellow-200 to-gray-100">
        <!-- Título -->
        <div class="text-center mt-4 m-2">
            <h1 class="text-2xl font-bold">Cadastrar novo insumo</h1>
            <p class="text-gray-600">Preencha as informações abaixo</p>
        </div>

        <!-- Formulário -->
        <form action="{{ route('insumos.store') }}" method="POST" enctype="multipart/form-data"
            class="grid grid-cols-1 md:grid-cols-2 gap-6 bg-white p-6 mb-6 rounded-xl shadow-lg w-[600px]">
            @csrf

            <!-- Nome -->
            <div>
                <label class="block font-semibold mb-1">Nome</label>
                <input type="text" name="name" class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-yellow-300" required>
            </div>

            <!-- Categoria -->
            <div>
                <label class="block font-semibold mb-1">Categoria</label>
                <select name="category_id" class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-yellow-300">
                    @forelse ($categorias as $cat)
                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                    @empty
                    <option disabled>Nenhuma categoria cadastrada</option>
                    @endforelse
                </select>
            </div>

            <!-- Unidade -->
            <div>
                <label class="block font-semibold mb-1">Unidade</label>
                <select name="unit_id" class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-yellow-300">
                    @forelse ($unidades as $unit)
                    <option value="{{$unit->id}}">{{$unit->sigla}}</option>
                    @empty
                    <option disabled>Nenhuma unidade cadastrada</option>
                    @endforelse
                </select>
            </div>

            <!-- Marca -->
            <div>
                <label class="block font-semibold mb-1">Marca</label>
                <select name="brand_id" class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-yellow-300">
                    @forelse ($marcas as $marca)
                    <option value="{{$marca->id}}">{{$marca->name}}</option>
                    @empty
                    <option disabled>Nenhuma marca cadastrada</option>
                    @endforelse
                </select>
            </div>

            <!-- Estoque -->
            <div>
                <label class="block font-semibold mb-1">Estoque</label>
                <input type="number" name="stock" class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-yellow-300" min="0">
            </div>

            <!-- Preço -->
            <div>
                <label class="block font-semibold mb-1">Preço</label>
                <input type="text" name="price" id="priceInput"
                    class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-yellow-300"
                    placeholder="R$ 0,00">
            </div>

            <!-- Imagem -->
            <div class="col-span-2 flex flex-col items-center">
                <label class="block font-semibold mb-2">Imagem</label>
                <input type="file" name="image" id="imageInput" accept="image/*"
                    class="mb-4 border rounded-lg px-3 py-2 w-full text-gray-600">

                <!-- Preview -->
                <div id="previewContainer" class="w-40 h-40 flex items-center justify-center border rounded-lg shadow bg-gray-50 overflow-hidden">
                    <span class="text-gray-400">Pré-visualização</span>
                </div>
            </div>

            <!-- Botão -->
            <div class="col-span-2 flex justify-center mt-6">
                <button type="submit"
                    class="bg-yellow-400 hover:bg-yellow-500 text-black font-semibold px-6 py-2 rounded-lg shadow">
                    Salvar
                </button>
            </div>
        </form>
    </div>

    <script>
        document.getElementById("imageInput").addEventListener("change", function(event) {
            const file = event.target.files[0];
            const previewContainer = document.getElementById("previewContainer");

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewContainer.innerHTML = `<img src="${e.target.result}" class="object-cover w-full h-full" />`;
                }
                reader.readAsDataURL(file);
            } else {
                previewContainer.innerHTML = `<span class="text-gray-400">Pré-visualização</span>`;
            }
        });
    </script>
    <script>
        const priceInput = document.getElementById('priceInput');

        priceInput.addEventListener('input', (e) => {
            let value = e.target.value;

            // Remove tudo que não é número
            value = value.replace(/\D/g, '');

            // Transforma em número e divide por 100 para formar centavos
            value = (Number(value) / 100).toFixed(2);

            // Formata em R$
            value = value.replace('.', ',');

            // Adiciona o prefixo R$
            e.target.value = 'R$ ' + value;
        });
    </script>
</x-app-layout>