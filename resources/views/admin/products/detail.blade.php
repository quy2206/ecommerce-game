<div class="modal fade bd-example-modal-xl" id="show_detail" tabindex="-1" role="dialog"
    aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Product Infomation</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-5">
                                <label>Name</label>
                                <input type="text" placeholder="Name"
                                    value="{{ $pro->name }}" class="form-control" disabled>
                            </div>

                            <div class="form-group mb-5">
                                <label>Thumbnail</label><br>
                                <img src="/product_upload/product_thumbnail/{{$pro->thumbnail}}" alt="{{ $pro->name }}"
                                    class="img-fluid">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-5">
                                <label>Quantity:</label>
                                <input type="text" name="quantity" placeholder="Quantity:"
                                    value="{{ $pro->quantity }}" class="form-control" disabled>
                            </div>

                            <div class="form-group mb-5">
                                <label>Category:</label>
                                <input type="text" value="{{ $pro->category->name }}" class="form-control"
                                    disabled>
                            </div>



                            <div class="form-group mb-5">
                                <label>Price:</label>
                                @php
                                    // Get Value of Price
                                    $price = old('price', $pro->price);

                                    // Remove Character Special
                                    // $price = \App\Utils\CommonUtil::removeCharSpecPrice($price);

                                    // Format
                                    $price = empty($price) ? null : number_format($price, 2);
                                @endphp
                                <input type="text" placeholder="price" value="{{ $price }}"
                                    class="form-control" id="price" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-5">
                        <label>Description:</label>
                        <textarea rows="2" class="form-control" disabled>{{ $pro->description }}</textarea>
                    </div>


            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                <a  type="button" href="{{ route('edit.product', $pro->id) }}" class="btn btn-info btn-common"
                    title=""><i class="fas fa-edit"></i>Edit</a>
            </div>
        </div>
    </div>
</div>
