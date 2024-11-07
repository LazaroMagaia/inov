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
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="bg-white shadow-md rounded-lg p-4">
                    <div class="flex items-center space-x-4">
                        <div class="flex-shrink-0">
                            <div class="bg-purple-500 text-white flex items-center justify-center w-16 h-16 rounded-full mb-2">
                                <i class="bi bi-person text-3xl"></i>
                            </div>
                        </div>
                        <div>
                            <h6 class="text-gray-500 font-semibold">Usuários</h6>
                            <h6 class="text-xl font-extrabold mb-0">{{$total_users}}</h6>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white shadow-md rounded-lg p-4">
                    <div class="flex items-center space-x-4">
                        <div class="flex-shrink-0">
                            <div class="bg-blue-500 text-white flex items-center justify-center w-16 h-16 rounded-full mb-2">
                                <i class="bi bi-book text-3xl"></i>
                            </div>
                        </div>
                        <div>
                            <h6 class="text-gray-500 font-semibold">Cursos</h6>
                            <h6 class="text-xl font-extrabold mb-0">{{$total_courses}}</h6>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white shadow-md rounded-lg p-4">
                    <div class="flex items-center space-x-4">
                        <div class="flex-shrink-0">
                            <div class="bg-green-500 text-white flex items-center justify-center w-16 h-16 rounded-full mb-2">
                                <i class="bi bi-chat-dots text-3xl"></i>
                            </div>
                        </div>
                        <div>
                            <h6 class="text-gray-500 font-semibold">Dúvidas por responder</h6>
                            <h6 class="text-xl font-extrabold mb-0">{{$perguntasNaoRespondidas}}</h6>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white shadow-md rounded-lg p-4">
                    <div class="flex items-center space-x-4">
                        <div class="flex-shrink-0">
                            <div class="bg-red-500 text-white flex items-center justify-center w-16 h-16 rounded-full mb-2">
                                <i class="bi bi-play-btn text-3xl"></i>
                            </div>
                        </div>
                        <div>
                            <h6 class="text-gray-500 font-semibold">Vídeo aulas</h6>
                            <h6 class="text-xl font-extrabold mb-0">{{$total_videos}}</h6>
                        </div>
                    </div>
                </div>
            </div>
            <!--- Cards -->
        </main>


    </div>


@include('admin.template.footer')