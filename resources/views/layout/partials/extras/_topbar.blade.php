{{-- Topbar --}}
<div class="topbar">

    {{-- User --}}
    @if (config('layout.extras.user.display'))
        @if (config('layout.extras.user.layout') == 'offcanvas')
            <div class="topbar-item">
                <div class="w-auto px-2 btn btn-icon btn-clean d-flex align-items-center btn-lg" id="kt_quick_user_toggle">
                    <span class="mr-1 text-muted font-weight-bold font-size-base d-none d-md-inline">Hi,</span>
                    <span class="mr-3 text-dark-50 font-weight-bolder font-size-base d-none d-md-inline">Sean</span>
                    <span class="symbol symbol-35 symbol-light-success">
                        <span class="symbol-label font-size-h5 font-weight-bold">S</span>
                    </span>
                </div>
            </div>
        @else
            <div class="dropdown">
                {{-- Toggle --}}
                <div class="topbar-item" data-toggle="dropdown" data-offset="0px,0px">
                    <div class="w-auto px-2 btn btn-icon btn-clean d-flex align-items-center btn-lg">
                        <span class="mr-1 text-muted font-weight-bold font-size-base d-none d-md-inline">Hi,</span>
                        <span class="mr-3 text-dark-50 font-weight-bolder font-size-base d-none d-md-inline">{{ Auth::user()->name }}</span>
                        <span class="symbol symbol-35 symbol-light-success">
                            <span class="symbol-label font-size-h5 font-weight-bold">{{ Auth::user()->name[0] }}</span>
                        </span>
                    </div>
                </div>

                {{-- Dropdown --}}
                <div class="p-0 m-0 dropdown-menu dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
                    @include('layout.partials.extras.dropdown._user')
                </div>
            </div>
        @endif
    @endif
</div>
