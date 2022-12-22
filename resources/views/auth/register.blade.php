{{--<x-guest-layout>--}}
{{--    <x-jet-authentication-card>--}}
{{--        <x-slot name="logo">--}}
{{--            <x-jet-authentication-card-logo />--}}
{{--        </x-slot>--}}

{{--        <x-jet-validation-errors class="mb-4" />--}}

{{--        <form method="POST" action="{{ route('register') }}">--}}
{{--            @csrf--}}

{{--            <div>--}}
{{--                <x-jet-label for="name" value="{{ __('Name') }}" />--}}
{{--                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />--}}
{{--            </div>--}}

{{--            <div class="mt-4">--}}
{{--                <x-jet-label for="email" value="{{ __('Email') }}" />--}}
{{--                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />--}}
{{--            </div>--}}


{{--            <div class="mt-4">--}}
{{--                <x-jet-label for="phone" value="{{ __('Phone') }}" />--}}
{{--                <x-jet-input id="phone" class="block mt-1 w-full" type="number" name="phone" required :value="old('phone')"  />--}}
{{--            </div>--}}
{{--            <div class="mt-4">--}}
{{--                <x-jet-label for="address" value="{{ __('Address') }}" />--}}
{{--                <x-jet-input id="address" class="block mt-1 w-full" type="text" name="address" required :value="old('address')" />--}}
{{--            </div>--}}

{{--            <div class="mt-4">--}}
{{--                <x-jet-label for="password" value="{{ __('Password') }}" />--}}
{{--                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />--}}
{{--            </div>--}}

{{--            <div class="mt-4">--}}
{{--                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />--}}
{{--                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />--}}
{{--            </div>--}}


{{--            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())--}}
{{--                <div class="mt-4">--}}
{{--                    <x-jet-label for="terms">--}}
{{--                        <div class="flex items-center">--}}
{{--                            <x-jet-checkbox name="terms" id="terms" required />--}}

{{--                            <div class="ml-2">--}}
{{--                                {!! __('I agree to the :terms_of_service and :privacy_policy', [--}}
{{--                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',--}}
{{--                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',--}}
{{--                                ]) !!}--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </x-jet-label>--}}
{{--                </div>--}}
{{--            @endif--}}

{{--            <div class="flex items-center justify-end mt-4">--}}
{{--                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">--}}
{{--                    {{ __('Already registered?') }}--}}
{{--                </a>--}}

{{--                <x-jet-button class="ml-4">--}}
{{--                    {{ __('Register') }}--}}
{{--                </x-jet-button>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </x-jet-authentication-card>--}}
{{--</x-guest-layout>--}}


    <!DOCTYPE html>
<html lang="en">

<!-- Mirrored from thevectorlab.net/flatlab-4/registration.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 Jul 2019 15:08:56 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="/backend/img/favicon.html">

    <title>Register Page</title>

    <!-- Bootstrap core CSS -->
    <link href="/backend/css/bootstrap.min.css" rel="stylesheet">
    <link href="/backend/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="/backend/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="/backend/css/style.css" rel="stylesheet">
    <link href="/backend/css/style-responsive.css" rel="stylesheet" />


</head>

<body class="login-body">

<div class="container my-5">

    <form class="form-signin" action="{{ route('register') }}" method="POST">
        @csrf
        <h2 class="form-signin-heading">registration now</h2>
        <div class="login-wrap">
            <p>Enter your personal details below</p>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Name" autofocus>
            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
            <input type="text" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email" >
            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
            <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" placeholder="Phone" >
            <input type="text" name="address" class="form-control" value="{{ old('address') }}" placeholder="Address" >
            <input type="password" name="password" class="form-control" placeholder="Password" >
            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" >

            <button class="btn btn-lg btn-login btn-block" type="submit">Submit</button>
            <div class="registration">
                Already Registered.
                <a class="" href="{{ route('login') }}"> Login </a>
            </div>
            {{--            @if($errors->any())--}}
            {{--                <div class="alert alert-primary fade in alert-dismissible show">--}}
            {{--                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
            {{--                        <span aria-hidden="true" style="font-size:20px">×</span>--}}
            {{--                    </button>--}}
            {{--                    {{$errors->first()}}--}}
            {{--                </div>--}}
            {{--            @endif--}}
        </div>
    </form>
</div>


</body>

<!-- Mirrored from thevectorlab.net/flatlab-4/registration.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 Jul 2019 15:08:56 GMT -->
</html>
