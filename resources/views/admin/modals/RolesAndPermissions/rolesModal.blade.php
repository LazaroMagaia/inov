
  <!-- TailwindCSS Modal -->
<div id="createRole" class=" modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 opacity-0 pointer-events-none transition-opacity duration-300 transform scale-90">
    <div class="bg-white w-full max-w-2xl mx-4 md:mx-auto p-6 rounded-lg shadow-lg relative transition-transform duration-300 transform scale-100">
        <button class="modal-close absolute top-4 right-4 text-gray-500 hover:text-gray-700">
            <i class="bi bi-x-lg text-xl"></i>
        </button>
        <h4 class="text-xl font-semibold text-[#798100] mb-4">Novo tipo de acesso</h4>
        <form action="{{route('admin.roles.store')}}"  method="POST">
            @csrf
            <div class="grid grid-cols-1 gap-4">
                <div class="form-group">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nome da regra:</label>
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
  

<!--        EDIT MODAL         -->
@foreach($roles as $role)
<div id="editRole{{$role->id}}" class=" modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 opacity-0 pointer-events-none transition-opacity duration-300 transform scale-90">
    <div class="bg-white w-full max-w-2xl mx-4 md:mx-auto p-6 rounded-lg shadow-lg relative transition-transform duration-300 transform scale-100">
        <button class="modal-close absolute top-4 right-4 text-gray-500 hover:text-gray-700">
            <i class="bi bi-x-lg text-xl"></i>
        </button>
        <h4 class="text-xl font-semibold text-[#798100] mb-4">Editar tipo de acesso {{$role->name}}</h4>
        <form action="{{route('admin.roles.update',$role->id)}}" method="POST">
            @method('PUT')
            @csrf
            <div class="grid grid-cols-1 gap-4">
                <div class="form-group">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nome da regra:</label>
                    <input type="text" name="name" id="name" class="form-input mt-1 block 
                    w-full border border-gray-300 rounded-lg p-2" value="{{$role->name}}" required>
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

<!--        DELETE MODAL         -->
@foreach($roles as $role)
<div id="deleteRole{{$role->id}}" class=" modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 opacity-0 pointer-events-none transition-opacity duration-300 transform scale-90">
    <div class="bg-white w-full max-w-2xl mx-4 md:mx-auto p-6 rounded-lg shadow-lg relative transition-transform duration-300 transform scale-100">
        <button class="modal-close absolute top-4 right-4 text-gray-500 hover:text-gray-700">
            <i class="bi bi-x-lg text-xl"></i>
        </button>
        <h4 class="text-xl font-semibold text-[#798100] mb-4">Remover tipo de acesso {{$role->name}}</h4>
        <form action="{{route('admin.roles.delete',$role->id)}}" method="POST">
            @method('DELETE')
            @csrf
            <div class="grid grid-cols-1 gap-4">
                <p>
                    Tem certeza que deseja excluir a tipo de acesso <strong>{{$role->name}}</strong>?
                </p>
            </div>
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