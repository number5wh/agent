<?php

namespace app\index\validate;

use think\Validate;

class Login extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
//	    '__token__' => 'token|require',
        'username|登录名'  => 'require|max:50',
        'password|密码'   => 'require|min:6',
        'captcha|验证码'=>'require|captcha'
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [];
}
