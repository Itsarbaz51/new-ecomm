<?php if (isset($component)) { $__componentOriginal91fdd17964e43374ae18c674f95cdaa3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal91fdd17964e43374ae18c674f95cdaa3 = $attributes; } ?>
<?php $component = App\View\Components\AdminLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AdminLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'inbox']); ?>
    <style>
        .inbox-container {
            margin-left: 5rem;
            margin-right: 5rem;
            margin-bottom: 30px;
        }

        .inbox-title {
            font-size: 4rem;
            font-weight: bold;
            text-align: start;
            color: #1f2937;
            margin-bottom: 2.5rem;
        }

        .orders-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: space-between;
        }

        .order-card {
            background-color: #f9fafb;
            border-radius: 0.75rem;
            border: 1px solid #e5e7eb;
            padding: 1.25rem;
            display: flex;
            flex-direction: column;
            flex: 1 1 calc(33.333% - 20px);
            transition: box-shadow 0.2s ease;
            box-sizing: border-box;
        }

        .order-card:hover {
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        }

        .order-title {
            font-size: 3rem;
            font-weight: bold;
            color: #1f2937;
            margin-bottom: 0.5rem;
        }

        .order-info {
            font-size: 1.8rem;
            color: #4b5563;
            margin-bottom: 0.25rem;
        }

        .order-info strong {
            font-weight: 600;
        }

        .status-badge {
            font-size: 2rem;
            text-transform: uppercase;
            font-weight: 600;
            padding: 0.9rem 0.5rem;
            border-radius: 0.375rem;
        }

        .status-ordered {
            background-color: #dbeafe;
            color: #1d4ed8;
        }

        .status-delivered {
            background-color: #d1fae5;
            color: #065f46;
        }

        .status-cancelled {
            background-color: #fee2e2;
            color: #991b1b;
        }

        .status-hold {
            background-color: #fef9c3;
            color: #92400e;
        }

        .view-link {
            font-size: 2rem;
            color: #2563eb;
            font-weight: 500;
            padding-top: 12px;
            margin-left: auto;
        }

        .view-link:hover {
            text-decoration: underline;
        }

        .no-orders {
            text-align: center;
            font-size: 1.125rem;
            color: #6b7280;
            margin-top: 5rem;
        }

        .footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 60px;
        }

        /* Responsive Fixes */
        @media (max-width: 1024px) {
            .order-card {
                flex: 1 1 calc(50% - 20px);
            }
        }

        @media (max-width: 768px) {
            .order-card {
                flex: 1 1 100%;
            }
        }
    </style>

    <div class="inbox-container">
        <h1 class="inbox-title">Order Inbox 🆕</h1>

        <?php if($orders->count()): ?>
            <div class="orders-grid">
                <audio id="orderSound" src="<?php echo e(asset('public/assets/sounds/new-order.wav')); ?>" preload="auto"></audio>

                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="order-card">
                        <div>
                            <h2 class="order-title">Order #<?php echo e($order->id); ?></h2>
                            <p class="order-info">👤 User ID: <strong><?php echo e($order->user_id); ?></strong></p>
                            <p class="order-info">📍 City: <strong><?php echo e($order->city); ?></strong></p>
                            <p class="order-info">📍 State: <strong><?php echo e($order->state); ?></strong></p>
                            <p class="order-info">🛒 Total Items: <strong><?php echo e($order->orderitems_count); ?></strong></p>
                            <p class="order-info">💵 Total: <strong>₹<?php echo e($order->total); ?></strong></p>
                            <p class="order-info">🕒 Order time: <strong><?php echo e($order->created_at); ?></strong></p>
                        </div>

                        <div class="footer">
                            <?php if($order->status == 'cancelled'): ?>
                                <span class="badge bg-danger" style="font-size: 18px">Cancelled</span>
                            <?php elseif($order->status == 'delivered'): ?>
                                <span class="badge bg-success" style="font-size: 18px">Delivered</span>
                            <?php else: ?>
                                <span class="badge bg-warning" style="font-size: 18px">Ordered</span>
                            <?php endif; ?>

                            <div style="display: flex; gap: 10px;">
                                <a href="<?php echo e(route('admin.order.details', ['order_id' => $order->id])); ?>"
                                    style="background-color: rgba(0, 0, 0, 0.1); padding: 10px; border-radius: 100%;">
                                    <div class="list-icon-function view-icon">
                                        <div class="item eye">
                                            <i class="icon-eye"></i>
                                        </div>
                                    </div>
                                </a>
                                <a href="javascript:void(0);" title="Remove"
                                    onclick="this.closest('.order-card').remove();"
                                    style="background-color: rgba(0, 0, 0, 0.1); padding: 10px; border-radius: 100%;">
                                    <div class="list-icon-function remove-icon">
                                        <div class="item remove">
                                            <i class="icon-x" style="color: #dc2626;"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php else: ?>
            <div class="no-orders">🚫 No new orders found.</div>
        <?php endif; ?>
    </div>

    <?php if($orders->count()): ?>
        <script>
            window.addEventListener('DOMContentLoaded', function () {
                const sound = document.getElementById('orderSound');

                if (sound && typeof sound.play === 'function') {
                    // Wait for user interaction before playing sound
                    document.body.addEventListener('click', function playOnce() {
                        sound.play().catch(e => {
                            console.log('Autoplay prevented:', e);
                        });
                        document.body.removeEventListener('click', playOnce);
                    });
                }
            });
        </script>
    <?php endif; ?>
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
<?php /**PATH C:\Users\hp\Desktop\ECOMSELLER\resources\views/admin/inbox.blade.php ENDPATH**/ ?>