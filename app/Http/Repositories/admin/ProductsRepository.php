<?php 
namespace App\Http\Repositories\admin;
use App\Http\Interfaces\admin\ProductInterface;
use App\Models\Product;

class ProductsRepository implements ProductInterface{
        // list all Products
        public function index(){
            $products = Product::all(); 
            return view('dashboard.Products.index',['Products'=>$products]);
        }
    
        // load view of create form
        public function create(){
            // return view of create blade
            // return view('dashboard.restaurants.create');
        }
        public function show($id){

        }
        // save restaurant to db
        public function store($request){
            // $restaurant = new restaurant();
            // $restaurant->name=$request->name;
            // $restaurant->phone=$request->phone;
            // $restaurant->address=$request->address;
            // $restaurant->description=$request->description;
            // if($request->input('imageUrl')){
            //     $FileName = $request->input('imageUrl')->getClientOriginalName();
            //     dd($FileName);
            //     $file = pathinfo($FileName , PATHINFO_FILENAME);
            //     $extension = $request->file('imageUrl')->getClientOriginalExtension();
            //     $imagefilesaving = str_replace(' ' , '' , $file).'-'.rand() . ''.time(). '.'.$extension;
            //     $path = $request->file('imageUrl')->move(public_path('public/images'), $imagefilesaving);
                
            //     $restaurant->imageUrl=$imagefilesaving;
            // }
            // // dd($request);
            // $restaurant->save();
            // return redirect()->route('getRestaurants');
        }
        // load view of edit blade
        public function edit($id){
            // return view
            // $restaurant = restaurant::find($id);
            // return view('dashboard.restaurants.edit',$restaurant);
        }

        // update restaurant data
        public function update($request, $id){
            // dd($id);
            // $restaurant = restaurant::find($id);
            // $restaurant->name=$request->name;
            // $restaurant->phone=$request->phone;
            // $restaurant->description=$request->description;
            // $restaurant->address=$request->address;
            // if($request->input('imageUrl')){
            //     $FileName = $request->input('imageUrl')->getClientOriginalName();
            //     $file = pathinfo($FileName , PATHINFO_FILENAME);
            //     $extension = $request->file('imageUrl')->getClientOriginalExtension();
            //     $imagefilesaving = str_replace(' ' , '' , $file).'-'.rand() . ''.time(). '.'.$extension;
            //     $path = $request->file('imageUrl')->move(public_path('public/images'), $imagefilesaving);
                
            //     $restaurant->imageUrl=$imagefilesaving;
            // }
            // $restaurant->save();
            // return redirect()->route('getRestaurants');
        }
    
        // destroy restaurant
            public function destroy($id){
            // restaurant::destroy($id);
            // return redirect()->route('getRestaurants');
        }
}