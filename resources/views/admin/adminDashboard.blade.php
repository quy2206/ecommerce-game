@include('admin.adminHeader')

@include('admin.adminSidebar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="min-height: 80px;">
    <!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Welcome To Admin Page</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard v1</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<section class="content">
    <div class="container-fluid">
            @include('admin.alert')
            @yield('content')
    </div>
</section>
<!-- /.content-wrapper -->
<div>

@include('admin.adminFooter')
