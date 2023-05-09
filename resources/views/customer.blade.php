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
    </header>
    <main>
    <h2>Új vásárló</h2>
        <div class="form-container">
            <form action="customersubmit" method="post" autocomplete="off">
                @csrf
                <label for="fname">Keresztnév:</label>
                <input type="text" id="fname" name="fname" required><br><br>
                <label for="lname">Vezetéknév:</label>
                <input type="text" id="lname" name="lname" required><br><br>
                <label for="bdate">Születési idő:</label><br>
                <input type="date" id="bdate" name="bdate" required><br><br>
                <label for="address">Cím:</label>
                <input type="text" id="address" name="address" required><br><br>
                <label for="phone">Telefonszám:</label>
                <input type="text" id="phone" name="phone" required><br><br>
                <input type="submit" value="Elment">
            </form>
        </div>
    </main>
</body>
</html>