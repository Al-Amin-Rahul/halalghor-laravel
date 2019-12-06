@extends("login.master")
@section('title')
    Register
@endsection
@section('content')
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                @include("message.message")
                <form class="login100-form validate-form p-l-55 p-r-55 p-t-178" action="{{ route("register") }}" method="post">
                    @csrf
                    <span class="login100-form-title">
						Registration
				    </span>

                    <div class="wrap-input100 validate-input m-b-16">
                        <input class="input100" type="text" name="name" placeholder="Name" value="{{ old("name") }}">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-16">
                        <input class="input100" type="email" name="email" placeholder="Email" value="{{ old("email") }}">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-16">
                        <input class="input100" type="text" name="phone_number" placeholder="Phone Number" value="{{ old("phone_number") }}">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="password" name="password" placeholder="Password" value="{{ old("password") }}">
                        <span class="focus-input100"></span>
                    </div>

                    {{--<div class="text-right p-t-13 p-b-23">--}}
                    {{--<span class="txt1">--}}
                    {{--Forgot--}}
                    {{--</span>--}}

                    {{--<a href="#" class="txt2">--}}
                    {{--Username / Password?--}}
                    {{--</a>--}}
                    {{--</div>--}}

                    <div class="container-login100-form-btn p-t-15">
                        <input class="login100-form-btn" type="submit" name="register" value="Register"/>
                    </div>

                    <div class="flex-col-c p-t-170 p-b-40">
						<span class="txt1 p-b-9">
							Already have an account?
						</span>

                        <a href="{{ route("login") }}" class="txt3">
                            Sign in now
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
