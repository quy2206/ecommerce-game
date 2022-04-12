@php
$categorySearch = request()->get('category_id') ? request()->get('category_id') : [];
$priceSearch = request()->get('price') ? request()->get('price') : [];
@endphp
<div class="mb-5 border p-3 bg-white section-search">
    <form action="{{ route('index.product') }}" method="GET" id="frm-product-search">
        <input type="hidden" name="per_page" value="10" id="per-page">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Key Word</label>
                    <input type="text" class="form-control" name="keyword" placeholder="key word"
                        value="{{ request()->get('keyword') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <select name="category_id[]" id="choices-multiple-remove-button"
                        class="form-control " multiple>
                        <option value=""></option>
                        @if (!empty($categories))
                            @foreach ($categories as $categoryId => $categoryName)
                                <option value="{{ $categoryId }}"
                                    {{ in_array($categoryId, $categorySearch) ? 'selected' : '' }}>
                                    {{ $categoryName }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="section-filter">
                    <label>Range Pice</label>
                    <ul class="list-unstyled">
                        <li>
                            <input type="checkbox" name="price[]" id="cb-price-1" value="1"
                                {{ in_array(1, $priceSearch) ? 'checked' : null }}>
                            <label for="cb-price-1"> ≤ 99.000 VNĐ</label>
                        </li>
                        <li>
                            <input type="checkbox" name="price[]" id="cb-price-2" value="2"
                                {{ in_array(2, $priceSearch) ? 'checked' : null }}>
                            <label for="cb-price-2"> 100.000 - 199.000 VNĐ</label>
                        </li>
                        <li>
                            <input type="checkbox" name="price[]" id="cb-price-3" value="3"
                                {{ in_array(3, $priceSearch) ? 'checked' : null }}>
                            <label for="cb-price-3"> 200.000 - 399.000 VNĐ</label>
                        </li>
                        <li>
                            <input type="checkbox" name="price[]" id="cb-price-4" value="4"
                                {{ in_array(4, $priceSearch) ? 'checked' : null }}>
                            <label for="cb-price-4"> ≤ 500.000 VNĐ</label>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <p>
            <button type="button" class="btn btn-secondary"
                onclick="window.location.href='{{ route('index.product') }}'"><i class="fas fa-sync-alt"></i>
                Reset</button>
            <button type="submit" class="btn btn-primary" title="Search Product"><i class="fas fa-search"></i>
                Search</button>
        </p>

    </form>
</div>
@push('js')
    <script>
        $(document).ready(function() {

                    var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
                        removeItemButton: true,
                        maxItemCount: 5,
                        searchResultLimit: 5,
                        renderChoiceLimit: 5
                    });
                });
    </script>
@endpush
