<?php
include('inc/header.php');
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
                    <th scope="col">تصویر</th>
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
                <tr>
                    <th scope="row">1</th>
                    <td>
                        <div class="crs_tutor_thumb">
                            <img src="assets/img/team-5.jpg" class="img-fluid circle" alt="">
                            </a>
                        </div>
                    </td>
                    <td> وب</td>
                    <td> مقدماتی</td>
                    <td> 5 ساعت</td>
                    <td> 3 ویدیو</td>
                    <td> 200000</td>
                    <td> پخش شده</td>
                    <td> 2</td>
                    <td>
                        <a href="action-class-manage.phpj?id=" title="دانلود" class="fa fa-download"></a>

                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
<!-- ============================ Table Detail ================================== -->

<?php
include('inc/footer.php');
?>