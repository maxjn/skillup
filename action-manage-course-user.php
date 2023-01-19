<?php
session_start();
//بررسی مدیر یا فروشنده بودن کاربر وارد شده
if (!(isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true)) {
?>
<script type="text/javascript">
//انتقال به صفحه اصلی

location.replace("index.php");
</script>
<?php

} // if پایان
$alert = "<script type='text/javascript'>
        <!--
        location.replace('manage-course-user.php');
        -->
        </script>";

//بررسي پر بودن فیلد ها در صورتی که اکشن حذف نبود
if (!(isset($_GET['action']) && $_GET['action'] == 'DELETE')) {

    if ((isset($_POST['Name']) && !empty(Trim($_POST['Name'])) &&
        isset($_POST['Category']) && !empty(Trim($_POST['Category'])) &&
        isset($_POST['Time']) && !empty(Trim($_POST['Time'])) &&
        isset($_POST['VideoNumber']) && !empty(Trim($_POST['VideoNumber'])) &&
        isset($_POST['Level']) && !empty(Trim($_POST['Level'])) &&
        isset($_POST['Link']) && !empty(Trim($_POST['Link'])) &&
        isset($_POST['Price']) && !empty(Trim($_POST['Price'])) &&
        isset($_POST['Description']) && !empty(Trim($_POST['Description'])))) {
        // ذخيره اطلاعاتي
        $Name = $_POST['Name'];
        $Category = $_POST['Category'];
        $Time = $_POST['Time'];
        $VideoNumber = $_POST['VideoNumber'];
        $Level = $_POST['Level'];
        $Link = $_POST['Link'];
        $Price = $_POST['Price'];
        $Description = $_POST['Description'];
        $Picture = basename($_FILES["Image"]["name"]);
    } else { // خروج و تعین خطای آن به دلیل خالی بودن فیلد
        $_SESSION["alert"] = "Empty";
        echo ($alert);
        exit();
    }
}


$link = mysqli_connect("localhost", "root", "", "skillupdb"); // ایجاد اتصال به پایگاه داده
if (mysqli_connect_errno()) //بازگرداندن خطای اتصال پایگاه داده
    exit("مشکلی در ارتباط پایگاه به جود امده :" . mysqli_connect_error());
mysqli_query($link, "set names utf8");

//ویرایش و حذف تور
if (isset($_GET['action'])) {

    $id = $_GET['id'];

    switch ($_GET['action']) {
            //ویرایش
        case 'EDIT':
            $query = "UPDATE `courses` SET `name`='$Name',`description`='$Description',`category`='$Category',`time`='$Time',`videonumber`='$VideoNumber',`level`='$Level',`link`='$Link',`price`='$Price',`status`='0' WHERE courseid='$id'";

            if (mysqli_query($link, $query) === true) { //ویرایش موفق
                $_SESSION["alert"] = "SucEdit";
                echo ($alert);
                exit();
            } else { //ویرایش ناموفق
                $_SESSION["alert"] = "FailEdit";
                echo ($alert);
                exit();
            }

            break;
            //حذف
        case 'DELETE':

            $query = "SELECT image  FROM courses
                WHERE courseid='$id'"; //کوئری گرفتن تصویر دوره
            $result = mysqli_query($link, $query);
            $row = mysqli_fetch_array($result);
            $Picture = $row['image'];
            //کوئری حذف دوره
            $query = "DELETE  FROM courses
             WHERE courseid='$id'";

            if (mysqli_query($link, $query) === true) { //حذف موفق
                $_SESSION["alert"] = "SucDelet";
                unlink("assets/img/" . $Picture); //حذف تصویر دوره در فایل ها
                echo ($alert);
                exit();
            } else { //حذف ناموفق
                $_SESSION["alert"] = "FailDelet";
                echo ($alert);
                exit();
            }
            break;
    } //switch
    mysqli_close($link);
    exit();
} //if


$target_dir = "assets/img/";
$target_file = $target_dir . basename($_FILES["Image"]["name"]);
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

//بررسی تصویر بودن فایل
$check = getimagesize($_FILES["Image"]["tmp_name"]);
if ($check == false) {
    $_SESSION["alert"] = "NotImg";
    echo ($alert);
    exit();
}

//بررسی موجود بودن از قبل
if (file_exists($target_file)) {
    $_SESSION["alert"] = "ImgExists";
    echo ($alert);
    exit();
}

//بررسی پسوند تصویر
if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType !=
    "jpeg" && $imageFileType != "gif"
) {
    $_SESSION["alert"] = "ImgType";
    echo ($alert);
    exit();
}
//ارسال تصویر به پوشه هاست
if (!(move_uploaded_file($_FILES["Image"]["tmp_name"], $target_file))) {
    $_SESSION["alert"] = "ImgSend";
    echo ($alert);
    exit();
}
//افزودن رکورد جدید
$query = "INSERT INTO `courses`( `userid`, `name`, `description`, `category`, `time`, `videonumber`, `level`, `image`, `link`, `price`, `status`) VALUES
('{$_SESSION['userid']}','$Name','$Description','$Category','$Time','$VideoNumber','$Level','$Picture','$Link','$Price','0')";

if (mysqli_query($link, $query) === true) {
    $_SESSION["alert"] = "SucInsert";
    echo ($alert);
} else {
    $_SESSION["alert"] = "FailInsert";
    echo ($alert);
}


mysqli_close($link);