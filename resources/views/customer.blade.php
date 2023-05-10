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
        <a class="menu-selected">Új vásárló</a>
        <a class="menu" href="/sales">Forgalom</a>
        <a class="menu" href="/admin">Admin oldal</a>
    </header>
    <main>
    <h2>Új vásárló</h2>
        <div class="form-container">
            <form action="customersubmit" method="post" autocomplete="off">
                @csrf
                <label for="cfname">Keresztnév:</label>
                <input type="text" id="cfname" name="cfname" required><br><br>
                <label for="clname">Vezetéknév:</label>
                <input type="text" id="clname" name="clname" required><br><br>
                <label for="cbdate">Születési idő:</label><br>
                <input type="date" id="cbdate" name="cbdate" required><br><br>
                <label for="caddress">Cím:</label>
                <input type="text" id="caddress" name="caddress" required><br><br>
                <label for="cphone">Telefonszám:</label>
                <input type="text" id="cphone" name="cphone" required><br><br>
                <input type="submit" value="Elment">
            </form>
        </div>
    </main>
</body>
</html>