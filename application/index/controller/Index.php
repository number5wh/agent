<?php
namespace app\index\controller;
use think\Controller;
use thirdData\ThirdData;

class Index extends Controller
{
    protected $middleware = ['Auth'];
    //模板
    public function layout()
    {
        $this->assign('nickname', session('user')['nickname']);
        $this->assign('avatar', session('user')['headurl']);
        return view('/layout');
    }

    //主页
    public function home()
    {
        $this->assign('user', session('user'));
        return view('home');
    }
    
    //代理分成明细
    public function fcDetail()
    {
        $res = ThirdData::fcDetail(session('userid'));
        return json($res);
    }

    //代理拓客信息
    public function spreadlist()
    {
        $res = ThirdData::spreadlist(session('userid'));
        return json($res);
    }
    
    //修改密码
    public function setpwd()
    {
        return view();
    }
}
