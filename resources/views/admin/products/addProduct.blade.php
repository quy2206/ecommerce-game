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
                            <label for="thumb">Thumbnail</label>
                            <input type="text" class="form-control" name='thumb' id="thumb" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" name='description' id="description" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <input type="text" class="form-control" name='content' id="description" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <input type="text" class="form-control" name='status' id="description" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="qty">Quantity</label>
                            <input type="text" class="form-control" name='qty'  id="description" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" name='price' id="description" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <input type="text" class="form-control" name='status' id="status" placeholder="">
                        </div>
tétss
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
