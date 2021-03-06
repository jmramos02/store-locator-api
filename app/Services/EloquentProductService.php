<?php

namespace App\Services;

use App\Product;
use App\Contracts\ProductService;

class EloquentProductService implements ProductService
{

    public function create($input)
    {
        $product = new Product();
        $product->name = $input->name;
        $product->desc = $input->desc;
        $product->url = $input->url;
        $product->dosage = $input->dosage;
        $product->save();
        return $product;
    }

    public function update($id, $params)
    {
        $product = Product::find($id);
        $product->name = $params->name;
        $product->desc = $params->desc;
        $product->dosage = $params->dosage;
        $product->url = $params->url;
        $product->save();
        return $product;
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
    }

    public function all()
    {
        return Product::with('stores')->get();
    }

    public function search($query)
    {
        return Product::where('name', 'LIKE', "%$query%")
            ->orWhere('category', 'LIKE', "%$query%")
            ->with('stores')
            ->get();
    }
}
