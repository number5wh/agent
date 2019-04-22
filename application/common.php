<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件


//生成随机数,用于生成salt
if (!function_exists('random_str')) {
    function random_str($length)
    {
        //生成一个包含  小写英文字母, 数字 的数组
        $arr = array_merge(range(0, 9), range('a', 'z'));
        $str = '';
        $arr_len = count($arr);
        for ($i = 0; $i < $length; $i++){
            $rand = mt_rand(0, $arr_len-1);
            $str.=$arr[$rand];
        }
        return $str;
    }
}
//生成随机数字
if (!function_exists('random_num')) {
    function random_num($length)
    {
        //生成一个包含数字的数组
        $arr = array_merge(range(0, 9));
        $str = '';
        $arr_len = count($arr);
        for ($i = 0; $i < $length; $i++){
            $rand = mt_rand(0, $arr_len-1);
            $str.=$arr[$rand];
        }
        return $str;
    }
}

//生成唯一订单号
if (!function_exists('random_orderid')) {
    function random_orderid() {
        $orderId = date('Ymd') . random_num(6);
        while(true) {
            $res = \think\Db::table('checklog')->where('orderid',$orderId)->find();
            if (!$res) {
                return $orderId;
            } else {
                $orderId = date('Ymd') . random_num(6);
            }
        }
    }
}

//获取ip
if (!function_exists('get_client_ip')) {
    function get_client_ip($type = 0, $adv = false)
    {
        $type = $type ? 1 : 0;
        static $ip = NULL;
        if ($ip !== NULL) return $ip[$type];
        if ($adv) {
            if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $arr = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
                $pos = array_search('unknown', $arr);
                if (false !== $pos) unset($arr[$pos]);
                $ip = trim($arr[0]);
            } elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (isset($_SERVER['REMOTE_ADDR'])) {
                $ip = $_SERVER['REMOTE_ADDR'];
            }
        } elseif (isset($_SERVER['REMOTE_ADDR'])) {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        // IP地址合法验证
        $long = sprintf("%u", ip2long($ip));
        $ip = $long ? array($ip, $long) : array('0.0.0.0', 0);
        return $ip[$type];
    }
}

//记录log
if (!function_exists('save_log')) {
    function save_log($path, $content, $mode = 'day')
    {
        $path = strval($path);
        $path = str_replace('\\', '/', trim($path, '/'));

        $content = strval($content);

        if (!$path || !$content) {
            return false;
        }
        $mode = in_array($mode, array('day', 'month', 'year')) ? $mode : 'day';
        $tempPath = config('config.log_dir') . '/' . $path . '/';

        if ($mode == 'day') {
            $tempPath .= date('Y') . '/' . date('m') . '/';
            $fileName  = date('d'). '.log';
        } elseif ($mode == 'month') {
            $tempPath .= date('Y') . '/';
            $fileName  = date('m'). '.log';
        } else {
            $fileName = date('Y') . 'log';
        }

        if (!file_exists($tempPath)) {
            if (!mkdir($tempPath, 0777, true)) {
                return false;
            }
        }

        $file    = $tempPath . $fileName;
        $content = date('Y-m-d H:i:s') . '#' . $content . "\r\n";
        $res     = @file_put_contents($file, $content, FILE_APPEND);
        if ($res) {
            return true;
        } else {
            return false;
        }
    }
}

//获取生成的代理code
if (!function_exists('get_proxy_code')) {
    function get_proxy_code()
    {
        $id = intval(\app\model\Proxy::max('id')) + 1;
        $ret = 'FC';
        if ($id < 10) {
            $ret .= '000000'.$id;
        } elseif ($id < 100) {
            $ret .= '00000'.$id;
        } elseif ($id < 1000) {
            $ret .= '0000'.$id;
        }  elseif ($id < 10000) {
            $ret .= '000'.$id;
        }  elseif ($id < 100000) {
            $ret .= '00'.$id;
        }  elseif ($id < 1000000) {
            $ret .= '0'.$id;
        } else {
            $ret .= $id;
        }
        return $ret;
    }
}

//生成分成比例列表
if (!function_exists('generate_percent')) {
    function generate_percent($percent)
    {
        $percentList = [];
        for ($i = 10; $i<$percent; $i += config('config.percent_diff')) {
            $percentList[] = $i;
        }
        return array_reverse($percentList);
    }
}

//转化为元单位
if (!function_exists('change_to_yuan')) {
    function change_to_yuan($money, $decimals = 2)
    {
        //money厘  decimals 保留几位小数
        return round($money/1000, $decimals);
    }
}

//$str 代理id  生成二维码需要
if (!function_exists('compile')) {
    function compile($str)
    {
        $strlen = strlen($str);
        $result = chr(ord($str[0])+$strlen);
        for($i = 1; $i < $strlen; $i++)
            $result .= chr(ord($str[$i])+ord($str[$i-1]));
        return  $result;
    }
}

//合并图片
if (!function_exists('combilePic')) {
    function combinePic($dstimg,$srcimg,$x,$y,$outimg){
        try {
            $bigImgPath = $dstimg;
            $qCodePath = $srcimg;
            $bigImg = imagecreatefromstring(file_get_contents($bigImgPath));
            $qCodeImg = imagecreatefromstring(file_get_contents($qCodePath));

            list($qCodeWidth, $qCodeHight, $qCodeType) = getimagesize($qCodePath);
            imagecopymerge($bigImg, $qCodeImg, $x, $y,0, 0, $qCodeWidth, $qCodeHight, 100);
            list($bigWidth, $bigHight, $bigType) = getimagesize($bigImgPath);
            $ret = imagejpeg($bigImg, $outimg);
//
//            list($width, $height)=getimagesize($outimg);
////缩放比例
//            $per=round(400/$width,3);
//
//            $n_w=$width*$per;
//            $n_h=$height*$per;
//            $new=imagecreatetruecolor($n_w, $n_h);
//            $img=imagecreatefromjpeg($outimg);
////copy部分图像并调整
//            imagecopyresized($new, $img,0, 0,0, 0,$n_w, $n_h, $width, $height);
////图像输出新图片、另存为
//            imagejpeg($new, $outimg);
//            imagedestroy($new);
//            imagedestroy($img);

            if($ret) {
                return true;
            }
            else {
                return false;
            }
        }catch(\Exception $e){
            Log::write($e->getMessage(),"ERROR");
            return false;
        }
    }
}
