
<!-- CREATE MODAL para videos -->
@foreach($videos as $video)
<div id="videoAulaModal{{$video->id}}" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 opacity-0 pointer-events-none transition-opacity duration-300 transform scale-90" onclick="closeModal({{$video->id}})">
    <div class="bg-white w-full max-w-2xl mx-4 md:mx-auto p-6 rounded-lg shadow-lg relative transition-transform duration-300 transform scale-100 h-[80vh] overflow-y-auto" onclick="event.stopPropagation();">
        <!-- Botão para fechar -->
        <button class="absolute modal-close top-4 right-4 text-gray-500 hover:text-gray-700" aria-label="Close" onclick="closeModal({{$video->id}})">
            <i class="bi bi-x-lg text-xl"></i>
        </button>
        
        <!-- Título do vídeo -->
        <h4 class="text-xl font-semibold text-[#798100] mb-4">{{$video->title}}</h4>
        
        <!-- Vídeo embutido -->
        <div class="embed-responsive embed-responsive-16by9 px-6 py-5">
            {{-- 
                <iframe id="videoIframe{{$video->id}}" class="embed-responsive-item w-full h-[320px]"
                src="https://www.youtube.com/embed/{{$video->id_video}}?enablejsapi=1"
                allowfullscreen></iframe>
                --}}
            <div id="videoPlayer"></div>

                
            <div class="flex flex-col">
                @if($video->watched == 0)
                    <form action="{{route('video.watched',$video->id)}}" method="post" class="py-3">
                        @csrf
                        <input type="hidden" name="video_id" value="{{$video->id}}">
                        <button type="submit" class="px-4 py-2 bg-[#849f54] text-white 
                            rounded-md hover:bg-[#6b9677]">
                            <i class="bi bi-check"></i> Marcar como assistido
                        </button>
                    </form>
                    @else
                    <div class="bg-green-100 text-green-800 p-4 rounded-md">
                        <i class="bi bi-check"></i> Este vídeo já foi assistido.
                    </div>
                @endif
                <label for="pergunta" class="block text-sm font-medium text-gray-700 mt-3">
                <strong>Descrição:</strong></label>
                {!! $video->description !!}
            </div>

            <!--- Comentários --->
            <div class="space-y-4 mt-3">
                <form action="{{ route('perguntas.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="videos_id" value="{{ $video->id }}">

                    <div class="mb-4">
                        <label for="pergunta" class="block text-sm font-medium text-gray-700">
                            <strong>Dúvidas e comentários</strong></label>
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
            <!-- Comentários -->
        </div>
        
        <!-- Botão de fechar no rodapé -->
        <div class="modal-footer pt-5">
            <button type="button" class="modal-close bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400" onclick="closeModal({{$video->id}})">
                Fechar
            </button>
        </div>
    </div>
</div>

<script src="https://www.youtube.com/iframe_api"></script>
<script>
    var player;
    var progressChecked = false;
    var playerID = document.getElementById('videoPlayer');

    function onYouTubeIframeAPIReady() {
        player = new YT.Player(playerID, {
            height: '420',
            width: '100%',
            videoId: '{{ $video->id_video }}',
            events: {
                'onReady': onPlayerReady
            }
        });
    }

    function onPlayerReady(event) {
        console.log('Player está pronto.');
        setInterval(checkProgress, 10000);
    }

    function checkProgress() {
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

    function sendProgressToServer() {
        var videoId = '{{ $video->id }}';
        var currentTime = player.getCurrentTime();

        $.ajax({
            url: "{{ route('client.video.watched', [$video->id, $user->id]) }}",
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            contentType: 'application/json',
            data: JSON.stringify({
                videoId: videoId,
                currentTime: currentTime
            }),
            success: function(data) {
                console.log('Progresso atualizado com sucesso:', data);
            },
            error: function(error) {
                console.error('Erro ao atualizar progresso:', error);
            }
        });
    }

    function sendProgressToServerPercent(percent) {
        var videoId = '{{ $video->id }}';
        var userId = '{{ $user->id }}';

        $.ajax({
            url: "{{ route('client.video.progress', ['id' => '__ID__', 'user_id' => '__USER_ID__', 'progress' => '__PROGRESS__']) }}"
                .replace('__ID__', videoId)
                .replace('__USER_ID__', userId)
                .replace('__PROGRESS__', percent),
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            contentType: 'application/json',
            data: JSON.stringify({
                videoId: videoId,
                currentTime: percent
            }),
            success: function(data) {
                console.log('Progresso atualizado com sucesso:', data);
            },
            error: function(error) {
                console.error('Erro ao atualizar progresso:', error);
            }
        });
    }
</script>
@endforeach



<script>
    // Função para fechar o modal e parar o vídeo
    function closeModal(videoId) {
        // Seleciona o modal e o iframe do vídeo
        var modal = document.getElementById('videoModal' + videoId) || document.getElementById('videoAulaModal' + videoId);
        var iframe = document.getElementById('videoIframe' + videoId);

        if (modal) {
            // Fecha o modal removendo as classes de visibilidade
            modal.classList.add('opacity-0', 'pointer-events-none');
            modal.classList.remove('opacity-100', 'pointer-events-auto');

            if (iframe) {
                iframe.contentWindow.postMessage('{"event":"command","func":"stopVideo","args":""}', '*');
            }
        }
    }
</script>
