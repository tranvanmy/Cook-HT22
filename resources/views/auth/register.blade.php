@extends('layouts.app')

@section("title","Đăng ký")

@section('content')

<section class="register-maincontent">
    <div class="bg-page-cover"></div>
    <div class="container body-content">
        <div class="col-md-10 col-md-offset-1 register-form-box">
            <div class="register-form-head">
                <h3 class="register-title">
                    Đăng ký với Framgia Culinary
                </h3>
                <div style="float: right; margin-top: 20px; font-size: 11px; color:#333">
                    <ul class="list-inline">
                        <li><a href="{{ route('login') }}">Bạn đã có tài khoàn?</a></li>
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
                                <li class="fb wide"><a class="social-login" provider="1" href="javascript:void(0)"><span
                                        class="child"></span><span>Đăng nhập với Facebook</span></a></li>

                                <li class="clearfix separator"></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div>
                    Không thể kích hoạt tài khoản? <a class="highlight" href="gop-y.html">Hãy liên hệ với chúng tôi</a>
                </div>
            </div>
            <div class="col-md-6 register-form">
                <div class="register-inputs" id="user-register-div">
                    <form action="#" method="post">
                        <input name="" type="hidden" value=""/>
                        <table border="0" style="width:100%">
                            <tr class="register-row">
                                <td style="width:100px">
                                    Họ tên:
                                </td>
                                <td>
                                    <div class="register_bg">
                                        <input class="form-control" data-val="true" data-val-required="Nhập tên"
                                               id="name" name="name" placeholder="Họ tên" type="text" value=""/>
                                    </div>
                                </td>
                            </tr>
                            <tr class="register-row" data-bind="with: email">
                                <td width="150">
                                    Email:
                                </td>
                                <td>
                                    <div class="register_bg" style="float:left; width:280px">
                                        <input class="form-control"
                                               data-val="true" data-val-email="Email sai định dạng"
                                               data-val-required="Nhập email" id="register_email" name="Email"
                                               placeholder="Email" type="text" value=""/>
                                    </div>
                                </td>
                            </tr>
                            <tr class="register-row" data-bind="with: password">
                                <td>
                                    Mật khẩu:
                                </td>
                                <td>
                                    <div class="register_bg"><input class="form-control no-space"
                                                                    id="register_pass"
                                                                    name="Password" placeholder="Password"
                                                                    type="password"/></div>
                                </td>
                            </tr>
                            <tr class="register-row" data-bind="with: confirmPassword">
                                <td>
                                    Xác nhận mật khẩu:
                                </td>
                                <td>
                                    <div class="register_bg">
                                        <input class="form-control no-space"
                                               id="register_pass"
                                               name="ConfirmPassword" placeholder="Password" type="password"/>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span class="field-validation-valid" data-valmsg-for="InvalidErr"
                                          data-valmsg-replace="true"></span>
                                </td>
                            </tr>
                            <tr class="register-row">
                                <td></td>
                                <td>
                                    <button style="max-width: 280px; width: 100%; height: 50px"
                                            class="btn btn-danger registerbutton" type="submit"
                                    >
                                        Đăng ký
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
