@extends('layouts.master')
@section('content')
<div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-restaurant-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form method="post" action="/product/{{$product->id}}/edit" class="user" enctype="multipart/form-data">
                                        @method('Patch')
                                        @csrf
                                        <div class="form-group">
                                            <input name="name" value="{{$product->name}}" type="text" class="form-control form-control-user"
                                                id="exampleInputName" aria-describedby="textHelp"
                                                placeholder="Enter New Product Name...">
                                        </div>
                                        <div class="form-group">
                                            <input name="description" value="{{$product->description}}" type="text" class="form-control form-control-user"
                                                id="exampleInputPhone" aria-describedby="textHelp"
                                                placeholder="Enter New Product Description...">
                                        </div>
                                        <div class="form-group">
                                            <input name="price" value="{{$product->price}}" type="text" class="form-control form-control-user"
                                                id="exampleInputAddress" aria-describedby="textHelp"
                                                placeholder="Enter New Product Price...">
                                        </div>
                                        <div class="form-group">
                                            <input name="stock"  value="{{$product->stock}}" type="text" class="form-control form-control-user"
                                                id="exampleInputDescription" aria-describedby="textHelp"
                                                placeholder="Enter New Product Quantity...">
                                        </div>
                                        <div class="form-group">
                                            <strong>Category</strong>
                                            <select class="form-control" name="category_id">
                                                @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <strong>Restaurant</strong>
                                            <select class="form-control" name="restaurant_id">
                                                @foreach($restaurants as $restaurant)
                                                <option value="{{$restaurant->id}}">{{$restaurant->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="file" name="image" class="btn btn-primary btn-user btn-block">
                                        </div>
                                        <button type="submit" class="btn text-white btn-user btn-block">
                                            Edit Product
                                        </button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection