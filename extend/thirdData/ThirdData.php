<?php
namespace thirdData;
use Curl\Curl;

class ThirdData
{
    const SendUrl = "http://47.107.85.164:9000";
    //登录
    public static function login($username, $password)
    {
        $data = [
            'code' => 0,
            'msg'  => '',
            'data' => [],
        ];
        if (!$password || !$username) {
            $data['code'] = 1;
            $data['msg']  = '账号名密码有误！';
            return $data;
        }
        $send = [
            'username' => $username,
            'password' => $password
        ];

        $return = Curl::jsonCurl(json_encode($send), self::SendUrl.'/agent/login');
//        var_dump($return);
//        die;
        return $return;
    }

    //代理分成明细
    public static function fcDetail($userid)
    {
        $data = [
            'code' => 0,
            'msg'  => '',
            'data' => [],
        ];
        if (!$userid) {
            $data['code'] = 1;
            $data['msg']  = '账号信息有误！';
            return $data;
        }
        $send = [
            'userid' => $userid
        ];

        $return = Curl::jsonCurl(json_encode($send), self::SendUrl.'/agent/dividelist');
        return $return;
    }

    //代理拓客信息
    public static function spreadlist($userid)
    {
        $data = [
            'code' => 0,
            'msg'  => '',
            'data' => [],
        ];
        if (!$userid) {
            $data['code'] = 1;
            $data['msg']  = '账号信息有误！';
            return $data;
        }
        $send = [
            'userid' => $userid
        ];

        $return = Curl::jsonCurl(json_encode($send), self::SendUrl.'/agent/spreadlist');
        return $return;
    }
}