<x-admin-layout title="setting">
    <style>
        .text-danger {
            font-size: initial;
            line-height: 36px;
        }

        .alert {
            font-size: initial;
        }
    </style>

    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Account Edit</h3>
                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                    <li>
                        <a href="{{ route('admin.index') }}">
                            <div class="text-tiny">Dashboard</div>
                        </a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <div class="text-tiny">Account</div>
                    </li>
                </ul>
            </div>

            <div class="wg-box">
                <div class="col-lg-12">
                    <div class="page-content my-account__edit">
                        @if (Session::has('success'))
                            <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @endif
                        <div class="my-account__edit-form">
                            <form name="account_edit_form" action="{{ route('admin.account.update') }}" method="POST"
                                class="form-new-product form-style-1 needs-validation" novalidate="" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $user->id }}" />
                                @method('PUT')
                                <fieldset class="name">
                                    <div class="body-title">Name <span class="tf-color-1">*</span>
                                    </div>
                                    <input class="flex-grow" type="text" placeholder="Full Name" name="name"
                                        tabindex="0" value="{{ $user->name }}" aria-required="true" required="">
                                </fieldset>
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                                <fieldset class="name">
                                    <div class="body-title">Mobile Number <span class="tf-color-1">*</span></div>
                                    <input class="flex-grow" type="text" placeholder="Mobile Number" name="mobile"
                                        tabindex="0" value="{{ $user->mobile }}" aria-required="true" required="">
                                </fieldset>
                                @error('mobile')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <fieldset class="name">
                                    <div class="body-title">Email Address <span class="tf-color-1">*</span></div>
                                    <input class="flex-grow" type="text" placeholder="Email Address" name="email"
                                        tabindex="0" value="{{ $user->email }}" aria-required="true" required="">
                                </fieldset>
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                                <fieldset>
                                    <div class="body-title">
                                        Upload images <span class="tf-color-1">*</span>
                                    </div>

                                    <div class="upload-image flex-grow">

                                        <div class="item" id="imgpreview">
                                            @if ($user->image)
                                                <img src="{{ asset('storage/uploads/adminImage/' . $user->image) }}"
                                                    class="effect8" alt="User Image">
                                            @else
                                                <img src="{{ asset('images/default-admin-image.png') }}" class="effect8"
                                                    alt="Default Avatar">
                                            @endif
                                        </div>

                                        {{-- Upload input always shown --}}
                                        <div id="upload-file" class="item up-load">
                                            <label class="uploadfile" for="myFile">
                                                <span class="icon">
                                                    <i class="icon-upload-cloud"></i>
                                                </span>
                                                <span class="body-text">
                                                    Drop your images here or select <span class="tf-color">click to
                                                        browse</span>
                                                </span>
                                                <input type="file" id="myFile" name="image" accept="image/*">
                                            </label>
                                        </div>

                                    </div>
                                </fieldset>

                                @error('image')
                                    <span class="alert alert-danger text-center">{{ $message }}</span>
                                @enderror

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="my-3">
                                            <h5 class="text-uppercase mb-0">Password Change</h5>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <fieldset class="name">
                                            <div class="body-title pb-3">Old password <span class="tf-color-1">*</span>
                                            </div>
                                            <input class="flex-grow" type="password" placeholder="Old password"
                                                id="old_password" name="old_password" aria-required="true"
                                                required="">
                                        </fieldset>
                                        @error('old_password')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                    </div>
                                    <div class="col-md-12">
                                        <fieldset class="name">
                                            <div class="body-title pb-3">New password <span
                                                    class="tf-color-1">*</span>
                                            </div>
                                            <input class="flex-grow" type="password" placeholder="New password"
                                                id="new_password" name="new_password" aria-required="true"
                                                required="">
                                        </fieldset>
                                        @error('new_password')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                    </div>
                                    <div class="col-md-12">
                                        <fieldset class="name">
                                            <div class="body-title pb-3">Confirm new password <span
                                                    class="tf-color-1">*</span></div>
                                            <input class="flex-grow" type="password"
                                                placeholder="Confirm new password" cfpwd=""
                                                data-cf-pwd="#new_password" id="new_password_confirmation"
                                                name="new_password_confirmation" aria-required="true" required="">
                                            <div class="invalid-feedback">Passwords did not match!
                                            </div>
                                        </fieldset>
                                        @error('new_password_confirmation')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <div class="my-3">
                                            <button type="submit" class="btn btn-primary tf-button w208">Save
                                                Changes</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
<script>
    $(document).ready(function() {
        $('#myFile').on('change', function() {
            const file = this.files[0];

            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();

                reader.onload = function(event) {
                    $('#imgpreview').html(
                        `<img src="${event.target.result}" class="effect8" alt="preview">`
                    );
                };

                reader.readAsDataURL(file);
            } else {
                alert("Please upload a valid image file.");
            }
        });
    });
</script>
