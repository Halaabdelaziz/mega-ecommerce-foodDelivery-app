<?php
namespace App\Http\Repositories\admin;
use App\Http\Interfaces\admin\CategoriesInterface;
use App\Models\Category;

class CategoriesRepository implements CategoriesInterface{
    // list all categories
    public function index(){
        $categories = Category::all();
        return view('dashboard.restaurants.index',['categories'=>$categories]);
    }

    // load view of create form
    public function create(){
        // return view of create blade
        return view('dashboard.restaurants.create');
    }

    // save category to db
    public function store($request){
        $category = new Category();
        $category->name=$request->name;
        $category->save();
        return redirect()->route('getCategories');
    }

    // show category by id
    public function show($id){
        $category = Category::find($id);
        // load view of show blade
    }

    // load view of edit blade
    public function edit($id){
        // return view
    }

    // update category data
    public function update($request, $id){
        $category =Category::find($id);
        $category->name=$request->name;
        $category->save();
    }

    // destroy Category
        public function destroy($id){
        Category::destroy($id);
    }
}