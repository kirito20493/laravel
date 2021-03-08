<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Catagory;


class HomeController extends Controller
{
    //
    public function index(){
        return view('home');
    }
    // show list user
    public function showListUser(){
        $customers = Customer::paginate(5);
        return view('component.showListUser')->with(['customers'=>$customers]);
    }
    
}
