<style>
    .logout {
        font: 900;
        font-size: 15px;
        display: flex;
        gap: 13px;
    }
</style>
<div class="dropdown">
    <?php if(Auth::user()->utype === 'Admin'): ?>
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton3" data-bs-toggle="dropdown"
            aria-expanded="false">
            <span class="header-user wg-user">
                <span class="image">
                    <?php if(Auth::user()->image): ?>
                        <img src="<?php echo e(asset('storage/uploads/adminImage/' . Auth::user()->image)); ?>" alt="Admin Image" />
                    <?php else: ?>
                        <img src="<?php echo e(asset('images/default-admin-image.png')); ?>" alt="Default Avatar" />
                    <?php endif; ?>
                </span>
                <span class="flex flex-column">
                    <span class="body-title mb-2"><?php echo e(Auth::user()->name); ?></span>
                    <span class="text-tiny"><?php echo e(Auth::user()->utype); ?></span>
                </span>
            </span>
        </button>
    <?php endif; ?>
    <ul class="dropdown-menu dropdown-menu-end has-content" aria-labelledby="dropdownMenuButton3">
        <li>
            <a href="<?php echo e(route('admin.account.edit', ['id' => Auth::user()->id])); ?>" class="user-item">
                <div class="icon">
                    <i class="icon-user"></i>
                </div>
                <div class="body-title-2">Account</div>
            </a>
        </li>
        <li>
            <a href="<?php echo e(route('admin.inbox')); ?>" class="user-item">
                <div class="icon">
                    <i class="icon-mail"></i>
                </div>
                <div class="body-title-2">Inbox</div>
                <div class="number">
                    <?php echo e(\App\Models\Order::where('status', 'Ordered')->count() ? \App\Models\Order::where('status', 'Ordered')->count() : 0); ?>

                </div>
            </a>
        </li>
        
        
        <li>
            <form action="<?php echo e(route('logout')); ?>" id="logout-form" method="post">
                <?php echo csrf_field(); ?>
                <a href="<?php echo e(route('logout')); ?>" class="logout"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <div class="logout logout-text"><i class="icon-log-out"></i></div>
                    <div class="logout logout-text">
                        <span>Logout</span>
                    </div>
                </a>
            </form>
        </li>
    </ul>
</div>
<?php /**PATH C:\Users\hp\Desktop\ECOMSELLER\resources\views/admin/admin-profile.blade.php ENDPATH**/ ?>