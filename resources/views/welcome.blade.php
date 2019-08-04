<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrt-token" content="{{csrf_token()}}">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>مدیریت وب سایت</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{mix('css/app.css')}}" rel="stylesheet">

</head>

<body>

<div id="app">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <router-link class="navbar-brand" :to="{name:'home'}" >Reza Simple Blog</router-link>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> نام مدیر <b
                            class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="#"><i class="fa fa-fw fa-user"></i> پروفایل</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-gear"></i> تنظیمات</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <form action="/logout" method="post">@csrf<input type="submit" value="خروج"><i class="fa fa-fw fa-power-off"></i> </form>>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li>
                    <router-link to=""><i class="fa fa-fw fa-dashboard"></i>داشبورد</router-link>
                </li>
                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#users"><i class="fa fa-fw fa-users"></i>
                        کاربران <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="users" class="collapse">
                        <li>
                            <router-link :to="{name:'users'}">لیست کاربرها</router-link>
                        </li>
                        <li>
                            <a href="#">افزودن کاربر</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#posts"><i
                                class="fa fa-fw fa-file-text"></i> نوشته ها <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="posts" class="collapse">
                        <li>
                            <router-link to="">لیست نوشته ها</router-link>
                        </li>
                        <li>
                            <router-link to="">افزودن نوشته</router-link>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#categories"><i
                                class="fa fa-fw fa-tasks"></i> دسته بندی <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="categories" class="collapse">
                        <li>
                            <router-link to="">لیست دسته بندی ها</router-link>
                        </li>
                        <li>
                            <router-link to="">افزودن دسته بندی</router-link>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">

        <div class="container">


            <!-- /.row -->
            <app-component></app-component>

            <vue-snotify></vue-snotify>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->


<script src="{{mix('js/app.js')}}"></script>
<script src="{{mix('js/vue.js')}}"></script>

</body>

</html>
