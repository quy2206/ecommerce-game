<div class="mb-2 mt-2 border p-3 bg-white">
    <form action="{{ route('index.promotion') }}" method="GET" id="frm-promotion-search">
        <input type="hidden" name="per_page" value="10" id="per-page">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Promotion Code</label>
                            <input type="text" class="form-control" name="code" value="{{ request()->get('code') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Discount</label>
                            <input type="text" class="form-control" name="discount" value="{{ request()->get('discount') }}">
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Begin Date</label>
                            <input type="text" class="form-control" name="begin_date" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">End Date</label>
                            <input type="text" class="form-control datepicker" name="end_date" value="" autocomplete="off">
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>

        <p>
            <button type="button" class="btn btn-secondary" onclick="window.location.href='{{ route('index.promotion') }}'"><i class="fas fa-sync-alt"></i> Reset</button>
            <button type="submit" class="btn btn-primary" title="Search"><i class="fas fa-search"></i> Search</button>
        </p>
    </form>
</div>
