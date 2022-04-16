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
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form method="post" action="/category/{{$id}}/edit" class="user">
                                        @method('patch')
                                        @csrf
                                        <div class="form-group">
                                            <input name="name" value="{{$name}}" type="text" class="form-control form-control-user"
                                                id="exampleInputText" aria-describedby="textHelp"
                                                placeholder="Enter New Category Name...">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Edit Category
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