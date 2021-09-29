<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>{{ $name }}</h1>
    <p><strong>Nombre de place :</strong> {{ $nbr_place }}</p>
    <p><strong>Date de reservation :</strong> {{ $jour }}</p>
    <p><strong>de</strong> {{ $date_debut }} <strong>Jusqu'a</strong> {{ $date_fin }}</p>

    <p>
        Wait until tour reservation confirmed by admin
    </p>
</body>
</html>
