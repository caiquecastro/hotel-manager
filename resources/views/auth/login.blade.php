@extends('layout')

@section('content')
    <h1>Login</h1>

    <form method="POST" action="{{ url('/login') }}">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="email" class="label">E-mail</label>

            <div class="control">
                <input id="email"
                    type="email"
                    class="form-control{{ $errors->has('email') ? ' is-danger' : '' }}"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                >

                @if ($errors->has('email'))
                    <p class="help is-danger">
                        {{ $errors->first('email') }}
                    </p>
                @endif
            </div> <!-- email .control -->
        </div> <!-- email .field -->

        <div class="form-group">
            <label for="password" class="label">Senha</label>

            <div class="control">
                <input
                    id="password"
                    type="password"
                    class="form-control{{ $errors->has('password') ? ' is-danger' : '' }}"
                    name="password"
                    required
                >
                @if ($errors->has('password'))
                    <p class="help is-danger">
                        {{ $errors->first('password') }}
                    </p>
                @endif
            </div> <!-- password .control -->
        </div> <!-- password .field -->

        <div class="field">
            <div class="control">
                <label class="checkbox">
                    <input type="checkbox" name="remember"> Remember Me
                </label>
            </div> <!-- remember me .control -->
        </div> <!-- remember me .field -->
        <button type="submit" class="btn btn-primary">Login</button>
        <a class="btn btn-link" href="{{ url('/password/reset') }}">
            Forgot Your Password?
        </a>
    </form> <!-- login form -->
@endsection
