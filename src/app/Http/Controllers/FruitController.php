<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class FruitController extends Controller
{
    // 商品一覧表示
    public function index()
    {
        $products = Product::all();
        return view ('index', compact('products'));
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

    // 商品登録ページ表示
    public function regist()
    {
        return view ('register');
    }

    // 商品検索
    public function search()
    {
        return view ('search');
    }

    // 削除機能
    public function delete()
    {
        return view ('delete');
    }





}
