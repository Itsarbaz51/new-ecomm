<ul class="account-nav">
    <li><a href="{{ route('user.index') }}" class="menu-link menu-link_us-s">Dashboard</a></li>
    <li><a href="{{ route('user.orders') }}" class="menu-link menu-link_us-s">Orders</a></li>
    <li><a href="{{ route('user.address') }}" class="menu-link menu-link_us-s">Addresses</a></li>
    <li><a href="{{ route('user.account.details.edit', ['id' => Auth::user()->id]) }}"
            class="menu-link menu-link_us-s">Account Details</a></li>
    {{--  <li><a href="{{ route('user.account.wishlists') }}" class="menu-link menu-link_us-s">Wishlist</a></li>  --}}
    <li>
        <form action="{{ route('logout') }}" method="POST" id="logout-form">
            @csrf
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                class="menu-link
                menu-link_us-s" style="color:red;">Logout</a>
        </form>
    </li>

</ul>
