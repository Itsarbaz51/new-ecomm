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
<?php /**PATH C:\Users\hp\Desktop\e_commerce\resources\views/admin/admin-profile.blade.php ENDPATH**/ ?>