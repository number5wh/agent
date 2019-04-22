<?php

namespace app\index\controller;

use think\captcha\Captcha;
use think\Controller;
use thirdData\ThirdData;

class Login extends Controller
{
    public function verify()
    {
        ob_clean();
        $captcha = new Captcha(['length' => 4,'useNoise'=>false,'useCurve' => false]);
        $captcha->codeSet = '0123456789';
        return $captcha->entry();
    }
    public function login()
    {
        if (session('?user')) {
            return redirect(url('layout'));
        } else {
            return view('login');
        }
    }

    public function doLogin()
    {
        $result = $this->validate($this->request->post(), 'app\index\validate\Login');
        $data = [
            'code' => 0,
            'msg'  => '',
            'data' => []
        ];
        if (true !== $result) {
            $data['code'] = 1;
            $data['msg'] = $result;
            return json($data);
        }
        $username = trim($this->request->username);
        $password = trim($this->request->password);

        $res = ThirdData::login($username, md5($password));
        if (!$res) {
            $data['code']=1;
            $data['msg'] ='登录失败';
            return json($data);
        }

        $data['code'] = $res['code'];
        $data['msg'] = $res['message'];
        //数据验证
        if ($res['code'] != 0) {
            return json($data);
        }

        $userdata = $res['rs'];

        //存入session
        session('userid', $userdata['userid']);
        session('user', $userdata);

        $data['code'] = 0;
        $data['msg'] = '登录成功';
        $data['data'] = $res['rs'];
        return json($data);
    }

    public function logout()
    {
        session(null);
        return redirect(url('login'));
    }

    /**
     * geetest生成验证码
     */
    public function geetest_show_verify(){
        $geetest_id=config('mobilecodeid');
        $geetest_key=config('mobilecodekey');
        $geetest=new GeetestLib($geetest_id,$geetest_key);
        $user_id = 'geetest';
        $status = $geetest->pre_process($user_id);
        session('geetest',array(
            'gtserver'=>$status,
            'user_id'=>$user_id
        ));
        echo $geetest->get_response_str();
    }
}
