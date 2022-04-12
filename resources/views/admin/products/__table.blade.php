<div class="d-flex justify-content-between">
    <div>
        <div class="d-inline-block"><a href="{{ route('add.product') }}" class="btn btn-primary"><i
                    class="fas fa-plus"></i>Add Product</a></div>
        <select name="per_page" onChange="submitFilterProduct(this)" class="d-inline-block ml-2 form-control-custom">
            <option value="10" {{ request()->per_page == 10 ? 'selected' : '' }}>10</option>
            <option value="50" {{ request()->per_page == 50 ? 'selected' : '' }}>50</option>
            <option value="100" {{ request()->per_page == 100 ? 'selected' : '' }}>100</option>
            <option value="200" {{ request()->per_page == 200 ? 'selected' : '' }}>200</option>
        </select>&nbsp;
        <label for="">Sản phẩm hiển thị mỗi trang</label>

    </div>
    <div>
        {{ $products->links() }}
    </div>
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
                    <th width="300px">Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($products as $key => $pro)
                    <tr id="sid{{ $pro->id }}">
                        <td>{{ $key+1 }}</td>
                        <td><img src="/product_upload/product_thumbnail/{{ $pro->thumbnail }}" alt=""
                                class="img-fluid" style="width: 100px; height: auto "></td>
                        <td>{{ $pro->name }}</td>
                        <td>{{ $pro->category_name }}</td>
                        <td>{{ $pro->quantity }}</td>
                        <td>{{ formatPrice($pro->price) }}</td>


                        <td style="display: flex; gap:5px">
                            <button type="button" data-bs-toggle="modal"  data-bs-target="#show_detail" class="btn btn-primary btn-common " title=""><i
                                    class="fas fa-search-plus"></i>View
                            </button>
                            <a href="{{ route('edit.product', $pro->id) }}" class="btn btn-info btn-common"
                                title=""><i class="fas fa-edit"></i>Edit</a>
                            <form action="" class="frm-product-delete">
                                @csrf
                                @method('DELETE')
                                <button onclick="deleteRow({{ $pro->id }},'product/destroy')"
                                    class="btn btn-danger btn-common">
                                    <i class="fas fa-trash-alt"></i>Delete</button>

                            </form>
                        </td>
                    </tr>
                    @include('admin.products.detail')
                @endforeach
            </tbody>
        </table>
    </div>
</div>
