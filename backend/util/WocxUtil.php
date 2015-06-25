<?php
namespace backend\util;

use yii\base\Object;
use yii;
class WocxUtil extends Object {
    
   public static function random($length, $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz') {
        $hash = '';
        $max = strlen($chars) - 1;
        for($i = 0; $i < $length; $i++)	{
            $hash .= $chars[mt_rand(0, $max)];
        }
        return $hash;
    }
    public static function error($code, $msg = '') {
        return array(
            'errno' => $code,
            'message' => $msg,
        );
    }
    
    
}

?>