<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Season;
use App\Http\Requests\StoreRequest;

class FruitController extends Controller
{
    // 商品一覧表示
    public function index()
    {
        $products = Product::select(['id', 'name', 'price', 'image'])->paginate(6);
        $sortType = null;
        return view ('index', compact('products', 'sortType'));
    }

     // 商品検索
    public function search(Request $request)
    {
         $query = Product::query();

    // キーワード検索
    if ($request->filled('keyword')) {
        $query->where('name', 'like', '%' . $request->keyword . '%');
    }

    // ソート処理
        $sortType = $request->input('sort', 'price-desc');
        switch ($sortType) {
            case 'price-desc':
                $query->orderByRaw('CAST(price AS UNSIGNED) DESC');
                break;
            case 'price-asc':
                $query->orderByRaw('CAST(price AS UNSIGNED) ASC');
                break;
            default:
                $query->orderBy('id', 'asc');
        }

        // ページネーション＋パラメータ保持
        $products = $query->paginate(6)->appends($request->query());

        return view('index', compact('products', 'sortType'));
    }

    

    // 追加入力画面表示
     public function add()
    {
        return view ('register');
    }

    // 登録ボタンでデータベースに登録する
    public function store(StoreRequest $request)
    {
        if ($request->has('back')) {
            return redirect()->route('products.index');
        }
        $product = $request->only(['name', 'price', 'description']);
        $product['image'] = 'noimage.png';
        // ↑一旦noimage.pngをimageカラムに挿入する

         if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $product['image'] = $path;
        }

        $product = Product::create($product);

        $product->seasons()->sync($request->season_id);
        $products = Product::select(['id', 'name', 'price', 'image'])->paginate(6);
        return redirect('/products');
    }

    
    // 商品詳細表示
    public function detail(Request $request, $productId)
    {
        if ($request->has('back')) {
            return redirect()->route('products.index');
        }

        $product = Product::with('seasons')->findOrFail($productId);
        $seasons = Season::all();
        return view ('detail', compact('product', 'seasons'));
    }

    // 商品更新
    public function update(StoreRequest $request, $productId)
    {
        $product = Product::findOrFail($productId);

        $productData = $request->only(['name', 'price', 'description']);

            if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $productData['image'] = $path;
        }

        $product->update($productData);

        $product->seasons()->sync($request->season_id);
        
        return redirect('/products');
    }       
   
    // 削除機能
    public function delete(Request $request)
    {
        Product::find($request->id)->delete();
        return redirect('/products');
    }
}
