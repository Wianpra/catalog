<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductAdminController extends Controller
{
    public function index()
    {
        return view('_product');
    }
    public function create()
    {
        return view('_createProduct');
    }
}
