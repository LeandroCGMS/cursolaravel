
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title or 'Painel Curso' }} </title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('assets/painel/css/style.css') }}">
    <script type="text/javascript" src=""></script>
    <script type="text/javascript" src="js/template.js"></script>
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>