<div class="dropdown">
    <a href="<?php echo e(route('admin.inbox')); ?>" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2" 
    
        aria-expanded="false">
        <span class="header-item">
            <span class="text-tiny"><?php echo e(\App\Models\Order::where('status', 'Ordered')->count() ? \App\Models\Order::where('status', 'Ordered')->count() : 0); ?></span>
            <i class="icon-bell"></i>
        </span>
    </a>
    
</div>
<?php /**PATH C:\Users\hp\Desktop\ECOMSELLER\resources\views/admin/admin-notification.blade.php ENDPATH**/ ?>