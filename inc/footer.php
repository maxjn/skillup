<!-- ============================ Footer Start ================================== -->
<footer class="dark-footer skin-dark-footer style-2">
    <div class="footer-middle">
        <div class="container">
            <div class="row">

                <div class="col-lg-5 col-md-5">
                    <div class="footer_widget">
                        <img src="assets/img/logo-light.png" class="img-footer small mb-2" alt="" />
                        <h4 class="extream mb-3 font-2">هنوز شروع به یادگیری <br>نکرده اید؟</h4>
                        <p>در سایت عضو شوید و اولین دوره خود را ثبت نام کنید.</p>

                    </div>
                </div>

                <div class="col-lg-6 col-md-7 ml-auto">
                    <div class="row">

                        <div class="col-lg-4 col-md-4">
                            <div class="footer_widget">
                                <h4 class="widget_title">صفحات</h4>
                                <ul class="footer-menu">
                                    <li><a href="index.php">صفحه اصلی</a></li>
                                    <li><a href="courses.php">دوره ها </a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4">
                            <div class="footer_widget">
                                <h4 class="widget_title">تمام بخش ها</h4>
                                <ul class="footer-menu">
                                    <li><a href="index.php#hero">بنر اصلی</a></li>
                                    <li><a href="index.php#lastcourses">آخرین دوره ها</a></li>
                                    <li><a href="index.php#categories">دسته بندی ها</a></li>
                                    <li><a href="index.php#whyus">چرا ما؟</a></li>
                                    <li><a href="index.php#testimonials">نظرات کاربران</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4">
                            <div class="footer_widget">
                                <h4 class="widget_title">لینک های مفید</h4>
                                <ul class="footer-menu">
                                    <li><a href="signup.php">ثبت نام</a></li>
                                    <li><a href="login.php">ورود به حساب</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12 text-center">
                    <p class="mb-0">© 2023 پروژه کاردانی <a href="#">مینا طاهری </a></p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- ============================ Footer End ================================== -->

<!-- Log In Modal -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="loginmodal" aria-hidden="true">
    <div class="modal-dialog modal-xl login-pop-form" role="document">
        <div class="modal-content overli" id="loginmodal">
            <div class="modal-header">
                <h5 class="modal-title">ورود به حساب کاربری</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times-circle"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="login-form">
                    <form action="action-login.php" method="post">

                        <div class="form-group">
                            <label>نام کاربری</label>
                            <div class="input-with-icon">
                                <input name="UserName" type="text" class="form-control" placeholder=" نام کاربری     ">
                                <i class="ti-user"></i>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>رمز عبور</label>
                            <div class="input-with-icon">
                                <input name="Password" type="password" class="form-control" placeholder="*******">
                                <i class="ti-unlock"></i>
                            </div>
                        </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-md full-width theme-bg text-white">ورود به
                                حساب</button>
                        </div>


                    </form>
                </div>
            </div>
            <div class="crs_log__footer d-flex justify-content-between mt-0">
                <div class="fhg_45">
                    <p class="musrt">حساب کاربری ندارید؟ <a href="signup.php" class="theme-cl">ثبت نام</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

<a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>


</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->

<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/select2.min.js"></script>
<script src="assets/js/slick.js"></script>
<script src="assets/js/moment.min.js"></script>
<script src="assets/js/daterangepicker.js"></script>
<script src="assets/js/summernote.min.js"></script>
<script src="assets/js/metisMenu.min.js"></script>
<script src="assets/js/custom.js"></script>
<script src="assets/js/alert.js"></script>
<!-- ============================================================== -->
<!-- This page plugins -->
<!-- ============================================================== -->
<?php
include('inc/alert.php');
?>
</body>

</html>