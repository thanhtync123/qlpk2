<!-- Thanh điều hướng -->
<nav class="main-header navbar navbar-expand navbar-dark navbar-info">
    <!-- TODO: Thêm hiệu ứng đánh dấu trang hiện tại (nếu đang ở trang người dùng, đánh dấu liên kết danh sách người dùng bằng màu xanh) -->
    <!-- TODO: Thêm nút chèn khi di chuột qua danh sách bệnh nhân/người dùng -->
    
    <!-- Các liên kết bên trái -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Nút đăng xuất -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link logout" href="{{ route('logout') }}" role="button" title="Đăng xuất">
                <i class="fas fa-sign-out-alt"></i>
            </a>
        </li>
    </ul>
</nav>
<!-- /.Thanh điều hướng -->

<!-- Thanh bên chính -->
<aside class="main-sidebar elevation-4 sidebar-light-primary">
    <!-- Logo thương hiệu -->
    <a href="#" class="brand-link">  
        <img src="{{ asset('images/anhlogo.jpg') }}" alt="Logo AdminLTE" class="brand-image img-circle elevation-3"
            style="max-height: 38px; opacity: .8">
        <span class="brand-text font-weight-light"><b>Phòng Khám Y Khoa</b> </span>
    </a>
    
    <!-- Thanh bên -->
    <div class="sidebar">
        <!-- Menu thanh bên -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Thêm biểu tượng cho các liên kết bằng lớp .nav-icon (Font Awesome hoặc thư viện biểu tượng khác) -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-md"></i>
                        <p>
                            {{ Auth::user()->name }} {{ Auth::user()->lastname }}
                        </p>
                    </a>
                </li>

                {{-- Ẩn với thư ký --}}
                @if (Auth::user()->role->value != \App\Enums\UserRoles::SECRETARY->value)
                    <li class="nav-item">
                        <a href="{{ route('patients.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-plus-circle"></i>
                            <p>Danh sách bệnh nhân</p>
                        </a>
                    </li>
                @endif

                <!-- <li class="nav-item">
                    <a href="{{ route('appointment.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-stethoscope"></i>
                        <p>Danh sách cuộc hẹn</p>
                    </a>
                </li> -->

                {{-- Chỉ hiển thị với quản trị viên --}}
                @if (Auth::user()->role->value == \App\Enums\UserRoles::ADMIN->value)
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Danh sách người dùng</p>
                        </a>
                    </li>
                @endif

            </ul>
        </nav>
        <!-- /.Menu thanh bên -->
    </div>
</aside>
<!-- /.Thanh bên chính -->
