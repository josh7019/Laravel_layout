@extends('layout')

@section('style')
<style>
    .myform {
                margin-top:20%;
                color: red;
                width:50%;
                margin-left:25%;
                text-align:center;
                border-radius: 20px;
            }
            body {
            font-family: arial,"Microsoft JhengHei","微軟正黑體",sans-serif !important;
            color:#a6a6a6;
            background-color:#1c1c1c; 
            }
            th {
                text-align: center;
            }
            tr {
                text-align: center;
            }
            #title {
                color: red;
            }
            #login_form {
                background-color: #262626;
            }
</style>
@endsection

@section('content')
<div>
    <form id='login_form' class="form-horizontal myform" >
        <fieldset>
        <!-- Form Name -->
        <legend id='title'>登入</legend>
        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="Account">帳號</label>  
            <div class="col-md-4">
                <input id="account" name="account" type="text" placeholder="請輸入帳號" class="form-control input-md" required>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="password">密碼</label>  
            <div class="col-md-4">
                <input id="password" name="password" type="password" placeholder="請輸入密碼" class="form-control input-md" required>
            </div>
        </div>

        <!-- Button -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="signin"></label>
            <div class="col-md-4">
                <button id='login_button' type='button' id="signin" name="signin" class="btn btn-info">登入</button>
                <a href="/guest/signup" class='btn btn-success'>註冊</a>
            </div>
        </div>
        </fieldset>
        </form>
</div>
@endsection

@section('script')
<script src='/js/login.js'></script>
@endsection