<x-app-layout title="Contact Us">
    <style>
        .contact-us__form {
            background-color: #f9f9f9;
            padding: 2rem;
            border-radius: 0.75rem;
            box-shadow: 0 0 12px rgba(0, 0, 0, 0.05);
        }

        .contact-us__form label {
            font-weight: 500;
        }

        .contact-us__form .form-control {
            border-radius: 6px;
        }

        .btn-submit {
            padding: 0.6rem 2rem;
            border-radius: 6px;
            font-weight: 600;
        }

        .page-title {
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .breadcrumb-nav {
            font-size: 0.9rem;
        }
    </style>

    <main class="pt-5">
        <div class="container mb-4">
            <div class="breadcrumb-nav">
                <a href="{{ route('home.index') }}"
                    class="text-uppercase fw-medium text-decoration-none text-danger">Home</a>
                <span class="px-2">/</span>
                <span class="text-uppercase fw-medium">Get In Touch</span>
            </div>
            <hr />
        </div>

        <section class="contact-us container">
            <div class="mw-930 mx-auto">
                <h2 class="page-title">Contact Us</h2>

                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif

                <div class="contact-us__form">
                    <form name="contact-us-form" class="needs-validation" novalidate method="POST"
                        action="{{ route('home.contact.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="contact_us_name" class="form-label">Name *</label>
                            <input type="text" class="form-control" name="name" id="contact_us_name"
                                placeholder="Your Name" required value="{{ old('name') }}" />
                            @error('name')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="contact_us_phone" class="form-label">Phone *</label>
                            <input type="text" class="form-control" name="phone" id="contact_us_phone"
                                placeholder="Your Phone Number" required value="{{ old('phone') }}">
                            @error('phone')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="contact_us_email" class="form-label">Email *</label>
                            <input type="email" class="form-control" name="email" id="contact_us_email"
                                placeholder="Your Email Address" required value="{{ old('email') }}">
                            @error('email')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="contact_us_message" class="form-label">Message *</label>
                            <textarea class="form-control" name="comment" id="contact_us_message" placeholder="Your Message" rows="6"
                                required>{{ old('comment') }}</textarea>
                            @error('comment')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <button type="submit" class="btn btn-submit bg-black text-white w-100">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
</x-app-layout>
