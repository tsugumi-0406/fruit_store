<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class FruitController extends Controller
{
    // 商品一覧表示
    public function index()
    {
        $products = Product::select(['name', 'price', 'image'])->paginate(6);
        return view ('index', compact('products'));
    }

     // 商品検索
    public function search()
    {
        return view ('search');
    }

    // 入力画面表示
     public function add()
    {
        return view ('register');
    }

    // 登録ボタンでデータベースに登録する
    public function store(Request $request)
    {
        $product = $request->only(['name', 'price', 'description']);
        $product['image'] = 'noimage.png';

         if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $product['image'] = $path;
        }

        $product = Product::create($product);

        $product->seasons()->sync($request->season_id);
        $products = Product::select(['name', 'price', 'image'])->paginate(6);
        return redirect('/products');
    }

    
    // 商品詳細表示
    public function detail()
    {
        return view ('detail');
    }

    // 商品更新
    public function update()
    {
        return view ('update');
    }

   

    

   
    // 削除機能
    public function delete()
    {
        return view ('delete');
    }


}
