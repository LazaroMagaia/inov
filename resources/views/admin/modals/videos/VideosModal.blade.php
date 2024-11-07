

<!-- CREATE MODAL -->
<div id="createAula" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 opacity-0 pointer-events-none transition-opacity duration-300 transform scale-90">
    <div class="bg-white w-full max-w-2xl mx-4 md:mx-auto p-6 rounded-lg shadow-lg relative transition-transform duration-300 transform scale-100">
        <button class="modal-close absolute top-4 right-4 text-gray-500 hover:text-gray-700">
            <i class="bi bi-x-lg text-xl"></i>
        </button>
        <h4 class="text-xl font-semibold text-[#798100] mb-4">Novo Vídeo</h4>
        <form action="{{route('admin.videos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="form-group">
                    <label for="title" class="block text-sm font-medium text-gray-700">Titulo da aula:</label>
                    <input type="text" name="title" id="title" class="mt-1 block w-full border border-gray-300 rounded-lg p-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                </div>
             
                <div class="form-group" id="from_status_div">
                    <label for="curso_id" class="block text-sm font-medium text-gray-700">Curso:</label>
                    <select class="mt-1 block w-full border border-gray-300 rounded-lg p-2 shadow-sm
                         focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="curso_id"
                             name="curso_id">
                        <option value="">Selecione um Curso</option>
                        @foreach($cursos as $curso)
                            <option value="{{ $curso->id }}">
                                {{ $curso->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="link" class="block text-sm font-medium text-gray-700">Link do vídeo:</label>
                    <input type="url" name="link" id="link" class="mt-1 block w-full border 
                        border-gray-300 rounded-lg p-2 shadow-sm focus:ring-indigo-500 
                        focus:border-indigo-500 sm:text-sm" required>
                </div>
                <div class="form-group">
                    <label for="sequence" class="block text-sm font-medium text-gray-700">
                        Sequencia do video:</label>
                    <input type="text" name="sequence" id="sequence" class="mt-1 block w-full border 
                        border-gray-300 rounded-lg p-2 shadow-sm focus:ring-indigo-500 
                        focus:border-indigo-500 sm:text-sm" required>
                </div>
                <div class="form-group">
                    <label for="data_adicao" class="block text-sm font-medium text-gray-700">
                        Sequencia do video:</label>
                    <input type="date" name="data_adicao" id="data_adicao" class="mt-1 block w-full border 
                        border-gray-300 rounded-lg p-2 shadow-sm focus:ring-indigo-500 
                        focus:border-indigo-500 sm:text-sm" required>
                </div>
            
            </div>
            <div class="mt-6 flex justify-end gap-4">
                <button type="button" class="modal-close bg-gray-300 text-gray-700 px-4 py-2 rounded-lg
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



<!-- Modal para Criar/Editar Vídeo -->
@foreach($videos as $video)
 <div id="editAula{{$video->id}}" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 opacity-0 pointer-events-none transition-opacity duration-300 transform scale-90">
    <div class="bg-white w-full max-w-2xl mx-4 md:mx-auto p-6 rounded-lg shadow-lg relative transition-transform duration-300 transform scale-100">
        <button class="modal-close absolute top-4 right-4 text-gray-500 hover:text-gray-700">
            <i class="bi bi-x-lg text-xl"></i>
        </button>
        <h4 class="text-xl font-semibold text-[#798100] mb-4">Editar Vídeo</h4>
        <form  action="{{route('admin.videos.update',$video->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="form-group">
                    <label for="title" class="block text-sm font-medium text-gray-700">Titulo da aula:</label>
                    <input type="text" name="title" id="title" class="mt-1 block w-full border border-gray-300 
                        rounded-lg p-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                        value="{{$video->title}}" required>
                </div>
             
                <div class="form-group" id="from_status_div">
                    <label for="curso_id" class="block text-sm font-medium text-gray-700">Curso:</label>
                    <select class="mt-1 block w-full border border-gray-300 rounded-lg p-2 shadow-sm
                         focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" id="curso_id"
                        name="curso_id">
                        <option value="">Selecione um Curso</option>
                        @foreach($cursos as $curso)
                            <option value="{{ $curso->id }}" {{ isset($video) && 
                                $video->curso_id == $curso->id ? 'selected' : '' }}>
                                {{ $curso->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="link" class="block text-sm font-medium text-gray-700">Link do vídeo:</label>
                    <input type="url" name="link" id="link" class="mt-1 block w-full border 
                        border-gray-300 rounded-lg p-2 shadow-sm focus:ring-indigo-500 
                        focus:border-indigo-500 sm:text-sm" value="{{$video->link}}" required>
                </div>
                <div class="form-group">
                    <label for="sequence" class="block text-sm font-medium text-gray-700">
                        Sequencia do video:</label>
                    <input type="text" name="sequence" id="sequence" class="mt-1 block w-full border 
                        border-gray-300 rounded-lg p-2 shadow-sm focus:ring-indigo-500 
                        focus:border-indigo-500 sm:text-sm" value="{{$video->sequence}}" required>
                </div>
                <div class="form-group">
                    <label for="data_adicao" class="block text-sm font-medium text-gray-700">
                        Sequencia do video:</label>
                    <input type="date" name="data_adicao" id="data_adicao" class="mt-1 block w-full border 
                        border-gray-300 rounded-lg p-2 shadow-sm focus:ring-indigo-500 
                        focus:border-indigo-500 sm:text-sm" value="{{$video->data_adicao}}" required>
                </div>
                <div class="form-group col-span-2">
                    <label for="description" class="block text-sm font-medium text-gray-700">Descrição:</label>
                        <textarea name="description" id="description" rows="3"
                        class="mt-1 block w-full border border-gray-300 rounded-lg p-2 
                            shadow-sm focus:ring-indigo-500 focus:border-indigo-500 
                            sm:text-sm" >{{$video->description}}</textarea>
                </div>
            </div>
            <div class="mt-6 flex justify-end gap-4">
                <button type="button" class="modal-close bg-gray-300 text-gray-700 px-4 py-2 rounded-lg
                     hover:bg-gray-400">
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


<!---- REMOVER -->
@foreach($videos as $video)
 <div id="deleteAula{{$video->id}}" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 opacity-0 pointer-events-none transition-opacity duration-300 transform scale-90">
    <div class="bg-white w-full max-w-2xl mx-4 md:mx-auto p-6 rounded-lg shadow-lg relative transition-transform duration-300 transform scale-100">
        <button class="modal-close absolute top-4 right-4 text-gray-500 hover:text-gray-700">
            <i class="bi bi-x-lg text-xl"></i>
        </button>
        <h4 class="text-xl font-semibold text-[#798100] mb-4">Novo Vídeo</h4>
        <form action="{{route('admin.videos.delete',$video->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="form-group">
                    <p>Deseja remover o curso <strong>{{$video->title}}</strong></p>
                </div>
            </div>
            <div class="mt-6 flex justify-end gap-4">
                <button type="button" class="modal-close bg-gray-300 text-gray-700 px-4 py-2 rounded-lg
                     hover:bg-gray-400">
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





<!---- LINKAR VIDEO -->
@foreach($videos as $video)
 <div id="linkAula{{$video->id}}" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 opacity-0 pointer-events-none transition-opacity duration-300 transform scale-90">
    <div class="bg-white w-full max-w-2xl mx-4 md:mx-auto p-6 rounded-lg shadow-lg relative transition-transform duration-300 transform scale-100">
        <button class="modal-close absolute top-4 right-4 text-gray-500 hover:text-gray-700">
            <i class="bi bi-x-lg text-xl"></i>
        </button>
        <h4 class="text-xl font-semibold text-[#798100] mb-4">Linkar aluno ao Vídeo</h4>
        <form action="" method="POST">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="form-group" id="from_status_div">
                    <label for="alunos_video">linkar os alunos:</label>
                    <select name="alunos_videos[]" id="alunos_video{{$video->id}}" multiple 
                        class="border border-[#797D41] p-2 rounded-lg">
                        @foreach($alunos as $alunos_linkado)
                            <option value="{{ $alunos_linkado->id }}">
                                {{ $alunos_linkado->first_name }} {{ $alunos_linkado->last_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mt-6 flex justify-end gap-4">
                <button type="button" class="modal-close bg-gray-300 text-gray-700 px-4 py-2 rounded-lg
                     hover:bg-gray-400">
                    Fechar
                </button>
                <button type="submit" class="bg-[#798100] text-white px-4 py-2 rounded-lg hover:bg-[#6b6b00]">
                    Confirmar
                </button>
            </div>
        </form>
    </div>
</div>
@endforeach


<script>
    $(document).ready(function() {
        $('#alunos_video').select2({
            placeholder: "linkar os alunos",
            allowClear: true,
            width: '100%' // Ajusta a largura para preencher completamente o campo
        });
    });

    $('select[id^="alunos_video"]').each(function() {
        $(this).select2({
            placeholder: "linkar os alunos",
            allowClear: true,
            width: '100%'
        });
    });
</script>