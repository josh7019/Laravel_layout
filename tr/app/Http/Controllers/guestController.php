<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;
use App\library\TokenTool;

class GuestController extends Controller
{
    /*
     * 首頁
     */
    public function get_index(Request $request)
    {
        $oTokenTool = new TokenTool;
        $sToken = $request->cookie('token');
        if ($oTokenTool->checkToken($sToken)) {
            $aUserItem = $oTokenTool->getUser($sToken);
        } else {
            $aUserItem = null;
        }
        
        return view('index', compact('aUserItem'));
    }
    

    /*
     * 登入頁
     */
    public function get_login()
    {
        $aUserItem = null;
        return view('login', compact('aUserItem'));
    }

    
    /*
     * 註冊頁
     */
    public function get_signup()
    {
        $aUserItem = null;
        return view('signup', compact('aUserItem'));
    }

    /*
     * 登出頁
     */
    public function get_logout()
    {
        return view('index');
    }

    /*
     * 顯示登出頁
     */
    public function get_sign()
    {
        $aUserItem = null;
        return view('sign', compact('aUserItem'));
    }

    /*
     * 檢查帳號是否重複
     */
    public function post_checkAccount(Request $request)
    {
        $_sAccount = $request->account;
        $aUserItem = User::where('account', $sAccount)->first();
        return response($aUserItem['account'],200);
    }

    /*
     * 註冊
     */
    public function post_signup(Request $request)
    {
        $_sAccount = $request->account;
        $_sPassword = $request->password;
        $sPassword = password_hash($sPassword, PASSWORD_DEFAULT);
        $_sName = $request->name;
        $_sIdNumber = $request->id_number;
        $oUser = new User;
        $oUser->account = $_sAccount;
        $oUser->password = $_sPassword;
        $oUser->name = $_sName;
        $oUser->id_number = $_sIdNumber;
        $oUser->save();

        $aResult = [
            'alert' => 'ok',
            'location' => '/guest/login'
        ];
        return response($aResult, 200);
    }
    
    /*
     * 登入
     */
    public function post_login(Request $request)
    {
        $_sAccount = $request->account;
        $_sPassword = $request->password;
        $oUserItem = User::where('account', $_sAccount)->first();
        ## 檢查帳號
        if (!$oUserItem) {
            $aResult = [
                'alert' => '帳號不存在',
            ];
            return response($aResult, 200);
        }
        ## 驗證密碼
        if (!password_verify($_sPassword, $oUserItem->password)) {
            $aResult = [
                'alert' => '帳號或密碼錯誤',
            ];
            return response($aResult, 200);
        }
        $oTokenTool = new TokenTool;
        $sToken = $oTokenTool->produceToken();
        $oUserItem->token = $sToken;
        $oUserItem->save();

        $aResult = [
            'alert' => '登入成功',
            'location' => '/guest/index'
        ];
        return response($aResult, 200)->cookie('token', $sToken, 60,);
    }

    /*
     * 範本
     */
    public function post_(Request $request)
    {
        
        $aResult = [
            'alert' => 'ok',
            'location' => '/guest/login'
        ];
        return response($aResult, 200);
    }


}
