<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" {{ Metronic::printAttrs('html') }} {{ Metronic::printClasses('html') }}>
    <head>
        <meta charset="utf-8"/>

        {{-- Title Section --}}
        <title>{{ config('app.name') }} | @yield('title', $page_title ?? '')</title>

        {{-- Meta Data --}}
        <meta name="description" content="@yield('page_description', $page_description ?? '')"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

        {{-- Favicon --}}
        <link rel="shortcut icon" href="{{ asset('media/logos/favicon.ico') }}" />

        {{-- Fonts --}}
        {{ Metronic::getGoogleFontsInclude() }}

        {{-- Global Theme Styles (used by all pages) --}}
        @foreach(config('layout.resources.css') as $style)
            <link href="{{ config('layout.self.rtl') ? asset(Metronic::rtlCssPath($style)) : asset($style) }}" rel="stylesheet" type="text/css"/>
        @endforeach

        {{-- Layout Themes (used by all pages) --}}
        @foreach (Metronic::initThemes() as $theme)
            <link href="{{ config('layout.self.rtl') ? asset(Metronic::rtlCssPath($theme)) : asset($theme) }}" rel="stylesheet" type="text/css"/>
        @endforeach

        {{-- Includable CSS --}}
        @yield('styles')
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    </head>

    <body {{ Metronic::printAttrs('body') }} {{ Metronic::printClasses('body') }}>

        @if (config('layout.page-loader.type') != '')
            @include('layout.partials._page-loader')
        @endif

        @include('layout.base._layout')

        <script>var HOST_URL = "{{ route('quick-search') }}";</script>

        {{-- Global Config (global config for global JS scripts) --}}
        <script>
            var KTAppSettings = {!! json_encode(config('layout.js'), JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES) !!};
        </script>

        {{-- Global Theme JS Bundle (used by all pages)  --}}
        @foreach(config('layout.resources.js') as $script)
            <script src="{{ asset($script) }}" type="text/javascript"></script>
        @endforeach

        {{-- Includable JS --}}
        @yield('scripts')

        {{-- Vue --}}
        <script src="/js/website.js" type="text/javascript"></script>
        <script src="{{ asset('js/axios.min.js') }}" type="text/javascript"></script>
        <script type="text/javascript">
            var txtBuscar = null;
            var tblData = null;
            var datos = [];

            function filtrarDatos({target}){
                valor = target.value;

                for(let dato of datos){
                    let not_found = true;
                    for(let campo of dato.valores){
                        if(campo.toUpperCase().match(valor.toUpperCase().trim())){
                            not_found = false;
                        }
                    }

                    dato.element.hidden = not_found;
                }
                
                let not_data = true;
                let data_hidden = Array.from(tblData.querySelectorAll('tr')).map(e=>{return (e.id != 'not_data' ? e.hidden :true)});

                if(!(data_hidden.includes(false))){
                    not_data = false;
                }

                let notDataRow = document.getElementById('not_data');
                notDataRow.hidden = not_data;

            }

            function iniciarBusqueda(){
                txtBuscar = document.getElementById('txtBuscar');
                tblData = document.getElementById('tblDatos');

                if(txtBuscar && tblData){
                    datos = Array.from(tblData.querySelectorAll('tr')).map(e=>({element:e}));
    
                    txtBuscar.addEventListener('keyup',filtrarDatos)

                    for(let fila of datos){
                        fila.valores = Array.from(fila.element.querySelectorAll('.busqueda')).map(e=>e.innerText);
                    }

                    console.log(datos);
                    
                }
            }

            window.onload = ()=>{
                iniciarBusqueda();
            }
        </script>
    </body>
</html>