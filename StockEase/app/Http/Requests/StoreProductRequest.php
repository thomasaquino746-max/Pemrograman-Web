<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
{
    return [
        'category_id' => 'required|exists:categories,id',
        'code' => 'required|unique:products,code',
        'name' => 'required|max:255',
        'stock' => 'required|integer|min:0',
        'price' => 'required|numeric|min:0',
        'description' => 'nullable',
    ];
}
    public function messages(): array
    {
        return [
            'category_id.required' => 'Kategori wajib dipilih.',
            'name.required' => 'Nama produk wajib diisi.',
            'code.required' => 'Kode produk wajib diisi.',
            'code.unique' => 'Kode produk sudah digunakan.',
            'stock.required' => 'Stok wajib diisi.',
            'price.required' => 'Harga wajib diisi.',
        ];
    }
}