<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // lay danh sach san pham - index
    public function index()
    {
        return Product::query()->get();
    }

    // lay thong tin san pham theo id : get - show
    public function show(Product $product)
    {
        return Product::query()->findOrFail($product);
    }

    // them thong tin san pham post - store
    public function store()
    {

    }

    // Cap nhat 1 san pham put - update
    public function update()
    {

    }

    // Xoa 1 san pham delete - destroy
    public function destroy (Product $product)
    {
        try {
            $product->delete();
        } catch (\Exception $e) {
        }
    }
}
