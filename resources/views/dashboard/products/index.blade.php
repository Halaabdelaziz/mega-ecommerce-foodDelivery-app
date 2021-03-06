@extends('layouts.master')
@section('content')
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Products</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Products Data</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Category</th>
                                            <th>Restaurant</th>
                                            <th>Created at</th>
                                            <th>Update at</th>
                                            <th>Modify</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($Products as $Product)
                                        <tr>
                                            <td><img src='{{asset("public/img/$Product->image")}}' class="img-fluid"></td>
                                            <td>{{$Product->name}}</td>
                                            <td>{{$Product->description}}</td>
                                            <td>{{$Product->price}}</td>
                                            <td>{{$Product->stock}}</td>
                                            <td>{{$Product->category->name}}</td>
                                            @foreach($Product->restarunt as $restuarant)
                                                <td>{{$restuarant->name}}</td>
                                            @endforeach
                                            <td>{{$Product->created_at}}</td>
                                            <td>{{$Product->updated_at}}</td>
                                            <td><a class="btn btn-primary" href="{{route('editProduct',[$Product->id])}}">Edit</a></td>
                                            <td>
                                                <form method="post" action="/product/{{$Product->id}}">
                                                    @method("delete")
                                                    @csrf
                                                    <input type="submit" name="delete" class="btn btn-danger" value="Delete">
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
@endsection