
<!-- Main content wrapper -->


<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-form-title" style="background-image: url(images_login/bg-01.jpg);">
					<span class="login100-form-title-1">
						Sign In
					</span>
                <div class="footer" style="text-align:right; font-size:small; color: #ffffff; padding: 10px">
                    <span>zinzinmedia.com</span> |
                    <span>minhnhutc2@gmail.com</span> |
                    <span>0975490404</span>

                </div>
            </div>

            <form action="index.php?com=user&act=login" id="validate" method="post" class="login100-form validate-form">
                <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                    <span class="label-input100">Username</span>
                    <input class="input100" type="text" name="username" placeholder="Enter username">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
                    <span class="label-input100">Password</span>
                    <input class="input100" type="password" name="password" placeholder="Enter password">
                    <span class="focus-input100"></span>
                </div>

                <div class="ajaxloader"><img src="images/loader.gif" alt="loader" /></div>
                <div id="loginError">
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" type="submit">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>