<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AdminController,ClientController,RolesAndPermissionsController,
    CursosController,VideosController,PerfilController,PerguntasController,
    ComentariosController,GruposController,ClientOrigemController,SettingTemplateController};

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth', 'check.user.session'])->group(function () {
    
    Route::group(['middleware' => ['role:admin']], function () {
        Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
        Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
        Route::post('/admin/users/store', [AdminController::class, 'store_user'])
        ->name('admin.users.store');
        Route::delete('/admin/users/delete/{id}', [AdminController::class, 'delete_user'])
        ->name("admin.users.delete");
        Route::put('/admin/users/update/{id}', [AdminController::class, 'update_user'])
        ->name('admin.users.update');

        /*ROLES AND PERMISSIONS*/
        Route::get('/admin/roles', [RolesAndPermissionsController::class, 'roles_index'])
        ->name('admin.roles.index');
        Route::post('/admin/roles/store', [RolesAndPermissionsController::class, 'store_role'])
        ->name('admin.roles.store');
        Route::put('/admin/roles/update/{id}', [RolesAndPermissionsController::class, 'update_roles'])
        ->name('admin.roles.update');
        Route::delete('/admin/roles/delete/{id}', [RolesAndPermissionsController::class, 'delete_roles'])
        ->name('admin.roles.delete');  
        
        /*  PERMISSIONS */
        Route::get('/admin/permissions', [RolesAndPermissionsController::class, 'permissions_index'])
        ->name('admin.permissions.index');

        Route::post('/admin/permissions/store', [RolesAndPermissionsController::class, 'store_permission'])
        ->name('admin.permissions.store');

        Route::put('/admin/permissions/update/{id}', [RolesAndPermissionsController::class, 'update_permissions'])
        ->name('admin.permissions.update');

        Route::delete('/admin/permissions/delete/{id}', [RolesAndPermissionsController::class, 'delete_permissions'])
        ->name('admin.permissions.delete');

        /*ASSIGN PERMISSIONS TO ROLE*/
        Route::get('/admin/roles/permissions/{id}', [RolesAndPermissionsController::class, 'assign_permissions'])
        ->name('admin.roles.permissions');

        Route::post('/admin/roles/permissions/store', [RolesAndPermissionsController::class, 'assignPermissions_store'])
        ->name('admin.roles.permissions.store');

        Route::delete('/admin/roles/permissions/delete/{id}', [RolesAndPermissionsController::class, 'remove_permissions_role'])
        ->name('admin.roles.permissions.delete');
        
         /*         COURSES         */
        Route::get('/admin/cursos', [CursosController::class, 'index'])->name('admin.cursos.index');
        Route::post('/admin/cursos/store', [CursosController::class, 'store'])->name('admin.cursos.store');
        Route::put('/admin/cursos/update/{id}', [CursosController::class, 'update'])
        ->name('admin.cursos.update');
        Route::delete('/admin/cursos/delete/{id}', [CursosController::class, 'delete'])
        ->name('admin.cursos.delete');

        /*         VIDEOS         */
        Route::get('/admin/videos', [VideosController::class, 'index'])->name('admin.videos.index');
        Route::post('/admin/videos/store', [VideosController::class, 'store'])->name('admin.videos.store');
        Route::put('/admin/videos/update/{id}', [VideosController::class, 'update'])
        ->name('admin.videos.update');
        Route::get('/admin/videos/linkar/{cursoId}/{videoId}', [VideosController::class, 'linkarAula'])
        ->name('admin.videos.linkar');

        Route::get('/admin/videos/aluno/linkar/{videoId}', [VideosController::class, 'linkarSemCursoAula'])
        ->name('admin.videos.aluno.linkar');

        Route::post('/admin/videos/linkar/store', [VideosController::class, 'linkarAulaStore'])
        ->name('admin.videos.linkar.store');
        Route::delete('/admin/videos/deslinkar', [VideosController::class, 'deslinkarAula'])
        ->name('admin.videos.deslinkar');

        Route::delete('/admin/videos/delete/{id}', [VideosController::class, 'delete'])
        ->name('admin.videos.delete');
        Route::get('admin/duvidas', [PerguntasController::class, 'AdminPerguntas'])
        ->name('admin.perguntas.index');
        
          /**
         * GRUPOS
         */
        Route::get('/admin/grupos', [GruposController::class, 'index'])->name('admin.groups.index');
        Route::post('/admin/grupos/store', [GruposController::class, 'store'])->name('admin.groups.store');
        Route::put('/admin/grupos/update/{id}', [GruposController::class, 'update'])
        ->name('admin.groups.update');
        Route::delete('/admin/grupos/delete/{id}', [GruposController::class, 'delete'])
        ->name('admin.groups.delete');

        /**
         * ORIGEM CLIENTE
         */
        Route::get('/admin/client/origem', [ClientOrigemController::class, 'index'])->name('admin.origem.index');
        Route::post('/admin/client/origem/store', [ClientOrigemController::class, 'store'])
        ->name('admin.origem.store');
        Route::put('/admin/client/origem/update/{id}', [ClientOrigemController::class, 'update'])
        ->name('admin.origem.update');
        Route::delete('/admin/client/origem/delete/{id}', [ClientOrigemController::class, 'delete'])
        ->name('admin.origem.delete');

        /** 
         *  SETTINGS TEMPLATE
         */
        Route::get('/admin/settings/template', [SettingTemplateController::class, 'index'])
        ->name('admin.settings.template.index');
        
    });

    Route::group(['middleware' => ['roleAdminAll:cliente,admin']], function () {
        Route::get('/client', [ClientController::class, 'index'])->name('client.index');
        /*         COURSES         */
        Route::get('/client/cursos', [CursosController::class, 'client_index'])->name('client.cursos.index');
        Route::get('/client/cursos/detalhe/{id}', [CursosController::class, 'client_detalhe_curso'])
        ->name('client.cursos.detalhe');
        Route::get('/client/cursos/detalhe/{id}/{video}', [CursosController::class, 'client_detalhe_curso_video'])
        ->name('client.cursos.detalhe.video');
        
        /*         VIDEOS         */    
        Route::get('/client/videos', [VideosController::class, 'frontendVideo'])->name('client.videos.index');
        Route::get('/client/videos/detalhe/{id}', [VideosController::class, 'client_detalhe_video'])
        ->name('client.videos.detalhe');
        Route::get('/client/videos/single/{id}', [VideosController::class, 'frontendVideSingle'])
        ->name('client.videos.single');
        

        /*         PERFIL         */
        Route::get('/client/perfil', [PerfilController::class, 'index'])->name('client.perfil');
        Route::put('/client/perfil/change_password/{id}', [PerfilController::class, 'change_password_store'])
        ->name('client.perfil.change_password');
        Route::put('/client/perfil/update_perfil/{id}', [PerfilController::class, 'update_perfil'])
        ->name('client.perfil.update_perfil');
         
        /**
         * VIDEO WATCHED
         */
        Route::post('/client/video/watched/{id}', [VideosController::class, 'video_watched'])
        ->name('video.watched');

    });
       
        /**
         * COMENTARIO
         */
        Route::get('/comentarios/{video_id}', [ComentariosController::class, 'index'])->name('comentarios.index');
        Route::get('/comentarios/resposta/{id}', [ComentariosController::class, 'resposta'])
        ->name('comentarios.resposta');
        Route::get('/comentarios/admin/resposta/{id}', [ComentariosController::class, 'resposta'])
        ->name('admin.comentarios.resposta');
        /**
         * PERGUNTAS E RESPOSTAS
         */
        Route::post('/perguntas', [PerguntasController::class, 'store'])->name('perguntas.store');
        Route::post('/perguntas/{id}/responder', [PerguntasController::class, 'respond'])->name('perguntas.respond');
        Route::get('/perguntas/{id}', [PerguntasController::class, 'show'])->name('perguntas.show');
      
});
    Route::get('/cadastro/{token}/{slug}', [ClientController::class, 'user_register'])->name('cadastro.frontend');
    Route::post('/cadastro/users/store', [ClientController::class, 'user_register_store'])
    ->name('cadastro.users.store');
require __DIR__.'/auth.php';
