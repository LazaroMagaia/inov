
@include('frontend.dashboard.template.header')

@include('frontend.dashboard.template.sidebar')

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
        <div class="m-4">
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
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
        <div class="p-4">
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
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
                <button type="button" class="absolute top-0 right-0 px-4 py-3" aria-label="Fechar" onclick="this.parentElement.style.display='none'">
                    <svg class="fill-current text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" width="24" height="24">
                        <path d="M14.348 15.656a1 1 0 0 1-1.415 0L10 13.414l-2.933 2.942a1 1 0 1 1-1.415-1.415l2.933-2.942-2.933-2.942a1 1 0 0 1 1.415-1.415L10 10.586l2.933-2.942a1 1 0 1 1 1.415 1.415L11.414 10l2.933 2.942a1 1 0 0 1 0 1.415z"/>
                    </svg>
                </button>
            </div>
        </div>
        @endif

        <!-- Main Content -->
        <div class="w-full">
            <div class="py-3">
                <div class="space-y-4">
                    @if(count($perguntas) > 0)
                        @foreach($perguntas as $pergunta)
                            <div class="p-4 bg-white shadow-md rounded-md">
                                <p class="font-semibold">
                                    <strong>Nome do usuário:</strong> 
                                    {{ \App\Models\User::find($pergunta->users_id)->first_name }}
                                    {{ \App\Models\User::find($pergunta->users_id)->last_name }}
                                </p>
                                <p class="mt-2"><strong>Comentário:</strong> {{ $pergunta->pergunta }}</p>
                                <a href="{{ route('comentarios.resposta', $pergunta->id) }}" class="text-blue-600 hover:underline mt-2 block">
                                    Ver respostas
                                </a>
                            </div>
                        @endforeach
                    @else
                        <div class="p-4 bg-white shadow-md rounded-md">
                            <p>Não há comentários</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>


    </main>
</div>


<style>
    .pergunta-item{
        border: 1px solid #ccc;
        padding:10px 10px;
        margin-bottom: 10px;
        border-radius: 20px;
        background-color: #f9f9f9;
        margin: 10px;
    }
</style>
@include('frontend.dashboard.template.footer')