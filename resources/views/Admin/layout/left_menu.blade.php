<div
      class="offcanvas offcanvas-start sidebar-nav bg-dark"
      tabindex="-1"
      id="sidebar"
    >
      <div class="offcanvas-body p-0">
        <nav class="navbar-dark">
          <ul class="navbar-nav">
            <li>
              <a href="{{ route('admin.dashboard') }}" class="nav-link px-3 active">
                <span class="me-2"><i></i></span>
                <span>Trang chủ</span>
              </a>
            </li>
            <li class="my-2"><hr class="dropdown-divider bg-light" /></li>
            <li>
              <a href="{{ route('admin.listcate') }}" class="nav-link px-3 active">
                <span class="me-2"><i></i></span>
                <span>Danh sách danh mục</span>
              </a>
            </li>
             <li class="my-2"><hr class="dropdown-divider bg-light" /></li>
            <li>
              <a href="{{ route('admin.listproduct') }}" class="nav-link px-3 active">
                <span class="me-2"><i></i></span>
                <span>Danh sách sản phẩm</span>
              </a>
            </li>
             <li class="my-2"><hr class="dropdown-divider bg-light" /></li>
             <li>
              <a href="{{ route('admin.addcate') }}" class="nav-link px-3 active">
                <span class="me-2"><i></i></span>
                <span>Thêm danh mục</span>
              </a>
            </li>
            <li class="my-2"><hr class="dropdown-divider bg-light" /></li>
            
            </ul>
        </nav>
      </div>
    </div>