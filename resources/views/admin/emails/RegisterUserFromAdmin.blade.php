<!DOCTYPE html>
<html>
<head>
    <title>Conta registrada com sucesso</title>
</head>
<body>
    <h1>Faca login usando essas informacoes</h1>
    <p><strong>Nome:</strong> {{ $details['first_name'] }} {{$details['last_name']}}</p>
    <p><strong>Email:</strong> {{ $details['email'] }}</p>
    <p><strong>Senha:</strong> {{ $details['password'] }}</p>
</body>
</html>
