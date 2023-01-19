<?php
include('inc/header.php');
$link = mysqli_connect("localhost", "root", "", "skillupdb"); // ایجاد اتصال به پایگاه داده
if (mysqli_connect_errno()) //بازگرداندن خطای اتصال پایگاه داده
    exit("مشکلی در ارتباط پایگاه به جود امده :" . mysqli_connect_error());
mysqli_query($link, "set names utf8");
?>
<!-- ============================ Hero Banner  Start================================== -->
<div class="hero_banner image-cover image_bottom h2_bg" id="hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="simple-search-wrap text-right">
                    <div class="hero_search-2">
                        <div class="elsio_tag">همین حالا ثبت نام کنید</div>
                        <h1 class="banner_title mb-4 font-2">در بین هزاران ساعت آموزش جستجو کنید...</h1>
                        <p class="font-lg mb-4">در بین بیش از ۲۰,۰۰۰ ساعت آموزش اسکیل آپی جستجو کنید و به جمع میلیونی
                            دانشجویان اسکیل آپ بپیوندید</p>
                        <form class="input-group simple_search" action="courses.php" method="post">
                            <i class="fa fa-search ico"></i>
                            <input name="search" type="text" class="form-control" placeholder="نام دوره آموزش...">
                            <div class="input-group-append">
                                <button class="btn theme-bg" type="submit">جستجو</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="side_block">
                    <img src="assets/img/side-1.png" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================ Hero Banner End ================================== -->

<!-- ============================ Our Awards Start ================================== -->
<section class="p-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="crp_box ovr_top">
                    <div class="row align-items-center m-0">
                        <div class="col-xl-2 col-lg-3 col-md-2 col-sm-12">
                            <div class="crt_169">
                                <div class="crt_overt style_2">
                                    <h4>4.7</h4>
                                </div>
                                <div class="crt_stion">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="crt_io90">
                                    <h6>3,272 امتیاز</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-9 col-md-10 col-sm-12">
                            <div class="part_rcp">
                                <ul>
                                    <li>
                                        <div class="dro_140">
                                            <div class="dro_141"><i class="fa fa-layer-group"></i></div>
                                            <div class="dro_142">
                                                <h6>بهترین آموزش<br>غیرحضوری</h6>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="dro_140">
                                            <div class="dro_141 st-1"><i class="fa fa-business-time"></i></div>
                                            <div class="dro_142">
                                                <h6>دسترسی<br>مادام العمر</h6>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="dro_140">
                                            <div class="dro_141 st-2"><i class="fa fa-user-shield"></i></div>
                                            <div class="dro_142">
                                                <h6>بیش از 800<br>شرکت کننده</h6>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="dro_140">
                                            <div class="dro_141 st-3"><i class="fa fa-journal-whills"></i></div>
                                            <div class="dro_142">
                                                <h6>200+ دوره<br>دردسترس</h6>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ============================ Our Awards End ================================== -->


<!-- ============================ Latest Cources Start ================================== -->
<section id="lastcourses">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-8">
                <div class="sec-heading center">
                    <h3 class="font-2"> آخرین <span class="theme-cl">آموزش ها</span></h3>
                    <p>یه یادگیری جدید ترین مطالب روز دنیا بپردازید.</p>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <?php
            $counter = 0;
            $query = "SELECT * FROM courses WHERE status=1 ORDER BY courseid DESC";             // کوئری نمايش 6 دوره آخر
            $result = mysqli_query($link, $query);            //  اجراي کوئری
            while ($row = mysqli_fetch_array($result)) {
                if ($counter == 6) {
                    break;
                }
                $counter++;
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

        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-8 mt-2">
                <div class="text-center">
                    <a href="courses.php" class="btn btn-md theme-bg-light theme-cl">مشاهده سایر دوره ها</a>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- ============================ Latest Cources End ================================== -->

<!-- ============================ Featured Categories Start ================================== -->
<section class="min gray" id="categories">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-8">
                <div class="sec-heading center">
                    <h3 class="font-2">دسته بندی های <span class="theme-cl">منتخب</span></h3>
                </div>
            </div>
        </div>


        <div class="row justify-content-center">
            <!-- Single Category -->
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                <div class="crs_cate_wrap style_2">
                    <a href="courses.php" class="crs_cate_box">
                        <div class="crs_cate_icon"><i class="fa fa-code"></i></div>
                        <div class="crs_cate_caption"><span>برنامه نویسی</span></div>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                <div class="crs_cate_wrap style_2">
                    <a href="courses.php" class="crs_cate_box">
                        <div class="crs_cate_icon"><i class="fa fa-window-restore"></i></div>
                        <div class="crs_cate_caption"><span>طراحی سایت</span></div>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                <div class="crs_cate_wrap style_2">
                    <a href="courses.php" class="crs_cate_box">
                        <div class="crs_cate_icon"><i class="fa fa-leaf"></i></div>
                        <div class="crs_cate_caption"><span>سبک زندگی</span></div>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                <div class="crs_cate_wrap style_2">
                    <a href="courses.php" class="crs_cate_box">
                        <div class="crs_cate_icon"><i class="fa fa-heartbeat"></i></div>
                        <div class="crs_cate_caption"><span>ورزش و سلامتی</span></div>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                <div class="crs_cate_wrap style_2">
                    <a href="courses.php" class="crs_cate_box">
                        <div class="crs_cate_icon"><i class="fa fa-landmark"></i></div>
                        <div class="crs_cate_caption"><span>مالی و حسابداری</span></div>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                <div class="crs_cate_wrap style_2">
                    <a href="courses.php" class="crs_cate_box">
                        <div class="crs_cate_icon"><i class="fa fa-photo-video"></i></div>
                        <div class="crs_cate_caption"><span>عکاسی</span></div>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                <div class="crs_cate_wrap style_2">
                    <a href="courses.php" class="crs_cate_box">
                        <div class="crs_cate_icon"><i class="fa fa-stamp"></i></div>
                        <div class="crs_cate_caption"><span>بورس و سهام</span></div>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                <div class="crs_cate_wrap style_2">
                    <a href="courses.php" class="crs_cate_box">
                        <div class="crs_cate_icon"><i class="fa fa-school"></i></div>
                        <div class="crs_cate_caption"><span>تولید محتوا</span></div>
                    </a>
                </div>
            </div>
        </div>

    </div>
</section>
<div class="clearfix"></div>
<!-- ============================ Featured Categories End ================================== -->

<!-- ============================ Work Process Start ================================== -->
<section id="whyus">
    <div class="container">

        <div class="row align-items-center justify-content-between mb-5">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <div class="lmp_caption">
                    <h2 class="mb-3 font-2">چرا اسکیل آپ را انتخاب کنید؟</h2>
                    <p>اسکیل آپ برگزارکننده دوره‌های آموزشی آنلاین برنامه نویسی و طراحی وب و علم داده، با ۱۳ سال سابقه،
                        از شروع یادگیری تا استخدام در بازار کار در کنار دانشجو است.</p>
                    <div class="mb-3 ml-4 mr-lg-0 ml-lg-4">
                        <div class="d-flex align-items-center">
                            <div
                                class="rounded-circle bg-light-success theme-cl p-2 small d-flex align-items-center justify-content-center">
                                <i class="fas fa-check"></i>
                            </div>
                            <h6 class="mb-0 mr-3">دسترسی کاملا مادام العمر</h6>
                        </div>
                    </div>
                    <div class="mb-3 ml-4 mr-lg-0 ml-lg-4">
                        <div class="d-flex align-items-center">
                            <div
                                class="rounded-circle bg-light-success theme-cl p-2 small d-flex align-items-center justify-content-center">
                                <i class="fas fa-check"></i>
                            </div>
                            <h6 class="mb-0 mr-3">بیش از 20 منبع قابل دانلود</h6>
                        </div>
                    </div>
                    <div class="mb-3 ml-4 mr-lg-0 ml-lg-4">
                        <div class="d-flex align-items-center">
                            <div
                                class="rounded-circle bg-light-success theme-cl p-2 small d-flex align-items-center justify-content-center">
                                <i class="fas fa-check"></i>
                            </div>
                            <h6 class="mb-0 mr-3">اشتراک گذاری دوره هایتان با سایرین</h6>
                        </div>
                    </div>
                    <div class="text-right mt-4"><a href="courses.php" class="btn btn-md text-light theme-bg">شروع ثبت
                            نام</a>
                    </div>
                </div>
            </div>

            <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12">
                <div class="lmp_thumb">
                    <img src="assets/img/lmp-2.png" class="img-fluid" alt="" />
                </div>
            </div>
        </div>
    </div>
</section>

<section class="pt-0">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <div class="lmp_thumb">
                    <img src="assets/img/lmp-1.png" class="img-fluid" alt="" />
                </div>
            </div>
            <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12">
                <div class="lmp_caption">
                    <ol class="list-unstyled p-0">
                        <li class="d-flex align-items-start my-3 my-md-4">
                            <div
                                class="rounded-circle p-3 p-sm-4 d-flex align-items-center justify-content-center theme-bg">
                                <div class="position-absolute text-white h5 mb-0">1</div>
                            </div>
                            <div class="mr-3 mr-md-4">
                                <h4 class="font-2">ایجاد حساب کاربری</h4>
                            </div>
                        </li>
                        <li class="d-flex align-items-start my-3 my-md-4">
                            <div
                                class="rounded-circle p-3 p-sm-4 d-flex align-items-center justify-content-center theme-bg">
                                <div class="position-absolute text-white h5 mb-0">2</div>
                            </div>
                            <div class="mr-3 mr-md-4">
                                <h4 class="font-2">ثبت نام در دوره دلخواه</h4>

                            </div>
                        </li>
                        <li class="d-flex align-items-start my-3 my-md-4">
                            <div
                                class="rounded-circle p-3 p-sm-4 d-flex align-items-center justify-content-center theme-bg">
                                <div class="position-absolute text-white h5 mb-0">3</div>
                            </div>
                            <div class="mr-3 mr-md-4">
                                <h4 class="font-2">شروع به یادگیری</h4>

                            </div>
                        </li>
                        <li class="d-flex align-items-start my-3 my-md-4">
                            <div
                                class="rounded-circle p-3 p-sm-4 d-flex align-items-center justify-content-center theme-bg">
                                <div class="position-absolute text-white h5 mb-0">4</div>
                            </div>
                            <div class="mr-3 mr-md-4">
                                <h4 class="font-2">اشتراک گذاری آموخته ها در قالب دوره ای دیگر
                                </h4>

                            </div>
                        </li>
                    </ol>
                </div>
            </div>
        </div>

    </div>
</section>
<div class="clearfix"></div>
<!-- ============================ Work Process End ================================== -->

<!-- ============================ Students Reviews ================================== -->
<section class="gray" id="testimonials">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-8">
                <div class="sec-heading center">
                    <h3 class="font-2">نظرات <span class="theme-cl">دانش آموختگان</span></h3>
                    <p>آنچه اسکیل آپی ها درباره تجربه ی یادگیری خود می گویند</p>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-sm-12">

                <div class="reviews-slide space">

                    <!-- Single Item -->
                    <div class="single_items lios_item">
                        <div class="_testimonial_wrios shadow_none">
                            <div class="_testimonial_flex">
                                <div class="_testimonial_flex_first">
                                    <div class="_tsl_flex_thumb">
                                        <img src="assets/img/user-1.jpg" class="img-fluid" alt="">
                                    </div>
                                    <div class="_tsl_flex_capst">
                                        <h5>کیوان مختاری</h5>
                                        <div class="_ovr_posts"><span>برنامه نویس وب </span></div>
                                        <div class="_ovr_rates"><span><i class="fa fa-star"></i></span>4.7</div>
                                    </div>
                                </div>
                                <div class="_testimonial_flex_first_last">
                                    <div class="_tsl_flex_thumb">
                                        <img src="assets/img/c-1.png" class="img-fluid" alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="facts-detail">
                                <p>تا به حال دوره هایی با این حجم از کیفیت رو تو این همه مدت کارم ندیده بودم. تجربیات
                                    اساتید در دوره ها گفته شده و در کار من بسیار کمک کردند.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Single Item -->
                    <div class="single_items lios_item">
                        <div class="_testimonial_wrios shadow_none">
                            <div class="_testimonial_flex">
                                <div class="_testimonial_flex_first">
                                    <div class="_tsl_flex_thumb">
                                        <img src="assets/img/user-2.jpg" class="img-fluid" alt="">
                                    </div>
                                    <div class="_tsl_flex_capst">
                                        <h5>الهام نجفی</h5>
                                        <div class="_ovr_posts"><span>طراح UI /UX</span></div>
                                        <div class="_ovr_rates"><span><i class="fa fa-star"></i></span>4.5</div>
                                    </div>
                                </div>
                                <div class="_testimonial_flex_first_last">
                                    <div class="_tsl_flex_thumb">
                                        <img src="assets/img/c-2.png" class="img-fluid" alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="facts-detail">
                                <p>اساتید تجربیات بسیار با ارزشی رو در اختیار ما در دوره ها قرار دادن . واقعا از همگیشون
                                    ممنونم</p>
                            </div>
                        </div>
                    </div>

                    <!-- Single Item -->
                    <div class="single_items lios_item">
                        <div class="_testimonial_wrios shadow_none">
                            <div class="_testimonial_flex">
                                <div class="_testimonial_flex_first">
                                    <div class="_tsl_flex_thumb">
                                        <img src="assets/img/user-3.jpg" class="img-fluid" alt="">
                                    </div>
                                    <div class="_tsl_flex_capst">
                                        <h5>سعید مرادی</h5>
                                        <div class="_ovr_posts"><span>برنامه نویس بک اند </span></div>
                                        <div class="_ovr_rates"><span><i class="fa fa-star"></i></span>4.9</div>
                                    </div>
                                </div>
                                <div class="_testimonial_flex_first_last">
                                    <div class="_tsl_flex_thumb">
                                        <img src="assets/img/c-3.png" class="img-fluid" alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="facts-detail">
                                <p>از زمانی که با اسکیل آپ آشنا شدم پیشرفتم چندین برابر شده. موضوعات به شیوه خیلی راحتی
                                    تدریس میشن و نکات اساسی تو دوره ها مطرح میشه.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Single Item -->
                    <div class="single_items lios_item">
                        <div class="_testimonial_wrios shadow_none">
                            <div class="_testimonial_flex">
                                <div class="_testimonial_flex_first">
                                    <div class="_tsl_flex_thumb">
                                        <img src="assets/img/user-4.jpg" class="img-fluid" alt="">
                                    </div>
                                    <div class="_tsl_flex_capst">
                                        <h5>زهرا حسینی</h5>
                                        <div class="_ovr_posts"><span>مدیر لینکدین</span></div>
                                        <div class="_ovr_rates"><span><i class="fa fa-star"></i></span>4.7</div>
                                    </div>
                                </div>
                                <div class="_testimonial_flex_first_last">
                                    <div class="_tsl_flex_thumb">
                                        <img src="assets/img/c-4.png" class="img-fluid" alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="facts-detail">
                                <p>دوره ها با حساسیت و دقت بالایی طراحی شدن. برای این پلتفرم سپاسگزارم که دسترسی به این
                                    دوره هارو انقدر راحت کردن . براتون بهترین هارو آرزو میکنم</p>
                            </div>
                        </div>
                    </div>

                    <!-- Single Item -->
                    <div class="single_items lios_item">
                        <div class="_testimonial_wrios shadow_none">
                            <div class="_testimonial_flex">
                                <div class="_testimonial_flex_first">
                                    <div class="_tsl_flex_thumb">
                                        <img src="assets/img/user-5.jpg" class="img-fluid" alt="">
                                    </div>
                                    <div class="_tsl_flex_capst">
                                        <h5>مسعود شریعتی</h5>
                                        <div class="_ovr_posts"><span>مدیر عامل</span></div>
                                        <div class="_ovr_rates"><span><i class="fa fa-star"></i></span>4.7</div>
                                    </div>
                                </div>
                                <div class="_testimonial_flex_first_last">
                                    <div class="_tsl_flex_thumb">
                                        <img src="assets/img/c-5.png" class="img-fluid" alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="facts-detail">
                                <p>زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود
                                    طراحی اساسا مورد استفاده قرار گیرد.</p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>
</section>
<!-- ============================ Students Reviews End ================================== -->

<?php
include('inc/footer.php');
?>