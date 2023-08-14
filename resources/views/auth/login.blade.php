@extends('layout.guest', ['pageclass' => 'login-signin-on'])

@section('content')
<!--begin::Login Sign in form-->
<div class="login-signin">
  <div class="mb-20 text-black-100">
    <h3>Bienvenido</h3>
    <p class="opacity-70">Identifíquese usando su cuenta:</p>
  </div>

  <!-- Session Status -->
  {{-- <x-auth-session-status class="mb-4" :status="session('status')" /> --}}

  <form class="form" id="kt_login_signin_form2" method="POST" action="{{ route('login') }}">
    @csrf
    <div class="form-group">
      <input
        class="h-auto px-8 py-4 mb-5 text-black-100  placeholder-dark-75 border-0 form-control  bg-dark-o-70 rounded-pill"
        id="email" type="email" placeholder="Email" name="email" :value="old('email')" autocomplete="off" />
    </div>
    <div class="form-group">
      <input
        class="h-auto px-8 py-4 mb-3 text-black-100 placeholder-dark-75 border-0 form-control bg-dark-o-70 rounded-pill"
        type="password" placeholder="Password" name="password" id="password" class="block w-full mt-1" type="password"
        wire:name="password" required autocomplete="current-password" />

      <!-- Validation Errors -->
      <x-auth-validation-errors :errors="$errors" />

      <!-- Session Status -->
      <x-auth-session-status :status="session('status')" />
    </div>

   
    <div class="mt-10 text-center form-group">
      <button id="kt_login_signin_submit2" type="submit"
        class="py-3 btn btn-pill btn-outline-euler font-weight-bold opacity-90 px-15">Ingresar</button>
    </div>
  </form>
</div>
<!--end::Login Sign in form-->
@endsection