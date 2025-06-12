<style>
    .logout {
        font: 900;
        font-size: 15px;
        display: flex;
        gap: 13px;
    }
</style>
<div class="dropdown">
    @if (Auth::user()->utype === 'Admin')
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton3" data-bs-toggle="dropdown"
            aria-expanded="false">
            <span class="header-user wg-user">
                <span class="image">
                    @if (Auth::user()->image)
                        <img src="{{ asset('storage/uploads/adminImage/' . Auth::user()->image) }}" alt="Admin Image" />
                    @else
                        <img src="{{ asset('images/default-admin-image.png') }}" alt="Default Avatar" />
                    @endif
                </span>
                <span class="flex flex-column">
                    <span class="body-title mb-2">{{ Auth::user()->name }}</span>
                    <span class="text-tiny">{{ Auth::user()->utype }}</span>
                </span>
            </span>
        </button>
    @endif
    <ul class="dropdown-menu dropdown-menu-end has-content" aria-labelledby="dropdownMenuButton3">
        <li>
            <a href="{{ route('admin.account.edit', ['id' => Auth::user()->id]) }}" class="user-item">
                <div class="icon">
                    <i class="icon-user"></i>
                </div>
                <div class="body-title-2">Account</div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.inbox') }}" class="user-item">
                <div class="icon">
                    <i class="icon-mail"></i>
                </div>
                <div class="body-title-2">Inbox</div>
                <div class="number">
                    {{ \App\Models\Order::where('status', 'Ordered')->count() ? \App\Models\Order::where('status', 'Ordered')->count() : 0 }}
                </div>
            </a>
        </li>
        {{-- <li>
            <a href="#" class="user-item">
                <div class="icon">
                    <i class="icon-file-text"></i>
                </div>
                <div class="body-title-2">Taskboard</div>
            </a>
        </li> --}}
        {{--  <li>
            <a href="tel:+91-9649730196" class="user-item" title="Call Support">
                <div class="icon">
                    <i class="icon-headphones"></i>
                </div>
                <div class="body-title-2">Support</div>
            </a>

        </li>  --}}
        <li>
            <form action="{{ route('logout') }}" id="logout-form" method="post">
                @csrf
                <a href="{{ route('logout') }}" class="logout"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <div class="logout logout-text"><i class="icon-log-out"></i></div>
                    <div class="logout logout-text">
                        <span>Logout</span>
                    </div>
                </a>
            </form>
        </li>
    </ul>
</div>
