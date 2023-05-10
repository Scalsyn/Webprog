<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarModel;
use App\Models\ColorModel;
use App\Models\CustomerModel;
use App\Models\SalesModel;
use App\Models\VendorModel;

class DataController extends Controller
{
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
        $data = SalesModel::join('cars', 'sales.id', '=', 'cars.id')
              		->join('customers', 'sales.id', '=', 'customers.id')
                    ->join('vendors', 'sales.id', '=', 'vendors.id')
              		->get(['sales.id', 'cars.brand', 'cars.model', 'customers.cfname', 'customers.clname', 
                    'vendors.vfname', 'vendors.vlname', 'cars.price', 'sales.date']);

        return view('sales', compact('data'));
    }

    public function purchaseSubmit(Request $req)
    {
        $data = $req->input();
        $now = date_create()->format('Y-m-d H:i:s');
        try {
            $sale = new SalesModel;
            $sale->car = $data['car'];
            $sale->customer = $data['customer'];
            $sale->vendor = $data['vendor'];
            $sale->date = $now;
            $sale->save();
            return redirect('sales')->with('status',"Insert successfully");
        }
        catch(Exception $e) {
            return redirect('sales')->with('failed',"operation failed");
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
            return redirect('customer')->with('failed',"operation failed");
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
            return redirect('admin')->with('failed',"operation failed");
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
            return redirect('admin')->with('failed',"operation failed");
        }
    }
}
