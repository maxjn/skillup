<?php
include('inc/header.php');
//بررسی مدیر   بودن کاربر وارد شده
if (!(isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true && $_SESSION["user_type"] == "admin")) {
?>
<script type="text/javascript">
//انتقال به صفحه اصلی

location.replace("index.php");
</script>
<?php
} // if پایان

$link = mysqli_connect("localhost", "root", "", "skillupdb"); // ایجاد اتصال به پایگاه داده
if (mysqli_connect_errno()) //بازگرداندن خطای اتصال پایگاه داده
    exit("مشکلی در ارتباط پایگاه به جود امده :" . mysqli_connect_error());
mysqli_query($link, "set names utf8");

$url = $course_id = $name = $description = $course_link = $image = $price = $time = $videonumber = $level = $category =  $image = $teacher_id =  $teacher_name = $status =  "";
// اکشن دکمه ویرایش
$btn_caption = "افزودن";
if (isset($_GET['action']) && $_GET['action'] == 'DETAIL') {
    $id = $_GET['id'];
    $query = "SELECT * FROM courses WHERE courseid='$id'"; // کوئری نمايش دوره
    //کوئری گرفتن اطلاعات دوره
    $result = mysqli_query($link, $query);
    if ($row = mysqli_fetch_array($result)) {
        $course_id = $row['courseid'];
        $name = $row['name'];
        $description = $row['description'];
        $image = $row['image'];
        $price = $row['price'];
        $course_link = $row['link'];
        $time = $row['time'];
        $videonumber = $row['videonumber'];
        $level = $row['level'];
        $category = $row['category'];
        $course_link = $row['link'];
        $teacher_id = $row['userid'];

        $status = 'در انتظار تایید';
        if ($row['status'] == 1) {
            $status = 'منتشر شده';
        } elseif ($row['status'] == 2) {
            $status = 'نیازمند ویرایش';
        }


        $query_teacher = "SELECT * FROM users WHERE userid='{$row['userid']}'"; // کوئری نمايش دوره
        //کوئری گرفتن اطلاعات دوره
        $result_teacher = mysqli_query($link, $query_teacher);
        $row_teacher = mysqli_fetch_array($result_teacher);
        $teacher_name = $row_teacher['name'];


        $url = "?id=$course_id&action=EDIT";
        $btn_caption = "ويرايش";
    }
}

?>
<!-- ============================ Page Title Start================================== -->
<section class="page-title gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">

                <div class="breadcrumbs-wrap">
                    <h1 class="breadcrumb-title font-2">مدیریت دوره ها</h1>
                    <nav class="transparent">
                        <ol class="breadcrumb p-0">
                            <li class="breadcrumb-item"><a href="index.php">خانه</a></li>
                            <li class="breadcrumb-item active theme-cl" aria-current="page">مدیریت دوره ها</li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- ============================ Page Title End ================================== -->

<!-- ============================ ّForm Detail ================================== -->
<section>
    <div class="container">
        <div class="row align-items-start">
            <form class="col-xl-12 col-lg-6 col-md-12 col-sm-12" method="posst" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <h4>اطلاعات دوره</h4>
                </div>
                <div class="row">
                    <div class="col-xl-2 col-lg-6 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label>کد دوره</label>
                            <input name="CourseId" value="<?= $course_id ?>" type="number" class="form-control"
                                placeholder="کد دوره" readonly />
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label>نام دوره</label>
                            <input name="CourseName" value="<?= $name ?>" type="text" class="form-control"
                                placeholder="نام دوره" readonly />
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-6 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label>کد مدرس</label>
                            <input name="TeacherId" value="<?= $teacher_id ?>" type="number" class="form-control"
                                placeholder="کد مدرس" readonly />
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label>نام مدرس</label>
                            <input name="TeacherName" value="<?= $teacher_name ?>" type="text" class="form-control"
                                placeholder="نام مدرس" readonly />
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label>دسته بندی دوره</label>
                            <input name="Category" value="<?= $category ?>" type="text" class="form-control"
                                placeholder=" دسته بندی" readonly />
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label>زمان دوره</label>
                            <input name="Time" value="<?= $time ?>" type="text" class="form-control"
                                placeholder="n ساعت" readonly />
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label>تعداد ویدیو ها</label>
                            <input name="VideoNumber" value="<?= $videonumber ?>" type="number" class="form-control"
                                placeholder="n ویدیو" readonly />
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label>سطح دوره</label>
                            <input name="Level" value="<?= $level ?>" type="text" class="form-control"
                                placeholder="مقدماتی ,پیشرفته , ..." readonly />
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label> لینک دانلود دوره</label>
                            <br />
                            <a href="$course_link">
                                دانلود
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label> وضعیت دوره</label>
                            <input name="Status" value="<?= $status ?>" type="text" class="form-control" readonly />
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label>توضیحات </label>
                            <textarea name="Description" type="text" class="form-control"
                                readonly> <?= $description ?></textarea>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label>تصویر </label>
                            <img src="assets/img/<?= $image ?>" class="img-fluid rounded" alt="">
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</section>
<!-- ============================ ّForm Detail ================================== -->

<!-- ============================ Table Detail ================================== -->
<section>
    <div class="container">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">نام</th>
                    <th scope="col">کد مدرس</th>
                    <th scope="col">دسته بندی </th>
                    <th scope="col">سطح</th>
                    <th scope="col">زمان </th>
                    <th scope="col"> ویدیو ها</th>
                    <th scope="col"> قیمت</th>
                    <th scope="col"> وضعیت</th>
                    <th scope="col"> شرکت کننده</th>
                    <th scope="col"> </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM courses "; //کوئری گرفتن تمام دوره های کاربران
                $result = mysqli_query($link, $query);
                //حلقه نمایش خرید ها

                while ($row = mysqli_fetch_array($result)) {
                    //کوئری گرفتن اطلاعات دوره
                    $query_count = "SELECT COUNT(*) FROM sells WHERE courseid='{$row['courseid']}' ";
                    $result_count = mysqli_query($link, $query_count);
                    $row_count = mysqli_fetch_array($result_count);

                    $status = 'در انتظار تایید';
                    if ($row['status'] == 1) {
                        $status = 'منتشر شده';
                    } elseif ($row['status'] == 2) {
                        $status = 'نیازمند ویرایش';
                    }

                ?>
                <tr>
                    <th scope="row"><?= $row['courseid'] ?></th>
                    <td> <?= $row['name'] ?></td>
                    <td><?= $row['userid'] ?></td>
                    <td> <?= $row['category'] ?></td>
                    <td> <?= $row['level'] ?></td>
                    <td> <?= $row['time'] ?></td>
                    <td> <?= $row['videonumber'] ?> ویدیو</td>
                    <td> <?= $row['price'] ?> ت</td>
                    <td> <?= $status ?></td>
                    <td><?= $row_count['COUNT(*)'] ?></td>
                    <td>
                        <a href="action-manage-course-admin.php?id=<?= $row['courseid'] ?>&status=1">پخش</a>
                        &nbsp;|&nbsp;
                        <a href="action-manage-course-admin.php?id=<?= $row['courseid'] ?>&status=2">اصلاح</a>
                        &nbsp;|&nbsp;
                        <a href="manage-course-admin.php?id=<?= $row['courseid'] ?>&action=DETAIL">جزئیات</a>

                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</section>
<!-- ============================ Table Detail ================================== -->

<?php
include('inc/footer.php');
?>