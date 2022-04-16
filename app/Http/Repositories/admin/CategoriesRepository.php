<?php
namespace App\Http\Repositories\admin;
use App\Http\Interfaces\admin\CategoriesInterface;
use App\Models\Category;

class CategoriesRepository implements CategoriesInterface{
    // list all categories
    public function index(){
        $categories = Category::all();
        return view('dashboard.categories.index',['categories'=>$categories]);
    }

    // load view of create form
    public function create(){
        // return view of create blade
        return view('dashboard.categories.create');
    }

    // save category to db
    public function store($request){
        $category = new Category();
        $category->name=$request->name;
        $category->save();
        return redirect()->route('getCategories');
    }

    // load view of edit blade
    public function edit($id){
    
        $category = Category::find($id);
        // dd($category);
        return view('dashboard.categories.edit',$category);
    }

    // update category data
    public function update($request, $id){
        $categories = Category::find($id);
        $categories->name=$request->name;
        $categories->save();
        return redirect()->route('getCategories');
    }

    // destroy Category
        public function destroy($id){
        Category::destroy($id);
        return redirect()->route('getCategories');
    }
}