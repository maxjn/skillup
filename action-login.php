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
    location.replace('login.php');
    -->
    </script> ";
//بررسی پر بودن فیلد ها
if (
    isset($_POST['UserName']) && !empty(Trim($_POST['UserName'])) &&
    isset($_POST['Password']) && !empty(Trim($_POST['Password']))
) {


    $UserName = $_POST['UserName'];
    $Password = $_POST['Password'];
} else { // اگر فیلد ها خالی بودند
    $_SESSION["alert"] = "Empty"; //مشخص کردن خطای رخ داده
    echo ($alert);
    exit();
}


$link = mysqli_connect("localhost", "root", "", "skillupdb"); // ایجاد اتصال به پایگاه داده
if (mysqli_connect_errno()) //بازگرداندن خطای اتصال پایگاه داده
    exit("مشکلی در ارتباط پایگاه به جود امده :" . mysqli_connect_error());
mysqli_query($link, "set names utf8");

// کوئری برگرداندن کاربر با نام و نام کاربری مشخص شده
$query = "SELECT * FROM users WHERE username='$UserName' AND password='$Password'";
$result = mysqli_query($link, $query);   //اجرای کوئری نوشته شده بالا

$row = mysqli_fetch_array($result);   //ذخیره اطلاعات رکورد برگردانده شده

if ($row) { // سیو اطلاعات و وضعیت ورود کاربر در سایت
    $_SESSION["state_login"] = true;
    $_SESSION["name"] = $row['name'];
    $_SESSION["username"] = $row['username'];
    $_SESSION["userid"] = $row['userid'];
    $_SESSION["alert"] = "Success";

    if ($row["type"] == 0)
        $_SESSION["user_type"] = "public";

    elseif ($row["type"] == 1)
        $_SESSION["user_type"] = "admin";

?>
<script type='text/javascript'>
location.replace('index.php');
</script>
<?php
} else { // خروج و تعین خطای آن به دلیل نامعتبر بودن رمز یا یوزرنیم
    $_SESSION["alert"] = "Unvalid";
    echo ($alert);
}

mysqli_close($link);   // قطع اتصال پايگاه داده

?>