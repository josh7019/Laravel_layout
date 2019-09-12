<?php

namespace App\library;

use App\models\User;

class TokenTool {
    
    /*
     * 產生token
     */
    public function produceToken()
    {
        $random_string = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $token_string = '';
        for ($i = 0; $i < 250; $i++) {
            $token_string .= substr($random_string, rand(0, strlen($random_string) - 1), 1);
        }
        return $token_string;
    }

    /*
     * 檢查token
     */
    function checkToken($_sToken)
    {
        if (!$_sToken) return false;
        $oUserItem = User::where('token', $_sToken)->first();
        if ($oUserItem) {
            return true;
        } else {
            setcookie ("token", "delete", time()-100);
            return false;
        }
        
    }

    /*
     * 檢查token並回傳資料
     */
    function getUser($_sToken)
    {
        if (!$_sToken) return false;
        $oUserItem = User::where('token', $_sToken)->first();
        if ($oUserItem) {
            $oUserItem = json_encode($oUserItem);
            $oUserItem = json_decode($oUserItem, true);
            return $oUserItem;
        } else {
            setcookie ("token", "delete", time()-100);
            return null;
        }
    }

}