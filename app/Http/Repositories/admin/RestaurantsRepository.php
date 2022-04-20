<?php 
namespace App\Http\Repositories\admin;
use App\Http\Interfaces\admin\RestaurantsInterface;
use App\Models\restaurant;
class RestaurantsRepository implements RestaurantsInterface{
        // list all categories
        public function index(){
            $restaurants = restaurant::all();
            return view('dashboard.restaurants.index',['restaurants'=>$restaurants]);
        }
    
        // load view of create form
        public function create(){
            // return view of create blade
            return view('dashboard.restaurants.create');
        }
    
        // save restaurant to db
        public function store($request){
            $restaurant = new restaurant();
            $restaurant->name=$request->name;
            $restaurant->phone=$request->phone;
            $restaurant->address=$request->address;
            $restaurant->description=$request->description;
            if($request->has('image')){
                $extension = $request->file('image')->getClientOriginalExtension();
                $imagefilesaving = time(). '.'.$extension;
                $path = $request->file('image')->move(public_path('public/images'), $imagefilesaving);
                $restaurant->image=$imagefilesaving;
            }

            $restaurant->save();
            return redirect()->route('getRestaurants');
        }
        // load view of edit blade
        public function edit($id){
            // return view
            $restaurant = restaurant::find($id);
            return view('dashboard.restaurants.edit',$restaurant);
        }

        // update restaurant data
        public function update($request, $id){
            $restaurant = restaurant::find($id);
            $restaurant->name=$request->name;
            $restaurant->phone=$request->phone;
            $restaurant->description=$request->description;
            $restaurant->address=$request->address;
            if($request->input('image')){
                $FileName = $request->input('image')->getClientOriginalName();
                $file = pathinfo($FileName , PATHINFO_FILENAME);
                $extension = $request->file('image')->getClientOriginalExtension();
                $imagefilesaving = str_replace(' ' , '' , $file).'-'.rand() . ''.time(). '.'.$extension;
                $path = $request->file('image')->move(public_path('public/images'), $imagefilesaving);
                
                $restaurant->image=$imagefilesaving;
            }
            $restaurant->save();
            return redirect()->route('getRestaurants');
        }
    
        // destroy restaurant
            public function destroy($id){
            restaurant::destroy($id);
            return redirect()->route('getRestaurants');
        }
}