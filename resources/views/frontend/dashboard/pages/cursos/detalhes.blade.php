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
        <section class="container mx-auto">
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                @if($curso->image)
                <img 
                    class="w-full h-80 object-cover"
                    src="{{ asset('storage/' . $curso->image) }}" 
                    alt="Card image"
                >
                @else
                <img 
                    class="w-full h-80 object-cover"
                    src="{{asset('assets/compiled/jpg/origami.jpg')}}" 
                    alt="Card image" style="object-fit: cover;"
                >
                @endif
                <div class="p-6">
                    <h5 class="text-xl font-semibold mb-4">{{ $curso->title }}</h5>
                    <div class="text-gray-700 mb-4">
                        {!! $curso->description !!}
                    </div>

                    <!-- AULAS -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        @if($videos->count() > 0)
                        <div class="col-span-1 md:col-span-1">
                            <div class="bg-gray-100 p-4 rounded-lg shadow-md  h-[650px] overflow-y-auto">
                                <ul class="list-none space-y-2" id="videoLinks">
                                    @foreach($videos as $video)
                                        <li>
                                            <div class="flex items-center space-x-2 justify-between">
                                            <a href="{{ route('client.cursos.detalhe.video', 
                                                    [$curso->id, $video->id]) }}"
                                                    data-video-id="{{ $video->link }}"
                                                    class="text-blue-600 hover:underline 
                                                        {{ $video->watched ? 'text-gray-500' : 
                                                        'text-blue-600' }}">
                                                    {{ $video->sequence }} - {{ $video->title }}
                                                </a>
                                                <img 
                                                    src="{{ $video->thumbnail_url }}" 
                                                    alt="Thumbnail"
                                                    class="w-24 h-16 object-cover rounded"
                                                >
                                            </div>
                                            <div class="relative w-full max-w-xs">
                                                <!-- Barra de progresso restante -->
                                                <div class="absolute inset-0 bg-[#797D41] rounded">
                                                    <!-- Barra de progresso -->
                                                    <div 
                                                        class="bg-[#007D00] h-2 rounded"
                                                        style="width: {{ $video->progress }}%;"
                                                    ></div>
                                                </div>
                                                <!-- Barra indicando o total (fundo) -->
                                                <div class="absolute inset-0 bg-[#849f54] h-2 rounded 
                                                opacity-50"></div>
                                            </div>
                                           
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="col-span-1 md:col-span-2 grid grid-cols-1 gap-4">
                        <!-- Vídeo -->
                        <div class="relative pb-9/16">
                            <div id="videoPlayer"></div>
                        {{-- 
                            <iframe 
                                id="videoPlayer"
                                class="w-full h-[420px]"
                                src="https://www.youtube.com/embed/{{ isset($single_video) ? $single_video->id_video : $next_video->id_video }}" 
                                allowfullscreen
                            ></iframe>
                        --}}
                          
                        </div>
                        <!--    MARCAR COMO ASISTIDO       -->
                        <div>
                            @php
                                $video_id = false;
                                if(isset($single_video)) {
                                    $video_id = $single_video->id;
                                } else {
                                    $video_id = $videos[0]->id;
                                }
                            @endphp
                            @if(!$watched)
                                <form action="{{route('video.watched',$video_id)}}" method="post">
                                    @csrf
                                    <input type="hidden" name="video_id" value="{{ isset($single_video) ? $single_video->id : $next_video->id }}">
                                    <button 
                                        type="submit" 
                                        class="px-4 py-2 bg-[#849f54] text-white rounded-md hover:bg-[#6b9677]"
                                    >
                                        <i class="bi bi-check"></i> Marcar como assistido
                                    </button>
                                </form>
                                @else
                                <div class="bg-green-100 text-green-800 p-4 rounded-md">
                                    <i class="bi bi-check"></i> Este vídeo já foi assistido.
                                </div>
                            @endif
                        </div>
                        <!--   FIM MARCAR COMO ASISTIDO       -->

                        <!-- Formulário e Comentários -->
                        <div class="space-y-4">
                            <form action="{{ route('perguntas.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="curso_id" value="{{ $curso->id }}">
                                <input type="hidden" name="videos_id" value="{{ isset($single_video) ? $single_video->id : $videos[0]->id }}">

                                <div class="mb-4">
                                    <label for="pergunta" class="block text-sm font-medium text-gray-700">
                                    Dúvidas e comentários</label>
                                    <textarea name="pergunta" id="pergunta" rows="3"
                                        class="mt-1 block w-full border border-gray-300 rounded-lg p-2 
                                            shadow-sm focus:ring-indigo-500 focus:border-indigo-500 
                                            sm:text-sm"
                                    ></textarea>
                                </div>

                                <div class="flex justify-between space-x-2">
                                    <button 
                                        type="submit" 
                                        class="px-4 py-2 bg-[#849f54] text-white rounded-md hover:bg-[#6b9677]"
                                    >
                                        <i class="bi bi-chat"></i> Enviar Pergunta 
                                    </button>

                                    <a 
                                        href="{{ isset($single_video) ? route('comentarios.index', $single_video->id) : route('comentarios.index', $videos[0]->id) }}" 
                                        class="px-4 py-2 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400"
                                    >
                                        <i class="bi bi-chat"></i> Ver Comentários
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>


                        @else
                            <div class="col-span-1 md:col-span-3">
                                <div class="bg-yellow-100 text-yellow-800 p-4 rounded-md">
                                    Não há aulas disponíveis para este curso.
                                </div>
                            </div>
                        @endif
                    </div>
                    <!-- AULAS -->
                </div>
            </div>
        </section>

    </main>
</div> 

    <!-- Incluindo o script da API -->
    <script src="https://www.youtube.com/iframe_api"></script>
    <script>
            var player;
            var progressChecked = false; // Variável para controlar se o progresso já foi verificado
            var playerID = document.getElementById('videoPlayer');
            async function onYouTubeIframeAPIReady() {
                player = new YT.Player(playerID, {
                    height: '420',
                    width: '100%',
                    videoId: '{{ isset($single_video) ? $single_video->id_video : $next_video->id_video }}',
                    events: {
                        'onReady': onPlayerReady
                    }
                });
            }

            async function onPlayerReady(event) {
                console.log('Player está pronto.');
                // Configura um intervalo para verificar o progresso
                setInterval(checkProgress, 10000);
            }

            async function checkProgress() {
                if (player && player.getDuration) {
                    var duration = player.getDuration();
                    var currentTime = player.getCurrentTime();
                    var percentageWatched = (currentTime / duration) * 100;

                    if (percentageWatched >= 80 && !progressChecked) {
                        progressChecked = true;
                        sendProgressToServer();
                    }
                    if (percentageWatched >= 10) {
                        sendProgressToServerPercent(percentageWatched);
                    }
                }
            }

            async function sendProgressToServer() {
                var videoId = '{{ isset($single_video) ? $single_video->id_video : $next_video->id_video }}'; // Substitua pelo ID do vídeo
                var currentTime = player.getCurrentTime();

                await fetch("{{route('client.video.watched',[$video_id,$user->id])}}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        videoId: videoId,
                        currentTime: currentTime
                    })
                }).then(response => response.json())
                .then(data => {
                    console.log('Progresso atualizado com sucesso:', data);
                })
                .catch(error => {
                    console.error('Erro ao atualizar progresso:', error);
                });
            }

            async function sendProgressToServerPercent(percent) {
            var videoId = '{{$video_id}}'; // Substitua pelo ID do vídeo
            var currentTime = percent;
            var userId = '{{ $user->id }}'; // Substitua pelo ID do usuário

            await fetch(`{{ route('client.video.progress', ['id' => '__ID__', 'user_id' => '__USER_ID__', 'progress' => '__PROGRESS__']) }}`.replace('__ID__', videoId).replace('__USER_ID__', userId).replace('__PROGRESS__', percent), {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    videoId: videoId,
                    currentTime: currentTime
                })
            })
            .then(response => response.json())
            .then(data => {
                console.log('Progresso atualizado com sucesso:', data);
            })
            .catch(error => {
                console.error('Erro ao atualizar progresso:', error);
            });
        }
    </script>

@include('frontend.dashboard.template.footer')
