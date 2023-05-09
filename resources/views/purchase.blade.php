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
        <a class="menu-selected">Új eladás</a>
        <a class="menu" href="/customer">Új vásárló</a>
        <a class="menu" href="/sales">Forgalom</a>
    </header>
    <main>
        <h2>Új eladás</h2>
        <div class="form-container">
            <form action="carsubmit" method="post" autocomplete="off">
                @csrf
                <label for="customer">Vásárló:</label>
                <select name="customer" id="customer" required>
                <option value="" selected disabled hidden>--Válasszon--</option>
                    @foreach($customers as $customer)
                    <option value={{ "$customer->id" }}>{{ $customer->firstname .' '. $customer->lastname .' '. $customer->birthdate}}</option>
                    @endforeach
                </select></br></br>
                <label for="vendor">Eladó:</label>
                <select name="vendor" id="vendor" required>
                <option value="" selected disabled hidden>--Válasszon--</option>
                    @foreach($vendors as $vendor)
                    <option value={{ "$vendor->id" }}>{{ $vendor->firstname .' '. $vendor->lastname}}</option>
                    @endforeach
                </select></br></br>
                <label for="car">Jármű:</label>
                <select name="car" id="car" required>
                <option value="" selected disabled hidden>--Válasszon--</option>
                    @foreach($cars as $car)
                    <option value={{ "$car->id" }}>{{ $car->brand . $car->model}}</option>
                    @endforeach
                </select>
                <input type="submit" value="Megrendel">
            </form>
        </div>
    </main>
</body>
</html>