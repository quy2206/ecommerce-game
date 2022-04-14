<div class="d-flex justify-content-between">
    <div>
        <div class="d-inline-block"><a href="{{ route('add.promotion') }}" class="btn btn-primary"><i
                    class="fas fa-plus"></i>Add Promotion</a></div>
        <select name="per_page" onChange="submitFilterProduct(this)" class="d-inline-block ml-2 form-control-custom">
            <option value="10" {{ request()->per_page == 10 ? 'selected' : '' }}>10</option>
            <option value="50" {{ request()->per_page == 50 ? 'selected' : '' }}>50</option>
            <option value="100" {{ request()->per_page == 100 ? 'selected' : '' }}>100</option>
            <option value="200" {{ request()->per_page == 200 ? 'selected' : '' }}>200</option>
        </select>&nbsp;
        <label for="">record per page</label>
    </div>
    <div>
        {{ $promotions->links() }}
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <table id="product-table" class="table table-bordered data-table">
            <thead class="bg-success">
                <tr>
                    <th width="auto">No</th>
                    <th width="auto">Code</th>
                    <th width="auto">Discount</th>
                    <th width="auto">Begin Day</th>
                    <th width="auto">End Day</th>

                    <th width="300px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($promotions as $key => $value)
                    <tr id="sid{{ $value->id }}">
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $value->code }}</td>
                        @if ($value->type == 'percent')
                            <td>{{ $value->discount }}%</td>
                        @else
                            <td>{{ formatPrice($value->discount) }}</td>
                        @endif

                        <td>{{ $value->begin_date }}</td>
                        <td>{{ $value->end_date }}</td>
                        <td style="display: flex; gap:5px">
                            <button class="btn btn-primary btn-common" data-bs-toggle="modal"
                                data-bs-target="#detail_promotion{{ $key }}" title=""><i
                                    class="fas fa-search-plus"></i>View
                            </button>

                            <button data-bs-toggle="modal" data-bs-target="#edit_promotion{{ $key }}"
                                class="btn btn-info btn-common" title=""><i class="fas fa-edit"></i>Edit</button>
                            <form action="" class="frm-product-delete">
                                @csrf
                                @method('DELETE')
                                <button onclick="deleteRow({{ $value->id }},'promotion/destroy')"
                                    class="btn btn-danger btn-common">
                                    <i class="fas fa-trash-alt"></i>Delete</button>

                            </form>
                        </td>
                    </tr>
                    @include('admin.promotion.detail')
                    @include('admin.promotion.edit')
                @endforeach

            </tbody>
        </table>
    </div>
</div>
