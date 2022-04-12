@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="col-md-10">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Product Manage</h3>
                </div>


                <form action="{{route('update.product',$products->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="productName">Product Name</label>
                            <input type="text" class="form-control" value="{{old('name',$products->name)}}"name='name' id="productName" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <Select class="form-control" name="category_id">
                                @foreach ($categories as $id=>$category)
                                    <option value="{{$category->id}}" {{old('category_id',$products->category_id)==$category->id? 'selected':''}}> {{$category->name}}</option>
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
                            <img src="/product_upload/product_thumbnail/{{$products->thumbnail}}" id="previewImg" style="max-width:130px; margin-top:20px;">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" value="{{$products->description}}" name="description" id="description" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="summernote">Content</label> <br>
                            <textarea name="content" id="summernote">
                                {{old('content', $products->content)}}
                            </textarea>


                        </div>

                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="text" class="form-control" value="{{$products->quantity}}"name='quantity' id="quantity" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" value="{{$products->price}}"name='price' id="price" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <input type="text" class="form-control" value="{{$products->status}}" name='status' id="status" placeholder="">
                        </div>

                    </div>

                    <div class="card-footer">
                        <a href="{{ route('index.product') }}" class="btn btn-primary"><i class="fas fa-long-arrow-alt-left"></i> <span class="ml-2">Product List</span></a>
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
