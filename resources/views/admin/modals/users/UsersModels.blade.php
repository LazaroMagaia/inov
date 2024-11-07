<!-- TailwindCSS Modal -->
<div id="createUser" class=" modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 opacity-0 pointer-events-none transition-opacity duration-300 transform scale-90">
    <div class="bg-white w-full max-w-2xl mx-4 md:mx-auto p-6 rounded-lg shadow-lg relative transition-transform duration-300 transform scale-100">
        <button class="modal-close absolute top-4 right-4 text-gray-500 hover:text-gray-700">
            <i class="bi bi-x-lg text-xl"></i>
        </button>
        <h4 class="text-xl font-semibold text-[#798100] mb-4">Novo usuário</h4>
        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="form-group">
                    <label for="first_name" class="block text-sm font-medium text-gray-700">Primeiro nome:</label>
                    <input type="text" name="first_name" id="first_name" class="form-input mt-1 block w-full border border-gray-300 rounded-lg p-2" required>
                </div>
                <div class="form-group">
                    <label for="last_name" class="block text-sm font-medium text-gray-700">Sobrenome:</label>
                    <input type="text" name="last_name" id="last_name" class="form-input mt-1 block w-full border border-gray-300 rounded-lg p-2" required>
                </div>
                <div class="form-group">
                    <label for="phone1" class="block text-sm font-medium text-gray-700">Celular:</label>
                    <input type="text" name="phone1" id="phone1" class="form-input mt-1 block w-full border border-gray-300 rounded-lg p-2">
                </div>
                <div class="form-group">
                    <label for="email" class="block text-sm font-medium text-gray-700">E-mail:</label>
                    <input type="email" name="email" id="email" class="form-input mt-1 block w-full border border-gray-300 rounded-lg p-2" required>
                </div>

                <div class="form-group">
                    <label for="roles_select" class="block text-sm font-medium text-gray-700">Nível de acesso:</label>
                    <select class="form-select mt-1 block w-full border border-gray-300 rounded-lg p-2"
                         id="roles_select" name="role" required>
                        <option value="">Selecione o nível de permissão</option>
                        @foreach($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group hidden" id="from_groups_div">
                    <label for="grupos">Selecione os grupos:</label>
                    <select name="grupos[]" id="grupos" multiple class="border border-[#797D41] p-2 rounded-lg">
                        @foreach($grupos as $grupo)
                            <option value="{{ $grupo->id }}">{{ $grupo->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group" id="from_status_div" style="display: none;">
                    <label for="from_status" class="block text-sm font-medium text-gray-700">Origem:</label>
                    <select class="form-select mt-1 block w-full border border-gray-300 rounded-lg p-2" id="from_select" name="origin">
                        <option value="">Selecione a origem do cliente</option>
                        @foreach($origens as $origin)
                            <option value="{{ $origin->id }}">{{ $origin->name }}</option>
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


@foreach($users as $user)
<!-- EDIT MODAL -->
<div id="editUser{{$user->id}}" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 opacity-0 pointer-events-none transition-opacity duration-300 scale-90">
    <div class="bg-white w-full max-w-2xl mx-4 md:mx-auto p-6 rounded-lg shadow-lg relative transition-transform transform scale-95 duration-300">
        <button type="button" class="modal-close absolute top-4 right-4 text-gray-500 hover:text-gray-700" aria-label="Fechar">
            <i class="bi bi-x-lg text-xl"></i>
        </button>
        <h4 class="text-xl font-semibold text-[#798100] mb-4">Editar Usuário</h4>
        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="form-group">
                    <label for="first_name" class="block text-sm font-medium text-gray-700">Primeiro nome:</label>
                    <input type="text" name="first_name" id="first_name" class="form-input mt-1 block w-full border border-gray-300 rounded-lg p-2" required value="{{ $user->first_name }}">
                </div>
                <div class="form-group">
                    <label for="last_name" class="block text-sm font-medium text-gray-700">Sobrenome:</label>
                    <input type="text" name="last_name" id="last_name" class="form-input mt-1 block w-full border border-gray-300 rounded-lg p-2" required value="{{ $user->last_name }}">
                </div>
                <div class="form-group">
                    <label for="phone1" class="block text-sm font-medium text-gray-700">Celular:</label>
                    <input type="text" name="phone1" id="phone1{{$user->id}}" class="form-input mt-1 block w-full border border-gray-300 rounded-lg p-2" value="{{ $user->phone1 }}">
                </div>
                <div class="form-group">
                    <label for="email" class="block text-sm font-medium text-gray-700">E-mail:</label>
                    <input type="email" name="email" id="email" class="form-input mt-1 block w-full border border-gray-300 rounded-lg p-2" required value="{{ $user->email }}">
                </div>

                <div class="form-group">
                    <label for="roles_select" class="block text-sm font-medium text-gray-700">Nível de acesso:</label>
                    <select class="form-select mt-1 block w-full border border-gray-300 rounded-lg p-2" id="roles_select_edit" name="role">
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>
                                {{ $role->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group" id="grupoSingle{{$user->id}}">
                    <label for="grupos">Selecione os grupos:</label>
                    <select name="grupos[]" id="grupos{{$user->id}}" multiple 
                        class="border border-[#797D41] p-2 rounded-lg">
                        @foreach($grupos as $grupo)
                            <option value="{{ $grupo->id }}" @selected($user->groups->contains($grupo))>
                                {{ $grupo->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                

                <div class="form-group" id="from_status_div_edit{{$user->id}}">
                    <label for="from_status" class="block text-sm font-medium text-gray-700">Origem:</label>
                        <select class="form-select mt-1 block w-full border border-gray-300 rounded-lg p-2" 
                        id="from_select" name="origin">
                        @foreach($origens as $origin)
                            <option value="{{ $origin->id }}" {{ $user->origin == $origin->id ? 'selected' : '' }}>
                                {{ $origin->name }}
                            </option>
                        @endforeach
                        </select>
                        
                </div>
            
                <div class="form-group"></div>
                <div class="form-group">
                    <label for="password" class="block text-sm font-medium text-gray-700">Senha:</label>
                    <input type="password" name="password" id="password" placeholder="nova senha"
                        class="form-input mt-1 block w-full border border-gray-300 rounded-lg p-2">
                </div>
                <div class="form-group">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmar Senha:</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="confirme a nova senha"
                        class="form-input mt-1 block w-full border border-gray-300 rounded-lg p-2">
                </div>
            </div>
            <div class="mt-6 flex justify-end gap-4">
                <button type="button" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400 modal-close">
                    Fechar
                </button>
              <button type="submit" class="bg-[#849f54] text-white px-4 py-2 rounded-lg hover:bg-[#6b9677]">
                    Confirmar
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const selectElement = document.getElementById('roles_select');
        
        selectElement.addEventListener('change', function() {
            // Get the selected option
            const selectedOption = selectElement.options[selectElement.selectedIndex];
            // Get the value and text of the selected option
            const selectedValue = selectedOption.value;
            const selectedText = selectedOption.text;
            if (selectedText == "cliente") {
                document.getElementById('from_status_div{{$user->id}}').style.display = 'block';
                document.getElementById('grupos{{$user->id}}').style.display = 'block';
            } else {
                document.getElementById('from_status_div{{$user->id}}').style.display = 'none';
                document.getElementById('grupos{{$user->id}}').style.display = 'none';
            }
        });
    });
    $(document).ready(function(){
        $('#phone1{{$user->id}}').mask('(00) 00000-0000');
        
        $('form').submit(function() {
            $('#phone1{{$user->id}}').unmask();
        });
    });
</script>

@endforeach



@foreach($users as $user)
<!-- DELETE MODAL -->
<div id="deleteUser{{$user->id}}" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 opacity-0 pointer-events-none transition-opacity duration-300 scale-90">
    <div class="bg-white w-full max-w-2xl mx-4 md:mx-auto p-6 rounded-lg shadow-lg relative transition-transform transform scale-95 duration-300">
        <button type="button" class="modal-close absolute top-4 right-4 text-gray-500 hover:text-gray-700" aria-label="Fechar">
            <i class="bi bi-x-lg text-xl"></i>
        </button>
        <h4 class="text-xl font-semibold text-[#798100] mb-4">Remover Usuário</h4>
        <form action="{{route('admin.users.delete',$user->id)}}"  method="POST">
            @csrf
            @method('DELETE')
            <div class="grid grid-cols-1 gap-4">
                    <p>Deseja remover o utilizador <strong>{{$user->first_name}} 
                    {{$user->last_name}} </strong> </p>
            </div>
            <div class="mt-6 flex justify-end gap-4">
                <button type="button" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400 modal-close">
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


<!----SCRIPT---->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const selectElement = document.getElementById('roles_select');
        
        selectElement.addEventListener('change', function() {
            // Get the selected option
            const selectedOption = selectElement.options[selectElement.selectedIndex];
            // Get the value and text of the selected option
            const selectedValue = selectedOption.value;
            const selectedText = selectedOption.text;
            if (selectedText == "cliente") {
                document.getElementById('from_status_div').style.display = 'block';
                document.getElementById('from_groups_div').style.display = 'block';
            } else {
                document.getElementById('from_status_div').style.display = 'none';
                document.getElementById('from_groups_div').style.display = 'none';
            }
        });
    });
</script>


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
