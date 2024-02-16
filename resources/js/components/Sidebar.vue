<script setup></script>

<template>
    <!-- Main Sidebar Container -->
    <router-linkside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <router-link to="#" class="brand-link">
            <img src="dist/img/Capture.png" alt="HF Logo" />
            <span class="brand-text font-weight-light"></span>
        </router-link>
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img
                        src="/dist/img/user2-160x160.jpg"
                        class="img-circle elevation-2"
                        alt="User Image"
                    />
                </div>
                <div class="info">
                    <router-link to="#" class="d-block"
                        >Alexander Pierce</router-link
                    >
                </div>
            </div>
            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input
                        class="form-control form-control-sidebar"
                        type="search"
                        placeholder="Search"
                        aria-label="Search"
                    />
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul
                    class="nav nav-pills nav-sidebar flex-column"
                    data-widget="treeview"
                    role="menu"
                    data-accordion="false"
                >
                    <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
                    <li class="nav-item menu-open">
                        <router-link to="dashboard" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="" class="nav-link">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>
                                Role
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </router-link>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <router-link to="" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Roles</p>
                                </router-link>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <router-link to="#" class="nav-link">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>
                                Product
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </router-link>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <router-link to="product" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Product List</p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="product/add" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add Product</p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Sale List</p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add Old Sale</p>
                                </router-link>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <router-link to="#" class="nav-link">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Categories
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </router-link>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <router-link
                                    to="categories/add"
                                    class="nav-link"
                                >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add Category</p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="categories" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Category List</p>
                                </router-link>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <router-link to="#" class="nav-link">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>
                                Bike
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </router-link>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <router-link to="bike/add" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add Bike</p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="bike" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Bike List</p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Bike Sale List</p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link to="" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add Old Bike Sale</p>
                                </router-link>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <router-link to="#" class="nav-link">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Bike Services
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </router-link>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <router-link to="" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>First Service List</p>
                                </router-link>
                                <router-link to="" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Second Service List</p>
                                </router-link>
                                <router-link to="" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Third Service List</p>
                                </router-link>
                                <router-link to="" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Fouth Service List</p>
                                </router-link>
                                <router-link to="" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Fifth Service List</p>
                                </router-link>
                                <router-link to="" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Sixth Service List</p>
                                </router-link>
                                <router-link to="" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Seventh Service List</p>
                                </router-link>
                                <router-link to="" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Eighth Service List</p>
                                </router-link>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <router-link to="#" class="nav-link">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Reports
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </router-link>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <router-link to="" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Sale Reports</p>
                                </router-link>
                                <router-link to="" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Bike Sale Reports</p>
                                </router-link>
                                <router-link to="" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Product Stock Reports</p>
                                </router-link>
                                <router-link to="" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Bike Stock Reports</p>
                                </router-link>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <router-link to="#" class="nav-link">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Income & Expenses
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </router-link>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <router-link to="" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add Expense</p>
                                </router-link>
                                <router-link to="" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Expense List</p>
                                </router-link>
                                <router-link to="" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Expense Report</p>
                                </router-link>
                                <router-link to="" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add Income</p>
                                </router-link>
                                <router-link to="" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Income List</p>
                                </router-link>
                                <router-link to="" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Income Report</p>
                                </router-link>
                                <router-link to="" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Daily Income</p>
                                </router-link>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </router-linkside>
</template>
