<?php if (isset($component)) { $__componentOriginal91fdd17964e43374ae18c674f95cdaa3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal91fdd17964e43374ae18c674f95cdaa3 = $attributes; } ?>
<?php $component = App\View\Components\AdminLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AdminLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'order-details']); ?>
    <style>
        .table-transaction>tbody>tr:nth-of-type(odd) {
            --bs-table-accent-bg: #fff !important;
        }
    </style>
    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Order Details</h3>
                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                    <li>
                        <a href="<?php echo e(route('admin.index')); ?>">
                            <div class="text-tiny">Dashboard</div>
                        </a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <div class="text-tiny">Order details</div>
                    </li>
                </ul>
            </div>

            <div class="wg-box">
                <div class="flex items-center justify-between gap10 flex-wrap">
                    <div class="wg-filter flex-grow">
                        <h5>Ordered Details</h5>
                    </div>
                    <a class="tf-button style-1 w208" href="<?php echo e(route('admin.orders')); ?>">Back</a>
                </div>
                <div class="table-responsive">
                    <?php if(Session::has('status')): ?>
                        <p class="alert alert-success"><?php echo e(Session::get('status')); ?></p>
                    <?php endif; ?>
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th>Order No</th>
                            <td><?php echo e($order->id); ?></td>
                            <th>Mobile</th>
                            <td><?php echo e($order->phone); ?></td>
                            <th>zip Code</th>
                            <td><?php echo e($order->zip); ?></td>
                        </tr>
                        <tr>
                            <th>Order Date</th>
                            <td><?php echo e($order->created_at); ?></td>
                            <th>Delivered Date</th>
                            <td><?php echo e($order->delivery_date); ?></td>
                            <th>Cancelled Date</th>
                            <td><?php echo e($order->cancelled_date); ?></td>
                        </tr>
                        <tr>
                            <th>Order Status</th>
                            <td colspan="5">
                                <?php if($order->status == 'cancelled'): ?>
                                    <span class="badge bg-danger">Cancelled</span>
                                <?php elseif($order->status == 'delivered'): ?>
                                    <span class="badge bg-success">Delivered</span>
                                <?php else: ?>
                                    <span class="badge bg-warning">Ordered</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="wg-box mt-5">
            <div class="flex items-center justify-between gap10 flex-wrap">
                <div class="wg-filter flex-grow">
                    <h5>Ordered Items</h5>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-center">SKU</th>
                            <th class="text-center">Category</th>
                            <th class="text-center">Brand</th>
                            <th class="text-center">Options (SIZE)</th>
                            <th class="text-center">Return Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>

                                <td class="pname">
                                    <div class="image">
                                        <img src="<?php echo e(asset('storage/uploads/products/thumbnails/' . $item->product->image)); ?>"
                                            alt="<?php echo e($item->product->name); ?>" class="image">
                                    </div>
                                    <div class="name">
                                        <a href="<?php echo e(route('shop.product.details', ['product_slug' => $item->product->slug])); ?>"
                                            target="_blank" class="body-title-2"><?php echo e($item->product->name); ?></a>
                                    </div>
                                </td>
                                
                                <td class="text-center">₹<?php echo e($item->price); ?></td>
                                <td class="text-center"><?php echo e($item->quantity); ?></td>
                                <td class="text-center"><?php echo e($item->product->SKU); ?></td>
                                <td class="text-center"><?php echo e($item->product->category->name); ?></td>
                                <td class="text-center"><?php echo e($item->product->brand->name); ?></td>
                                <td class="text-center"><?php echo e($item->options); ?></td>
                                <td class="text-center"><?php echo e($item->rstatus == 0 ? 'No' : 'Yes'); ?></td>
                                
                                <td class="text-center">
                                    <a href="<?php echo e(route('shop.product.details', ['product_slug' => $item->product->slug])); ?>" class="list-icon-function view-icon">
                                        <div class="item eye">
                                            <i class="icon-eye"></i>
                                        </div>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

            <div class="divider"></div>
            <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
                <?php echo e($orderItems->links('pagination::bootstrap-5')); ?>

            </div>
        </div>

        <div class="wg-box mt-5">
            <h5>Shipping Address</h5>
            <div class="my-account__address-item col-md-6">
                <div class="my-account__address-item__detail">
                    <p><?php echo e($order->name); ?></p>
                    <p><?php echo e($order->address); ?></p>
                    <p><?php echo e($order->locality); ?></p>
                    <p><?php echo e($order->city); ?>, <?php echo e($order->country); ?></p>
                    <p><?php echo e($order->landmark); ?></p>
                    <p><?php echo e($order->zip); ?></p>
                    <br>
                    <p>Mobile : <?php echo e($order->phone); ?></p>
                </div>
            </div>
        </div>

        <div class="wg-box mt-5" style="overflow: auto;">
            <h5>Transactions</h5>
            <table class="table table-striped table-bordered table-transaction " >
                <tbody>
                    <tr>
                        <th>Subtotal</th>
                        <td>₹<?php echo e($order->subtotal); ?></td>
                        <th>Tax</th>
                        <td><?php echo e($order->tax); ?></td>
                        <th>Discount</th>
                        <td><?php echo e($order->discount); ?></td>
                    </tr>
                    <tr>
                        <th>Total</th>
                        <td>₹<?php echo e($order->total); ?></td>
                        <th>Payment Mode</th>
                        <td><?php echo e($transaction->mode); ?></td>
                        <th>Status</th>
                        <td>
                            <?php if($transaction->status == 'pending'): ?>
                                <span class="badge bg-warning">Pending</span>
                            <?php elseif($transaction->status == 'success'): ?>
                                <span class="badge bg-success">Success</span>
                            <?php elseif($transaction->status == 'failed'): ?>
                                <span class="badge bg-secoundary">Failed</span>
                            <?php else: ?>
                                <span class="badge bg-warning">Refunded</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="wg-box mt-5">
            <h5>Update Order Status</h5>
            <form action="<?php echo e(route('admin.order.status.update')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <input type="hidden" name="order_id" value="<?php echo e($order->id); ?>" />
                <div class="row">
                    <div class="col-md-3">
                        <div class="select">
                            <select name="order_status" id="order_status">
                                <option value="ordered" <?php echo e($order->status == 'ordered' ? 'selected' : ''); ?>>Ordered
                                </option>
                                <option value="delivered" <?php echo e($order->status == 'delivered' ? 'selected' : ''); ?>>
                                    Delivered</option>
                                <option value="cancelled" <?php echo e($order->status == 'cancelled' ? 'selected' : ''); ?>>Cancelled
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary tf-button w208">Update Status</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
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
<?php /**PATH C:\Users\hp\Desktop\ECOMSELLER\resources\views/admin/order-details.blade.php ENDPATH**/ ?>