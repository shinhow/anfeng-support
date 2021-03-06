<?php namespace Anfeng\Support;

class Str {
    /**
     * 生成唯一ID
     * @return string 24~25位36进制
     */
    public static function uuid() {
        return base_convert(md5(uniqid(mt_rand(), true) . microtime() . mt_rand()), 16, 36);
    }

    /**
     * 生成随机字符串
     * @param int $len 长度
     * @param int $type 随机字符串的组成类型，使用位运算组合：1大写字母，2小写字母，4数字，256符号
     * @return string
     */
    public static function rand($len, $type = 7) {
        if($len <= 0) return '';
        
        $chars_array = [
            1 => 'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
            2 => 'abcdefghijklmnopqrstuvwxyz',
            4 => '0123456789',
            256 => '!@#$%^&*()=+',
        ];

        $chars = '';

        foreach(array_keys($chars_array) as $n) {
            if(($type & $n) > 0) {
                $chars .= $chars_array[$n];
            }
        }

        $str = '';
        $end = strlen($chars) - 1;

        while($len-- > 0) {
            $str .= $chars[mt_rand(0, $end)];
        }

        return $str;
    }
}