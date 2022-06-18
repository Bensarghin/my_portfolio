<!DOCTYPE html>
<html>
    <head>
        <title>Title</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('assets/css/uikit.min.css')}}" />
    </head>
<body style="background: #1e87f0;">
<div class="uk-section">
<div class="uk-container uk-container-small uk-width-1-2@m">
    <div class="uk-card uk-card-default uk-card-body">
        <div class="uk-card-header">{{ __('Administration Management') }}</div>
        <div class="uk-card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="uk-margin">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                    <input type="email" class="uk-input" name="email" value="{{ old('email') }}" required autocomplete="off">

                    @error('email')
                        <span class="uk-text-danger" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="uk-margin">
                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                    <input type="password" class="uk-input" name="password" required autocomplete="off">

                    @error('password')
                        <span class="uk-text-danger" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="uk-margin">
                    <input type="checkbox" class="uk-checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
                <div uk-margin>
                    <button type="submit" class="uk-button uk-button-danger">
                        {{ __('Login') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
</div> 
        <script src="{{asset('assets/js/uikit.min.js')}}"></script>
        <script src="{{asset('assets/js/uikit-icons.min.js')}}"></script>
    </body>
</html>
