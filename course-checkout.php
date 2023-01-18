<?php
include('inc/header.php');
?>
<!-- ============================ Page Title Start================================== -->
<section class="page-title gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">

                <div class="breadcrumbs-wrap">
                    <h1 class="breadcrumb-title font-2">تسویه حساب</h1>
                    <nav class="transparent">
                        <ol class="breadcrumb p-0">
                            <li class="breadcrumb-item"><a href="index.php">خانه</a></li>
                            <li class="breadcrumb-item active theme-cl" aria-current="page">تسویه حساب</li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- ============================ Page Title End ================================== -->

<!-- ============================ Our Story Start ================================== -->
<section class="gray-simple">

    <div class="container">


        <!-- row Start -->
        <div class="row frm_submit_block">
            <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="submit-page mb-4">
                    <!-- row -->
                    <form class="row">

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h3 class="mr-0 font-2">جزئیات صورت حساب</h3>
                        </div>

                        <div class="col-lg-2 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label> کد دوره <i class="req">*</i></label>
                                <input type="text" class="form-control" style="background-color: rgba(169,169,169,0.75)"
                                    readonly />
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label> نام دوره <i class="req">*</i></label>
                                <input type="text" class="form-control" style="background-color: rgba(169,169,169,0.75)"
                                    readonly />
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label> کد خریدار <i class="req">*</i></label>
                                <input type="text" class="form-control" style="background-color: rgba(169,169,169,0.75)"
                                    readonly />
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label> نام خریدار <i class="req">*</i></label>
                                <input type="text" class="form-control" style="background-color: rgba(169,169,169,0.75)"
                                    readonly />
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <button type="submit" class="btn theme-bg btm-md full-width">پرداخت</button>
                            </div>
                        </div>



                    </form>
                    <!--/row -->
                </div>


            </div>

            <!-- Col-lg 4 -->
            <div class="col-lg-4 col-md-12 col-sm-12">

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h3 class="font-2">خرید شما</h3>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="pro_product_wrap">
                        <h5>پکیج نقره ای</h5>
                        <ul>
                            <li><strong>هزینه پکیج</strong>319 تومان</li>
                            <li><strong>ارزش افزوده</strong>319 تومان</li>
                            <li><strong>هزینه ارسال</strong>10 تومان</li>
                            <li><strong>جمع کل</strong>329 تومان</li>
                        </ul>
                    </div>
                </div>

            </div>
            <!-- /col-lg-4 -->
        </div>
        <!-- /row -->

    </div>

</section>
<!-- ============================ Our Story End ================================== -->
<?php
include('inc/footer.php');
?>