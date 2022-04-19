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
                                    <form method="post" action="restaurants/{{$id}}/edit" class="user" enctype="multipart/form-data">
                                        @method('patch')
                                        @csrf
                                        <div class="form-group">
                                            <input name="name" value="{{$name}}" type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="textHelp"
                                                placeholder="Enter New Restaurant Name...">
                                        </div>
                                        <div class="form-group">
                                            <input name="phone" type="text" value="{{$phone}}"  class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="textHelp"
                                                placeholder="Enter New Restaurant phone...">
                                        </div>
                                        <div class="form-group">
                                            <input name="address" type="text" value="{{$address}}"  class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="textHelp"
                                                placeholder="Enter New Restaurant Address...">
                                        </div>
                                        <div class="form-group">
                                            <input name="description" type="text" value="{{$description}}"  class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="textHelp"
                                                placeholder="Enter New Restaurant Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="file" name="image" class="btn btn-primary btn-user btn-block">
                                        </div>
                                        <button type="submit" class="btn text-white btn-user btn-block">
                                            Edit Restaurant
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