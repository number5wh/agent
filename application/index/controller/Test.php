<?php

namespace app\index\controller;

use apiData\PlayerData;
use app\model\Paytime;
use app\model\Playerorder;
use app\model\Proxy;
use app\model\Teamlevel;
use apiData\Sms;
use Endroid\QrCode\QrCode;
use qrCode\Code;
use shortUrl\ShortUrl;
use think\Controller;
use think\Db;
use think\Request;
use thirdData\ThirdData;

class Test extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $res = ThirdData::spreadlist(18351);
        return json($res);
    }

    public function test()
    {
        ThirdData::login('test', md5('123456'));
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
