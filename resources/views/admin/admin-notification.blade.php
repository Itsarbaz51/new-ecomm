<div class="dropdown">
    <a href="{{ route('admin.inbox') }}" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2" 
    {{-- data-bs-toggle="dropdown" --}}
        aria-expanded="false">
        <span class="header-item">
            <span class="text-tiny">{{ \App\Models\Order::where('status', 'Ordered')->count() ? \App\Models\Order::where('status', 'Ordered')->count() : 0 }}</span>
            <i class="icon-bell"></i>
        </span>
    </a>
    {{-- <ul class="dropdown-menu dropdown-menu-end has-content" aria-labelledby="dropdownMenuButton2">
        <li>
            <h6>Notifications</h6>
        </li>
        <li>
            <div class="message-item item-1">
                <div class="image">
                    <i class="icon-noti-1"></i>
                </div>
                <div>
                    <div class="body-title-2">Discount available</div>
                    <div class="text-tiny">Morbi sapien massa, ultricies at rhoncus
                        at, ullamcorper nec diam</div>
                </div>
            </div>
        </li>
        <li>
            <div class="message-item item-2">
                <div class="image">
                    <i class="icon-noti-2"></i>
                </div>
                <div>
                    <div class="body-title-2">Account has been verified</div>
                    <div class="text-tiny">Mauris libero ex, iaculis vitae rhoncus
                        et</div>
                </div>
            </div>
        </li>
        <li>
            <div class="message-item item-3">
                <div class="image">
                    <i class="icon-noti-3"></i>
                </div>
                <div>
                    <div class="body-title-2">Order shipped successfully</div>
                    <div class="text-tiny">Integer aliquam eros nec sollicitudin
                        sollicitudin</div>
                </div>
            </div>
        </li>
        <li>
            <div class="message-item item-4">
                <div class="image">
                    <i class="icon-noti-4"></i>
                </div>
                <div>
                    <div class="body-title-2">Order pending: <span>ID 305830</span>
                    </div>
                    <div class="text-tiny">Ultricies at rhoncus at ullamcorper
                    </div>
                </div>
            </div>
        </li>
        <li><a href="#" class="tf-button w-full">View all</a></li>
    </ul> --}}
</div>
