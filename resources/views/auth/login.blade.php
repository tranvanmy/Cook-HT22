@extends('layouts.app')

@section("title","Đăng nhập")

@section("style")
    {{ Html::style("users/css/register.css") }}
@endsection

@section('content')

    <section class="register-maincontent login-maincontent">
        <div class="bg-page-cover"></div>
        <div class="container body-content">
            <div class="col-md-10 col-md-offset-1 register-form-box login-form-box">
                <div class="register-form-head">
                    <h3 class="register-title">
                        {{ trans("sites.loginWithFramgia") }}
                    </h3>
                    <div>
                        <ul class="list-inline">
                            <li><a href="{{ route('register') }}">{{ trans("sites.registerAccount") }}</a></li>
                            <li><span>|</span></li>
                            <li><a href="#"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="register-social-wrapper login-social-wrapper">
                        <div class="login-social">
                            <div class="social-icon">
                                <ul class="list-unstyled">
                                    <li class="fb wide">
                                        <a href="{{ url('social/redirect') }}">
                                            <span class="child"></span>
                                            <span>{{ trans("sites.loginFacebook") }}</span>
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
                    <div class="login-form-head clearfix">
                        <h3 class="login-title">{{ trans("sites.or") }}</h3>
                    </div>
                    <div class="login-form-container">
                        <form action="#" method="POST">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!} "/>

                            <div class="login-inputs">
                                <div class="login-row">
                                    <div>
                                        <input class="form-control" id="email" name="email" placeholder="Email"
                                               type="text"/>
                                    </div>
                                </div>
                                <div class="login-row">
                                    <div>
                                        <input class="form-control" id="password" name="password"
                                               placeholder="{{ trans('sites.password') }}"
                                               type="password"/>
                                    </div>
                                </div>
                            </div>
                            <div class="login-row login-remember">
                                <table>
                                    <tr>
                                        <td width="200">
                                            <div>
                                                <input checked="checked" id="Remember" name="Remember" type="checkbox"
                                                       value="true"/>
                                                <input name="Remember" type="hidden" value="false"/>
                                                <label for="Remember">{{ trans("sites.save") }} {{ trans("sites.login") }}</label>
                                            </div>
                                        </td>
                                        <td align="right">
                                            <button class="btn btn-danger loginbutton" type="submit">
                                                {{ trans("sites.login") }}
                                            </button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
