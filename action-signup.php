<?php
session_start();
//وضعیت ورود کار بر را بررسی و در صورت ورود قبلی به صفحه اصلی هدایت می کند
if (isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true) {
?>
<script type="text/javascript">
location.replace("index.php");
</script>

<?php
    exit();
}

$alert = "<script type='text/javascript'>
    <!--
    location.replace('signup.php');
    -->
    </script> ";
//بررسی پر بودن فیلد ها
if (
    isset($_POST['Name'])  && !empty(Trim($_POST['Name'])) &&
    isset($_POST['Email']) && !empty(Trim($_POST['Email'])) &&
    isset($_POST['UserName']) && !empty(Trim($_POST['UserName'])) &&
    isset($_POST['Password']) && !empty(Trim($_POST['Password'])) &&
    isset($_POST['RepeatPassword']) && !empty(Trim($_POST['RepeatPassword']))
) {

    $Name = $_POST['Name'];
    $UserName = $_POST['UserName'];
    $Password = $_POST['Password'];
    $RepeatPassword = $_POST['RepeatPassword'];
    $Email = $_POST['Email'];
} else { // اگر فیلد ها خالی بودند
    $_SESSION["alert"] = "Empty"; //مشخص کردن خطای رخ داده
    echo ($alert);
    exit();
}


if ($Password != $RepeatPassword) { //مقایسه رمز و تکرار آن
    $_SESSION["alert"] = "FailPassword";
    echo ($alert);
    exit();
}

if (filter_var($Email, FILTER_VALIDATE_EMAIL) === false) { //بررسی صحیح بودن ایمیل وارد شده
    $_SESSION["alert"] = "Email";
    echo ($alert);
    exit();
}

$link = mysqli_connect("localhost", "root", "", "skillupdb"); // ایجاد اتصال به پایگاه داده

if (mysqli_connect_errno()) //بازگرداندن خطای اتصال پایگاه داده
    exit("مشکلی در ارتباط پایگاه به جود امده :" . mysqli_connect_error());
mysqli_query($link, "set names utf8");

$query = "SELECT * FROM `users` WHERE username='$UserName'";
$result = mysqli_query($link, $query);
if ($row = mysqli_fetch_array($result)) { //بررسی تکراری نبودن نام کاربری
    $_SESSION["alert"] = "Username";
    echo ($alert);
    exit();
} else {
    $query = "INSERT INTO `users`(`username`, `name`, `email`, `password`, `type`) VALUES ('$UserName','$Name','$Email','$Password','0')";
    if (mysqli_query($link, $query) === true) { //ثبت نام موفق
        $_SESSION["alert"] = "Register";
        echo ($alert);
        exit();
    } else {
        $_SESSION["alert"] = "FailRegister";
        echo ($alert);
        exit();
    }
    mysqli_close($link);
}
?>