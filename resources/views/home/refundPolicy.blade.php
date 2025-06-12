<x-app-layout title="Refund Policy">
    <section class="w-full bg-gray-50 py-12">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Breadcrumb -->
            <nav class="text-sm mb-6 text-gray-600 flex items-center space-x-2">
                <a href="{{ route('home.index') }}" class="text-gray-700 hover:text-blue-600 no-underline">Home</a>
                <span>/</span>
                <span class="text-gray-800 font-medium">Refund Policy</span>
            </nav>

            <!-- Policy Card -->
            <div class="p-8">
                <h1 class="text-3xl font-bold text-gray-900 uppercase mb-6">Refund Policy</h1>

                <!-- Intro -->
                <div class="mb-6 space-y-4 text-gray-700 leading-relaxed">
                    <p>We have a 14-day return policy, which means you have 14 days after receiving your item to request
                        a return.</p>
                    <p>To be eligible for a return, your item must be in the same condition that you received it—unworn
                        or unused, with tags, and in its original packaging. You’ll also need the receipt or proof of
                        purchase.</p>
                    <p>To start a return, scroll to the bottom of our website and click on the “Submit Return” link.
                        Returns should be sent to:</p>
                    <p class="font-medium">PO Box 830, Hindley Green, Wigan, WN1 9XR, United Kingdom</p>
                    <p>If your return is accepted, we’ll send you a return shipping label and a returns form, along with
                        instructions on how and where to send your package. Items sent back without a return request
                        will not be accepted.</p>
                    <p>For any return questions, contact us at <a href="{{ route('home.contact') }}"
                            class="text-blue-600 hover:underline">Contact</a>.</p>
                </div>

                <!-- Damages and Issues -->
                <div class="mb-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-2">Damages and Issues</h2>
                    <p class="text-gray-700 leading-relaxed">
                        Please inspect your order upon reception and contact us immediately if the item is defective,
                        damaged, or if you received the wrong item. We will evaluate the issue and make it right.
                    </p>
                </div>

                <!-- Exceptions / Non-returnable Items -->
                <div class="mb-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-2">Exceptions / Non-returnable Items</h2>
                    <p class="text-gray-700 leading-relaxed">
                        We reserve the right to refuse a refund or exchange if items are not returned in their original
                        condition. All labels and tags must be attached. Items must be free of make-up stains, marks,
                        pulls, or rips.
                    </p>
                    <p class="text-gray-700 leading-relaxed mt-2">
                        Unfortunately, we do not accept returns on sale items or gift cards.
                    </p>
                </div>

                <!-- Exchanges -->
                <div class="mb-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-2">Exchanges</h2>
                    <p class="text-gray-700 leading-relaxed">
                        To get a different item, return the original and place a new order once the return is accepted.
                        We currently do not offer direct exchanges.
                    </p>
                </div>

                <!-- EU Cooling-off Period -->
                <div class="mb-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-2">European Union 14-Day Cooling-off Period</h2>
                    <p class="text-gray-700 leading-relaxed">
                        If your order ships into the EU, you have the right to cancel or return it within 14 days for
                        any reason. Items must be unworn, unused, with tags, and in their original packaging. Proof of
                        purchase is required.
                    </p>
                </div>

                <!-- Refunds -->
                <div>
                    <h2 class="text-xl font-semibold text-gray-800 mb-2">Refunds</h2>
                    <p class="text-gray-700 leading-relaxed">
                        We will notify you once your return is received and inspected. If approved, you will be
                        automatically refunded to your original payment method within 10 business days.
                    </p>
                    <p class="text-gray-700 leading-relaxed mt-2">
                        It may take additional time for your bank or credit card company to process and post the refund.
                    </p>
                    <p class="text-gray-700 leading-relaxed mt-2">
                        If more than 15 business days have passed since your refund was approved, please contact us at
                        <a href="{{ route('home.contact') }}" class="text-blue-600 hover:underline">Contact</a>.
                    </p>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
