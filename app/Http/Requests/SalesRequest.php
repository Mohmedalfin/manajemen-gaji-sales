<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * Kita set true dulu, logic admin-nya kita taruh di Controller biar eksplisit.
     */
    public function authorize(): bool
    {
        return true; 
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'kode_sales'           => 'required|unique:sales,kode_sales',
            'nama_lengkap'         => 'required|string|max:100',
            'kontak'               => 'required|string|max:50',
            'jabatan'              => 'required|string|max:50',
            'gaji_pokok'           => 'required|numeric|min:0',
            'target_penjualan_bln' => 'required|numeric|min:0',
            'status_aktif'         => 'required|boolean',
        ];
    }

    protected function prepareForValidation()
    {
        if (!$this->has('kode_sales') || $this->kode_sales == null) {
            $lastSales = \App\Models\Sales::orderBy('id', 'desc')->first();
            $nextNumber = $lastSales ? ((int) substr($lastSales->kode_sales, 4)) + 1 : 1;
            
            $this->merge([
                'kode_sales' => 'SLS-' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT),
            ]);
        }
    }
}