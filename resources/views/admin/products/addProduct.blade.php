@extends('admin.adminDashboard')
@section('content')
    <div class="row">
        <div class="col-md-10">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Product Manage</h3>
                </div>


                <form action="" method="">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="productName">Product Name</label>
                            <input type="text" class="form-control" name='productName' id="productName"
                                placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <Select class="form-control" name="category">
                                @foreach ($cate as $cates)
                                    <option value="{{ $cates->id }}">{{ $cates->name }}</option>
                                @endforeach

                            </Select>

                        </div>
                        <div class="form-group">
                            <label for="promotion">Promotion</label>
                            <Select class="form-control" name="promotion">

                            </Select>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <input type="text" class="form-control" name='status' id="status" placeholder="">
                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
