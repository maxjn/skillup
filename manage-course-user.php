<?php
include('inc/header.php');
//بررسی ورود کاربر وارد شده
if (!(isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true)) {
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

$url = $course_id = $name = $description = $course_link = $image = $price = $time = $videonumber = $level = $category =  $image = "";
// اکشن دکمه ویرایش
$btn_caption = "افزودن";
if (isset($_GET['action']) && $_GET['action'] == 'EDIT') {
    $id = $_GET['id'];

    $query = "SELECT * FROM courses WHERE courseid='$id' AND userid='{$_SESSION['userid']}'"; // کوئری نمايش محصول
    //کوئری گرفتن اطلاعات محصول
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
                    <h1 class="breadcrumb-title font-2"> دوره های من</h1>
                    <nav class="transparent">
                        <ol class="breadcrumb p-0">
                            <li class="breadcrumb-item"><a href="index.php">خانه</a></li>
                            <li class="breadcrumb-item active theme-cl" aria-current="page"> دوره های من</li>
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
            <form class="col-xl-12 col-lg-6 col-md-12 col-sm-12" method="post"
                action="action-manage-course-user.php<?= (!empty($url)) ? $url : ''; ?>" enctype="multipart/form-data">
                <div class="form-group">
                    <h4>اطلاعات دوره</h4>
                </div>
                <div class="row">
                    <div class="col-xl-2 col-lg-6 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label>کد دوره</label>
                            <input name="CourseId" value="<?= $course_id ?>" type="number" class="form-control"
                                placeholder="کد دوره" style="background-color: rgba(169,169,169,0.75)" readonly />
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label>نام دوره</label>
                            <input name="Name" value="<?= $name ?>" type="text" class="form-control"
                                placeholder="نام دوره" />
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label>دسته بندی دوره</label>
                            <input name="Category" value="<?= $category ?>" type="text" class="form-control"
                                placeholder=" دسته بندی" />
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label>زمان دوره</label>
                            <input name="Time" value="<?= $time ?>" type="text" class="form-control"
                                placeholder="n ساعت" />
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label>تعداد ویدیو ها</label>
                            <input name="VideoNumber" value="<?= $videonumber ?>" type="number" class="form-control"
                                placeholder="n ویدیو" />
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label>سطح دوره</label>
                            <input name="Level" value="<?= $level ?>" type="text" class="form-control"
                                placeholder="مقدماتی ,پیشرفته , ..." />
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label> لینک دانلود دوره</label>
                            <input name="Link" value="<?= $course_link ?>" type="text" class="form-control"
                                placeholder="http://..." />

                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-6 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label> قیمت</label>
                            <input name="Price" type="number" value="<?= $price ?>" class="form-control" />

                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label> تصویر</label>
                            <input name="Image" type="file" class="form-control" />

                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label>تصویر </label>
                            <img src="assets/img/<?= $image ?>" class="img-fluid rounded" alt="">
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label>توضیحات </label>
                            <textarea name="Description" type="text"
                                class="form-control">  <?= $description ?> </textarea>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group">
                            <button class="btn theme-bg text-white btn-md" type="submit"> <?= $btn_caption ?></button>
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
                $query = "SELECT * FROM courses WHERE userid='{$_SESSION['userid']}' "; //کوئری گرفتن تمام دوره های کاربر
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
                    <td> <?= $row['category'] ?></td>
                    <td> <?= $row['level'] ?></td>
                    <td> <?= $row['time'] ?> </td>
                    <td> <?= $row['videonumber'] ?> ویدیو</td>
                    <td> <?= $row['price'] ?></td>
                    <td> <?= $status ?></td>
                    <td><?= $row_count['COUNT(*)'] ?></td>
                    <td>
                        <a href="action-manage-course-user.php?id=<?= $row['courseid'] ?>&action=DELETE">حذف</a>
                        &nbsp;|&nbsp;
                        <a href="manage-course-user.php?id=<?= $row['courseid'] ?>&action=EDIT">ویرایش</a>

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