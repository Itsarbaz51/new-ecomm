<x-app-layout title="Chekout">
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
            <form name="checkout-form" action="{{ route('cart.place.an.order') }}" method="POST">
                @csrf
                <div class="checkout-form">
                    <div class="billing-info__wrapper">
                        <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4 mb-6">
                            <h4 class="text-lg font-semibold uppercase tracking-wide">Shipping Details</h4>

                            <a href="{{ route('user.address.edit', ['id' => $address->id]) }}"
                                class="inline-block bg-red-600 hover:bg-red-700 text-white text-sm px-4 py-2 rounded shadow transition">
                                Edit Address
                            </a>
                        </div>

                        {{-- {{ dd($address) }} --}}
                        @if ($address)
                        <div class="row">

                            <div class="col-md-12">
                                <div class="my-account__address-list">
                                    <div class="my-account__address-list-item">
                                        <div class="my-account__address-list__detail">
                                            <p>{{ $address->name }}</p>
                                            <p>{{ $address->address }}</p>
                                            <p>{{ $address->landmark }}</p>
                                            <p>{{ $address->city }}, {{ $address->state }}, {{ $address->country }}
                                            </p>
                                            <p>{{ $address->zip }}</p>
                                            <br />
                                            <p>{{ $address->phone }}</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <div class="my-3">
                                    <label class="font-semibold" for="name" class="form-label">Full Name *</label>
                                    <input type="text" class="form-control" name="name" required=""
                                        value="{{ old('name') }}" placeholder="Full Name" />
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="my-3">
                                    <label class="font-semibold" for="phone">Phone Number *</label>
                                    <input placeholder="Phone" type="text" class="form-control" name="phone" required=""
                                        value="{{ old('phone') }}" placeholder="Phone" />
                                    @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="my-3">
                                    <label class="font-semibold" for="zip">Pincode *</label>
                                    <input placeholder="Pincode" type="text" class="form-control" name="zip" required=""
                                        value="{{ old('zip') }}">
                                    @error('zip')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mt-3 mb-3">
                                    <label class="font-semibold" for="state">State *</label>
                                    <input placeholder="State" type="text" class="form-control" name="state" required=""
                                        value="{{ old('state') }}">
                                    @error('state')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="my-3">
                                    <label class="font-semibold" for="city">Town / City *</label>
                                    <input placeholder="Town / City" type="text" class="form-control" name="city"
                                        required="" value="{{ old('city') }}">
                                    @error('city')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="my-3">
                                    <label class="font-semibold" for="address">House no, Building Name *</label>
                                    <input placeholder="House no, Building Name" type="text" class="form-control"
                                        name="address" required="" value="{{ old('address') }}">
                                    @error('locality')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="my-3">
                                    <label class="font-semibold" for="locality">Road Name, Area, Colony *</label>
                                    <input placeholder="Road Name, Area, Colony" type="text" class="form-control"
                                        name="locality" required="" value="{{ old('locality') }}">
                                    @error('locality')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="my-3">
                                    <label class="font-semibold" for="landmark" class="font-semibold">Landmark *</label>
                                    <input placeholder="Landmark" type="text" class="form-control" name="landmark"
                                        required="" value="{{ old('landmark') }}">
                                    @error('landmark')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        @endif
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
                                        @foreach (Cart::instance('cart') as $item)
                                        <tr>
                                            <td>
                                                {{ $item->name }} x {{ $item->qty }}
                                            </td>
                                            <td align="right">
                                                ₹{{ $item->subtotal() }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @if (Session::has('discount'))
                                <table class="checkout-totals">
                                    <tbody>
                                        <tr>
                                            <th>Subtotal</th>
                                            <td class="text-right">₹{{ Cart::instance('cart')->subtotal() }}</td>
                                        </tr>
                                        <tr>
                                            <th>Discount {{ Session::get('coupon')['code'] }}</th>
                                            <td class="text-right">₹{{ Session::get('discount')['discount'] }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Subtotal After Discount</th>
                                            <td class="text-right">₹{{ Session::get('discount')['subtotal'] }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Shipping</th>
                                            <td class="text-right">Free</td>
                                        </tr>
                                        <tr>
                                            <th>VAT</th>
                                            <td class="text-right">₹{{ Session::get('discount')['tax'] }}</td>
                                        </tr>
                                        <tr>
                                            <th>Total</th>
                                            <td class="text-right">₹{{ Session::get('discount')['total'] }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                @else
                                <table class="checkout-totals">
                                    <tbody>
                                        <tr>
                                            <th>SUBTOTAL</th>
                                            <td class="text-right">₹{{ Cart::instance('cart')->subtotal() }}</td>
                                        </tr>
                                        <tr>
                                            <th>SHIPPING</th>
                                            <td class="text-right">Free shipping</td>
                                        </tr>
                                        <tr>
                                            <th>VAT</th>
                                            <td class="text-right">₹{{ Cart::instance('cart')->tax() }}</td>
                                        </tr>
                                        <tr>
                                            <th>TOTAL</th>
                                            <td class="text-right">₹{{ Cart::instance('cart')->total() }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                @endif
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
</x-app-layout>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    const razorpayRadio = document.getElementById('mode1');
    const checkoutForm = document.querySelector('form[name="checkout-form"]');

    checkoutForm.addEventListener('submit', async function(e) {
        if (razorpayRadio.checked) {
            e.preventDefault();

            const amount = {{ floatval(str_replace(',', '', Cart::instance('cart')->total())) * 100 }};


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
                "key": "{{ env('RAZORPAY_KEY') }}",
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
                    "name": "{{ Auth::user()->name }}",
                    "email": "{{ Auth::user()->email }}",
                    "contact": "{{ Auth::user()->phone ?? '9999999999' }}"
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
