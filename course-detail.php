<?php
include('inc/header.php');
$link = mysqli_connect("localhost", "root", "", "skillupdb"); // ایجاد اتصال به پایگاه داده
if (mysqli_connect_errno()) //بازگرداندن خطای اتصال پایگاه داده
    exit("مشکلی در ارتباط پایگاه به جود امده :" . mysqli_connect_error());
mysqli_query($link, "set names utf8");

$course_id = 0;
if (isset($_GET['id']))
    $course_id = $_GET['id'];

$query = "SELECT * FROM courses WHERE courseid='$course_id'";

$result = mysqli_query($link, $query);            //  اجراي کوئری گرفتن اطلاعات دوره
if ($row = mysqli_fetch_array($result)) {
    $teacher_id = $row['userid'];
    $query_teacher = "SELECT * FROM users WHERE userid='$teacher_id'";

    $result_teacher = mysqli_query($link, $query_teacher);            //  اجراي کوئری گرفتن اطلاعات مدرس
    $row_teacher = mysqli_fetch_array($result_teacher);

    $query_paricipants = "SELECT COUNT(*) FROM sells WHERE courseid='{$row['courseid']}'";             // کوئری گرفتن تعداد شرکت کنندگان
    $result_paricipants = mysqli_query($link, $query_paricipants);            //  اجراي کوئری
    $row_paricipants = mysqli_fetch_array($result_paricipants);
?>
<!-- ============================ Page Title Start================================== -->
<div class="ed_detail_head">
    <div class="container">
        <div class="row align-items-center justify-content-between mb-2">

            <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12">
                <div class="dlkio_452">
                    <div class="ed_detail_wrap">
                        <div class="crs_cates cl_1"><span><?= $row['category'] ?></span></div>
                        <div class="ed_header_caption">
                            <h2 class="ed_title">دوره آموزش <?= $row['name'] ?></h2>
                        </div>
                        <div class="d-flex align-items-center mt-4">

                            <div class="mr-2 mr-md-3">
                                <span>مدرس</span>
                                <h6 class="m-0"><?= $row_teacher['name'] ?></h6>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-5 col-md-5 col-sm-12">
                <ul class="row p-0">
                    <li class="col-lg-6 col-md-6 col-sm-6 pt-2 pb-2"><i
                            class="fas fa-clock ml-1 text-success"></i><span><?= $row['time'] ?></span></li>
                    <li class="col-lg-6 col-md-6 col-sm-6 pt-2 pb-2"><i
                            class="fas fa-user ml-1 text-info"></i><span><?= $row_paricipants['COUNT(*)'] ?> شرکت
                            کننده</span></li>
                    <li class="col-lg-6 col-md-6 col-sm-6 pt-2 pb-2"><i
                            class="fas fa-video ml-1 text-danger"></i><span><?= $row['videonumber'] ?> ویدئو
                            آموزشی</span></li>
                </ul>
            </div>

        </div>
    </div>
</div>
<!-- ============================ Page Title End ================================== -->

<!-- ============================ Course Detail ================================== -->
<section class="gray pt-5">
    <div class="container">
        <div class="row">
            <!-- Content -->
            <div class="col-lg-8 col-md-12 order-lg-first">
                <!-- Thumbnail -->
                <div class="property_video radius lg mb-4">
                    <div class="thumb">
                        <img class="pro_img img-fluid w100" src="assets/img/cr-3.jpg" alt="7.jpg">
                    </div>
                </div>
                <!-- Thumbnail -->

                <!-- Description -->
                <div class="edu_wraper">
                    <?= $row['description'] ?>
                </div>
                <!-- Description -->
            </div>
            <!-- Content -->

            <!-- Sidebar -->
            <div class="col-lg-4 col-md-12 order-lg-last">

                <div class="ed_view_box style_2 border ovrlio stick_top min">
                    <div class="ed_author">
                        <h2 class="theme-cl m-0"><?= $row['price'] ?> ت</h2>
                    </div>
                    <div class="ed_view_link">
                        <?php

                            if (isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true) {
                                $query_sell = "SELECT * FROM sells WHERE userid='{$_SESSION['userid']}' AND courseid='$course_id'";
                                $result_sell = mysqli_query($link, $query_sell);    //  جراي کوئری برای برسی خرید های کاربر
                                //اگر کاربر وارد شده بود و دوره را خریده بود لینک دانلود نمایش داده خواهد شد
                                if ($row_sell = mysqli_fetch_array($result_sell)) {
                            ?>
                        <a class="btn btn-primary" href="<?= $row['link'] ?>">دانلود دوره</a>
                        <?php
                                } else {
                                ?>
                        <a href="course-checkout.php?id=<?= $row['courseid'] ?>" class="btn theme-bg enroll-btn"> شرکت<i
                                class="ti-angle-left"></i></a>
                        <?php
                                }
                            } else { ?>
                        <a href="course-checkout.php?id=<?= $row['courseid'] ?>" class="btn theme-bg enroll-btn"> شرکت<i
                                class="ti-angle-left"></i></a>
                        <?php } ?>
                    </div>
                    <div class="ed_view_features">
                        <div class="eld mb-3">
                            <h6 class="font-medium">مشخصات آموزش</h6>
                        </div>
                        <div class="eld mb-3">
                            <ul class="edu_list right">
                                <li><i class="ti-user"></i>تعداد شرکت کننده:<strong><?= $row_paricipants['COUNT(*)'] ?>
                                        نفر</strong></li>
                                <li><i class="ti-files"></i>موضوع:<strong><?= $row['name'] ?></strong></li>
                                <li><i class="ti-files"></i>دسته بندی:<strong><?= $row['category'] ?></strong></li>
                                <li><i class="ti-time"></i>زمان:<strong><?= $row['time'] ?></strong></li>
                                <li><i class="ti-video-camera"></i>تعداد
                                    ویدیو:<strong><?= $row['videonumber'] ?></strong></li>
                                <li><i class="ti-tag"></i>سطح:<strong><?= $row['level'] ?></strong></li>
                            </ul>
                        </div>
                    </div>

                </div>
                <!-- Sidebar -->



            </div>
        </div>


    </div>


</section>
<div class="clearfix"></div>
<!-- ============================ Course Detail ================================== -->


<?php
}
include('inc/footer.php');
?>