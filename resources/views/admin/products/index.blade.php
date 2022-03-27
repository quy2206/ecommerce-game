@extends('admin.layout.master')
@section('content')
    <div>
        <div  class="d-inline-block"><a href="{{route('add.product')}}" class="btn btn-primary" ><i class="fas fa-plus"></i>Add Product</a></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table id="product-table" class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th width="auto">No</th>
                        <th width="auto">Image</th>
                        <th width="auto">Name</th>
                        <th width="30px">Genres</th>
                        <th width="auto">Quantity</th>
                        <th width="auto">Price</th>
                        <th width="250px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $pro)

                        <tr>
                            <td>{{ $pro->id }}</td>
                            <td><img src="../images/{{$pro->thumbnail}}" alt="" class="img-fluid" style="width: 100px; height: auto "></td>
                            <td>{{ $pro->name }}</td>
                            <td>{{$pro->category_name}}</td>
                            <td>{{$pro->quantity}}</td>
                            <td>{{$pro->price}}</td>


                            <td><a href="" class="btn btn-secondary btn-common" title=""><i class="fas fa-search-plus"></i>View</a>
                                <a href="{{ route('edit.product', $pro->id)}}" class="btn btn-info btn-common" title=""><i class="fas fa-edit"></i>Edit</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@section('javascript')
@endsection
@endsection
