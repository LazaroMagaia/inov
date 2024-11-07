<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inove Sistemas - Iniciar Sessão</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom styles for the logo */
        .logo {
            max-width: 150px; /* Adjust based on your logo's dimensions */
            margin: 0 auto;
        }
    </style>
        <link rel="shortcut icon" href="{{asset('images/inovdashicon.png')}}" type="image/x-icon">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-md">
        <!-- Logo -->
        <div class="text-center mb-8">
            <img src="{{asset('images/Logo-com-Moldura-inovt.jpg')}}" alt="Company Logo" 
            class="logo w-full">
        </div>

        <h1 class="text-2xl font-bold mb-6 text-center">Entrar</h1>
        
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
        <form method="POST" action="{{ route('login') }}">
            @csrf

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

            <div class="flex items-center justify-between mb-6">
                <label for="remember_me" class="flex items-center">
                    <input 
                        id="remember_me" 
                        name="remember" 
                        type="checkbox" 
                        class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out"
                    >
                    <span class="ml-2 text-sm text-gray-600">Lembrar-me</span>
                </label>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm text-indigo-600 hover:text-indigo-500">Esqueceu sua senha?</a>
                @endif
            </div>

            <div>
                <button 
                    type="submit" 
                    class="w-full bg-[#849f54] text-white py-2 px-4 rounded-md shadow-sm 
                    hover:bg-[#6b9677] focus:outline-none focus:ring-2 focus:ring-offset-2 
                    focus:hover:bg-[#6b9677]"
                >
                    Entrar
                </button>
            </div>
        </form>
    {{-- 
        <!-- Registration Link -->
        <div class="mt-4 text-center">
            <p class="text-sm text-gray-600">
                Não tem uma conta? <a href="{{ route('register') }}" class="text-indigo-600 hover:text-indigo-500">Cadastre-se</a>
            </p>
        </div>
    --}}
 
    </div>
</body>
</html>
