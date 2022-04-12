@extends('admin.layout.master')
@section('title')
    <h1 class="m-0">{{ $title }}</h1>
@endsection
@section('content')
    @include('admin.products._search')
    
    @include('admin.products.__table')

@endsection
@push('js')
    <script>
        function submitFilterProduct(that) {
            // Get value of per_page
            var perPage = $(that).val();

            // Set value for input hidden
            $('#per-page').val(perPage);

            // Trigger submit form
            // $('#frm-product-search').submit();
        }

    });

    </script>
@endpush
