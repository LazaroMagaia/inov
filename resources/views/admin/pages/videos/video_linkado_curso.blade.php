
@include('admin.template.header')

@include('admin.template.sidebar')

    <!-- Main content -->
    <div class="flex-1 flex flex-col">
        <!-- Topbar with menu toggle -->
        <header class="bg-white p-4 shadow-md flex items-center justify-between relative md:ml-64">
            <!-- Menu Toggle Button -->
            <button id="menu-toggle" class="text-primary-bg lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            
            <!-- User Info with Dropdown -->
            <!-- User Name -->
            <h2 class="text-xl font-semibold"></h2>
                

            <div class="relative flex items-center space-x-4">
            
                <!-- Dropdown Button -->
                <button id="dropdownButton" class="flex items-center space-x-2 focus:outline-none">
                    <img 
                        src="{{asset('images/user.png')}}" 
                        class="w-8 h-8 rounded-full" 
                        alt="avatar"
                    >  
                    <svg class="w-4 h-4 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <!-- Dropdown Menu -->
                <div id="dropdownMenu" class="hidden absolute top-10 right-0 mt-2 w-48 bg-white border border-gray-300 rounded-md shadow-lg z-10">
                    <div class="p-2">
                        <a href="{{route('client.perfil')}}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">
                        {{ $user->first_name }} {{ $user->last_name }}
                        </a>
                        </a>
                        <form action="{{route('logout')}}" method="post">
                            @csrf
                            <button type="submit" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">
                                <span>Sair</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main content area -->
        <main class="flex-1 p-6 md:ml-64">

              <!-- Success Alert -->
              @if(session('success'))
                <div clas="m-4">
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 
                        rounded relative mb-4" role="alert">
                        <strong class="font-bold">Sucesso!</strong>
                        <span class="block sm:inline">{{ session('success') }}</span>
                        <button type="button" class="absolute top-0 right-0 px-4 py-3" aria-label="Fechar" onclick="this.parentElement.style.display='none'">
                            <svg class="fill-current text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="24" height="24">
                                <path d="M14.348 15.656a1 1 0 0 1-1.415 0L10 13.414l-2.933 2.942a1 1 0 1 1-1.415-1.415l2.933-2.942-2.933-2.942a1 1 0 0 1 1.415-1.415L10 10.586l2.933-2.942a1 1 0 1 1 1.415 1.415L11.414 10l2.933 2.942a1 1 0 0 1 0 1.415z"/>
                            </svg>
                        </button>
                    </div>
                </div>
                
                @endif

                <!-- Error Alert -->
                @if(session('error') || $errors->any())
                <div clas="p-4">
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 
                        rounded relative mb-4" role="alert">
                        <strong class="font-bold">Erro!</strong>
                        <ul class="list-disc pl-5 mt-2">
                            @if(session('error'))
                                <li>{{ session('error') }}</li>
                            @endif
                            
                            @if($errors->any())
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            @endif
                        </ul>
                        <button type="button" class="absolute top-0 right-0 px-4 py-3" aria-label="Fechar"
                            onclick="this.parentElement.style.display='none'">
                            <svg class="fill-current text-red-500" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" width="24" height="24">
                                <path d="M14.348 15.656a1 1 0 0 1-1.415 0L10 13.414l-2.933 2.942a1 1 0 1 1-1.415-1.415l2.933-2.942-2.933-2.942a1 1 0 0 1 1.415-1.415L10 10.586l2.933-2.942a1 1 0 1 1 1.415 1.415L11.414 10l2.933 2.942a1 1 0 0 1 0 1.415z"/>
                            </svg>
                        </button>
                    </div>
                </div>
                    
                @endif


            <!-- Main content area -->
            <div class="w-full">
                <div class="bg-white shadow-md rounded-lg p-4">
                    <div class="flex justify-between items-center mb-4">
                        <h4 class="text-xl font-semibold">Vincular alunos aos videos</h4> 
                    </div>

                    <div>
                        <!--- Conteudo  --->
                        <h4 class="text-xl font-semibold my-5">Alunos já vinculados</h4>
                            <div class="overflow-x-auto">
                                <form action="{{route('admin.videos.deslinkar')}}" method="POST">
                                    @csrf @method('DELETE')
                                    <input type="hidden" name="video_id" value="{{ $video->id }}">
                                    @if(isset($curso))
                                        <input type="hidden" name="curso_id" value="{{ $curso->id }}">
                                    @endif
                                    <table class="min-w-full divide-y divide-gray-200" id="example1">
                                        <thead class="bg-[#849f54] text-white">
                                            <tr>
                                                <th class="py-3 px-6 text-left">
                                                    <input type="checkbox" id="selectAllVinculadosCreate" class="form-checkbox">
                                                </th>
                                                <th class="py-3 px-6 text-left text-xs font-medium uppercase tracking-wider">Id</th>
                                                <th class="py-3 px-6 text-left text-xs font-medium uppercase tracking-wider">Nome</th>
                                                <th class="py-3 px-6 text-left text-xs font-medium uppercase tracking-wider">Celular</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach($usuariosVinculados as $user)
                                            <tr>
                                                <td class="py-3 px-6">
                                                    <input type="checkbox" name="user_ids[]" value="{{ $user->id }}" class="form-checkbox">
                                                </td>
                                                <td class="py-3 px-6 font-semibold text-sm text-gray-80">
                                                    {{$user->id}}
                                                </td>
                                                <td class="py-3 px-6 text-sm font-medium text-gray-80">
                                                    {{$user->first_name}}
                                                </td>
                                                <td class="py-3 px-6 font-semibold text-xs uppercase tracking-wider" id="phone{{$user->id}}">
                                                    {{ $user->phone1 }}
                                                </td>
                                            </tr>
                                            <script>
                                                $(document).ready(function(){
                                                    $('#phone{{$user->id}}').mask('(00) 00000-0000');
                                                });
                                            </script>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="mt-4">
                                        <button type="submit" class="bg-red-500 text-white px-4 py-2 
                                            rounded-lg hover:bg-red-600">
                                            Remover vínculo
                                        </button>
                                    </div>
                                </form>

                            </div>

                            <!-- Divisor -->
                            <div class="flex items-center my-4">
                                <hr class="flex-grow border-t border-gray-300">
                                <span class="mx-4 text-gray-500">Alunos disponiveis</span>
                                <hr class="flex-grow border-t border-gray-300">
                            </div>

                            <!-- Segunda Tabela: Alunos Disponíveis para Vinculação -->
                            <div>
                                <h4 class="text-xl font-semibold my-5">Alunos disponíveis para vinculação</h4>
                                <form action="{{ route('admin.videos.linkar.store')}}" method="POST">
                                    @csrf
                                    <div class="overflow-x-auto">
                                        <input type="hidden" name="video_id" value="{{ $video->id }}">
                                        @if(isset($curso))
                                            <input type="hidden" name="curso_id" value="{{ $curso->id }}">
                                        @endif
                                        <table class="min-w-full divide-y divide-gray-200" id="example2">
                                            <thead class="bg-[#849f54] text-white">
                                                <tr>
                                                    <th class="py-3 px-6 text-left">
                                                        <input type="checkbox" id="selectAllNaoVinculados" class="form-checkbox">
                                                    </th>
                                                    <th class="py-3 px-6 text-left text-xs font-medium uppercase tracking-wider">Id</th>
                                                    <th class="py-3 px-6 text-left text-xs font-medium uppercase tracking-wider">Nome</th>
                                                    <th class="py-3 px-6 text-left text-xs font-medium uppercase tracking-wider">Celular</th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200">
                                                @foreach($usuariosNaoVinculados as $user)
                                                <tr>
                                                    <td class="py-3 px-6">
                                                        <input type="checkbox" name="user_ids[]" value="{{ $user->id }}" class="form-checkbox">
                                                    </td>
                                                    <td class="py-3 px-6 font-semibold text-xs font-medium uppercase tracking-wider">
                                                        {{$user->id}}
                                                    </td>
                                                    <td class="py-3 px-6 text-xs font-medium uppercase tracking-wider">
                                                        {{$user->first_name}}
                                                    </td>
                                                    <td class="py-3 px-6 font-semibold text-xs uppercase tracking-wider" id="phone{{$user->id}}">
                                                        {{ $user->phone1 }}
                                                    </td>
                                                </tr>
                                                <script>
                                                    $(document).ready(function(){
                                                        $('#phone{{$user->id}}').mask('(00) 00000-0000');
                                                    });
                                                </script>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="mt-4">
                                        <button type="submit" class=" text-white px-4 
                                            py-2 rounded-lg bg-[#849f54] hover:bg-[#6b9677]">
                                            Vincular Selecionados
                                        </button>
                                    </div>
                                </form>
                            </div>
                        <!--- fim Conteudo  --->
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
    // Selecionar/Deselecionar todos os checkboxes na tabela de usuários vinculados
    document.getElementById('selectAllVinculadosCreate').addEventListener('change', function() {
        const checkboxes = document.querySelectorAll('#example1 input[name="user_ids[]"]');
        checkboxes.forEach(checkbox => checkbox.checked = this.checked);
    });

    // Selecionar/Deselecionar todos os checkboxes na tabela de usuários não vinculados
    document.getElementById('selectAllNaoVinculados').addEventListener('change', function() {
        const checkboxes = document.querySelectorAll('#example2 input[name="user_ids[]"]');
        checkboxes.forEach(checkbox => checkbox.checked = this.checked);
    });
</script>

@include('admin.template.footer')