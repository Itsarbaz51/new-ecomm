<style>
    .order-wrapper {
        /* max-width: 800px; */
        /* margin: 40px auto; */
        /* padding: 0 24px; */
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    
    .alert-error {
        background: #fee2e2;
        border: 1px solid #fca5a5;
        color: #b91c1c;
        padding: 12px 16px;
        border-radius: 8px;
        margin-bottom: 24px;
    }
    
    .tracking-card {
        /* background: #fff; */
        border-radius: 12px;
        padding: 24px;
        /* box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08); */
    }
    
    .card-title {
        font-size: 20px;
        margin-bottom: 20px;
        font-weight: 600;
        color: #1f2937;
    }
    
    .tracking-form {
        display: flex;
        gap: 12px;
        align-items: flex-end;
        flex-wrap: wrap;
        background-color: white;
        width: 50%;
        padding: 20px;
    }
    
    .tracking-form input {
        flex: 1;
        padding: 10px 12px;
        border: 1px solid #d1d5db;
        border-radius: 6px;
        font-size: 16px;
    }
    
    .btn-track {
        padding: 12px 20px;
        background: #2563eb;
        color: white;
        font-weight: 600;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background 0.3s ease;
    }
    
    .btn-track:hover {
        background: #1e3a8a;
        color: white;
    }
    
    .order-details {
        background: #fff;
        margin: 40px 20px;
        padding: 24px;
        border-left: 4px solid #3b82f6;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    }
    
    .horizontal-details {
        display: flex;
        justify-content: space-between;
        gap: 30px;
        flex-wrap: wrap;
    }
    
    .order-summary,
    .shipping-info {
        flex: 1 1 45%;
    }
    
    .order-details h3 {
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 16px;
    }
    
    .status-badge {
        padding: 4px 10px;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 500;
        text-transform: capitalize;
    }
    
    .status-badge::before {
        content: "● ";
        font-size: 12px;
    }
    
    .status-badge:contains("Delivered"),
    .delivered .status-badge {
        background-color: #dcfce7;
        color: #15803d;
    }
    
    .status-badge:contains("Cancelled"),
    .cancelled .status-badge {
        background-color: #fee2e2;
        color: #dc2626;
    }
    
    .status-badge:not(.delivered):not(.cancelled) {
        background-color: #f3f4f6;
        color: #374151;
    }
    
    .shipping-info h4 {
        margin-bottom: 10px;
        font-size: 16px;
        font-weight: 600;
    }
    
    @media (max-width: 640px) {
        .tracking-form {
            flex-direction: column;
        }
    
        .horizontal-details {
            flex-direction: column;
        }
    
        .order-summary,
        .shipping-info {
            flex: 1 1 100%;
        }
    }
    </style>
    
<?php if (isset($component)) { $__componentOriginal91fdd17964e43374ae18c674f95cdaa3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal91fdd17964e43374ae18c674f95cdaa3 = $attributes; } ?>
<?php $component = App\View\Components\AdminLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AdminLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Order Tracking']); ?>
    <div class="order-wrapper">
        <?php if(session('error')): ?>
            <div class="alert-error">
                <strong>Oops! </strong>
                <span><?php echo e(session('error')); ?></span>
            </div>
        <?php endif; ?>
    
        <div class="tracking-card">
            <h2 class="card-title">🔍 Track Your Order</h2>
    
            <form action="<?php echo e(route('track')); ?>" method="GET" class="tracking-form horizontal-form">
                <input type="number" name="order_id" id="order_id" placeholder="Enter your Order ID" required>
                <button type="submit" class="btn-track">Track</button>
            </form>
        </div>
    
        <?php if(session('order')): ?>
            <?php $order = session('order'); ?>
    
            <div class="order-details horizontal-details">
                <div class="order-summary">
                    <h3>📦 Order Details</h3>
                    <p><strong>Status:</strong> <span class="status-badge"><?php echo e(ucfirst($order->status)); ?></span></p>
    
                    <?php if($order->status == 'delivered'): ?>
                        <p class="delivered"><strong>Delivered on:</strong> <?php echo e($order->delivery_date); ?></p>
                    <?php elseif($order->status == 'cancelled'): ?>
                        <p class="cancelled"><strong>Cancelled on:</strong> <?php echo e($order->cancelled_date); ?></p>
                    <?php endif; ?>
                </div>
    
                <div class="shipping-info">
                    <h4>🚚 Shipping Address</h4>
                    <p><?php echo e($order->name); ?>, <?php echo e($order->phone); ?></p>
                    <p><?php echo e($order->address); ?>, <?php echo e($order->city); ?>, <?php echo e($order->state); ?></p>
                    <p><?php echo e($order->country); ?> - <?php echo e($order->zip); ?></p>
                </div>
            </div>
        <?php endif; ?>
    </div>
    
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal91fdd17964e43374ae18c674f95cdaa3)): ?>
<?php $attributes = $__attributesOriginal91fdd17964e43374ae18c674f95cdaa3; ?>
<?php unset($__attributesOriginal91fdd17964e43374ae18c674f95cdaa3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal91fdd17964e43374ae18c674f95cdaa3)): ?>
<?php $component = $__componentOriginal91fdd17964e43374ae18c674f95cdaa3; ?>
<?php unset($__componentOriginal91fdd17964e43374ae18c674f95cdaa3); ?>
<?php endif; ?>
<?php /**PATH C:\Users\hp\Desktop\ECOMSELLER\resources\views/admin/order-tracking.blade.php ENDPATH**/ ?>