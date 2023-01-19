<?php
include('inc/header.php');
//وضعیت ورود کار بر را بررسی و در صورت ورود قبلی به صفحه اصلی هدایت می کند
if (isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true) {
?>
<script type="text/javascript">
location.replace("index.php");
</script>

<?php
    exit();
}
?>
<!-- ============================ Login Wrap ================================== -->
<section>
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-xl-7 col-lg-8 col-md-12 col-sm-12">
                <form action="action-login.php" method="post">
                    <div class="crs_log_wrap">
                        <div class="crs_log__thumb">
                            <img src="assets/img/banner-2.jpg" class="img-fluid" alt="" />
                        </div>
                        <div class="crs_log__caption">
                            <div class="rcs_log_123">
                                <div class="rcs_ico"><i class="fas fa-lock"></i></div>
                            </div>

                            <div class="rcs_log_124">
                                <div class="Lpo09">
                                    <h4>ورود به حساب کاربری</h4>
                                </div>
                                <div class="form-group">
                                    <label>نام کاربری </label>
                                    <input name="UserName" type="text" class="form-control" placeholder="نام کاربری" />
                                </div>
                                <div class="form-group">
                                    <label>رمز عبور</label>
                                    <input name="Password" type="password" class="form-control" placeholder="*******" />
                                </div>

                                <div class="form-group">
                                    <button type="submit"
                                        class="btn full-width btn-md theme-bg text-white">ورود</button>
                                </div>
                            </div>

                        </div>
                        <div class="crs_log__footer d-flex justify-content-between mt-0">
                            <div class="fhg_45">
                                <p class="musrt">حساب کاربری ندارید؟ <a href="signup.php" class="theme-cl">ثبت نام</a>
                                </p>
                            </div>

                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>
<!-- ============================ Login Wrap ================================== -->


<?php
include('inc/footer.php');
?>