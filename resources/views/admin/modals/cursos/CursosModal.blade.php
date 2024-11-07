
<!-- CREATE MODAL -->
<div id="createCursos" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 opacity-0 pointer-events-none transition-opacity duration-300 transform scale-90">
    <div class="bg-white w-full max-w-2xl mx-4 md:mx-auto p-6 rounded-lg shadow-lg relative transition-transform duration-300 transform scale-100">
        <button class="absolute modal-close top-4 right-4 text-gray-500 hover:text-gray-700" aria-label="Close" onclick="closeModal()">
            <i class="bi bi-x-lg text-xl"></i>
        </button>
        <h4 class="text-xl font-semibold text-[#798100] mb-4">Novo curso</h4>
        <form action="{{ route('admin.cursos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="form-group">
                    <label for="title" class="block text-sm font-medium text-gray-700">Nome do curso:</label>
                    <input type="text" name="title" id="title" class="mt-1 block w-full border border-gray-300 rounded-lg p-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                </div>
             
                <div class="form-group" id="from_status_div">
                    <label for="grupos">Selecione os grupos:</label>
                    <select name="grupos[]" id="grupos" multiple class="border border-[#797D41] p-2 rounded-lg">
                        @foreach($grupos as $grupo)
                            <option value="{{ $grupo->id }}">{{ $grupo->name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="image" class="block text-sm font-medium text-gray-700">Imagem do curso:</label>
                    <input type="file" name="image" id="image" class="mt-1 block w-full border 
                         rounded-lg p-2 shadow-sm focus:ring-indigo-500 
                        focus:border-indigo-500 sm:text-sm">
                </div>

                <div class="form-group col-span-2">
                    <label for="description" class="block text-sm font-medium text-gray-700">Descrição:</label>
                    <textarea name="description" id="description" cols="30" rows="4" class="mt-1 block w-full border border-gray-300 rounded-lg p-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required></textarea>
                </div>
            </div>
            <div class="mt-6 flex justify-end gap-4">
                <button type="button" class=" modal-close bg-gray-300 text-gray-700 px-4 py-2 rounded-lg 
                    hover:bg-gray-400">
                    Fechar
                </button>
                <button type="submit" class="bg-[#849f54] text-white px-4 py-2 rounded-lg hover:bg-[#6b9677]">
                    Cadastrar
                </button>
            </div>
        </form>
    </div>
</div>


<!-- EDIT MODAL -->
@foreach($cursos as $curso)
<div id="editCursos{{$curso->id}}" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 opacity-0 pointer-events-none transition-opacity duration-300 transform scale-90">
    <div class="bg-white w-full max-w-2xl mx-4 md:mx-auto p-6 rounded-lg shadow-lg relative transition-transform duration-300 transform scale-100">
        <button class="absolute modal-close top-4 right-4 text-gray-500 hover:text-gray-700" aria-label="Close" onclick="closeModal()">
            <i class="bi bi-x-lg text-xl"></i>
        </button>
        <h4 class="text-xl font-semibold text-[#798100] mb-4">Atualizar curso</h4>
        <form action="{{ route('admin.cursos.update', $curso->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="form-group">
                    <label for="title" class="block text-sm font-medium text-gray-700">Nome do curso:</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $curso->title) }}" class="mt-1 block w-full border border-gray-300 rounded-lg p-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                </div>
                <div class="form-group">
                    <label for="grupos">Selecione os grupos:</label>
                    <select name="grupos[]" id="grupos{{$curso->id}}" multiple class="border border-[#797D41] p-2 rounded-lg">
                        @foreach($grupos as $grupo)
                            <option value="{{ $grupo->id }}" @selected($curso->groups->contains($grupo))>
                                {{ $grupo->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="image" class="block text-sm font-medium text-gray-700">Imagem do curso:</label>
                    <input type="file" name="image" id="image" class="mt-1 block w-full border rounded-lg 
                        p-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <div class="form-group col-span-2">
                    <label for="description" class="block text-sm font-medium text-gray-700">Descrição:</label>
                    <textarea name="description" id="description" cols="30" rows="4" 
                    class="mt-1 block w-full border border-gray-300 rounded-lg p-2 shadow-sm 
                    focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>{{ old('description', $curso->description) }}</textarea>
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
@foreach($cursos as $curso)
<div id="deleteCursos{{$curso->id}}" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 opacity-0 pointer-events-none transition-opacity duration-300 transform scale-90">
    <div class="bg-white w-full max-w-2xl mx-4 md:mx-auto p-6 rounded-lg shadow-lg relative transition-transform duration-300 transform scale-100">
        <button class="modal-close absolute top-4 right-4 text-gray-500 hover:text-gray-700">
            <i class="bi bi-x-lg text-xl"></i>
        </button>
        <h4 class="text-xl font-semibold text-[#798100] mb-4">Remover curso</h4>
        <form  action="{{route('admin.cursos.delete',$curso->id)}}" method="POST" >
            @csrf
            @method('DELETE')
            <div class="grid grid-cols-1 gap-4">
                <p>Deseja remover o curso <strong>{{$curso->title}}</strong></p>
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


<script>
    $(document).ready(function() {
        $('#grupos').select2({
            placeholder: "Selecione os grupos",
            allowClear: true,
            width: '100%' // Ajusta a largura para preencher completamente o campo
        });
    });

    $('select[id^="grupos"]').each(function() {
        $(this).select2({
            placeholder: "Selecione os grupos",
            allowClear: true,
            width: '100%'
        });
    });
</script>
