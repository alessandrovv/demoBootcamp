{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class=" overflow-hidden shadow-xl sm:rounded-lg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="m-0">Registrar Grupo</h2>
                            </div>
                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <form action="{{ route('grupo.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div>
                                        <h4>Datos del Grupo:</h4>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-16 col-md-6">
                                                <label for="">Descripcion</label>
                                                <input type="text" class="form-control" id="txtNombre" name="descripcion"
                                                     placeholder="Nombre" value="{{ old('descripcion') }}">
                                                @error('descripcion')
                                                    <div class="text-danger">{{ 'Ingrese una descripcion' }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="d-flex justify-content-end" style="gap: 5px">
                                        <button type="submit" class="btn btn-primary">Aceptar</button>
                                        <a role="button" class="btn btn-danger" href="{{ route('grupo.index') }}">Cancelar</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    @stack('modals')
    <script>
        let darkMode;
        if (
            window.localStorage.getItem('darkMode') == null) {
            window.localStorage.setItem('darkMode', false);
            darkMode = false
        } else {
            if (window.localStorage.getItem('darkMode') === 'true')
                darkMode = true
            else {
                darkMode = false
            }
        }

        console.log(window.localStorage.getItem('darkMode'));
        document.addEventListener('alpine:init', () => {
            Alpine.store('darkMode', {
                on: darkMode,
                toggle() {
                    this.on = !this.on;
                    window.localStorage.setItem('darkMode', !darkMode);
                }
            })
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
    @isset($js)
        {{ $js }}
    @endisset


@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
@endsection
