@extends('layout')

@section('content')
<div class="columns is-centered">
    <div class="column is-one-third">
        <div class="card">
            <div class="card-header">
                <p class="card-header-title">Login</p>
            </div>
            <div class="card-content">
                <form method="POST" action="{{ url('/login') }}">
                    {{ csrf_field() }}

                    <div class="field">
                        <label for="email" class="label">E-mail</label>

                        <div class="control">
                            <input id="email"
                                type="email"
                                    class="input{{ $errors->has('email') ? ' is-danger' : '' }}"
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

                    <div class="field">
                        <label for="password" class="label">Senha</label>

                        <div class="control">
                            <input id="password"
                                   type="password"
                                   class="input{{ $errors->has('password') ? ' is-danger' : '' }}"
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

                    <div class="field is-grouped">
                        <div class="control">
                            <button type="submit" class="button is-primary">Login</button>
                        </div>
                        <div class="control">
                            <a class="button is-link" href="{{ url('/password/reset') }}">
                                Forgot Your Password?
                            </a>
                        </div>
                    </div>
                </form> <!-- login form -->
            </div> <!-- .card-content -->
        </div> <!-- .card -->
    </div>
</div><!-- .columns -->
@endsection
