<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          
          <!-- search form -->
          
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            @if(Auth::guard('admin')->user()->type=="vendor")
            <li class="active treeview">
              <a href="#">         
                <i class="fa fa-dashboard"></i> <span>Vendor Details</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('update-vendor-details/personal')}}"><i class="fa fa-circle-o">
                </i>Personel Details</a></li>
                <li><a href="{{url('update-vendor-details/business')}}"><i class="fa fa-circle-o">
                </i>Business Details</a></li>
                <li><a href="{{url('update-vendor-details/bank')}}"><i class="fa fa-circle-o"></i>Bank Details</a></li>
              </ul>
            </li> 
            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Product Setting</span>
                <span class="label label-primary pull-right">4</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('products')}}"><i class="fa fa-circle-o"></i>Products</a></li>
                <li><a href="{{url('Add-Edit-Product')}}"><i class="fa fa-circle-o"></i>Add Product</a></li>
                
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Orders</span>
                <span class="label label-primary pull-right">4</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('order')}}"><i class="fa fa-circle-o"></i>View Orders</a></li>
           
              </ul>
            </li>


            @else
            <li class="active treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Admin Setting</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="{{url('updateAdminPassword')}}"><i class="fa fa-circle-o">
                </i>Update Password</a></li>
                
              </ul>
            </li>
            <li class="active treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Admin Management</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="{{url('admin/admin')}}"><i class="fa fa-circle-o">
                </i>Admin</a></li>
                <li class="active"><a href="{{url('admin/subadmin')}}"><i class="fa fa-circle-o">
                </i>Sub Admin</a></li>
                <li class="active"><a href="{{url('admin/vendor')}}"><i class="fa fa-circle-o">
                </i>Vendor</a></li>
                <li class="active"><a href="{{url('admin')}}"><i class="fa fa-circle-o">
                </i>View All</a></li>
              </ul>
            </li>
                        <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Product Setting</span>
                <span class="label label-primary pull-right">4</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('Sections')}}"><i class="fa fa-circle-o"></i>Sections</a></li>
                <li><a href="{{url('Categories')}}"><i class="fa fa-circle-o"></i>category</a></li>
                <li><a href="{{url('products')}}"><i class="fa fa-circle-o"></i>Products</a></li>
                <li><a href="{{url('filters')}}"><i class="fa fa-circle-o"></i>Filters</a></li>
                <li><a href="{{url('Add-Edit-Product')}}"><i class="fa fa-circle-o"></i>Add-Product</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Orders</span>
                <span class="label label-primary pull-right">4</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('order')}}"><i class="fa fa-circle-o"></i>View Orders</a></li>
           
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Mockups</span>
                <span class="label label-primary pull-right">4</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('MockupSections')}}"><i class="fa fa-circle-o"></i>mockups-section</a></li>
                <li><a href="{{url('mockupscategories')}}"><i class="fa fa-circle-o"></i>mockups-category</a></li>
                <li><a href="{{url('Add-Edit-MockupProduct')}}"><i class="fa fa-circle-o"></i>Add-Mockups</a></li>
                <li><a href="{{url('Mockuproducts')}}"><i class="fa fa-circle-o"></i>All-mockups</a></li>
                
           
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Events</span>
                <span class="label label-primary pull-right">4</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('EventCategory')}}"><i class="fa fa-circle-o"></i> Event</a></li>
                <li><a href="{{url('Add-EventCategory')}}"><i class="fa fa-circle-o"></i>Add EventCategory</a></li>
                <li><a href="{{url('AllEvent')}}"><i class="fa fa-circle-o"></i>All Event</a></li>
                <li><a href="{{url('Add-Event')}}"><i class="fa fa-circle-o"></i>Add Event</a></li>
                
              </ul>
            </li>
            @endif



            <!--
            <li class="treeview">
              <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>Charts</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
                <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
                <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>UI Elements</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
                <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
                <li><a href="pages/UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
                <li><a href="pages/UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
                <li><a href="pages/UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
                <li><a href="pages/UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Forms</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
                <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
                <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-table"></i> <span>Tables</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
                <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
              </ul>
            </li>
            <li>
              <a href="pages/calendar.html">
                <i class="fa fa-calendar"></i> <span>Calendar</span>
                <small class="label pull-right bg-red">3</small>
              </a>
            </li>
            <li>
              <a href="pages/mailbox/mailbox.html">
                <i class="fa fa-envelope"></i> <span>Mailbox</span>
                <small class="label pull-right bg-yellow">12</small>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Examples</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
                <li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
                <li><a href="pages/examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
                <li><a href="pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
                <li><a href="pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
                <li><a href="pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
                <li><a href="pages/examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
              </ul>
            </li>   -->
            
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>