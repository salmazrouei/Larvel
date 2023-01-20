@extends('layouts.adminMain')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <h1 class="m-0">Categories</h1>
                        <hr>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th colspan="2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category['id'] }}</td>
                                        <td>{{ $category['name'] }}</td>
                                        <td><img src="{{url($category['image'])}}" width="150px"></td>
                                        <td scope="col">
                                            <a class="btn btn-success" href="">
                                                <h6 class="fa fa-pen text-white"></h6>
                                            </a>
                                        </td>
                                        <td scope="col">
                                            <form action="" method="post">
                                                <input type="hidden" name="id" value="{{$category['id']}}" />
                                                <button class="btn btn-danger" onclick="return confirm('Are you sure ?');">
                                                    <h6 class="fa fa-trash text-white"></h6>
                                                </button>
                                            </form>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a class = "btn btn-success">Add Category</a>
                    </div>
                </div>
            </div>
        </section>
    </div>