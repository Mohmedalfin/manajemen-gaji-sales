<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sales;

class SalesController extends Controller
{
    public function index()
    {
        $sales = Sales::orderByDesc('id')->paginate(20);
        return view('admin.data-sales', compact('sales'));     
    }
}
