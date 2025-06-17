<x-app-layout title="Account Address">
    <main class="pt-16 pb-10 bg-gray-50">
        <section class="container mx-auto px-4">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">My Addresses</h2>
            <div class="flex flex-col lg:flex-row gap-6">
                {{-- Sidebar --}}
                <div class="w-full lg:w-1/4">
                    @include('user.account-nav')
                </div>

                {{-- Address Content --}}
                <div class="w-full lg:w-3/4">
                    <div class="bg-white p-6 rounded-lg shadow-md space-y-4">
                        @if (Session::has('success'))
                        <p class="text-green-600 font-medium bg-green-100 px-4 py-2 rounded">
                            {{ Session::get('success') }}
                        </p>
                        @endif

                        <p class="text-sm text-gray-600">The following addresses will be used on the checkout page by
                            default.</p>
                        @if ($address->isEmpty()) <a href="{{ route('user.address.add') }}"
                            class="btn btn-danger text-decoration-none">
                            Add New
                        </a>
                        @endif



                        @forelse ($address as $address)
                        <div class="border border-gray-200 rounded-md p-4 mb-4 bg-gray-50">
                            <div class="flex justify-between items-center mb-2">
                                <h3 class="text-lg font-semibold text-gray-800">{{ $address->name }}</h3>
                                <div class="flex gap-3">
                                    <a href="{{ route('user.address.edit', ['id' => $address->id]) }}"
                                        class="text-blue-600 hover:underline">Edit</a>

                                    <form action="{{ route('user.address.delete', ['id' => $address->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline delete">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="text-sm text-gray-700 space-y-1">
                                <p>{{ $address->address }}</p>
                                <p>{{ $address->landmark }}</p>
                                <p>{{ $address->city }}, {{ $address->state }}, {{ $address->country }}</p>
                                <p>{{ $address->zip }}</p>
                                <p class="mt-2 font-medium">Mobile: {{ $address->phone }}</p>
                            </div>
                        </div>
                        @empty
                        <p class="text-gray-500">No address added yet.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </section>
    </main>

    {{-- SweetAlert Confirm --}}
    <script>
        $(function () {
            $('.delete').on('click', function (e) {
                e.preventDefault();
                let form = $(this).closest('form');
                swal({
                    title: "Are you sure?",
                    text: "This address will be permanently deleted.",
                    icon: "warning",
                    buttons: ["Cancel", "Yes, delete it!"],
                    dangerMode: true,
                }).then((confirmed) => {
                    if (confirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
</x-app-layout>
