@extends('layout')

@section('style')
<style>
    div {
        text-align: center;
    }
</style>
@endsection

@section('content')
<form id='signup_form' class="form-horizontal myform">
            <fieldset>

            <!-- Form Name -->
            <legend id='title'>註冊</legend>
            <!-- 帳號輸入 -->
            <div class="form-group">
                <label class="col-md-4 control-label"  for="Account">帳號</label><span id='account_Signal'></span>
                <div class="col-md-4">
                    <input id="account" autocomplete='off' name="account" type="text" placeholder="請輸入帳號" class="form-control input-md" required="">    
                    <span class="help-block">7~20字元,開頭為英文,不得有符號</span> 
                </div>
            </div>
            <!-- 密碼輸入-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="password">密碼</label><span id='password_Signal'></span>  
                <div class="col-md-4">
                    <input id="password" name="password" type="password" placeholder="請輸入密碼" class="form-control input-md" required="">
                    <span class="help-block">4~20字元,不得有符號</span> 
                </div>
            </div>
            <!-- 二次密碼輸入-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="password">驗證密碼</label><span id='passwordTwice_Signal'></span>
                <div class="col-md-4">
                    <input id="passwordTwice" name="passwordTwice" type="password" placeholder="請再次輸入密碼" class="form-control input-md" required="">
                </div>
            </div>
            <div class="form-group">
                    <label class="col-md-4 control-label" for="password">暱稱</label><span id='name_Signal'></span>
                    <div class="col-md-4">
                        <input value="" id="name" name="name" type="text" placeholder="請輸入姓名" class="form-control input-md" required="">
                        <span class="help-block">2~10字元,全英文,不得有符號</span> 
                    </div>
                </div>
            <div class="form-group">
                    <label class="col-md-4 control-label" for="password">身分證號碼</label><span id='id_number_Signal'></span>
                    <div class="col-md-4">
                        <input value='a123456789*' id="id_number" name="id_number" type="text" placeholder="請輸入身分證號碼" class="form-control input-md" required="">
                    </div>
            </div>
            <!-- 送出按鈕 -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="login"></label>
                <div class="col-md-4">
                    <button type='button' id="login_button" name="signup" class="btn btn-success">註冊</button>
                </div>
            </div>
            
            </fieldset>
            </form>
@endsection

@section('script')
<script src='/js/signup.js'></script>
@endsection
