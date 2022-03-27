@extends('admin.layout.master')
@push('js')
<script src="/adminSide/dist/js/product/product-list.js"></script>
@endpush
@section('content')
    <div class="row">
        <div class="col-md-10">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Product Manage</h3>
                </div>


                <form action="{{ route('store.product') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="productName">Product Name</label>
                            <input type="text" class="form-control" value="{{old('name')}}" name='name' id="productName" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <Select class="form-control" name="category_id">
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
                            <label for="file">Thumbnail</label>
                            <input type="file" name="file" id="file" class="form-control " onchange="previewFile(this)">
                            <img src="" id="previewImg" style="max-width:130px; margin-top:20px;">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" name="description" id="description" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="summernote">Content</label> <br>
                            <textarea name="content" id="summernote">

                            </textarea>


                        </div>

                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="text" class="form-control" name='quantity' id="quantity" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" class="form-control"  name='price' id="price" placeholder="">
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
@section('javascript')
    <script>
        function previewFile(input) {
            var file = $("input[type=file]").get(0).files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function() {
                    $('#previewImg').attr("src", reader.result);
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
@endsection
