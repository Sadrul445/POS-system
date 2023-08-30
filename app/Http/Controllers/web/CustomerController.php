<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        $customers = Customer::paginate(10);
        return view('layouts.dashboard.customer.index',compact('customers'));
    }
    public function create(){
        $customers = Customer::all();
        return view('layouts.dashboard.customer.create',compact('customers'));
    }
}
