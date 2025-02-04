<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    use HasFactory;

    protected $fillable = 
    [
        'company_name',
        'date',
        'text',
    ];
}
