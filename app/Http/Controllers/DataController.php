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
    public function sales()
    {
        return view('sales');
    }

    public function purchaseSubmit(Request $req)
    {
        $data = $req->input();
        $now = date_create()->format('Y-m-d H:i:s');
        try{
            $sale = new SalesModel;
            $sale->car = $data['car'];
            $sale->customer = $data['customer'];
            $sale->vendor = $data['vendor'];
            $sale->date = $now;
            $sale->save();
            return redirect('sales')->with('status',"Insert successfully");
        }
        catch(Exception $e){
            return redirect('sales')->with('failed',"operation failed");
        }
    }

    public function customerSubmit(Request $req)
    {
        $data = $req->input();
        try{
            $customer = new CustomerModel;
            $customer->firstname = $data['fname'];
            $customer->lastname = $data['lname'];
            $customer->birthdate = $data['bdate'];
            $customer->address = $data['address'];
            $customer->phone = $data['phone'];
            $customer->save();
            return redirect('customer')->with('status',"Insert successfully");
        }
        catch(Exception $e){
            return redirect('customer')->with('failed',"operation failed");
        }
    }
}
