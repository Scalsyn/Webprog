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
        <a class="menu" href="/sales">Forgalom</a>
        <a class="menu-selected">Admin oldal</a>
    </header>
    <main>
        <h2>Admin oldal</h2>
        <h4>Új jármű<h4>
        <div class="form-container">
            <form action="newcar" method="post" autocomplete="off">
                @csrf
                <label for="brand">Márka:</label>
                <input type="text" id="brand" name="brand" required><br><br>     
                <label for="model">Típus:</label>
                <input type="text" id="model" name="model" required><br><br>
                <label for="colorpack">Színcsoport:</label>
                <select name="colorpack" id="colorpack" required>
                <option value="" selected disabled hidden>--Válasszon--</option>
                <option value="4 szín">4 szín</option>
                <option value="9 szín">9 szín</option>
                <option value="14 szín">14 szín</option>
                </select></br></br>
                <label for="price">Ár:</label><br>
                <input type="number" id="price" name="price" required><br><br>
                <input type="submit" value="Elment">
            </form>
        </div>
        <h4>Jármű árának módosítása<h4>
        <div class="form-container">
            <form action="carupdate" method="post" autocomplete="off">
                @csrf
                <label for="car">Jármű:</label>
                <select name="car" id="car" required>
                <option value="" selected disabled hidden>--Válasszon--</option>
                    @foreach($cars as $car)
                    <option value={{ "$car->id" }}>{{ $car->brand .' '. $car->model}}</option>
                    @endforeach
                </select><br><br>
                <label for="newprice">Új ár:</label>
                <input type="number" id="newprice" name="newprice" required><br><br>
                <input type="submit" value="Módosít">
            </form>
        </div>
        <h4>Jármű törlése<h4>
        <div class="form-container">
            <form action="cardelete" method="post" autocomplete="off">
                @csrf
                <label for="car">Jármű:</label>
                <select name="car" id="car" required>
                <option value="" selected disabled hidden>--Válasszon--</option>
                    @foreach($cars as $car)
                    <option value={{ "$car->id" }}>{{ $car->brand .' '. $car->model}}</option>
                    @endforeach
                </select>
                <input type="submit" value="Töröl">
            </form>
        </div>
        <h4>Vásárló törlése<h4>
        <div class="form-container">
            <form action="customerdelete" method="post" autocomplete="off">
                @csrf
                <label for="customer">Vásárló:</label>
                <select name="customer" id="customer" required>
                <option value="" selected disabled hidden>--Válasszon--</option>
                    @foreach($customers as $customer)
                    <option value={{ "$customer->id" }}>{{ $customer->cfname .' '. $customer->clname .' '. $customer->cbdate}}</option>
                    @endforeach
                </select></br></br>
                <input type="submit" value="Töröl">
            </form>
        </div>
    </main>
</body>
</html>