@extends('layouts.app')

@section("title","Đăng ký")

@section('content')

    <section class="register-maincontent">
        <div class="bg-page-cover"></div>
        <div class="container body-content">
            <div class="col-md-10 col-md-offset-1 register-form-box">
                <div class="register-form-head">
                    <h3 class="register-title">
                        {{ trans("sites.registerFramgia") }}
                    </h3>
                    <div>
                        <ul class="list-inline">
                            <li><a href="{{ route('login') }}">{{ trans("sites.youHaveAccount") }}</a></li>
                            <li><span>|</span></li>
                            <li><a href="#"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="register-social-wrapper">
                        <div class="login-social">
                            <div class="social-icon">
                                <ul class="list-unstyled">
                                    <li class="fb wide">
                                        <a class="social-login" href="{{ url('social/redirect') }}">
                                            <span class="child"></span>
                                            <span>{{ trans("sites.loginWithFramgia") }}</span>
                                        </a>
                                    </li>
                                    <li class="clearfix separator"></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div>
                        {{ trans("sites.notActive") }}
                        <a class="highlight" href="gop-y.html">{{ trans("sites.here") }}</a>
                    </div>
                </div>
                <div class="col-md-6 register-form">
                    @include("blocks.errors")
                    <div class="register-inputs" id="user-register-div">
                        <form action="#" method="post">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!} "/>
                            <table border="0">
                                <tr class="register-row">
                                    <td>
                                        {{ trans("sites.name") }}:
                                    </td>
                                    <td>
                                        <div class="register_bg">
                                            <input class="form-control"
                                                   id="name" name="name" placeholder="Họ tên" type="text" value=""/>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="register-row">
                                    <td>
                                        {{ trans("sites.email") }}:
                                    </td>
                                    <td>
                                        <div class="register_bg">
                                            <input class="form-control" id="register_email" name="email"
                                                   placeholder="Email" type="text" value=""/>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="register-row">
                                    <td>
                                        {{ trans("sites.password") }}:
                                    </td>
                                    <td>
                                        <div class="register_bg">
                                            <input class="form-control no-space" id="register_pass" name="password"
                                                   placeholder="{{ trans("sites.password") }}" type="password"/>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="register-row">
                                    <td>
                                        {{ trans("sites.confirmPassword") }}:
                                    </td>
                                    <td>
                                        <div class="register_bg">
                                            <input class="form-control no-space" id="register_pass"
                                                   name="confirmPassword"
                                                   placeholder="{{ trans("sites.confirmPassword") }}" type="password"/>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <span class="field-validation-valid"></span>
                                    </td>
                                </tr>
                                <tr class="register-row">
                                    <td></td>
                                    <td>
                                        <button class="btn btn-danger registerbutton" type="submit">
                                            {{ trans("sites.register") }}
                                        </button>
                                    </td>
                                    <td></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
