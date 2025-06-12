<x-app-layout title="account-address">
    <style>
        .text-success {
            color: rgb(66, 249, 0) !important;
        }
    </style>
    <main class="pt-90">
        <div class="mb-4 pb-4"></div>
        <section class="my-account container">
            <h2 class="page-title">Addresses</h2>
            <div class="row">
                <div class="col-lg-2">
                    @include('user.account-nav')
                </div>
                <div class="col-lg-9">
                    <div class="page-content my-account__address">
                        <div class="row">
                            <div class="col-6">
                                <p class="notice">The following addresses will be used on the checkout page by default.
                                </p>
                            </div>
                            <div class="col-6 text-right">
                                <a href="{{ route('user.address.add') }}" class="btn btn-sm btn-info">Add New</a>
                            </div>
                        </div>
                        @if (Session::has('success'))
                            <p class="alert alert-success">{{ Session::get('success') }}</p>
                        @endif
                        <div class="my-account__address-list row">
                            <h5>Shipping Address</h5>
                            {{-- @dd($address) --}}
                            @foreach ($address as $address)
                                <div class="my-account__address-item col-md-6">
                                    <div class="my-account__address-item__title">
                                        <h5>
                                            {{ $address->name }}
                                            @if ($address->isdefault == 1)
                                                <i class="fa fa-check-circle text-success">default address</i>
                                            @endif
                                        </h5>
                                        <div class="d-flex align-items-center gap-3">
                                            <a href="{{ route('user.address.edit', ['id' => $address->id]) }}" class="text-primary text-decoration-none">
                                                Edit
                                            </a>
                                        
                                            <form action="{{ route('user.address.delete', ['id' => $address->id]) }}" method="POST" >
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="delete btn btn-link p-0 m-0" style="color: red;">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                        
                                    </div>
                                    <div class="my-account__address-item__detail">
                                        <p>{{ $address->address }}</p>
                                        <p>{{ $address->landmark }}</p>
                                        <p>{{ $address->city }}, {{ $address->state }}, {{ $address->country }}
                                        </p>
                                        <p>{{ $address->zip }}</p>
                                        <br />
                                        <p>Mobile : {{ $address->phone }}</p>
                                    </div>
                                </div>
                                <hr>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-app-layout>
<script>
    $(function() {
        $('.delete').on('click', function(e) {
            e.preventDefault();
            let form = $(this).closest('form');
            swal({
                title: "Are you sure?",
                text: "Delete record!",
                icon: "warning",
                buttons: ["Cancel", "Yes, delete it!"],
                confirmButtonColor: '#dc3545',

            }).then((result) => {
                if (result) {
                    form.submit();
                }
            })
        })
    })
</script>
