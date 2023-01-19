<?php
session_start();
//بررسی مدیر بودن کاربر وارد شده
if (!(isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true && $_SESSION["user_type"] ==
    "admin")) {
?>
<script type="text/javascript">
//انتقال به صفحه اصلی

location.replace("index.php");
</script>
<?php

} // if پایان
$alert = "<script type='text/javascript'>
        <!--
        location.replace('manage-course-admin.php');
        -->
        </script>";

$course_id = 0;
$course_status = 0;
if (isset($_GET['id']) && isset($_GET['status'])) {
    $course_id = $_GET['id'];
    $course_status = $_GET['status'];
    $link = mysqli_connect("localhost", "root", "", "skillupdb"); // ایجاد اتصال به پایگاه داده

    if (mysqli_connect_errno()) //بازگرداندن خطای اتصال پایگاه داده
        exit("مشکلی در ارتباط پایگاه به جود امده :" . mysqli_connect_error());
    mysqli_query($link, "set names utf8");

    $query = "UPDATE courses  SET status='$course_status' WHERE courseid='$course_id' "; //کوئری تغییر وضعیت دوره


    if (mysqli_query($link, $query) === true) { //ویرایش موفق
        $_SESSION["alert"] = "SucEdit";
        echo ($alert);
        exit();
    } else { //ویرایش ناموفق
        $_SESSION["alert"] = "FailEdit";
        echo ($alert);
        exit();
    }
} else { // اگر متغیر ها ست نشده بودند
    echo ($alert);
    exit();
}