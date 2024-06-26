<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>

            <!-- Admin Setting -->
            <li class="treeview @if(request()->is('updateAdminPassword')) active @endif">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Admin Setting</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="@if(request()->is('updateAdminPassword')) active @endif">
                        <a href="{{ url('updateAdminPassword') }}">
                            <i class="fa fa-circle-o"></i> Update Password
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Admin Management -->
            <li class="treeview @if(request()->is('admin*')) active @endif">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Admin Management</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="@if(request()->is('admin/admin')) active @endif">
                        <a href="{{ url('admin/admin') }}">
                            <i class="fa fa-circle-o"></i> Admin
                        </a>
                    </li>
                    <li class="@if(request()->is('admin/subadmin')) active @endif">
                        <a href="{{ url('admin/subadmin') }}">
                            <i class="fa fa-circle-o"></i> Sub Admin
                        </a>
                    </li>
                    <li class="@if(request()->is('admin/vendor')) active @endif">
                        <a href="{{ url('admin/vendor') }}">
                            <i class="fa fa-circle-o"></i> Vendor
                        </a>
                    </li>
                    <li class="@if(request()->is('admin')) active @endif">
                        <a href="{{ url('admin') }}">
                            <i class="fa fa-circle-o"></i> View All
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Product Setting -->
            <li class="treeview @if(request()->is('Sections') || request()->is('Categories') || request()->is('Products') || request()->is('Filters') || request()->is('Add-Edit-Product') || request()->is('business-category*') || request()->is('supplier-category*') || request()->is('freelance-category*')) active @endif">
                <a href="#">
                    <i class="fa fa-files-o"></i>
                    <span>Product Setting</span>
                    <span class="label label-primary pull-right">4</span>
                </a>
                <ul class="treeview-menu">
                    <li class="@if(request()->is('Sections')) active @endif">
                        <a href="{{ url('Sections') }}">
                            <i class="fa fa-list"></i> Sections
                        </a>
                    </li>
                    <li class="@if(request()->is('Categories')) active @endif">
                        <a href="{{ url('Categories') }}">
                            <i class="fa fa-book"></i> Categories
                        </a>
                    </li>
                    <li class="@if(request()->is('Products')) active @endif">
                        <a href="{{ url('Products') }}">
                            <i class="fa fa-cube"></i> Products
                        </a>
                    </li>
                    <li class="@if(request()->is('Filters')) active @endif">
                        <a href="{{ url('Filters') }}">
                            <i class="fa fa-filter"></i> Filters
                        </a>
                    </li>
                    <li class="@if(request()->is('Add-Edit-Product')) active @endif">
                        <a href="{{ url('Add-Edit-Product') }}">
                            <i class="fa fa-plus"></i> Add Product
                        </a>
                    </li>
                    <li class="@if(request()->is('business-category*')) active @endif">
                        <a href="{{ route('business-category.index') }}">
                            <i class="fa fa-building"></i> Business Category
                        </a>
                    </li>
                    <li class="@if(request()->is('supplier-category*')) active @endif">
                        <a href="{{ route('supplier-category.index') }}">
                            <i class="fa fa-truck"></i> Supplier Category
                        </a>
                    </li>
                    <li class="@if(request()->is('freelance-category*')) active @endif">
                        <a href="{{ route('freelance-category.index') }}">
                            <i class="fa fa-briefcase"></i> Freelance Category
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Orders -->
            <li class="treeview @if(request()->is('order*')) active @endif">
                <a href="#">
                    <i class="fa fa-files-o"></i>
                    <span>Orders</span>
                    <span class="label label-primary pull-right">4</span>
                </a>
                <ul class="treeview-menu">
                    <li class="@if(request()->is('order')) active @endif">
                        <a href="{{ url('order') }}">
                            <i class="fa fa-circle-o"></i> View Orders
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Mockups -->
            <li class="treeview @if(request()->is('MockupSections') || request()->is('mockupscategories') || request()->is('Add-Edit-MockupProduct') || request()->is('Mockuproducts')) active @endif">
                <a href="#">
                    <i class="fa fa-files-o"></i>
                    <span>Mockups</span>
                    <span class="label label-primary pull-right">4</span>
                </a>
                <ul class="treeview-menu">
                    <li class="@if(request()->is('MockupSections')) active @endif">
                        <a href="{{ url('MockupSections') }}">
                            <i class="fa fa-circle-o"></i> Mockups Section
                        </a>
                    </li>
                    <li class="@if(request()->is('mockupscategories')) active @endif">
                        <a href="{{ url('mockupscategories') }}">
                            <i class="fa fa-circle-o"></i> Mockups Category
                        </a>
                    </li>
                    <li class="@if(request()->is('Add-Edit-MockupProduct')) active @endif">
                        <a href="{{ url('Add-Edit-MockupProduct') }}">
                            <i class="fa fa-circle-o"></i> Add Mockups
                        </a>
                    </li>
                    <li class="@if(request()->is('Mockuproducts')) active @endif">
                        <a href="{{ url('Mockuproducts') }}">
                            <i class="fa fa-circle-o"></i> All Mockups
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Events -->
            <li class="treeview @if(request()->is('EventCategory*') || request()->is('AllEvent*') || request()->is('Add-EventCategory*') || request()->is('Add-Event*')) active @endif">
                <a href="#">
                    <i class="fa fa-files-o"></i>
                    <span>Events</span>
                    <span class="label label-primary pull-right">4</span>
                </a>
                <ul class="treeview-menu">
                    <li class="@if(request()->is('EventCategory*')) active @endif">
                        <a href="{{ url('EventCategory') }}">
                            <i class="fa fa-circle-o"></i> Event Categories
                        </a>
                    </li>
                    <li class="@if(request()->is('Add-EventCategory*')) active @endif">
                        <a href="{{ url('Add-EventCategory') }}">
                            <i class="fa fa-circle-o"></i> Add Event Category
                        </a>
                    </li>
                    <li class="@if(request()->is('AllEvent*')) active @endif">
                        <a href="{{ url('AllEvent') }}">
                            <i class="fa fa-circle-o"></i> All Events
                        </a>
                    </li>
                    <li class="@if(request()->is('Add-Event*')) active @endif">
                        <a href="{{ url('Add-Event') }}">
                            <i class="fa fa-circle-o"></i> Add Event
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
    </section>
</aside>
