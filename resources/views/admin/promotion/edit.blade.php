<div class="modal fade bd-example-modal-lg" id="edit_promotion{{$key}}" tabindex="-1" role="dialog"
    aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Promotion Edit</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{ route('update.promotion',$value->id) }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="code">Code</label>
                            <input type="text" class="form-control" name='code' id="code" value="{{$value->code}}" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="type">Type</label>
                            <select name="type" id="type">
                                <option value="{{ $value->type }}" {{ in_array($value->type, ['percent,money']) ? 'selected' :'' }}>{{ $value->type }}</option>
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="discount">Discount</label>
                            <input type="text" class="form-control" value="{{ old('discount', $value->discount) }}" name='discount' id="discount" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="beginDate">Begin Date</label>
                            <div class="input-group date" id="beginDate" data-target-input="nearest">
                                <input type="text" name="begin_date" class="form-control datetimepicker-input"
                                    data-target="#beginDate" value="{{ old('beginDate', $value->begin_date) }}" >
                                <div class="input-group-append" data-target="#beginDate" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="endDate">End Date</label>
                            <div class="input-group date" id="endDate" data-target-input="nearest">
                                <input type="text" name="end_date" class="form-control datetimepicker-input"
                                    data-target="#endDate" value="{{ old('endDate', $value->end_date) }}">
                                <div class="input-group-append" data-target="#endDate" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" class="form-control" value="{{ old('quantity', $value->quantity) }}" name='quantity' id="quantity" placeholder="">
                            @error('quantity')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="quantity">Stauts</label>
                            <input type="text" class="form-control" name='status' id="status" checked value="1">
                            @error('status')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                        </div>

                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger btn-default" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
