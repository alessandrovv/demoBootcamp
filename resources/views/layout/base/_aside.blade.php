{{-- Aside --}}

@php
    $kt_logo_image = 'logo-light.png';
@endphp

@if (config('layout.brand.self.theme') === 'light')
    @php $kt_logo_image = 'logo-dark.png' @endphp
@elseif (config('layout.brand.self.theme') === 'dark')
    @php $kt_logo_image = 'logo-light.png' @endphp
@endif
@php
    $rol = Auth()->user()->rol->permisos;
    $tieneOpcion1 =false;
    $tieneOpcion2 = false;
@endphp
@foreach($rol as $array)
    @php
        if($array->id == 1){
            $tieneOpcion1 = true;
        }
        if($array->id == 2){
            $tieneOpcion2 = true;
        }
    @endphp

@endforeach
                
<div class="aside aside-left {{ Metronic::printClasses('aside', false) }} d-flex flex-column flex-row-auto" id="kt_aside">

    {{-- Brand --}}
    <div class="brand flex-column-auto {{ Metronic::printClasses('brand', false) }}" id="kt_brand">
        <div class="brand-logo">
            <a href="{{ url('/dashboard') }}">
                <img alt="{{ config('app.name') }}" src="{{ asset('media/logos/'.$kt_logo_image) }}"/>
            </a>
        </div>

        @if (config('layout.aside.self.minimize.toggle'))
            <button class="px-0 brand-toggle btn btn-sm" id="kt_aside_toggle">
                {{ Metronic::getSVG("media/svg/icons/Navigation/Angle-double-left.svg", "svg-icon-xl") }}
            </button>
        @endif

    </div>

    {{-- Aside menu --}}
    <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">

        @if (config('layout.aside.self.display') === false)
            <div class="header-logo">
                <a href="{{ url('/dashboard') }}">
                    <img alt="{{ config('app.name') }}" src="{{ asset('media/logos/'.$kt_logo_image) }}"/>
                </a>
            </div>
        @endif

        <div
            id="kt_aside_menu"
            class="aside-menu my-4 {{ Metronic::printClasses('aside_menu', false) }}"
            data-menu-vertical="1"
            {{ Metronic::printAttrs('aside_menu') }}>

            <ul class="menu-nav {{ Metronic::printClasses('aside_menu_nav', false) }}">
                @if($tieneOpcion1 && $tieneOpcion2)
                    {{ Menu::renderVerMenu(config('menu_aside.items')) }}
                @elseif($tieneOpcion1)
                    {{ Menu::renderVerMenu(config('menu_aside3.items')) }}
                @elseif($tieneOpcion2)
                    {{ Menu::renderVerMenu(config('menu_aside2.items')) }}
                @else
                    {{ Menu::renderVerMenu(config('menu_aside4.items')) }}
                @endif
                
            </ul> 
        </div>
    </div>

</div>
