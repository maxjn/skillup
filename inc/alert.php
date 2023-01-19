 <!-- Alert Start -->
 <div class="notify alert-danger"><span id="notifyType" class=""></span></div>
 <div class="notifysuc alert-success"><span id="notifysucType" class=""></span></div>
 <!-- Alert Start -->

 <?php
    if (isset($_SESSION["alert"])) { //بررسی موجود بودن هشدار

        if ($_SESSION["alert"] == "Success") { //نوع هشدار ورود موفق
    ?>
 <script type="text/javascript">
alertSuccessLogin();
 </script>
 <?php } ?>

 <?php
        if ($_SESSION["alert"] == "Empty") { //نوع هشدار خالی بودن فیلد
        ?>
 <script type="text/javascript">
alertEmpty();
 </script>
 <?php } ?>

 <?php
        if ($_SESSION["alert"] == "Unvalid") { //نوع هشدار نامعتبر بودن رمز یا نام کاربری
        ?>
 <script type="text/javascript">
alertUnvalid();
 </script>
 <?php } ?>

 <?php
        if ($_SESSION["alert"] == "Send") { //نوع هشدار ارسال پیام موفق
        ?>
 <script type="text/javascript">
alertSuccessSend();
 </script>
 <?php } ?>

 <?php
        if ($_SESSION["alert"] == "Checkout") { //نوع هشدار رزرو موفق
        ?>
 <script type="text/javascript">
alertSuccessCheckout();
 </script>
 <?php } ?>

 <?php
        if ($_SESSION["alert"] == "Register") { //نوع هشدار عضویت موفق
        ?>
 <script type="text/javascript">
alertSuccessRegister();
 </script>
 <?php } ?>

 <?php
        if ($_SESSION["alert"] == "SucEdit") { //نوع هشدار ویرایش موفق
        ?>
 <script type="text/javascript">
alertSuccessEdit();
 </script>
 <?php } ?>

 <?php
        if ($_SESSION["alert"] == "FailEdit") { //نوع هشدار ویرایش ناموفق
        ?>
 <script type="text/javascript">
alertEdit();
 </script>
 <?php } ?>

 <?php
        if ($_SESSION["alert"] == "SucDelet") { //نوع هشدار حذف موفق
        ?>
 <script type="text/javascript">
alertSuccessDelet();
 </script>
 <?php } ?>

 <?php
        if ($_SESSION["alert"] == "FailDelet") { //نوع هشدار حذف ناموفق
        ?>
 <script type="text/javascript">
alertDelet();
 </script>
 <?php } ?>

 <?php
        if ($_SESSION["alert"] == "NotImg") { //نوع هشدار تصویر نبودن
        ?>
 <script type="text/javascript">
alertNotImg();
 </script>
 <?php } ?>

 <?php
        if ($_SESSION["alert"] == "ImgExists") { //نوع هشدار وجود تصویر از قبل
        ?>
 <script type="text/javascript">
alertImgExists();
 </script>
 <?php } ?>

 <?php
        if ($_SESSION["alert"] == "ImgSize") { //نوع هشداراندازه تصویر
        ?>
 <script type="text/javascript">
alertImgSize();
 </script>
 <?php } ?>

 <?php
        if ($_SESSION["alert"] == "ImgType") { //نوع هشدار نوف تصویر
        ?>
 <script type="text/javascript">
alertImgType();
 </script>
 <?php } ?>

 <?php
        if ($_SESSION["alert"] == "ImgSend") { //نوع هشدارارسالنشدن تصویر
        ?>
 <script type="text/javascript">
alertImgSend();
 </script>
 <?php } ?>

 <?php
        if ($_SESSION["alert"] == "SucInsert") { //نوع هشدارارسالنشدن تصویر
        ?>
 <script type="text/javascript">
alertSuccessInsert();
 </script>
 <?php } ?>

 <?php
        if ($_SESSION["alert"] == "Email") { //نوع هشدارارسالنشدن تصویر
        ?>
 <script type="text/javascript">
alertEmail();
 </script>
 <?php } ?>

 <?php
        if ($_SESSION["alert"] == "FailPassword") { //نوع هشدارتکرار رمز نادرست
        ?>
 <script type="text/javascript">
alertPassword();
 </script>
 <?php } ?>

 <?php
        if ($_SESSION["alert"] == "Username") { //نوع هشدارنام کاربری تکراری
        ?>
 <script type="text/javascript">
alertUsername();
 </script>
 <?php } ?>

 <?php
        if ($_SESSION["alert"] == "FailRegister") { //نوع هشدارنام عصویت نا موفق
        ?>
 <script type="text/javascript">
alertRegister();
 </script>
 <?php } ?>

 <?php
        if ($_SESSION["alert"] == "First") { //نوع هشداراول ورود یا غضویت
        ?>
 <script type="text/javascript">
alertFirst();
 </script>
 <?php } ?>

 <?php
        if ($_SESSION["alert"] == "More") { //نوع هشدارتغداد بیشتر ظرفیت
        ?>
 <script type="text/javascript">
alertMore();
 </script>
 <?php } ?>

 <?php
        if ($_SESSION["alert"] == "FailCheckout") { //نوع هشدارتغداد بیشتر ظرفیت
        ?>
 <script type="text/javascript">
alertCheckout();
 </script>
 <?php } ?>

 <?php
        if ($_SESSION["alert"] == "FailSend") { //نوع هشداارسال پیام ناموفق
        ?>
 <script type="text/javascript">
alertSend();
 </script>
 <?php } ?>

 <?php
        if ($_SESSION["alert"] == "FailCurPass") { //نوع هشداعدم مطابقت رمز کنونی
        ?>
 <script type="text/javascript">
alertCurPass();
 </script>
 <?php } ?>

 <?php
        if ($_SESSION["alert"] == "FailCardNumber") { //نوع هشداعدم شماره کارت نادرست ی
        ?>
 <script type="text/javascript">
alertCardNamber();
 </script>
 <?php } ?>

 <?php
    }
    unset($_SESSION["alert"]);
    ?>