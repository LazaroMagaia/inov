<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Senha</title>
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

        <h1 class="text-2xl font-bold mb-6 text-center">Recuperar Senha</h1>
        
        <!-- Session Status -->
        @if (session('status'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                {{ session('status') }}
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

        <!-- Password Reset Request Form -->
        <form method="POST" action="{{ route('password.email') }}">
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

            <div>
                <button 
                    type="submit" 
                    class="w-full bg-[#798100] text-white py-2 px-4 rounded-md shadow-sm 
                    hover:bg-[#6b6b00] focus:outline-none focus:ring-2 focus:ring-offset-2 
                    focus:hover:bg-[#6b6b01]">
                    Enviar Link de Redefinição
                </button>
            </div>
        </form>

        <!-- Back to Login Link -->
        <div class="mt-4 text-center">
            <p class="text-sm text-gray-600">
                <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-500">Voltar para Login</a>
            </p>
        </div>
    </div>
</body>
</html>
