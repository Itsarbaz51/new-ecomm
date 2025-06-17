<!-- Footer -->
<footer>
    <div class="footer-links container ">
        <div class="footer-column">
            <h5>Links</h5>
            <a href="{{ route('home.privacyPolicy') }}">Privacy Policy</a>
            <a href="{{ route('home.refundPolicy') }}">Refund Policy</a>
            <a href="{{ route('home.shippingPolicy') }}">Shipping Policy</a>
            <a href="{{ route('home.termsOfService') }}">Terms of Service</a>
        </div>
        <div class="footer-column">
            <h5>Help</h5>
            <a href="{{ route('home.faqs') }}">FAQs</a>
            {{-- <a href="#">Submit Refunds</a> --}}
            <a href="{{ route('home.about') }}">About Us</a>
            <a href="{{ route('home.contact') }}">Contact Us</a>
        </div>
        <div class="footer-column">
            <h5>Be in the Know</h5>
            <p>Sign up to our newsletter to receive exclusive offers.</p>
            <form action="{{ route('newsletter.subscribe') }}" method="POST" class="footer-newsletter"
                style="display: flex; width: 100%; justify-items: center; gap: 10px;">
                @csrf
                <input type="email" name="email" placeholder="Your email" required>
                <button type="submit" style="height: fit-content; margin: auto 0;">Subscribe</button>
            </form>
            {{--  @if(session('success'))
            <div style="color: green;">{{ session('success') }}</div>
            @endif  --}}

        </div>
    </div>
    <div
        class=" container flex sm:flex-row sm:justify-between justify-center items-center border-t border-gray-700 pt-4 flex-col">
        <span>&copy; 2025, <b>TRDNT</b>. All rights reserved.</span>
        <ul class="flex justify-center items-center my-2">
            <li>
                <svg class="payment-icon" xmlns="http://www.w3.org/2000/svg" role="img"
                    aria-labelledby="pi-american_express" viewBox="0 0 38 24" width="38" height="24">
                    <title id="pi-american_express">American Express</title>
                    <path fill="#000"
                        d="M35 0H3C1.3 0 0 1.3 0 3v18c0 1.7 1.4 3 3 3h32c1.7 0 3-1.3 3-3V3c0-1.7-1.4-3-3-3Z"
                        opacity=".07"></path>
                    <path fill="#006FCF"
                        d="M35 1c1.1 0 2 .9 2 2v18c0 1.1-.9 2-2 2H3c-1.1 0-2-.9-2-2V3c0-1.1.9-2 2-2h32Z"></path>
                    <path fill="#FFF"
                        d="M22.012 19.936v-8.421L37 11.528v2.326l-1.732 1.852L37 17.573v2.375h-2.766l-1.47-1.622-1.46 1.628-9.292-.02Z">
                    </path>
                    <path fill="#006FCF"
                        d="M23.013 19.012v-6.57h5.572v1.513h-3.768v1.028h3.678v1.488h-3.678v1.01h3.768v1.531h-5.572Z">
                    </path>
                    <path fill="#006FCF"
                        d="m28.557 19.012 3.083-3.289-3.083-3.282h2.386l1.884 2.083 1.89-2.082H37v.051l-3.017 3.23L37 18.92v.093h-2.307l-1.917-2.103-1.898 2.104h-2.321Z">
                    </path>
                    <path fill="#FFF"
                        d="M22.71 4.04h3.614l1.269 2.881V4.04h4.46l.77 2.159.771-2.159H37v8.421H19l3.71-8.421Z">
                    </path>
                    <path fill="#006FCF"
                        d="m23.395 4.955-2.916 6.566h2l.55-1.315h2.98l.55 1.315h2.05l-2.904-6.566h-2.31Zm.25 3.777.875-2.09.873 2.09h-1.748Z">
                    </path>
                    <path fill="#006FCF"
                        d="M28.581 11.52V4.953l2.811.01L32.84 9l1.456-4.046H37v6.565l-1.74.016v-4.51l-1.644 4.494h-1.59L30.35 7.01v4.51h-1.768Z">
                    </path>
                </svg>

            </li>
            <li>
                <svg class="payment-icon" xmlns="http://www.w3.org/2000/svg" role="img" viewBox="0 0 38 24" width="38"
                    height="24" aria-labelledby="pi-google_pay">
                    <title id="pi-google_pay">Google Pay</title>
                    <path d="M35 0H3C1.3 0 0 1.3 0 3v18c0 1.7 1.4 3 3 3h32c1.7 0 3-1.3 3-3V3c0-1.7-1.4-3-3-3z"
                        fill="#000" opacity=".07"></path>
                    <path d="M35 1c1.1 0 2 .9 2 2v18c0 1.1-.9 2-2 2H3c-1.1 0-2-.9-2-2V3c0-1.1.9-2 2-2h32" fill="#FFF">
                    </path>
                    <path
                        d="M18.093 11.976v3.2h-1.018v-7.9h2.691a2.447 2.447 0 0 1 1.747.692 2.28 2.28 0 0 1 .11 3.224l-.11.116c-.47.447-1.098.69-1.747.674l-1.673-.006zm0-3.732v2.788h1.698c.377.012.741-.135 1.005-.404a1.391 1.391 0 0 0-1.005-2.354l-1.698-.03zm6.484 1.348c.65-.03 1.286.188 1.778.613.445.43.682 1.03.65 1.649v3.334h-.969v-.766h-.049a1.93 1.93 0 0 1-1.673.931 2.17 2.17 0 0 1-1.496-.533 1.667 1.667 0 0 1-.613-1.324 1.606 1.606 0 0 1 .613-1.336 2.746 2.746 0 0 1 1.698-.515c.517-.02 1.03.093 1.49.331v-.208a1.134 1.134 0 0 0-.417-.901 1.416 1.416 0 0 0-.98-.368 1.545 1.545 0 0 0-1.319.717l-.895-.564a2.488 2.488 0 0 1 2.182-1.06zM23.29 13.52a.79.79 0 0 0 .337.662c.223.176.5.269.785.263.429-.001.84-.17 1.146-.472.305-.286.478-.685.478-1.103a2.047 2.047 0 0 0-1.324-.374 1.716 1.716 0 0 0-1.03.294.883.883 0 0 0-.392.73zm9.286-3.75l-3.39 7.79h-1.048l1.281-2.728-2.224-5.062h1.103l1.612 3.885 1.569-3.885h1.097z"
                        fill="#5F6368"></path>
                    <path
                        d="M13.986 11.284c0-.308-.024-.616-.073-.92h-4.29v1.747h2.451a2.096 2.096 0 0 1-.9 1.373v1.134h1.464a4.433 4.433 0 0 0 1.348-3.334z"
                        fill="#4285F4"></path>
                    <path
                        d="M9.629 15.721a4.352 4.352 0 0 0 3.01-1.097l-1.466-1.14a2.752 2.752 0 0 1-4.094-1.44H5.577v1.17a4.53 4.53 0 0 0 4.052 2.507z"
                        fill="#34A853"></path>
                    <path d="M7.079 12.05a2.709 2.709 0 0 1 0-1.735v-1.17H5.577a4.505 4.505 0 0 0 0 4.075l1.502-1.17z"
                        fill="#FBBC04"></path>
                    <path
                        d="M9.629 8.44a2.452 2.452 0 0 1 1.74.68l1.3-1.293a4.37 4.37 0 0 0-3.065-1.183 4.53 4.53 0 0 0-4.027 2.5l1.502 1.171a2.715 2.715 0 0 1 2.55-1.875z"
                        fill="#EA4335"></path>
                </svg>

            </li>
            <li>
                <svg class="payment-icon" viewBox="0 0 38 24" xmlns="http://www.w3.org/2000/svg" width="38" height="24"
                    role="img" aria-labelledby="pi-maestro">
                    <title id="pi-maestro">Maestro</title>
                    <path opacity=".07"
                        d="M35 0H3C1.3 0 0 1.3 0 3v18c0 1.7 1.4 3 3 3h32c1.7 0 3-1.3 3-3V3c0-1.7-1.4-3-3-3z">
                    </path>
                    <path fill="#fff" d="M35 1c1.1 0 2 .9 2 2v18c0 1.1-.9 2-2 2H3c-1.1 0-2-.9-2-2V3c0-1.1.9-2 2-2h32">
                    </path>
                    <circle fill="#EB001B" cx="15" cy="12" r="7"></circle>
                    <circle fill="#00A2E5" cx="23" cy="12" r="7"></circle>
                    <path fill="#7375CF"
                        d="M22 12c0-2.4-1.2-4.5-3-5.7-1.8 1.3-3 3.4-3 5.7s1.2 4.5 3 5.7c1.8-1.2 3-3.3 3-5.7z">
                    </path>
                </svg>
            </li>
            <li>
                <svg class="payment-icon" viewBox="0 0 38 24" xmlns="http://www.w3.org/2000/svg" role="img" width="38"
                    height="24" aria-labelledby="pi-master">
                    <title id="pi-master">Mastercard</title>
                    <path opacity=".07"
                        d="M35 0H3C1.3 0 0 1.3 0 3v18c0 1.7 1.4 3 3 3h32c1.7 0 3-1.3 3-3V3c0-1.7-1.4-3-3-3z">
                    </path>
                    <path fill="#fff" d="M35 1c1.1 0 2 .9 2 2v18c0 1.1-.9 2-2 2H3c-1.1 0-2-.9-2-2V3c0-1.1.9-2 2-2h32">
                    </path>
                    <circle fill="#EB001B" cx="15" cy="12" r="7"></circle>
                    <circle fill="#F79E1B" cx="23" cy="12" r="7"></circle>
                    <path fill="#FF5F00"
                        d="M22 12c0-2.4-1.2-4.5-3-5.7-1.8 1.3-3 3.4-3 5.7s1.2 4.5 3 5.7c1.8-1.2 3-3.3 3-5.7z">
                    </path>
                </svg>
            </li>
                <svg class="payment-icon" viewBox="0 0 38 24" xmlns="http://www.w3.org/2000/svg" role="img" width="38"
                    height="24" aria-labelledby="pi-visa">
                    <title id="pi-visa">Visa</title>
                    <path opacity=".07"
                        d="M35 0H3C1.3 0 0 1.3 0 3v18c0 1.7 1.4 3 3 3h32c1.7 0 3-1.3 3-3V3c0-1.7-1.4-3-3-3z">
                    </path>
                    <path fill="#fff" d="M35 1c1.1 0 2 .9 2 2v18c0 1.1-.9 2-2 2H3c-1.1 0-2-.9-2-2V3c0-1.1.9-2 2-2h32">
                    </path>
                    <path
                        d="M28.3 10.1H28c-.4 1-.7 1.5-1 3h1.9c-.3-1.5-.3-2.2-.6-3zm2.9 5.9h-1.7c-.1 0-.1 0-.2-.1l-.2-.9-.1-.2h-2.4c-.1 0-.2 0-.2.2l-.3.9c0 .1-.1.1-.1.1h-2.1l.2-.5L27 8.7c0-.5.3-.7.8-.7h1.5c.1 0 .2 0 .2.2l1.4 6.5c.1.4.2.7.2 1.1.1.1.1.1.1.2zm-13.4-.3l.4-1.8c.1 0 .2.1.2.1.7.3 1.4.5 2.1.4.2 0 .5-.1.7-.2.5-.2.5-.7.1-1.1-.2-.2-.5-.3-.8-.5-.4-.2-.8-.4-1.1-.7-1.2-1-.8-2.4-.1-3.1.6-.4.9-.8 1.7-.8 1.2 0 2.5 0 3.1.2h.1c-.1.6-.2 1.1-.4 1.7-.5-.2-1-.4-1.5-.4-.3 0-.6 0-.9.1-.2 0-.3.1-.4.2-.2.2-.2.5 0 .7l.5.4c.4.2.8.4 1.1.6.5.3 1 .8 1.1 1.4.2.9-.1 1.7-.9 2.3-.5.4-.7.6-1.4.6-1.4 0-2.5.1-3.4-.2-.1.2-.1.2-.2.1zm-3.5.3c.1-.7.1-.7.2-1 .5-2.2 1-4.5 1.4-6.7.1-.2.1-.3.3-.3H18c-.2 1.2-.4 2.1-.7 3.2-.3 1.5-.6 3-1 4.5 0 .2-.1.2-.3.2M5 8.2c0-.1.2-.2.3-.2h3.4c.5 0 .9.3 1 .8l.9 4.4c0 .1 0 .1.1.2 0-.1.1-.1.1-.1l2.1-5.1c-.1-.1 0-.2.1-.2h2.1c0 .1 0 .1-.1.2l-3.1 7.3c-.1.2-.1.3-.2.4-.1.1-.3 0-.5 0H9.7c-.1 0-.2 0-.2-.2L7.9 9.5c-.2-.2-.5-.5-.9-.6-.6-.3-1.7-.5-1.9-.5L5 8.2z"
                        fill="#142688"></path>
                </svg>
            </li>
        </ul>
    </div>
</footer>


<footer class="footer-mobile container w-100 px-5 d-md-none bg-body">
    <div class="flex justify-between py-1.5">
        {{--
        <!-- Home Link (Fixed to red) --> --}}
        <div>
            <a href="{{ route('home.index') }}"
                class="p-1 px-1 rounded flex flex-col justify-center items-center text-red-500 font-bold hover:bg-red-100">
                <svg class="d-block" width="18" height="18" viewBox="0 0 18 18" stroke="currentColor" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_home" />
                </svg>
                <span>Home</span>
            </a>
        </div>

        {{--
        <!-- Shop Link (Already red) --> --}}
        <div>
            <a href="{{ route('shop.index') }}"
                class="p-1 px-1 rounded flex flex-col justify-center items-center text-red-500 font-bold hover:bg-red-100">
                <svg class="d-block" width="18" height="18" viewBox="0 0 18 18" stroke="currentColor" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <use href="#icon_hanger" />
                </svg>
                <span>Shop</span>
            </a>
        </div>
    </div>
</footer>
