
  <!-- TailwindCSS Modal -->
  <div id="createGroup" class=" modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 opacity-0 pointer-events-none transition-opacity duration-300 transform scale-90">
    <div class="bg-white w-full max-w-2xl mx-4 md:mx-auto p-6 rounded-lg shadow-lg relative transition-transform duration-300 transform scale-100">
        <button class="modal-close absolute top-4 right-4 text-gray-500 hover:text-gray-700">
            <i class="bi bi-x-lg text-xl"></i>
        </button>
        <h4 class="text-xl font-semibold text-[#798100] mb-4">Novo grupo</h4>
        <form action="{{route('admin.groups.store')}}"  method="POST">
            @csrf
            <div class="grid grid-cols-1 gap-4">
                <div class="form-group">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nome do grupo:</label>
                    <input type="text" name="name" id="name" class="form-input mt-1 block w-full border border-gray-300 rounded-lg p-2" required>
                </div>
            </div>
            <div class="mt-6 flex justify-end gap-4">
                <button type="button" class="modal-close bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400">
                    Fechar
                </button>
                <button type="submit" class="bg-[#849f54] text-white px-4 py-2 rounded-lg hover:bg-[#6b9677]">
                    Cadastrar
                </button>
            </div>
        </form>
    </div>
</div>
  
<!-- EDIT MODEL -->
@foreach($grupos as $grupo)
  <!-- TailwindCSS Modal -->
  <div id="editarGroup{{$grupo->id}}" class=" modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 opacity-0 pointer-events-none transition-opacity duration-300 transform scale-90">
    <div class="bg-white w-full max-w-2xl mx-4 md:mx-auto p-6 rounded-lg shadow-lg relative transition-transform duration-300 transform scale-100">
        <button class="modal-close absolute top-4 right-4 text-gray-500 hover:text-gray-700">
            <i class="bi bi-x-lg text-xl"></i>
        </button>
        <h4 class="text-xl font-semibold text-[#798100] mb-4">Editar grupo</h4>
        <form action="{{route('admin.groups.update',$grupo->id)}}"  method="POST">
            @csrf @method('PUT')
            <div class="grid grid-cols-1 gap-4">
                <div class="form-group">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nome do grupo:</label>
                    <input type="text" name="name" id="name" class="form-input mt-1 block w-full border 
                        border-gray-300 rounded-lg p-2" required value="{{$grupo->name}}">
                </div>
            </div>
            <div class="mt-6 flex justify-end gap-4">
                <button type="button" class="modal-close bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400">
                    Fechar
                </button>
                <button type="submit" class="bg-[#849f54] text-white px-4 py-2 rounded-lg hover:bg-[#6b9677]">
                    Atualizar
                </button>
            </div>
        </form>
    </div>
</div>
@endforeach

<!--- DELETE MODEL -->

@foreach($grupos as $grupo)
  <!-- TailwindCSS Modal -->
  <div id="deleteGroup{{$grupo->id}}" class=" modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 opacity-0 pointer-events-none transition-opacity duration-300 transform scale-90">
    <div class="bg-white w-full max-w-2xl mx-4 md:mx-auto p-6 rounded-lg shadow-lg relative transition-transform duration-300 transform scale-100">
        <button class="modal-close absolute top-4 right-4 text-gray-500 hover:text-gray-700">
            <i class="bi bi-x-lg text-xl"></i>
        </button>
        <h4 class="text-xl font-semibold text-[#798100] mb-4">Remover grupo</h4>
        <form action="{{route('admin.groups.delete',$grupo->id)}}"  method="POST">
            @csrf @method('DELETE')
            <p>tem certeza que deseja remover o grupo <strong>{{$grupo->name}}</strong></p>

            <div class="mt-6 flex justify-end gap-4">
                <button type="button" class="modal-close bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400">
                    Fechar
                </button>
                <button type="submit" class="bg-[#849f54] text-white px-4 py-2 rounded-lg hover:bg-[#6b9677]">
                    Confirmar
                </button>
            </div>
        </form>
    </div>
</div>
@endforeach