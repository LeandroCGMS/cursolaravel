<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Página da View da Rota pessoas/</title>
</head>
<body>
    <h1>Página da View da Rota pessoas/</h1>
    <p>Abaixo, variável que retorna os usuários da tabela pessoas do MySQL.</p>
    {{ $pessoas }}
    <p>Abaixo, uso do método foreach do Laravel</p>
    @foreach($pessoas as $pessoa)
        Nome: {{ $pessoa->nome }}<br>
        Telefone:
        @foreach($pessoa->telefone as $telefone)
            {{ $telefone->telefone }}
        @endforeach
        <br><br>
    @endforeach
</body>
</html>