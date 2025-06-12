<x-app-layout title="FAQs">
    <main class="container my-5">
        <h2 class="mb-4">Frequently Asked Questions</h2>
        <div class="accordion" id="faqAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="faqHeading1">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">What
                        is your return policy?</button>
                </h2>
                <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">You can return any item within 30 days of purchase for a full refund.
                        See our <a href="policies/refund-policy.html">Refund Policy</a> for details.</div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="faqHeading2">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#faq2">How long does shipping take?</button>
                </h2>
                <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">Standard UK shipping takes 3-5 business days. International shipping
                        coming soon. See our <a href="policies/shipping-policy.html">Shipping Policy</a>.</div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="faqHeading3">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#faq3">Can I track my order?</button>
                </h2>
                <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">Yes, once your order ships you will receive a tracking number via email.
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
