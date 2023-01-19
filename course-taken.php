<?php
include('inc/header.php');
//وضعیت ورود کار بر را بررسی و در صورت وارد نشده بودن  به صفحه ورود هدایت می کند
if (!(isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true)) {
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
?>
<!-- ============================ Page Title Start================================== -->
<section class="page-title gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">

                <div class="breadcrumbs-wrap">
                    <h1 class="breadcrumb-title font-2"> دوره های ثبت نامی</h1>
                    <nav class="transparent">
                        <ol class="breadcrumb p-0">
                            <li class="breadcrumb-item"><a href="index.php">خانه</a></li>
                            <li class="breadcrumb-item active theme-cl" aria-current="page"> دوره های ثبت نامی</li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- ============================ Page Title End ================================== -->

<!-- ============================ Table Detail ================================== -->
<section>
    <div class="container">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">نام دوره</th>
                    <th scope="col">نام مدرس</th>
                    <th scope="col">دسته بندی </th>
                    <th scope="col">سطح</th>
                    <th scope="col">زمان </th>
                    <th scope="col">ویدیو ها</th>
                    <th scope="col"> قیمت</th>
                    <th scope="col"> دانلود</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM sells WHERE userid='{$_SESSION['userid']}' "; //کوئری گرفتن تمام خرید های کاربر
                $result = mysqli_query($link, $query);
                //حلقه نمایش خرید ها

                while ($row = mysqli_fetch_array($result)) {
                    //کوئری گرفتن اطلاعات دوره
                    $query_course = "SELECT * FROM courses WHERE courseid='{$row['courseid']}' ";
                    $result_course = mysqli_query($link, $query_course);
                    $row_course = mysqli_fetch_array($result_course);

                    //کوئری گرفتن اطلاعات مدرس
                    $query_teacher = "SELECT * FROM users WHERE userid='{$row_course['userid']}' ";
                    $result_teacher = mysqli_query($link, $query_teacher);
                    $row_teacher = mysqli_fetch_array($result_teacher);
                ?>
                <tr>
                    <th scope="row"><?= $row['sellid'] ?></th>
                    <td> <?= $row_course['name'] ?></td>
                    <td> <?= $row_teacher['name'] ?></td>
                    <td> <?= $row_course['category'] ?></td>
                    <td> <?= $row_course['level'] ?></td>
                    <td> <?= $row_course['time'] ?></td>
                    <td> <?= $row_course['videonumber'] ?> ویدیو</td>
                    <td> <?= $row_course['price'] ?> ت</td>
                    <td>
                        <a href="<?= $row_course['link'] ?>" title="دانلود" class="fa fa-download"></a>

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