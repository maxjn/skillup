<?php
include('inc/header.php');
?>
<!-- ============================ Signup Wrap ================================== -->
<section>
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-xl-7 col-lg-8 col-md-12 col-sm-12">
                <form action="action-signup.php" method="post">
                    <div class="crs_log_wrap">
                        <div class="crs_log__thumb">
                            <img src="assets/img/banner-2.jpg" class="img-fluid" alt="" />
                        </div>
                        <div class="crs_log__caption">
                            <div class="rcs_log_123">
                                <div class="rcs_ico"><i class="fas fa-user"></i></div>
                            </div>

                            <div class="rcs_log_124">
                                <div class="Lpo09">
                                    <h4>ایجاد حساب کاربری</h4>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label> نام کاربری</label>
                                            <input name="UserName" type="text" class="form-control"
                                                placeholder=" نام کاربری" />
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>نام / نام خانوادگی </label>
                                            <input name="Name" type="text" class="form-control"
                                                placeholder="نام / نام خانوادگی" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>ایمیل</label>
                                    <input name="Email" type="email" class="form-control"
                                        placeholder="support@example.com" />
                                </div>
                                <div class="form-group">
                                    <label>رمز عبور</label>
                                    <input name="Password" type="passwerd" class="form-control" placeholder="*******" />
                                </div>
                                <div class="form-group">
                                    <label>رمز عبور</label>
                                    <input name="RepeatPassword" type="passwerd" class="form-control"
                                        placeholder="*******" />
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn full-width btn-md theme-bg text-white">ثبت
                                        نام</button>
                                </div>
                            </div>

                        </div>
                        <div class="crs_log__footer d-flex justify-content-between">
                            <div class="fhg_45">
                                <p class="musrt">آیا حساب کاربری دارید؟ <a href="login.php" class="theme-cl">ورود</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>
<!-- ============================ Signup Wrap ================================== -->
<?php
include('inc/footer.php');
?>