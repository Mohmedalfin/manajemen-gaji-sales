<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Sales;
use App\Http\Requests\SalesRequest;

class SalesController extends Controller
{
    public function index()
    {
        $sales = Sales::orderByDesc('id')->paginate(10);
        return view('admin.data-sales', compact('sales'));     
    }

    public function store(SalesRequest $request): RedirectResponse
    {
        $data = $request->validated();
        Sales::create($data);
        return redirect()->back()->with('success', 'Data sales berhasil ditambahkan');    
    }  

    public function update(SalesRequest $request, $id): RedirectResponse
    {
        $data = $request->validated();
        $sales = Sales::findOrFail($id);
        $sales->update($data);
        return redirect()->back()->with('success', 'Data sales berhasil diupdate');    
    }  

    public function destroy($id)
    {
        $sales = Sales::findOrFail($id);
        $sales->delete();
        return redirect()->back()->with('success', 'Data sales berhasil didelete');    
    }  
}
