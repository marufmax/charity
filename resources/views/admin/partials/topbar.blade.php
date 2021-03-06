<div class="header navbar">
    <div class="header-container">
        <ul class="nav-left">
            <li>
                <a id='sidebar-toggle' class="sidebar-toggle" href="javascript:void(0);">
                    <i class="ti-menu"></i>
                </a>
            </li>
        </ul>
        <ul class="nav-right">
            <li class="dropdown">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <div class="peer mR-10">
                        <img class="w-2r bdrs-50p" src="#" alt="">
                    </div>
                    <div class="peer">
                        <button type="submit" name="your_name" value="your_value" class="btn-link">Logout</button>
                    </div>

                </form>

            </li>
            <li class="dropdown">
                <a href="" class="dropdown-toggle no-after peers fxw-nw ai-c lh-1" data-toggle="dropdown">
                    <div class="peer mR-10">
                        <img class="w-2r bdrs-50p" src="#" alt="">
                    </div>
                    <div class="peer">
                        <span class="fsz-sm c-grey-900">{{ \Illuminate\Support\Facades\Auth::user()->name }}</span>
                    </div>
                </a>
                <ul class="dropdown-menu fsz-sm">
                    <li>
                        <a href="" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                            <i class="ti-settings mR-10"></i>
                            <span>Setting</span>
                        </a>
                    </li>
                    <li>
                        <a href="" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                            <i class="ti-user mR-10"></i>
                            <span>Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                            <i class="ti-email mR-10"></i>
                            <span>Messages</span>
                        </a>
                    </li>
                    <li role="separator" class="divider"></li>
                    <li>
                        <a href="/logout" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                            <i class="ti-power-off mR-10"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
