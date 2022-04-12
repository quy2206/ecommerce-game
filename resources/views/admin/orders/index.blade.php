@php
$paramRequest = request()->except('page');
@endphp
@extends('admin.layout.master')


@section('title')
    <h1 class="m-0"></h1>
@endsection

@section('content')
    @include('admin.orders._search')
    @include('admin.orders._table')
    @include('admin.orders._form_update_status')
@endsection
@push('js')
    @include('admin.orders._ajax_update_status')
    <script>
        function processOrderDetail(that, orderId) {
            if ($(that).hasClass('fa-chevron-up')) {
                $('.order-' + orderId).show();

                // Remove Class And Add Class
                $(that).removeClass('fa-chevron-up fa-chevron-down')
                    .addClass('fa-chevron-down');
            } else {
                $('.order-' + orderId).hide();

                // Remove Class And Add Class
                $(that).removeClass('fa-chevron-up fa-chevron-down')
                    .addClass('fa-chevron-up');
            }
        }
    </script>
@endpush
