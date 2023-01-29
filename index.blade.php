@extends('layouts.admin')
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <a class="btn btn-success" href="{{ url('admin/products/create') }}">Add</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Category</th>
                <th colspan="3">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product['id'] }}</td>
                    <td>{{ $product['name'] }}</td>
                    <td>{{ $product['category']['name'] }}</td>
                    <td><a href="{{ url('admin/products/' . $product['id']) }}">Show</a></td>
                    <td><a href="{{ url('admin/products/' . $product['id'] . '/edit') }}">Edit</a></td>
                    <td>
                        <form action="{{ url('admin/products/' . $product['id']) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    {!! $products->links() !!}
@endsection
