   <!--start sidebar-->
   <aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
      <div class="logo-icon">
        <img src="{{ URL::asset('build/images/miliraicon.png') }}" class="logo-img" alt="">
      </div>
      <div class="logo-name flex-grow-1">
        <h5 class="mb-0">Milira Admin</h5>
      </div>
      <div class="sidebar-close">
        <span class="material-icons-outlined">close</span>
      </div>
    </div>
    <div class="sidebar-nav">
        <!--navigation-->
        <ul class="metismenu" id="sidenav">
        <li><a href="{{ url('/admin/dashboard') }}"><i class="bi bi-house-door-fill fs-5 mx-2"></i></i>Dashboard</a>
              </li>
          
          <li>
            <a href="javascript:;" class="has-arrow">
              <div class="parent-icon"><i class="material-icons-outlined">rocket</i>
              </div>
              <div class="menu-title">Sales</div>
            </a>
            <ul>
              <li><a href="{{ url('/admin/orders') }}"><i class="material-icons-outlined">arrow_right</i>Orders</a>
              </li>
              
              <li><a href="{{ url('/widgets-static') }}"><i class="material-icons-outlined">arrow_right</i>Shipments</a>
              </li>
              <li><a href="{{ url('/widgets-static') }}"><i class="material-icons-outlined">arrow_right</i>Invoices</a>
              </li>
              <li><a href="{{ url('/widgets-static') }}"><i class="material-icons-outlined">arrow_right</i>Refunds</a>
              </li>
              <li><a href="{{ url('/widgets-static') }}"><i class="material-icons-outlined">arrow_right</i>Transactions</a>
              </li>
            </ul>
          </li>

          <li>
            <a href="javascript:;" class="has-arrow">
              <div class="parent-icon"><i class="material-icons-outlined">list</i>
              </div>
              <div class="menu-title">Catalog</div>
            </a>
            <ul>
            <li><a href="{{ url('/admin/products/create') }}"><i class="material-icons-outlined">arrow_right</i>Add Product</a>
              </li>
              <li><a href="{{ url('/admin/products/') }}"><i class="material-icons-outlined">arrow_right</i>Products</a>
              </li>
              <li><a href="{{ url('/admin/product_categories/create') }}"><i class="material-icons-outlined">arrow_right</i>Add Categories</a>
              </li>
              <li><a href="{{ url('/admin/product_categories/') }}"><i class="material-icons-outlined">arrow_right</i>Categories</a>
              </li>
              <li><a href="{{ url('/admin/collections/create/') }}"><i class="material-icons-outlined">arrow_right</i>Add Collection</a>
              </li>
              <li><a href="{{ url('/admin/collections/') }}"><i class="material-icons-outlined">arrow_right</i>Collection</a>
              </li>
            </ul>
          </li>

          <li>
            <a href="javascript:;" class="has-arrow">
              <div class="parent-icon"><i class="material-icons-outlined">group</i>
              </div>
              <div class="menu-title">Customers</div>
            </a>
            <ul>
            <li><a href="{{ url('/admin/customers') }}"><i class="material-icons-outlined">arrow_right</i>Customers</a>
              </li>
              <li><a href="{{ url('/admin/customer-details') }}"><i class="material-icons-outlined">arrow_right</i>Customer Details</a>
              </li>
              <li><a href="{{ url('/widgets-static') }}"><i class="material-icons-outlined">arrow_right</i>Reviews</a>
              </li>
            </ul>
          </li>
         </ul>
        <!--end navigation-->
    </div>
  </aside>
<!--end sidebar-->