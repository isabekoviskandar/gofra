<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WarehouseValueController extends Controller
{
    public function index()
    {
        return view('admin.warehouse_value.index');
    }
}
