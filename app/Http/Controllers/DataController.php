<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarModel;
use App\Models\ColorModel;
use App\Models\CustomerModel;
use App\Models\VendorModel;
use App\Models\SalesModel;

class DataController extends Controller
{
    public function index()
    {
        return redirect('cars');
    }
    public function cars()
    {
        $cars = CarModel::all();
        $colors = ColorModel::all();
        return view('cars', compact('cars', 'colors'));
    }
    public function purchase()
    {
        $cars = CarModel::all();
        $customers = CustomerModel::all();
        $vendors = VendorModel::all();
        return view('purchase', compact('cars', 'customers', 'vendors'));
    }
    public function customer()
    {
        return view('customer');
    }
    public function admin()
    {
        $customers = CustomerModel::all();
        $cars = CarModel::all();
        return view('admin', compact('cars', 'customers'));
    }
    public function sales()
    {
        $data = SalesModel::join('cars', 'sales.car', '=', 'cars.id')
              		->join('customers', 'sales.customer', '=', 'customers.id')
                    ->join('vendors', 'sales.vendor', '=', 'vendors.id')
                    ->select('sales.id', 'cars.brand', 'cars.model', 'customers.cfname', 'customers.clname', 'vendors.vfname', 'vendors.vlname', 'sales.income', 'sales.date')
              		->get();

        return view('sales', compact('data'));
    }

    public function purchaseSubmit(Request $req)
    {
        $data = $req->input();
        $now = date_create()->format('Y-m-d H:i:s');
        $carprice = CarModel::where('id', $data['car'])
            ->select('cars.price')
            ->get()
            ->first();
        try {
            $sale = new SalesModel;
            $sale->car = $data['car'];
            $sale->customer = $data['customer'];
            $sale->vendor = $data['vendor'];
            $sale->income = $carprice['price'];
            $sale->date = $now;
            $sale->save();
            return redirect('sales')->with('status',"Insert successfully");
        }
        catch(Exception $e) {
            return redirect('sales')->with('failed',"Operation failed");
        }
    }
    public function insertCar(Request $req)
    {
        $data = $req->input();
        try {
            $car = new CarModel;
            $car->brand = $data['brand'];
            $car->model = $data['model'];
            $car->color = $data['colorpack'];
            $car->price = $data['price'];
            $car->save();
            return redirect('cars')->with('status',"Insert successfully");
        }
        catch(Exception $e) {
            return redirect('cars')->with('failed',"Operation failed");
        }
    }
    public function customerSubmit(Request $req) 
    {
        $data = $req->input();
        try {
            $customer = new CustomerModel;
            $customer->cfname = $data['cfname'];
            $customer->clname = $data['clname'];
            $customer->cbdate = $data['cbdate'];
            $customer->caddress = $data['caddress'];
            $customer->cphone = $data['cphone'];
            $customer->save();
            return redirect('customer')->with('status',"Insert successfully");
        }
        catch(Exception $e) {
            return redirect('customer')->with('failed',"Operation failed");
        }
    }
    public function deleteCustomer(Request $req) 
    {
        $data = $req->input();
        try {
            CustomerModel::where('id', $data['customer'])->delete();    
            return redirect('admin')->with('status',"Insert successfully");
        }
        catch(Exception $e) {
            return redirect('admin')->with('failed',"Operation failed");
        }
    }
    public function deleteCar(Request $req) 
    {
        $data = $req->input();
        try {
            CarModel::where('id', $data['car'])->delete();         
            return redirect('admin')->with('status',"Insert successfully");
        }
        catch(Exception $e) {
            return redirect('admin')->with('failed',"Operation failed");
        }
    }
    public function updateCar(Request $req)
    {
        $data = $req->input();
        try {
            CarModel::where('id', $data['car'])->update(array('price' => $data['newprice']));
            return redirect('admin')->with('status',"Insert successfully");
        }
        catch(Exception $e) {
            return redirect('admin')->with('failed',"Operation failed");
        }
    }
}
