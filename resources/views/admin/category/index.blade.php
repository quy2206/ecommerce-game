@extends('admin.layout.master')

@section('content')
    @if (request()->has('view_deleted'))
        <a href="{{ route('index.category') }}" class="btn btn-info">View All Categories</a>
        <a href="{{ route('restoreAll.category') }}" class="btn btn-success">Restore All</a>
    @else
        <a href="{{ route('index.category', ['view_deleted' => 'DeletedRecords']) }}" class="btn btn-primary">View
            Delete Records</a>
    @endif
    <div class="row">

        <div class="col-md-10">
            <table id="cate-table" class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th width="auto">No</th>
                        <th width="auto">Name</th>
                        <th width="30px">Product List</th>
                        <th width="250px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($categories))
                        @foreach ($categories as $key => $category)
                            <tr id="sid{{ $category->id }}">
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $category->name }}</td>
                                <td></td>
                                <td style="display: flex; gap:5px">
                                    @if (request()->has('view_deleted'))
                                        <a href="{{ route('restore.category', $category->id) }}"
                                            class="btn btn-success">Restore</a>
                                    @else
                                        <a href="{{ route('edit.category', $category->id) }}"
                                            class="btn btn-info btn-common"><i class="fas fa-edit"></i>Edit</a>


                                        <form action="">
                                            @csrf
                                            @method('DELETE')
                                            <a onclick="deleteRow({{ $category->id }}, 'category/destroy')"
                                                class="btn btn-danger btn-common"><i class="fas fa-trash-alt"></i>Delete</a>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

@endsection
