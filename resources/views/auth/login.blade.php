@extends('layouts.app')

@section("title","Đăng nhập")

@section('content')

<section class="register-maincontent login-maincontent">
    <div class="bg-page-cover"></div>
    <div class="container body-content">
        <div class="col-md-10 col-md-offset-1 register-form-box login-form-box">
            <div class="register-form-head">
                <h3 class="register-title">
                    Đăng nhập Framgia Culinary
                </h3>
                <div style="float: right; margin-top: 20px; font-size: 11px; color:#333">
                    <ul class="list-inline">
                        <li><a href="{{ route('register') }}">Đăng ký tài khoản</a></li>
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
                                        <span>Đăng nhập với Facebook</span>
                                    </a>
                                </li>
                                <li class="clearfix separator"></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div>
                    Không kích hoạt được tài khoản? gửi phản hồi <a class="highlight" href="gop-y.html">tại đây</a>
                </div>
            </div>
            <div class="col-md-6 register-form">
                @include("blocks.errors")
                <div class="login-form-head clearfix">
                    <h3 class="login-title">HOẶC</h3>
                </div>
                <div class="login-form-container">
                    <form action="#" method="post">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!} "/>
                        <div style="clear: both; width: 337px;"></div>

                        <div class="login-inputs">
                            <div class="login-row">
                                <div>
                                    <input class="form-control" id="email" name="email" placeholder="Email" type="text"
                                           value=""/>
                                </div>
                            </div>
                            <div class="login-row">
                                <div>
                                    <input class="form-control" id="password" name="password" placeholder="Password"
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
                                            <label for="Remember">Lưu đăng nhập</label>
                                        </div>
                                    </td>
                                    <td align="right">
                                        <button class="btn btn-danger loginbutton" type="submit">
                                            Đăng nhập
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
