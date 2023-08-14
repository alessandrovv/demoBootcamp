@if(config('layout.self.layout') == 'blank')
    <div id="app class="d-flex flex-column flex-root">
        @yield('content')
    </div>
@else

    @include('layout.base._header-mobile')

    <div id="app" class="d-flex flex-column flex-root">
        <div class="d-flex flex-row flex-column-fluid page">

            @if(config('layout.aside.self.display'))
                @include('layout.base._aside')
            @endif

            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                @include('layout.base._header')

                <div class="content {{ Metronic::printClasses('content', false) }} d-flex flex-column flex-column-fluid" id="kt_content">

                    @include('layout.base._content') 
                </div>

                @include('layout.base._footer')
            </div>
        </div>
    </div>

@endif

