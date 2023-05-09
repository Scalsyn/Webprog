<!DOCTYPE HTML>
<html lang="en">
<head>
<title>Cardealer</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <header>
        <h1>American Cardealer</h1>
        <a class="menu-selected">Jármű lista</a>
        <a class="menu" href="/purchase">Új eladás</a>
        <a class="menu" href="/customer">Új vásárló</a>
        <a class="menu" href="/sales">Forgalom</a>
    </header>
    <main>
        <h2>Elérhető járművek és árlista</h2>
        <table>
            <thead>
                <tr>
                    <th>Márka</th>
                    <th>Típus</th>
                    <th>Színcsoport</th>
                    <th>Ár</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cars as $car)
                <tr>
                    <td>{{ $car->brand }}</td>
                    <td>{{ $car->model }}</td>
                    <td>{{ $car->color }}</td>
                    <td>{{ $car->price.' $' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <h2>Színcsoportok</h2>
        @foreach($colors as $color)
        <h4>{{ $color->pack }}</h4>
        <p>{{ $color->colors }}</p>
        @endforeach
    </main>
</body>
</html>