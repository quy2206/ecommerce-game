<div class="modal fade bd-example-modal-lg" id="detail_promotion{{$key}}" tabindex="-1" role="dialog"
    aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Promotion Infomation</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row mb-2">
                    <div class="col-6 form-group">
                        <label for="">Promotion Code</label>
                        <input type="text" name="name" disabled placeholder="promotion name" value="{{ old('name', $value->name) }}" class="form-control">

                    </div>
                    <div class="col-6 form-group">
                        <label for="">Discount</label>
                        <input type="number" name="discount" disabled value="{{ old('discount', $value->discount) }}" placeholder="discount" class="form-control">

                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-6 form-group">
                        <label for="">Quantity</label>
                        <input type="number" name="quantity" disabled value="{{ old('quantity', $value->quantity) }}" placeholder="quantity" class="form-control">

                    </div>
                    <div class="col-6 form-group">
                        <label for="">Status</label><br>
                        <input type="checkbox" name="status" disabled placeholder="Status" class="" checked value="1">

                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-6 form-group">
                        <label for="">Begin Date</label>
                    <input type="text" name="begin_date" disabled value="{{ old('begin_date', $value->begin_date) }}" placeholder="Begin Date" class="form-control dt-begin-date">

                    </div>

                    <div class="col-6 form-group">
                        <label for="">End Date</label>
                        <input type="text" name="end_date" disabled value="{{ old('end_date', $value->end_date) }}" placeholder="End Date" class="form-control dt-end-date">

                    </div>
                </div>


                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger btn-default" data-bs-dismiss="modal">Close</button>
                </div>


            </div>

        </div>
    </div>
</div>
