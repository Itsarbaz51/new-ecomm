<x-app-layout title="Terms of Service">
    <section class="w-full bg-gray-50 py-12">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Breadcrumb -->
            <nav class="text-sm mb-6 text-gray-600 flex items-center space-x-2">
                <a href="{{ route('home.index') }}" class="text-gray-700 hover:text-blue-600 no-underline">Home</a>
                <span>/</span>
                <span class="text-gray-800 font-medium">Terms of Service</span>
            </nav>

            <!-- Terms Card -->
            <div class="p-8">
                <h1 class="text-3xl font-bold text-gray-900 uppercase mb-6">Terms of Service</h1>

                <p class="text-gray-700 mb-4 leading-relaxed">
                    By using our services, you agree to the following Terms of Service:
                </p>

                <ul class="list-disc list-inside space-y-3 text-gray-700 leading-relaxed">
                    <li>You may use our services only for lawful purposes and in accordance with these Terms of Service.
                    </li>
                    <li>We reserve the right to refuse service to anyone for any reason at any time.</li>
                    <li>We may modify or terminate our services at any time, for any reason, without notice.</li>
                    <li>You are responsible for maintaining the confidentiality of your account information, including
                        your password.</li>
                    <li>We are not liable for any damages or losses resulting from your use of our services.</li>
                    <li>Our services are provided on an "as is" and "as available" basis, without warranties of any
                        kind, either express or implied.</li>
                    <li>We may change these Terms of Service at any time by posting the updated terms on our website.
                    </li>
                </ul>
            </div>
        </div>
    </section>
</x-app-layout>
