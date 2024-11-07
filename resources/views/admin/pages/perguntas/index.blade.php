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
                <div class="bg-white shadow rounded-lg p-4 w-full max-w-6xl">
                    <div class="flex items-center justify-between mb-4">
                        <h4 class="text-xl font-semibold text-[#849f54]">Gerencie as dúvidas dos clientes</h4>
                    </div>
                    <div>
                        <table id="example" class="relative w-full bg-white border">
                            <thead class="bg-[#849f54] text-white">
                                <tr>
                                    <th class="py-2 px-4 text-xs font-medium uppercase tracking-wider">Id</th>
                                    <th class="py-2 px-4 text-xs font-medium uppercase tracking-wider">Curso</th>
                                    <th class="py-2 px-4 text-xs font-medium uppercase tracking-wider">Imagem do vídeo</th>
                                    <th class="py-2 px-4 text-xs font-medium uppercase tracking-wider">Aula</th>
                                    <th class="py-2 px-4 text-xs font-medium uppercase tracking-wider">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($perguntas as $pergunta)
                                <tr data-id="">
                                    <td class="py-2 px-4 border-b 
                                        text-sm text-gray-800 font-semibold">
                                        {{$pergunta->id}}
                                    </td>
                                    <td class="py-2 px-4 border-b text-sm font-medium text-gray-800">
                                        <?php  
                                            $video = GeralHelper::getVideo($pergunta->videos_id);
                                        ?>
                                        @if($video->curso_id == null)
                                            Video sem curso
                                        @else
                                            {{ GeralHelper::getCurso($video->curso_id)->title}}
                                        @endif
                                    </td>
                                    <td class="py-2 px-4 border-b text-bold">
                                        <img src="{{$video->thumbnail_url}}" alt="" srcset=""
                                        class="w-16 mx-auto">
                                    </td>

                                    <td class="py-2 px-4 border-b text-sm font-medium text-gray-800">
                                        {{$video->sequence}}
                                    </td>

                                    <td class="flex justify-left gap-2">
                                        <a class="bg-[#849f54] text-white px-3 py-1 rounded-lg 
                                            hover:bg-[#6b9677]"
                                            href="{{route('admin.comentarios.resposta', $pergunta->id)}}"
                                            id="edit-button">
                                            <div class="flex">
                                                <span class="hidden md:block">responder</span>
                                                <i class="bi bi-box-arrow-up-right ml-1"></i>
                                            </div>
                                            
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>

@include('admin.template.footer')

