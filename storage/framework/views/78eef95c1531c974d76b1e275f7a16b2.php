<ul class="account-nav">
    <li><a href="<?php echo e(route('user.index')); ?>" class="menu-link menu-link_us-s">Dashboard</a></li>
    <li><a href="<?php echo e(route('user.orders')); ?>" class="menu-link menu-link_us-s">Orders</a></li>
    <li><a href="<?php echo e(route('user.address')); ?>" class="menu-link menu-link_us-s">Addresses</a></li>
    <li><a href="<?php echo e(route('user.account.details.edit', ['id' => Auth::user()->id])); ?>"
            class="menu-link menu-link_us-s">Account Details</a></li>
    
    <li>
        <form action="<?php echo e(route('logout')); ?>" method="POST" id="logout-form">
            <?php echo csrf_field(); ?>
            <a href="<?php echo e(route('logout')); ?>"
                onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                class="menu-link
                menu-link_us-s" style="color:red;">Logout</a>
        </form>
    </li>

</ul>
<?php /**PATH C:\Users\hp\Desktop\ECOMSELLER\resources\views/user/account-nav.blade.php ENDPATH**/ ?>