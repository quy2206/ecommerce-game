 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="index3.html" class="brand-link">
         <img src="/adminSide/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
         <span class="brand-text font-weight-light">Shop Manager</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <img src="/adminSide/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
             </div>
             <div class="info">
                 <a href="#" class="d-block">Alexander Pierce</a>
             </div>
         </div>

         <!-- SidebarSearch Form -->
         {{-- <div class="form-inline">
             <div class="input-group" data-widget="sidebar-search">
                 <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                     aria-label="Search">
                 <div class="input-group-append">
                     <button class="btn btn-sidebar">
                         <i class="fas fa-search fa-fw"></i>
                     </button>
                 </div>
             </div>
         </div> --}}

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                 <li class="nav-item menu-open">
                     <a href="#" class="nav-link active">
                         <i class="nav-icon fas fa-tachometer-alt"></i>
                         <p>
                             Home

                         </p>
                     </a>

                 </li>
                 <li class="nav-item">
                     <a href="#" class="nav-link active">
                         <i class="nav-icon fa-brands fa-solid fa-shirt"></i>
                         <p>
                             Product Manage
                             <i class="fas fa-angle-left right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview" style="display: none;">
                         <li class="nav-item">
                             <a href="{{route('index.product')}}" class="nav-link active">

                                 <p>Product List </p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{route('add.product')}}" class="nav-link">

                                 <p>Add Product</p>
                             </a>
                         </li>


                     </ul>
                 </li>
                 <li class="nav-item">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fa-solid fa-gifts"></i>
                        <p>
                            Promotion Manage
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="{{route('index.promotion')}}" class="nav-link">

                                <p>Promotion List </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('add.promotion') }}" class="nav-link">

                                <p>Add Promotion</p>
                            </a>
                        </li>


                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fa-solid fa-list"></i>
                        <p>
                            Categories Manage
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="{{route('index.category')}}" class="nav-link">

                                <p>Category List</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="{{route('add.category')}}" class="nav-link">

                                <p>Add Category</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fa-solid fa-cart-shopping"></i>
                        <p>
                            Order Manage
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="{{route('index.order')}}" class="nav-link">

                                <p>Order List</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{ route('add.promotion') }}" class="nav-link">

                                <p>Add Promotion</p>
                            </a>
                        </li> --}}


                    </ul>
                </li>

             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>
