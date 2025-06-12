<x-app-layout title="My-account">
    <style>
        .unerline-link {
            color: #2275FC;
        }

        .unerline-link:hover {
            color: red;
        }
    </style>
    <main class="pt-90">
        <div class="mb-4 pb-4"></div>
        <section class="my-account container">
            <h2 class="page-title">My Account</h2>
            <div class="row">
                <div class="col-lg-3">
                    @include('user.account-nav')
                </div>
                <div class="col-lg-9">
                    <div class="page-content my-account__dashboard">
                        <p>Hello, <strong>{{ $user->name }}</strong></p>
                        <p>Email : <strong>{{ $user->email }}</strong></p>
                        <p>Phone : <strong>{{ $user->mobile }}</strong></p>
                        <p>Account dated : <strong>{{ $user->created_at->format('d M, Y') }}</strong></p>
                        <p>Updated : <strong>{{ $user->updated_at->format('d M, Y') }}</strong></p>

                        <p>From your account dashboard you can view your <a class="unerline-link"
                                href="{{ route('user.orders') }}">recent
                                orders</a>, manage your <a class="unerline-link"
                                href="{{ optional($address)->id ? route('user.address.edit', ['id' => $address->id]) : '' }}"
>shipping
                                addresses</a>, and
                            <a class="unerline-link"
                                href="{{ route('user.account.details.edit', ['id' => Auth::user()->id]) }}">edit your
                                password
                                and account
                                details.</a>
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-app-layout>
