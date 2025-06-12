<style>
    .icon-user-admin::before {
    content: "\f007"; /* Unicode for a user icon from Font Awesome */
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
}
</style>
<ul class="menu-list">
    <li class="menu-item has-children">
        <a href="javascript:void(0);" class="menu-item-button">
            <div class="icon"><i class="icon-shopping-cart"></i></div>
            <div class="text">Products</div>
        </a>
        <ul class="sub-menu">
            <li class="sub-menu-item">
                <a href="<?php echo e(route('admin.product.add')); ?>" class="">
                    <div class="text">Add Product</div>
                </a>
            </li>
            <li class="sub-menu-item">
                <a href="<?php echo e(route('admin.products')); ?>" class="">
                    <div class="text">Products</div>
                </a>
            </li>
        </ul>
    </li>
    <li class="menu-item has-children">
        <a href="javascript:void(0);" class="menu-item-button">
            <div class="icon"><i class="icon-layers"></i></div>
            <div class="text">Brand</div>
        </a>
        <ul class="sub-menu">
            <li class="sub-menu-item">
                <a href="<?php echo e(route('admin.brand.add')); ?>" class="">
                    <div class="text">New Brand</div>
                </a>
            </li>
            <li class="sub-menu-item">
                <a href="<?php echo e(route('admin.brands')); ?>" class="">
                    <div class="text">Brands</div>
                </a>
            </li>
        </ul>
    </li>
    <li class="menu-item has-children">
        <a href="javascript:void(0);" class="menu-item-button">
            <div class="icon"><i class="icon-layers"></i></div>
            <div class="text">Category</div>
        </a>
        <ul class="sub-menu">
            <li class="sub-menu-item">
                <a href="<?php echo e(route('admin.category.add')); ?>" class="">
                    <div class="text">New Category</div>
                </a>
            </li>
            <li class="sub-menu-item">
                <a href="<?php echo e(route('admin.categories')); ?>" class="">
                    <div class="text">Categories</div>
                </a>
            </li>
        </ul>
    </li>

    <li class="menu-item has-children">
        <a href="javascript:void(0);" class="menu-item-button">
            <div class="icon"><i class="icon-file-plus"></i></div>
            <div class="text">Order</div>
        </a>
        <ul class="sub-menu">
            <li class="sub-menu-item">
                <a href="<?php echo e(route('admin.orders')); ?>" class="">
                    <div class="text">Orders</div>
                </a>
            </li>
            <li class="sub-menu-item">
                <a  href="<?php echo e(route('order.tracking')); ?>"  class="">
                    <div class="text">Order tracking</div>
                </a>
            </li>
        </ul>
    </li>
    <li class="menu-item">
        <a href="<?php echo e(route('admin.slides')); ?>" class="">
            <div class="icon"><i class="icon-image"></i></div>
            <div class="text">Slides</div>
        </a>
    </li>
    <li class="menu-item">
        <a href="<?php echo e(route('admin.coupons')); ?>" class="">
            <div class="icon"><i class="icon-grid"></i></div>
            <div class="text">Coupns</div>
        </a>
    </li>
    <li class="menu-item">
        <a href="<?php echo e(route('admin.contacts')); ?>" class="">
            <div class="icon"><i class="icon-mail"></i></div>
            <div class="text">Messages</div>
        </a>
    </li>

    <li class="menu-item">
        <a href="<?php echo e(route('admin.users')); ?>" class="">
            <div class="icon"><i class="icon-user"></i></div>
            <div class="text">User</div>
        </a>
    </li>

    <li class="menu-item">
        <a href="<?php echo e(route('admin.account.edit', ['id' => Auth::user()->id])); ?>" class="">
            <div class="icon"><i class="icon-user-admin"></i></div>
            <div class="text">Account</div>
        </a>
    </li>
    <li class="menu-item">
        <a href="<?php echo e(route('admin.uses-reviews')); ?>" class="">
            <div class="icon"><i class="icon-star"></i></div>
            <div class="text">Reviews</div>
        </a>
    </li>
    <li class="menu-item">
        <form action="<?php echo e(route('logout')); ?>" id="logout-form" method="post">
            <?php echo csrf_field(); ?>
            <a href="<?php echo e(route('logout')); ?>" class="log"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <div class="logout-text"><i class="icon-log-out"></i></div>
                <div class="">
                    <span class="logout-text">Logout</span>
                </div>
            </a>
        </form>
    </li>
</ul>
<?php /**PATH C:\Users\hp\Desktop\ECOMSELLER\resources\views/admin/admin-nav.blade.php ENDPATH**/ ?>