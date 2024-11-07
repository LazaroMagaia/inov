<?php 
    use App\Helpers\GeralHelper;
?>
@include('admin.template.header')

@include('admin.template.sidebar')

   
    @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        

        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <span>{{$error}}</span>
                @endforeach
            </div>
        @endif


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
            <div class="col-span-12 flex justify-center">
                <div class="w-full">
                    <div class="py-3 space-y-4">
                        <!-- Pergunta -->
                        <div class="p-4 bg-white shadow-md rounded-md border border-gray-300">
                            <p class="font-semibold text-gray-800">
                                <strong>Nome do usuário:</strong> 
                                {{ GeralHelper::getUser($pergunta->users_id)->first_name }}
                                {{ GeralHelper::getUser($pergunta->users_id)->last_name }}
                                <span class="bg-green-500 text-white px-2 py-0.5 rounded text-sm font-semibold ml-2">
                                    criador
                                </span>
                            </p>
                            <p class="mt-2 text-gray-700"><strong>Comentário:</strong> {{ $pergunta->pergunta }}</p>
                        </div>

                        <!-- Respostas -->
                        @if($respostas->count() > 0)
                            @foreach($respostas as $resposta)
                                <div class="p-4 bg-gray-100 shadow-md rounded-md border border-gray-200">
                                    <p class="font-semibold text-gray-800">
                                        {{ GeralHelper::getUser($pergunta->users_id)->first_name }}
                                        {{ GeralHelper::getUser($pergunta->users_id)->last_name }}
                                        @if($resposta->users_id == $pergunta->users_id)
                                            <span class="bg-blue-500 text-white px-2 py-0.5 rounded text-sm font-semibold ml-2">
                                                resposta
                                            </span>
                                            <span class="bg-green-500 text-white px-2 py-0.5 rounded text-sm font-semibold ml-2">
                                                criador
                                            </span>
                                        @else
                                            <span class="bg-blue-500 text-white px-2 py-0.5 rounded text-sm font-semibold ml-2">
                                                resposta
                                            </span>
                                        @endif
                                    </p>
                                    <p class="mt-2 text-gray-600"><strong>Resposta:
                                    </strong> {{ $resposta->resposta }}</p>
                                </div>
                            @endforeach
                        @else
                            <div class="p-4 bg-gray-100 shadow-md rounded-md border border-gray-200">
                                <p>Nenhuma resposta encontrada</p>
                            </div>
                        @endif

                        <!-- Formulário de Resposta -->
                        <div class="mt-6">
                            <div class="p-4 bg-white shadow-md rounded-md border border-gray-300">
                                <form action="{{ route('perguntas.respond', $pergunta->id) }}" method="POST">
                                    @csrf
                                    <div class="mb-4">
                                            <label for="resposta" class="block text-sm font-medium text-gray-700"
                                                >Sabe a Solução? Ajude a resolver!</label>
                                            <textarea name="resposta" id="resposta" rows="3"
                                                class="mt-1 block w-full border border-gray-300 rounded-lg p-2 
                                                    shadow-sm focus:ring-indigo-500 focus:border-indigo-500 
                                                    sm:text-sm"
                                            ></textarea>
                                        </div>
                                    <button type="submit" class="bg-[#849f54] text-white px-4 py-2 rounded-lg 
                                        hover:bg-[#6b9677]">
                                        Responder
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

@include('admin.template.footer')

