<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
{{--        <div class="user-panel">--}}
{{--            <div class="pull-left image">--}}
{{--                <img src="/backend/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">--}}
{{--            </div>--}}
{{--            <div class="pull-left info">--}}
{{--                <p>Alexander Pierce</p>--}}
{{--                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>--}}
{{--            </div>--}}
{{--        </div>--}}
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li>
                <a href="">
                    <i class="fa fa-calendar"></i> <span>Bảng Điều Khiển</span>
                    <span class="pull-right-container">
            </span>
                </a>
            </li>
            <li class="">
                <a href="{{ route('admin.category.index') }}">
                    <i class="fa fa-folder-open-o"></i> QL Danh Mục
                </a>
            </li>
            <li class="">
                <a href="{{ route('admin.banner.index') }}">
                    <i class="fa fa-photo"></i> QL Banner
                </a>
            </li>
            <li class="">
                <a href="{{ route('admin.product.index') }}">
                    <i class=" fa fa-database"></i> QL Sản Phẩm
                </a>
            </li>
            <li class="">
                <a href="{{ route('admin.blog.index') }}">
                    <i class=" fa fa-database"></i> QL Blogs
                </a>
            </li>
            <li class="">
                <a href="{{ route('admin.vendor.index') }}">
                    <i class="fa fa-align-justify"></i> QL Nhà Cung Cấp
                </a>
            </li>
            <li class="">
                <a href="{{ route('admin.brand.index') }}">
                    <i class="fa fa-id-card"></i> QL Thương Hiệu
                </a>
            </li>
            <li class="">
                <a href="{{ route('admin.order.index') }}">
                    <i class="fa fa-cart-plus"></i><span>Quản lý đơn hàng</span>
                </a>
            </li>
            <li class="">
                <a href="{{route('admin.coupon.index')}}">
                    <i class="fa fa-cart-plus"></i> QL Coupon
                </a>
            </li>
            <li class="">
                <a href="{{route('admin.delivery.index')}}">
                    <i class="fa fa-cart-plus"></i> QL Vận chuyển
                </a>
            </li>

            <li class="">
                <a href="{{ route('admin.article.index') }}">
                    <i class="fa  fa-newspaper-o"></i> QL Tin Tức
                </a>
            </li>
            <li class="">
                <a href="{{ route('admin.setting.index') }}">
                    <i class="fa fa-compress"></i> QL Liên Hệ
                </a>
            </li>
            <li class="">
                <a href="{{ route('admin.user.index') }}">
                    <i class="fa fa-user"></i> QL USER
                </a>
            </li>
            <li class="">
                <a href="{{ route('admin.setting.index') }}">
                    <i class="fa fa-gear"></i> Setting
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
