<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Laravel 5</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        @section('style')
        @show
    </head>
    <body>
        <header>
        </header>

        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                
                    <a class="navbar-brand" href="/guest/index">商城首頁</a>
                </div>
            
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        @if (!$aUserItem)
                        <li class=""><a href="/guest/login"><span class="glyphicon glyphicon-user"></span> 登入 <span class="sr-only">(current)</span></a></li>
                        <li><a href="/guest/signup"><span class="glyphicon glyphicon-tower"></span> 註冊</a></li>
                        @else
                        <li><a href="/guest/logout"><span class="glyphicon glyphicon-tower"></span> 登出</a></li>
                            @if ($aUserItem['permission'] == 2)
                        <li class=""><a href="/shopping/controller/managercontroller.php/member"><span class="glyphicon glyphicon-user"></span> 會員管理 <span class="sr-only">(current)</span></a></li>
                        <li><a href="/shopping/controller/managercontroller.php/product"><span class="glyphicon glyphicon-list-alt"></span> 管理者 </a></li>
                            @else
                        <li><a href="/user/addbox"><span class="glyphicon glyphicon-briefcase"></span> addbox</a></li>
                        <li><a href="/user/boxconnection"><span class="glyphicon glyphicon-briefcase"></span> box</a></li>
                        <li><a href="/shopping/controller/usercontroller.php/userInfo"><span class="glyphicon glyphicon-user"></span> {{$aUserItem['name']}}</a></li>
                            @endif
                        @endif
                    </ul>
                
                    <ul class="nav navbar-nav navbar-right">
                        @if (!$aUserItem)
                        <li>
                            <a href="/shopping/controller/usercontroller.php/shoppinghistory">
                                <span class="glyphicon glyphicon-list-alt"></span> 使用者未登入
                            </a>
                        </li>
                        <li>
                            <a href="/shopping/controller/usercontroller.php/shoppingcar">
                                <span class="glyphicon glyphicon-shopping-cart"></span> 使用者未登入
                                <span class="badge badge-light" id='product_count'>
                                </span>
                            </a>
                        </li>
                        
                        @elseif ($aUserItem['permission'] == 0)
                        <li>
                            <a href="/shopping/controller/usercontroller.php/shoppinghistory">
                                <span class="glyphicon glyphicon-list-alt"></span> 使用者
                            </a>
                        </li>
                        <li>
                            <a href="/shopping/controller/usercontroller.php/shoppingcar">
                                <span class="glyphicon glyphicon-shopping-cart"></span> 使用者
                                <span class="badge badge-light" id='product_count'>
                                </span>
                            </a>
                        </li>
                        @elseif ($aUserItem['permission'] == 2)
                        <li>
                            <a href="/shopping/controller/managercontroller.php/orderMenu">
                                <span class="glyphicon glyphicon-list-alt"></span> 管理者
                            </a>
                        </li>
                        @endif
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

        <div class='container'>
            @yield('content')
        </div>

        <footer>
        </footer>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="/js/functions.js"></script>
        @section('script')
        @show
    </body>
</html>