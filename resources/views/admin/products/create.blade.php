@extends('admin.layout.master')

@push('js')
    <script src="/adminSide/dist/js/product/product-list.js"></script>
@endpush
@section('content')
    @include('admin.layout.alert')
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
                            <label for="productName">Product Name <span class="required">(*)</span></label>
                            <input type="text" class="form-control" value="{{ old('name') }}" name='name'
                                id="productName" placeholder="">

                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="category">Category<span class="required">(*)</span></label>
                            <Select class="form-control" name="category_id">
                                @foreach ($cate as $cates)
                                    <option value="{{ $cates->id }}">{{ $cates->name }}</option>
                                @endforeach

                            </Select>
                            @error('category')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="promotion">Promotion</label>
                            <Select class="form-control" name="promotion">

                            </Select>
                        </div>
                        <div class="form-group">
                            <label for="file">Thumbnail<span class="required">(*)</span></label>
                            <input type="file" name="file" id="file" class="form-control " onchange="previewFile(this)">
                            <img src="" id="previewImg" style="max-width:130px; margin-top:20px;">
                            @error('file')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" name="description" id="description" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="summernote">Content<span class="required">(*)</span></label> <br>
                            <textarea name="content" id="summernote">

                            </textarea>

                            @error('summernote')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="text" class="form-control" name='quantity' id="quantity" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="price">Price<span class="required">(*)</span></label>
                            <input type="text" class="form-control" name='price' id="price" placeholder="">
                            @error('price')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
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


        $(document).ready(function() {
            $('#price').priceFormat({
                prefix: 'VNĐ ',
                centsSeparator: '.',
                thousandsSeparator: ','
            });
        });
    </script>
@endsection
