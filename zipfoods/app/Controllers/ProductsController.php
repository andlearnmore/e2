<?php

namespace App\Controllers;

use App\Products;

class ProductsController extends Controller 
{
    public function index()
    {
        $products = $this->app->db()->all('products'); 

        return $this->app->view('products/index', ['products' => $products]);
    }

    public function show()
    {
        $sku = $this->app->param('sku');

        $productQuery = $this->app->db()->findByColumn('products', 'sku', '=', $sku);
 
        if (empty($productQuery)){
            return $this->app->view('products/missing');
        } else {
            $product = $productQuery[0];
        }

        $reviewSaved = $this->app->old('reviewSaved');

        return $this->app->view('products/show', [
            'product' => $product, 
            'reviewSaved' => $reviewSaved 
        ]); 
    }

    public function saveReview()
    {

        $this->app->validate([
            'product_id' => 'required',
            'sku' => 'required',
            'name' => 'required',
            'review' => 'required|minLength:200'
        ]);
         
        $product_id = $this->app->input('product_id');
        $sku = $this->app->input('sku');
        $name = $this->app->input('name');
        $review = $this->app->input('review');

        # To do: persist to the database.
        $this->app->db()->insert('reviews', [
            'product_id' => $product_id,
            'name' => $name,
            'review' => $review
        ]);

        return $this->app->redirect('/product?sku=' . $sku, ['reviewSaved'
         => true]); 

    }
}