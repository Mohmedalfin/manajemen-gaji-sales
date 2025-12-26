<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BarangRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'kode_produk' => 'required|unique:produk,kode_produk',
            'nama_produk' => 'required|string|max:100',
            'harga_jual_unit' => 'required|numeric|min:0',
            'stok' => 'required|numeric|min:0',
        ];
    }

    protected function prepareForValidation()
    {
        if (!$this->has('kode_produk') || $this->kode_produk == null) {
            $lastSales = \App\Models\Barang::orderBy('id', 'desc')->first();
            $nextNumber = $lastSales ? ((int) substr($lastSales->kode_produk, 4)) + 1 : 1;
                
            $this->merge([
                'kode_produk' => 'PRD-' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT),
            ]);
        }
    }
}

