
  <!-- TailwindCSS Modal -->
  <div id="createOrigem" class=" modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 opacity-0 pointer-events-none transition-opacity duration-300 transform scale-90">
    <div class="bg-white w-full max-w-2xl mx-4 md:mx-auto p-6 rounded-lg shadow-lg relative transition-transform duration-300 transform scale-100">
        <button class="modal-close absolute top-4 right-4 text-gray-500 hover:text-gray-700">
            <i class="bi bi-x-lg text-xl"></i>
        </button>
        <h4 class="text-xl font-semibold text-[#798100] mb-4">Novo origem</h4>
        <form action="{{route('admin.origem.store')}}"  method="POST">
            @csrf
            <div class="grid grid-cols-1 gap-4">
                <div class="form-group">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nome da origem:</label>
                    <input type="text" name="name" id="name" value="{{old('name')}}" 
                    class="form-input mt-1 block w-full border border-gray-300 rounded-lg p-2" required>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-4">
                <div class="form-group">
                    <label for="description" class="block text-sm font-medium text-gray-700 hidden">Descricao:</label>
                    <textarea name="description" id="description" class="form-input mt-1 
                    block w-full border border-gray-300 rounded-lg p-2 hidden" ></textarea>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-4">
                <div class="form-group" id="from_groups_div">
                     <label for="description" class="block text-sm font-medium text-gray-700 mt-2">
                    selecione os grupos:</label>
                    <select name="grupos[]" id="grupos" multiple class="form-input mt-1 
                    block w-full border border-gray-300 rounded-lg py-5 focus:none outline:none">
                        @foreach($grupos as $grupo)
                            <option value="{{ $grupo->id }}">{{ $grupo->name }}</option>
                        @endforeach
                    </select>
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




<!-- EDIT MODAL -->
@foreach($origens as $origem)
  <div id="editarOrigem{{$origem->id}}" class=" modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 opacity-0 pointer-events-none transition-opacity duration-300 transform scale-90">
    <div class="bg-white w-full max-w-2xl mx-4 md:mx-auto p-6 rounded-lg shadow-lg relative transition-transform duration-300 transform scale-100">
        <button class="modal-close absolute top-4 right-4 text-gray-500 hover:text-gray-700">
            <i class="bi bi-x-lg text-xl"></i>
        </button>
        <h4 class="text-xl font-semibold text-[#798100] mb-4">Editar origem</h4>
        <form action="{{route('admin.origem.update',$origem->id)}}"  method="POST">
            @csrf @method('PUT')
            <div class="grid grid-cols-1 gap-4">
                <div class="form-group">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nome da origem:</label>
                    <input type="text" name="name" id="name"  value="{{$origem->name ?? old('name')}}"
                        class="form-input mt-1 block w-full border border-gray-300 rounded-lg p-2" required>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-4">
                <div class="form-group">
                    <label for="description" class="block text-sm font-medium text-gray-700 hidden">Descricao:</label>
                    <textarea name="description" id="description" class="form-input mt-1 
                    block w-full border border-gray-300 rounded-lg p-2 hidden" ></textarea>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-4">
                <div class="form-group" id="grupoSingle{{$origem->id}}">
                    <label for="grupos" class="block text-sm font-medium text-gray-700">
                        Selecione os grupos:
                    </label>
                    <select name="grupos[]" id="grupos{{$origem->id}}" multiple 
                        class="form-input mt-1 block w-full border border-gray-300 rounded-lg py-5 focus:none outline:none">
                        @foreach($grupos as $grupo)
                            @if($origem->id == $grupo->id_origin)
                                <option value="{{ $grupo->id }}" 
                                    {{ in_array($grupo->id, $origin_group_ids) ? 'selected' : '' }}>
                                    {{ $grupo->name }} 
                                </option>
                                @else
                                <option value="{{ $grupo->id }}">{{ $grupo->name }}</option>
                            @endif
                        @endforeach
                    </select>
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



<!-- EDIT MODAL -->
@foreach($origens as $origem)
  <div id="deleteOrigem{{$origem->id}}" class=" modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 opacity-0 pointer-events-none transition-opacity duration-300 transform scale-90">
    <div class="bg-white w-full max-w-2xl mx-4 md:mx-auto p-6 rounded-lg shadow-lg relative transition-transform duration-300 transform scale-100">
        <button class="modal-close absolute top-4 right-4 text-gray-500 hover:text-gray-700">
            <i class="bi bi-x-lg text-xl"></i>
        </button>
        <h4 class="text-xl font-semibold text-[#798100] mb-4">Remover origem</h4>
        <form action="{{route('admin.origem.delete',$origem->id)}}"  method="POST">
            @csrf @method('DELETE')
            <p>Deseja remover a origem <strong>{{$origem->name}}</strong></p>
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
    $(document).ready(function(){
        $('#phone1').mask('(00) 00000-0000');
        $('form').submit(function() {
            $('#phone1').unmask();
        });
    });
</script>
