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
                                    <form method="post" action="/product/create" class="user" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <input name="name" type="text" class="form-control form-control-user"
                                                id="exampleInputName" aria-describedby="textHelp"
                                                placeholder="Enter Product Name...">
                                        </div>
                                        <span class="alert-danger">@error('name') {{$message}}@enderror</span>
                                        <div class="form-group">
                                            <input name="description" type="text" class="form-control form-control-user"
                                                id="exampleInputPhone" aria-describedby="textHelp"
                                                placeholder="Enter Product Description...">
                                        </div>
                                        <span class="alert-danger">@error('description') {{$message}}@enderror</span>
                                        <div class="form-group">
                                            <input name="price" type="text" class="form-control form-control-user"
                                                id="exampleInputAddress" aria-describedby="textHelp"
                                                placeholder="Enter Product Price...">
                                        </div>
                                        <span class="alert-danger">@error('price') {{$message}}@enderror</span>
                                        <div class="form-group">
                                            <input name="stock" type="text" class="form-control form-control-user"
                                                id="exampleInputDescription" aria-describedby="textHelp"
                                                placeholder="Enter Product Quantity...">
                                        </div>
                                        <span class="alert-danger">@error('stock') {{$message}}@enderror</span>
                                        <div class="form-group">
                                            <strong>Category</strong>
                                            <select class="form-control" name="category_id">
                                                <option value="add Category" disabled selected="selected">add Category</option>
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <span class="alert-danger">@error('category_id') {{$message}}@enderror</span>
                                        <div class="form-group">
                                            <strong>Restaurant</strong>
                                            <select class="form-control" name="restaurant_id">
                                                <option value="add restaurant" disabled selected="selected">add Restaurant</option>
                                                @foreach($restaurants as $restaurant)
                                                    <option value="{{$restaurant->id}}">{{$restaurant->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <span class="alert-danger">@error('restaurant_id') {{$message}}@enderror</span>
                                        <div class="form-group">
                                            <input type="file" name="image" class="btn btn-primary btn-user btn-block">
                                        </div>
                                        <span class="alert-danger">@error('image') {{$message}}@enderror</span>
                                        <button type="submit" class="btn text-white btn-user btn-block">
                                            Create Product
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