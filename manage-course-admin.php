<?php
include('inc/header.php');
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
                            <input name="CourseId" type="number" class="form-control" placeholder="کد دوره" />
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label>نام دوره</label>
                            <input name="CourseName" type="text" class="form-control" placeholder="نام دوره" />
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-6 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label>کد مدرس</label>
                            <input name="TeacherId" type="number" class="form-control" placeholder="کد مدرس" />
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label>نام مدرس</label>
                            <input name="TeacherName" type="text" class="form-control" placeholder="نام مدرس" />
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label>دسته بندی دوره</label>
                            <input name="Category" type="text" class="form-control" placeholder=" دسته بندی" />
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label>زمان دوره</label>
                            <input name="Time" type="text" class="form-control" placeholder="n ساعت" />
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label>تعداد ویدیو ها</label>
                            <input name="VideoNumber" type="number" class="form-control" placeholder="n ویدیو" />
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label>سطح دوره</label>
                            <input name="Level" type="text" class="form-control" placeholder="مقدماتی ,پیشرفته , ..." />
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label> لینک دانلود دوره</label>
                            <br />
                            <a href="">
                                دانلود
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label> وضعیت دوره</label>
                            <input name="Status" type="text" class="form-control" />
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label>توضیحات </label>
                            <textarea name="Description" type="text" class="form-control"> </textarea>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label>تصویر </label>
                            <img src="assets/img/cr-3.jpg" class="img-fluid rounded" alt="">
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
                    <th scope="col">کد مدرس</th>
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
                <tr>
                    <th scope="row">1</th>
                    <td>2</td>
                    <td>نام دوره</td>
                    <td> وب</td>
                    <td> مقدماتی</td>
                    <td> 5 ساعت</td>
                    <td> 3 ویدیو</td>
                    <td> 200000</td>
                    <td> پخش شده</td>
                    <td>2</td>
                    <td>
                        <a href="action-class-manage.phpj?id=">پخش</a>
                        &nbsp;|&nbsp;
                        <a href="action-class-manage.phpj?id=">اصلاح</a>
                        &nbsp;|&nbsp;
                        <a href="action-class-manage.phpj?id=">رد</a>

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