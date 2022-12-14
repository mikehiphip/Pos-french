<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>@include("$prefix.inc_header")</head>

<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>

<body>
@include("$prefix.inc_topmenu")
<center>
<div class="container-fluid">
    <div class="wrap-pad">
        <div class="order-info">
            <div class="row">
                <div class="col">
                    <div class="login-form">
                        <form class="form-info" method="POST" action="{{url('pos/login')}}" >
                        @csrf
                            <div class="img-login">
                                <img src="{{asset('frontend/images/icon index/flat-color-icons_businessman.svg')}}" class="img-fluid">
                                <h3>LOGIN</h3>
                            </div>
                            
                            <div class="user-pass">
                                <label for="fname">Username</label>
                                <input type="text" id="fname" name="fname"><br>
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password">
                            </div>
                            <div class="btn-submit">
                                <input type="submit" value="Login">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</center>

@include("$prefix.inc_footer")
@if(Session('error'))
    <script>
        alert('Username or Password is incorrect')
    </script>
@endif
</body>
</html>