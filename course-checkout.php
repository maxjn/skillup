<?php
include('inc/header.php');
$course_id = 0;
if (isset($_GET['id'])) //گرفتن آیدی از داخل لینک
    $course_id = $_GET['id'];
//بررسی وارد شده بودن کاربر. اگر کاربر وارد نشده بود به لاگین منتقل شود
if (!(isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true) || $course_id == 0) {
    $_SESSION["alert"] = "First";
?>
<script type='text/javascript'>
location.replace('login.php');
</script>
<?php
    exit();
}

$link = mysqli_connect("localhost", "root", "", "skillupdb"); // ایجاد اتصال به پایگاه داده
if (mysqli_connect_errno()) //بازگرداندن خطای اتصال پایگاه داده
    exit("مشکلی در ارتباط پایگاه به جود امده :" . mysqli_connect_error());
mysqli_query($link, "set names utf8");


$query = "SELECT * FROM courses WHERE courseid='$course_id'";

$result = mysqli_query($link, $query);            //  اجراي کوئری گرفتن اطلاعات دوره
if ($row = mysqli_fetch_array($result)) {
?>
<!-- ============================ Page Title Start================================== -->
<section class="page-title gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">

                <div class="breadcrumbs-wrap">
                    <h1 class="breadcrumb-title font-2">تسویه حساب</h1>
                    <nav class="transparent">
                        <ol class="breadcrumb p-0">
                            <li class="breadcrumb-item"><a href="index.php">خانه</a></li>
                            <li class="breadcrumb-item active theme-cl" aria-current="page">تسویه حساب</li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- ============================ Page Title End ================================== -->

<!-- ============================ Our Story Start ================================== -->
<section class="gray-simple">

    <div class="container">


        <!-- row Start -->
        <div class="row frm_submit_block">
            <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="submit-page mb-4">
                    <!-- row -->
                    <form class="row" action="action-checkout.php" method="post">

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h3 class="mr-0 font-2">جزئیات صورت حساب</h3>
                        </div>

                        <div class="col-lg-2 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label> کد دوره <i class="req">*</i></label>
                                <input name="CourseId" value="<?= $course_id ?>" type="text" class="form-control"
                                    style="background-color: rgba(169,169,169,0.75)" readonly />
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label> نام دوره <i class="req">*</i></label>
                                <input name="CourseName" value="<?= $row['name'] ?>" type="text" class="form-control"
                                    style="background-color: rgba(169,169,169,0.75)" readonly />
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label> کد خریدار <i class="req">*</i></label>
                                <input name="UserId" value="<?= $_SESSION['userid'] ?>" type="text" class="form-control"
                                    style="background-color: rgba(169,169,169,0.75)" readonly />
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label> نام خریدار <i class="req">*</i></label>
                                <input name="Name" value="<?= $_SESSION['name'] ?>" type=" text" class="form-control"
                                    style="background-color: rgba(169,169,169,0.75)" readonly />
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label> مبلغ پرداختی <i class="req">*</i></label>
                                <input name="Price" value="<?= $row['price'] ?>" type=" text" class="form-control"
                                    style="background-color: rgba(169,169,169,0.75)" readonly />
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <button type="submit" class="btn theme-bg btm-md full-width">پرداخت</button>
                            </div>
                        </div>



                    </form>
                    <!--/row -->
                </div>


            </div>

            <!-- Col-lg 4 -->
            <div class="col-lg-4 col-md-12 col-sm-12">

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h3 class="font-2">خرید شما</h3>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="pro_product_wrap">
                        <h5>دوره <?= $row['name'] ?></h5>
                        <ul>
                            <li><strong> دسته بندی</strong><?= $row['category'] ?></li>
                            <li><strong> سطح</strong><?= $row['level'] ?></li>
                            <li><strong> زمان دوره</strong><?= $row['time'] ?></li>
                            <li><strong> تعداد ویدیو</strong><?= $row['videonumber'] ?></li>
                            <li><strong>هزینه دوره</strong><?= $row['price'] ?> تومان</li>
                        </ul>
                    </div>
                </div>

            </div>
            <!-- /col-lg-4 -->
        </div>
        <!-- /row -->

    </div>

</section>
<!-- ============================ Our Story End ================================== -->
<?php
}
include('inc/footer.php');
?>