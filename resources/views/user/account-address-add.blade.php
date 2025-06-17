<x-app-layout title="account-address-add">
    <main class="pt-90">
        <div class="mb-4 pb-4"></div>
        <section class="my-account container">
            <h2 class="page-title">Address</h2>
            <div class="row">
                <div class="col-lg-3">
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
                                <a href="{{ route('user.address') }}" class="btn btn-sm btn-danger">Back</a>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <div class="card mb-5">
                                    <div class="card-header">
                                        <h5>Add New Address</h5>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ route('user.address.store') }}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="my-3">
                                                        <label class="form-label" for="name">Full Name *</label>
                                                        <input type="text" class="form-control" placeholder="Name"
                                                            name="name" value="{{ old('name') }}" />
                                                    </div>
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="my-3">
                                                        <label class="form-label" for="phone">Phone Number *</label>
                                                        <input type="text" class="form-control" placeholder="Phone"
                                                            name="phone" value="{{ old('phone') }}" />
                                                    </div>
                                                    @error('phone')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="my-3">
                                                        <label class="form-label" for="zip">Pincode *</label>
                                                        <input type="text" class="form-control" placeholder="Pincode"
                                                            name="zip" value="{{ old('zip') }}" />
                                                    </div>
                                                    @error('zip')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mt-3 mb-3">
                                                        <label class="form-label" for="state">State *</label>
                                                        <input type="text" class="form-control" placeholder="State"
                                                            name="state" value="{{ old('state') }}" />
                                                    </div>
                                                    @error('state')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="my-3">
                                                        <label class="form-label" for="city">Town / City *</label>
                                                        <input type="text" class="form-control" placeholder="City"
                                                            name="city" value="{{ old('city') }}" />
                                                    </div>
                                                    @error('city')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="my-3">
                                                        <label class="form-label" for="address">House no, Building Name
                                                            *</label>
                                                        <input type="text" class="form-control" placeholder="House no, Building Name"
                                                            name="address" value="{{ old('address') }}" />
                                                    </div>
                                                    @error('address')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="my-3">
                                                        <label class="form-label" for="locality">Road Name, Area, Colony
                                                            *</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Road Name, Area, Colony " name="locality"
                                                            value="{{ old('locality') }}" />
                                                    </div>
                                                    @error('locality')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="my-3">
                                                        <label class="form-label" for="landmark">Landmark *</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Landmark" name="landmark"
                                                            value="{{ old('landmark') }}" />
                                                    </div>
                                                    @error('landmark')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                {{--  <div class="col-md-6">
                                                    <div class="form-check">
                                                        <label class="form-label" class="form-check-label" for="isdefault">
                                                        <input class="form-check-input" type="checkbox" value="1"
                                                            id="isdefault" name="isdefault"  {{ old('isdefault') ? 'checked' : '' }} />
                                                            Make as Default address
                                                        </label>
                                                    </div>
                                                </div>  --}}
                                                <div class="col-md-12 text-right">
                                                    <button type="submit" class="btn-main">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-app-layout>
