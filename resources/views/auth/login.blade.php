<x-guest-layout>
    <style>
        *{box-sizing:border-box}
        body{margin:0;font-family:Roboto;background:#3b4465}

        .forms-section{display:flex;flex-direction:column;align-items:center}
        .section-title{font-size:32px;color:#fff}

        .forms{display:flex;margin-top:30px}

        .form-wrapper{animation:hideLayer .3s forwards}
        .form-wrapper.is-active{animation:showLayer .3s forwards}

        .switcher{
            cursor:pointer;
            font-size:16px;
            color:#999;
            background:none;
            border:none;
            margin:10px;
        }

        .form-wrapper.is-active .switcher{color:#fff}

        .form{
            min-width:300px;
            margin-top:30px;
            padding:30px;
            background:#fff;
            border-radius:8px;
            box-shadow:0 10px 25px rgba(0,0,0,0.2);
        }

        .input-block{margin-bottom:20px}
        .input-block label{font-size:14px;color:#555}
        .input-block input{
            width:100%;
            padding:10px;
            margin-top:5px;
            border:1px solid #ccc;
            border-radius:4px;
        }

        .btn-login{
            width:100%;
            padding:10px;
            border:none;
            border-radius:20px;
            background:#a7e245;
            color:white;
            font-size:16px;
            cursor:pointer;
        }

        a{font-size:13px;color:#555}
    </style>

    <section class="forms-section">
        <h1 class="section-title">Login</h1>

        <x-auth-session-status :status="session('status')" />

        <div class="forms">
            <div class="form-wrapper is-active">

                <form method="POST" action="{{ route('login') }}" class="form">
                    @csrf

                    <div class="input-block">
                        <label>Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" required>
                        <x-input-error :messages="$errors->get('email')" />
                    </div>

                    <div class="input-block">
                        <label>Password</label>
                        <input type="password" name="password" required>
                        <x-input-error :messages="$errors->get('password')" />
                    </div>

                    <div style="margin-bottom:15px;">
                        <label>
                            <input type="checkbox" name="remember"> Remember me
                        </label>
                    </div>

                    <button type="submit" class="btn-login">Login</button>

                    @if (Route::has('password.request'))
                        <div style="margin-top:10px;text-align:center;">
                            <a href="{{ route('password.request') }}">Forgot password?</a>
                        </div>
                    @endif

                </form>

            </div>
        </div>
    </section>
</x-guest-layout>