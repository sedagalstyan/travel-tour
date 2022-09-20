<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('inc.head')
        <title>Admin</title>
    </head>
    <body>
        <main class="page-content">
            <div class="login-container">
                <form action="{{route('locale.admin.login-submit', ['locale' => app()->getLocale()])}}" method="POST" class="validation">
                    @csrf
                    <div class="username{{ $errors->has('username') ? ' has-error' : ''}}">
                        <label>Username <input type="text" name="username" value="{{old('username')}}"></label>
                        @error('username')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="password{{ $errors->has('password') ? ' has-error' : ''}}">
                        <label>Password 
                            <span><input type="password" name="password" value="{{old('password')}}"><i class="fas fa-eye-slash"></i></span>
                        </label>
                        @error('password')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="additional">
                        <div class="remember">
                            <label><input type="checkbox" name="remember"> Remember me</label>
                        </div>
                        <div class="forgot-pass">
                            <a href="">Forgot password?</a>
                        </div>
                    </div>
                    <button type="submit">Login</button>
                </form>
            </div>
        </main>
        @include('inc.flash-message')
        @include('inc.scripts')
    </body>
</html>
