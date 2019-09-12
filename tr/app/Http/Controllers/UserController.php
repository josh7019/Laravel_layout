<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;
use App\models\ElementDetail;
use App\models\ElementList;
use App\library\TokenTool;

class UserController extends Controller
{
    /*
     * 箱子頁
     */
    public function get_addbox(Request $request)
    {
        
        $oTokenTool = new TokenTool;
        $sToken = $request->cookie('token');
        if ($oTokenTool->checkToken($sToken)) {
            $aUserItem = $oTokenTool->getUser($sToken);
        } else {
            $aUserItem = null;
        }
        return view('addbox', compact('aUserItem'));
    }

    /*
     * 新增箱子
     */
    public function post_addbox(Request $request)
    {
        $oTokenTool = new TokenTool;
        $sToken = $request->cookie('token');
        if ($oTokenTool->checkToken($sToken)) {
            $aUserItem = $oTokenTool->getUser($sToken);
        } else {
            $aResult = [
                'alert' => '失敗'
            ];
            return response($aResult, 200);
        }
        $iElementListId = ElementList::insertGetId(['user_id' => $aUserItem['user_id'], 'name' => $request->name]);
        $_aElement = $request->elementArray;
        $_aElement = json_encode($_aElement);
        $_aElement = json_decode($_aElement, true);
        // var_dump($_aElement);
        foreach ($_aElement as $index => $_aElementItem) {
            $_aElement[$index]['user_id'] = $aUserItem['user_id'];
            $_aElement[$index]['element_list_id'] = $iElementListId;
        }
        ElementDetail::insert($_aElement);
        $aResult = [
            'alert' => '新增成功'
        ];
        return response($aResult, 200);
    }

    /*
     * 箱子關係頁
     */
    public function get_boxconnection(Request $request)
    {
        $oTokenTool = new TokenTool;
        $sToken = $request->cookie('token');
        if ($oTokenTool->checkToken($sToken)) {
            $aUserItem = $oTokenTool->getUser($sToken);
        } else {
            $aUserItem = null;
        }
        $sFileId = 1;
        $aElementDetailList = ElementDetail::where(['user_id' => $aUserItem['user_id'], 'element_list_id' => $sFileId])->get()->toArray();
        $iElement0Length = count(ElementDetail::where([
            'user_id' => $aUserItem['user_id'],
            'element_list_id' => $sFileId,
            'type' => 0
        ])->get()->toArray());
        $iElement1Length = count(ElementDetail::where([
            'user_id' => $aUserItem['user_id'],
            'element_list_id' => $sFileId,
            'type' => 1
        ])->get()->toArray());
        $iElement2Length = count(ElementDetail::where([
            'user_id' => $aUserItem['user_id'],
            'element_list_id' => $sFileId,
            'type' => 2
        ])->get()->toArray());
        $aElementListIdList = ElementList::select('element_list_id', 'name')->where(['user_id' => $aUserItem['user_id']])->get()->toArray();
        // var_dump($iElement2Length);
        return view('boxconnection', compact('aUserItem', 'aElementListIdList', 'aElementDetailList', 'iElement0Length', 'iElement1Length', 'iElement2Length'));
    }
}
