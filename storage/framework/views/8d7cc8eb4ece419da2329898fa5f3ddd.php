<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Chekout']); ?>
    <main class="pt-90">
        <div class="mb-4 pb-4"></div>
        <section class="shop-checkout container">
            <h2 class="page-title">Shipping and Checkout</h2>
            <div class="flex justify-between items-start mb-10">
                <div class="w-full flex gap-4 text-sm text-gray-600">
                    <div class="flex-1 text-center  border-b-2 border-gray-300 pb-2">
                        <p class="font-semibold text-black">01. Shopping Bag</p>
                        <p class="text-xs">Manage Your Items List</p>
                    </div>
                    <div class="flex-1 text-center border-b-4 border-red-600 pb-2">
                        <p>02. Shipping and Checkout</p>
                        <p class="text-xs">Checkout Your Items</p>
                    </div>
                    <div class="flex-1 text-center border-b-2 border-gray-300 pb-2">
                        <p>03. Confirmation</p>
                        <p class="text-xs">Review and Submit</p>
                    </div>
                </div>
            </div>
            <form name="checkout-form" action="<?php echo e(route('cart.place.an.order')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="checkout-form">
                    <div class="billing-info__wrapper">
                        <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4 mb-6">
                            <h4 class="text-lg font-semibold uppercase tracking-wide">Shipping Details</h4>

                            <a href="<?php echo e(route('user.address.edit', ['id' => $address->id])); ?>"
                                class="inline-block bg-red-600 hover:bg-red-700 text-white text-sm px-4 py-2 rounded shadow transition">
                                Edit Address
                            </a>
                        </div>

                        
                        <?php if($address): ?>
                        <div class="row">

                            <div class="col-md-12">
                                <div class="my-account__address-list">
                                    <div class="my-account__address-list-item">
                                        <div class="my-account__address-list__detail">
                                            <p><?php echo e($address->name); ?></p>
                                            <p><?php echo e($address->address); ?></p>
                                            <p><?php echo e($address->landmark); ?></p>
                                            <p><?php echo e($address->city); ?>, <?php echo e($address->state); ?>, <?php echo e($address->country); ?>

                                            </p>
                                            <p><?php echo e($address->zip); ?></p>
                                            <br />
                                            <p><?php echo e($address->phone); ?></p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php else: ?>
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <div class="my-3">
                                    <label class="font-semibold" for="name" class="form-label">Full Name *</label>
                                    <input type="text" class="form-control" name="name" required=""
                                        value="<?php echo e(old('name')); ?>" placeholder="Full Name" />
                                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="my-3">
                                    <label class="font-semibold" for="phone">Phone Number *</label>
                                    <input placeholder="Phone" type="text" class="form-control" name="phone" required=""
                                        value="<?php echo e(old('phone')); ?>" placeholder="Phone" />
                                    <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="my-3">
                                    <label class="font-semibold" for="zip">Pincode *</label>
                                    <input placeholder="Pincode" type="text" class="form-control" name="zip" required=""
                                        value="<?php echo e(old('zip')); ?>">
                                    <?php $__errorArgs = ['zip'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mt-3 mb-3">
                                    <label class="font-semibold" for="state">State *</label>
                                    <input placeholder="State" type="text" class="form-control" name="state" required=""
                                        value="<?php echo e(old('state')); ?>">
                                    <?php $__errorArgs = ['state'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="my-3">
                                    <label class="font-semibold" for="city">Town / City *</label>
                                    <input placeholder="Town / City" type="text" class="form-control" name="city"
                                        required="" value="<?php echo e(old('city')); ?>">
                                    <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="my-3">
                                    <label class="font-semibold" for="address">House no, Building Name *</label>
                                    <input placeholder="House no, Building Name" type="text" class="form-control"
                                        name="address" required="" value="<?php echo e(old('address')); ?>">
                                    <?php $__errorArgs = ['locality'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="my-3">
                                    <label class="font-semibold" for="locality">Road Name, Area, Colony *</label>
                                    <input placeholder="Road Name, Area, Colony" type="text" class="form-control"
                                        name="locality" required="" value="<?php echo e(old('locality')); ?>">
                                    <?php $__errorArgs = ['locality'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="my-3">
                                    <label class="font-semibold" for="landmark" class="font-semibold">Landmark *</label>
                                    <input placeholder="Landmark" type="text" class="form-control" name="landmark"
                                        required="" value="<?php echo e(old('landmark')); ?>">
                                    <?php $__errorArgs = ['landmark'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="checkout__totals-wrapper">
                        <div class="sticky-content">
                            <div class="checkout__totals">
                                <h3>Your Order</h3>
                                <table class="checkout-cart-items">
                                    <thead>
                                        <tr>
                                            <th>PRODUCT</th>
                                            <th align="right">SUBTOTAL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = Cart::instance('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <?php echo e($item->name); ?> x <?php echo e($item->qty); ?>

                                            </td>
                                            <td align="right">
                                                ₹<?php echo e($item->subtotal()); ?>

                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                                <?php if(Session::has('discount')): ?>
                                <table class="checkout-totals">
                                    <tbody>
                                        <tr>
                                            <th>Subtotal</th>
                                            <td class="text-right">₹<?php echo e(Cart::instance('cart')->subtotal()); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Discount <?php echo e(Session::get('coupon')['code']); ?></th>
                                            <td class="text-right">₹<?php echo e(Session::get('discount')['discount']); ?>

                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Subtotal After Discount</th>
                                            <td class="text-right">₹<?php echo e(Session::get('discount')['subtotal']); ?>

                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Shipping</th>
                                            <td class="text-right">Free</td>
                                        </tr>
                                        <tr>
                                            <th>VAT</th>
                                            <td class="text-right">₹<?php echo e(Session::get('discount')['tax']); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Total</th>
                                            <td class="text-right">₹<?php echo e(Session::get('discount')['total']); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <?php else: ?>
                                <table class="checkout-totals">
                                    <tbody>
                                        <tr>
                                            <th>SUBTOTAL</th>
                                            <td class="text-right">₹<?php echo e(Cart::instance('cart')->subtotal()); ?></td>
                                        </tr>
                                        <tr>
                                            <th>SHIPPING</th>
                                            <td class="text-right">Free shipping</td>
                                        </tr>
                                        <tr>
                                            <th>VAT</th>
                                            <td class="text-right">₹<?php echo e(Cart::instance('cart')->tax()); ?></td>
                                        </tr>
                                        <tr>
                                            <th>TOTAL</th>
                                            <td class="text-right">₹<?php echo e(Cart::instance('cart')->total()); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <?php endif; ?>
                            </div>
                            <div class="checkout__payment-methods">

                                <div class="form-check">
                                    <input class="form-check-input form-check-input_fill" style="cursor: pointer;"
                                        type="radio" name="mode" id="mode1" value="razorpay" required>
                                    <label class="form-check-label" for="mode1" style="cursor: pointer;">
                                        Online Payment (Razorpay)
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input form-check-input_fill" style="cursor: pointer;"
                                        type="radio" name="mode" id="mode3" value="cod">
                                    <label class="form-check-label" for="mode3" style="cursor: pointer;">
                                        Cash on Delivery
                                    </label>
                                </div>


                                <div class="policy-text">
                                    Your personal data will be used to process your order, support your experience
                                    throughout this
                                    website, and for other purposes described in our <a href="terms.html"
                                        target="_blank">privacy
                                        policy</a>.
                                </div>
                            </div>
                            <button class="btn-main btn-checkout">PLACE ORDER</button>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </main>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    const razorpayRadio = document.getElementById('mode1');
    const checkoutForm = document.querySelector('form[name="checkout-form"]');

    checkoutForm.addEventListener('submit', async function(e) {
        if (razorpayRadio.checked) {
            e.preventDefault();

            const amount = <?php echo e(floatval(str_replace(',', '', Cart::instance('cart')->total())) * 100); ?>;


            // Step 1: Create Razorpay order on backend
            const orderRes = await fetch('/create-razorpay-order', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    amount: amount
                })
            });

            const orderData = await orderRes.json();
            const razorpay_order_id = orderData.order_id;

            const options = {
                "key": "<?php echo e(env('RAZORPAY_KEY')); ?>",
                "amount": amount,
                "currency": "INR",
                "name": "Your Business Name",
                "description": "Checkout Payment",
                "order_id": razorpay_order_id,
                "handler": function(response) {
                    // Attach to form
                    ['razorpay_payment_id', 'razorpay_order_id', 'razorpay_signature'].forEach(
                        key => {
                            const input = document.createElement('input');
                            input.type = 'hidden';
                            input.name = key;
                            input.value = response[key];
                            checkoutForm.appendChild(input);
                        });

                    checkoutForm.submit();
                },
                "prefill": {
                    "name": "<?php echo e(Auth::user()->name); ?>",
                    "email": "<?php echo e(Auth::user()->email); ?>",
                    "contact": "<?php echo e(Auth::user()->phone ?? '9999999999'); ?>"
                },
                "theme": {
                    "color": "#3399cc"
                }
            };

            const rzp = new Razorpay(options);
            rzp.open();
        }
    });

    document.getElementById('mode1').addEventListener('change', function() {
        if (this.checked) {
            document.getElementById('upi-options').style.display = 'none';
        }
    });
</script>
<?php /**PATH C:\Users\hp\Desktop\ECOMSELLER\resources\views/checkout.blade.php ENDPATH**/ ?>