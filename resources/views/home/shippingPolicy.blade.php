<x-app-layout title="Shipping Policy">
    <section class="w-full bg-gray-50 py-12">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Breadcrumb -->
            <nav class="text-sm mb-6 text-gray-600 flex items-center space-x-2">
                <a href="{{ route('home.index') }}" class="text-gray-700 hover:text-blue-600 no-underline">Home</a>
                <span>/</span>
                <span class="text-gray-800 font-medium">Shipping Policy</span>
            </nav>

            <!-- Policy Card -->
            <div class="p-8">
                <h1 class="text-3xl font-bold text-gray-900 uppercase mb-6">Shipping Policy</h1>

                <!-- Reputable Shipping -->
                <div class="mb-6">
                    <p class="text-gray-700 leading-relaxed">
                        We only use reputable shipping companies to ensure your products arrive safely and promptly.
                    </p>
                </div>

                <!-- Processing Time -->
                <div class="mb-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-2">Order Processing</h2>
                    <p class="text-gray-700 leading-relaxed">
                        We strive to process and ship orders as quickly as possible. Any purchases or refund requests made after <strong>3 PM</strong> will be processed the following business day.
                        Please note that bank holidays may also affect delivery times.
                    </p>
                    <p class="text-gray-700 leading-relaxed mt-2">
                        Shipping times may vary depending on your location.
                    </p>
                </div>

                <!-- Policy Purpose -->
                <div class="mb-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-2">Why This Policy Exists</h2>
                    <p class="text-gray-700 leading-relaxed">
                        This policy sets a clear time boundary for when transactions are accepted for same-day processing. It's a standard practice to manage operations effectively and provide transparency about order handling times.
                    </p>
                    <p class="text-gray-700 leading-relaxed mt-2">
                        If you have any specific concerns or questions regarding this policy, please don’t hesitate to reach out.
                    </p>
                </div>

                <!-- Shipping Issues -->
                <div>
                    <h2 class="text-xl font-semibold text-gray-800 mb-2">Shipping Delays or Damages</h2>
                    <p class="text-gray-700 leading-relaxed">
                        We are not responsible for any delays, damages, or lost items caused by the shipping carrier. However, if you experience any of these issues, please contact us so we can assist you in resolving the matter with the carrier.
                    </p>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
