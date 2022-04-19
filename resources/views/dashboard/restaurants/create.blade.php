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
                                    <form method="post" action="/restaurant/create" class="user" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <input name="name" type="text" class="form-control form-control-user"
                                                id="exampleInputName" aria-describedby="textHelp"
                                                placeholder="Enter Restaurant Name...">
                                        </div>
                                        <div class="form-group">
                                            <input name="phone" type="text" class="form-control form-control-user"
                                                id="exampleInputPhone" aria-describedby="textHelp"
                                                placeholder="Enter Restaurant phone...">
                                        </div>
                                        <div class="form-group">
                                            <input name="address" type="text" class="form-control form-control-user"
                                                id="exampleInputAddress" aria-describedby="textHelp"
                                                placeholder="Enter Restaurant Address...">
                                        </div>
                                        <div class="form-group">
                                            <input name="description" type="text" class="form-control form-control-user"
                                                id="exampleInputDescription" aria-describedby="textHelp"
                                                placeholder="Enter Restaurant description...">
                                        </div>
                                        <div class="form-group">
                                            <input type="file" name="image" class="btn btn-primary btn-user btn-block">
                                        </div>
                                        <button type="submit" class="btn text-white btn-user btn-block">
                                            Create Restaurant
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