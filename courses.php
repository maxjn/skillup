<?php
include('inc/header.php');
$link = mysqli_connect("localhost", "root", "", "skillupdb"); // ایجاد اتصال به پایگاه داده
if (mysqli_connect_errno()) //بازگرداندن خطای اتصال پایگاه داده
    exit("مشکلی در ارتباط پایگاه به جود امده :" . mysqli_connect_error());
mysqli_query($link, "set names utf8");

$query = "SELECT * FROM courses WHERE status=1 ORDER BY courseid DESC";             // کوئری نمايش تمام دوره ها
if (isset($_POST['search']) && !empty(Trim($_POST['search'])))
    $query = "SELECT * FROM courses WHERE name LIKE N'%{$_POST['search']}%'"; //کوئری جستجو


$result = mysqli_query($link, $query);            //  اجراي کوئری
?>
<!-- ============================ Page Title Start================================== -->
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">

                <div class="breadcrumbs-wrap">
                    <h1 class="breadcrumb-title font-2">دوره های آموزشی</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb p-0 bg-white">
                            <li class="breadcrumb-item"><a href="index.php">خانه</a></li>
                            <li class="breadcrumb-item active theme-cl" aria-current="page">دوره های آموزشی</li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- ============================ Page Title End ================================== -->

<!-- ============================ Course Detail ================================== -->
<section class="gray">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-8">
                <div class="sec-heading center">
                    <h3 class="font-2">آخرین <span class="theme-cl">آموزش ها</span></h3>
                    <p>در هر حوزه ای در منزل مهارت کسب کنید</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">

            <?php

            while ($row = mysqli_fetch_array($result)) {

            ?>
            <!-- Single Grid -->
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                <div class="crs_grid">
                    <div class="crs_grid_thumb">
                        <a href="course-detail.php?id=<?= $row['courseid'] ?>" class="crs_detail_link">
                            <img src="assets/img/<?= $row['image'] ?>" class="img-fluid rounded" alt="" />
                        </a>
                    </div>
                    <div class="crs_grid_caption">
                        <div class="crs_flex">
                            <div class="crs_fl_first">
                                <div class="crs_cates cl_8"><span><?= $row['category'] ?></span></div>
                            </div>
                            <?php $query_paricipants = "SELECT COUNT(*) FROM sells WHERE courseid='{$row['courseid']}'";             // کوئری گرفتن تعداد شرکت کنندگان
                                $result_paricipants = mysqli_query($link, $query_paricipants);            //  اجراي کوئری
                                $row_paricipants = mysqli_fetch_array($result_paricipants) ?>
                            <div class="crs_fl_last">
                                <div class="crs_inrolled"><strong><?= $row_paricipants['COUNT(*)'] ?> </strong>شرکت
                                    کننده</div>
                            </div>
                        </div>
                        <div class="crs_title">
                            <h4><a href="course-detail.php?id=<?= $row['courseid'] ?>" class="crs_title_link">دوره آموزش
                                    <?= $row['name'] ?></a></h4>
                        </div>
                        <div class="crs_info_detail">
                            <ul>
                                <li><i class="fa fa-clock text-danger"></i><span><?= $row['time'] ?></span></li>
                                <li><i class="fa fa-video text-success"></i><span><?= $row['videonumber'] ?>
                                        ویدیو</span></li>
                                <li><i class="fa fa-signal text-warning"></i><span><?= $row['level'] ?></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="crs_grid_foot">
                        <div class="crs_flex">
                            <div class="crs_fl_first">
                                <?php $query_author = "SELECT * FROM users WHERE userid='{$row['userid']}'";             // کوئری گرفتن نام مدرس
                                    $result_author = mysqli_query($link, $query_author);            //  اجراي کوئری
                                    $row_author = mysqli_fetch_array($result_author) ?>
                                <div class="crs_tutor">

                                    <div class="crs_tutor_name"><a><?= $row_author['name'] ?></a></div>
                                </div>
                            </div>
                            <div class="crs_fl_last">
                                <div class="crs_price">
                                    <h2><span class="theme-cl"><?= $row['price'] ?></span><span
                                            class="currency">تومان</span></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>

        </div>
    </div>
</section>
<!-- ============================ Course Detail ================================== -->


<?php
include('inc/footer.php');
?>