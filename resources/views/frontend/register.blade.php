<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inove Sistemas - Iniciar Sessão</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- JQuery Mask -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <style>
        /* Custom styles for the logo */
        .logo {
            max-width: 307px; /* Adjust based on your logo's dimensions */
            margin: 0 auto;
        }
    </style>
        <link rel="shortcut icon" href="{{asset('images/inovdashicon.png')}}" type="image/x-icon">
</head>
<body class="bg-gray-100 flex items-center justify-center">
    <div class="w-full max-w-lg bg-white p-8 rounded-lg shadow-md  mt-8 mb-8">
        <!-- Logo -->
        <div class="text-center mb-8">
            <img src="{{ asset('images/logo-2.jpeg') }}" alt="Company Logo" 
                class="logo h-20 object-contain">
        </div>

        <h1 class="text-2xl font-bold mb-6 text-center" style="font-size: 18px;">Cadastro de usuários </h1>
        
        <!-- Session Status -->
        @if (session('status'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                {{ session('status') }}
            </div>
        @endif
        <!-- Session Sucess -->
        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif
        <!-- Validation Errors -->
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Login Form -->
        <form method="POST" action="{{ route('cadastro.users.store') }}">
            @csrf
            <div class="mb-4">
                <label for="first_name" class="block text-sm font-medium text-gray-700">Primeiro nome</label>
                <input 
                    id="first_name" 
                    name="first_name" 
                    type="text" 
                    required 
                    autocomplete="first_name" 
                    autofocus 
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                >
            </div>
            <div class="mb-4">
                <label for="last_name" class="block text-sm font-medium text-gray-700"> Sobrenome</label>
                <input 
                    id="last_name" 
                    name="last_name" 
                    type="text" 
                    required 
                    autocomplete="last_name" 
                    autofocus 
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                >
            </div>
            


            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
                <input 
                    id="email" 
                    name="email" 
                    type="email" 
                    required 
                    autocomplete="email" 
                    autofocus 
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                >
            </div>

            <div class="mb-4">
                <label for="phone1" class="block text-sm font-medium text-gray-700">Celular</label>
                <input type="text" name="phone1" id="phone1" class="form-input mt-1 block w-full border border-gray-300 rounded-lg p-2">
            </div>

           
            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700">Senha</label>
                <input 
                    id="password" 
                    name="password" 
                    type="password" 
                    required 
                    autocomplete="current-password" 
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                >
            </div>
            <div class="mb-6">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirme a Senha</label>
                <input 
                    id="password_confirmation" 
                    name="password_confirmation" 
                    type="password" 
                    required 
                    autocomplete="current-password" 
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                >
            </div>

            <div class="mb-6">
                <input type="hidden" name="token" value="{{$token}}">
            </div>
            <div class="mb-6">
                <input type="hidden" name="slug" value="{{$slug}}">
            </div>
            <div class="mb-6">
                <input type="hidden" name="role" value="cliente">
            </div>

            <div>
                <button 
                    type="submit" 
                    class="w-full bg-[#849f54] text-white py-2 px-4 rounded-md shadow-sm 
                    hover:bg-[#6b9677] focus:outline-none focus:ring-2 focus:ring-offset-2 
                    focus:hover:bg-[#6b9677]"
                >
                Acessar
                </button>
            </div>
        </form>
 
    </div>
    
    <script>
         $(document).ready(function(){
            $('#phone1').mask('(00) 00000-0000');
            
            $('form').submit(function() {
                $('#phone1').unmask();
            });
        });
    </script>
</body>
</html>
