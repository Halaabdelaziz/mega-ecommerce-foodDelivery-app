<?php 
namespace App\Http\Repositories\admin;
use App\Models\Product;
use App\Models\Category;
use App\Models\restaurant;
use App\Models\ProductRestaurant;
use App\Http\Interfaces\admin\ProductInterface;

class ProductsRepository implements ProductInterface{
        // list all Products
        public function index(){
            $products = Product::with('restarunt:name,id')->get(); 
            return view('dashboard.Products.index',['Products'=>$products]);
        }
    
        // load view of create form
        public function create(){
            // return view of create blade
            $categories = Category::select('name', 'id')->get();
            $restaurants = restaurant::select('name','id')->get();
            return view('dashboard.Products.create',["categories"=> $categories,"restaurants"=>$restaurants]);
        }
        public function show($id){

        }
        // save product to db
        public function store($request){
            $product = new Product();
            $product->name=$request->name;
            $product->description=$request->description;
            $product->price=$request->price;
            $product->stock=$request->stock;
            if($request->has('image')){
                $extension = $request->file('image')->getClientOriginalExtension();
                $imagefilesaving = time(). '.'.$extension;
                $path = $request->file('image')->move(public_path('public/img'), $imagefilesaving);
                $product->image=$imagefilesaving;
            }
            $product->category_id=$request->category_id;
            $product->save();

            $product_restaurant = new ProductRestaurant();
            $productId=Product::latest()->first()->id;
            $product_restaurant->product_id = $productId;
            $product_restaurant->restaurant_id = $request->restaurant_id;
            $product_restaurant->save();
            return redirect()->route('getProducts');
        }

        // load view of edit blade
        public function edit($id){
            // return view
            $product=Product::find($id);
            $categories = Category::select('name', 'id')->get();
            $restaurants = restaurant::select('name','id')->get();
            return view('dashboard.products.edit',["categories"=> $categories,"restaurants"=>$restaurants,'product'=>$product]);
        }

        // update product data
        public function update($request, $id){
            $product = Product::find($id);
            $product->name=$request->name;
            $product->description=$request->description;
            $product->price=$request->price;
            $product->stock=$request->stock;
            if($request->has('image')){
                $extension = $request->file('image')->getClientOriginalExtension();
                $imagefilesaving = time(). '.'.$extension;
                $path = $request->file('image')->move(public_path('public/img'), $imagefilesaving);
                $product->image=$imagefilesaving;
            }
            $product->category_id=$request->category_id;
            $product->save();

            $product_restaurant = new ProductRestaurant();
            $product_restaurant->product_id = $id;
            $product_restaurant->restaurant_id = $request->restaurant_id;
            $product_restaurant->save();
            return redirect()->route('getProducts');
        }
    
        // destroy product
            public function destroy($id){
                // delete photo of deleted item
                $product = Product::findOrFail($id);
                $path = public_path()."/public/img/".$product->image;
                unlink($path);
            Product::destroy($id);
            return redirect()->route('getProducts');
        }
}