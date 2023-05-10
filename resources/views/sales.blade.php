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
        <a class="menu" href="/cars">Jármű lista</a>
        <a class="menu" href="/purchase">Új eladás</a>
        <a class="menu" href="/customer">Új vásárló</a>
        <a class="menu-selected">Forgalom</a>
        <a class="menu" href="/admin">Admin oldal</a>
    </header>
    <main>
    <h2>Járműeladási tételek</h2>
        <table>
            <thead>
                <tr>
                    <th>Sorszám</th>
                    <th>Jármű</th>
                    <th>Vevő</th>
                    <th>Eladó</th>
                    <th>Bevétel</th>
                    <th>Dátum</th>
                </tr>
            </thead>
            <tbody>
                @isset($data)
                @foreach($data as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->brand .' '. $row->model }}</td>
                    <td>{{ $row->cfname .' '. $row->clname }}</td>
                    <td>{{ $row->vfname .' '. $row->vlname }}</td>
                    <td>{{ $row->price .' $' }}</td>
                    <td>{{ $row->date }}</td>
                </tr>
                @endforeach
                @endisset
            </tbody>
        </table>
    </main>
</body>
</html>