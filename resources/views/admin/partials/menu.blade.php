@php
    $r = \Route::current()->getAction();
    $route = (isset($r['as'])) ? $r['as'] : '';
@endphp

<li class="nav-item mT-30">
    <a class="sidebar-link" href="{{ url('/admin') }}">
        <span class="icon-holder">
            <i class="c-blue-500 ti-home"></i>
        </span>
        <span class="title">Dashboard</span>
    </a>
</li>
<li class="nav-item">
    <a class="sidebar-link" href="{{ url('/admin/causes') }}">
        <span class="icon-holder">
            <i class="c-green-500 ti-flag-alt-2"></i>
        </span>
        <span class="title">Causes Management</span>
    </a>
</li>

@can('onlyAdmin', auth()->user())
    <li class="nav-item">
        <a class="sidebar-link" href="{{ url('/admin/donors') }}">
        <span class="icon-holder">
            <i class="c-brown-500 ti-user"></i>
        </span>
            <span class="title">Donors</span>
        </a>
    </li>
@endcan

