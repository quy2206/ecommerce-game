@extends('admin.adminDashboard')
@section('content')
    <div class="row">
        <div class="col-md-10">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add Promotion</h3>
                </div>


                <form action="{{ route('store.promotion') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="code">Code</label>
                            <input type="text" class="form-control" name='code' id="code" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="type">Type</label>
                            <input type="text" class="form-control" name='type' id="type" placeholder="money">
                        </div>
                        <div class="form-group">
                            <label for="discount">Discount</label>
                            <input type="text" class="form-control" name='discount' id="discount" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="beginDate">Begin Date</label>
                            <div class="input-group date" id="beginDate" data-target-input="nearest">
                                <input type="text" name="begin_date" class="form-control datetimepicker-input"
                                    data-target="#beginDate">
                                <div class="input-group-append" data-target="#beginDate"
                                    data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="endDate">End Date</label>
                            <div class="input-group date" id="endDate" data-target-input="nearest">
                                <input type="text" name="end_date" class="form-control datetimepicker-input"
                                    data-target="#endDate">
                                <div class="input-group-append" data-target="#endDate"
                                    data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" class="form-control" name='quantity' id="quantity" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="quantity">Stauts</label>
                            <input type="text" class="form-control" name='status' id="status" placeholder="1">
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
