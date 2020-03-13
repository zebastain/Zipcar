<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CarModel;

class CatalogController extends Controller
{
    public function index(){
        return view('catalog', ["models" => CarModel::all()]);
    }
}
