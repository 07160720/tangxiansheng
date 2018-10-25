<?php
/**
 * 后台文章管理程序文件
 * ============================================================================
 * 版权所有 2018 
 *-----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * Author: 李坤霖  Contact: 1079539864@qq.com  
*/

ob_start();//防止output导致header出错
@header("Content-type:text/html;charset=UTF-8");//把编码转换为utf8

class operation{
    
    public function encrypt($data){ 
        
        $key = 'shunda';// 密钥
        $key    =   md5($key);  
        $x      =   0;  
        $len    =   strlen($data);  
        $l      =   strlen($key);  
        for ($i = 0; $i < $len; $i++)  
        {  
            if ($x == $l)   
            {  
                $x = 0;  
            }  
            @$char .= $key{$x};  
            $x++;  
        }  
        for ($i = 0; $i < $len; $i++)  
        {  
            @$str .= chr(ord($data{$i}) + (ord($char{$i})) % 256);  
        }
        
        $str = base64_encode($str);
        
        $len    =   strlen($str);
        
        for ($i = 0,$j = $len-1; $i < $len,$j >= 0; $i++,$j--){//插入字符串
           
            @$enstr .=$str[$i].$str[$j]; 
        }
        
        return $enstr;
        
    }  
    
    function decrypt($data)
    {
        $len = strlen($data);
    
        for ($i = 0; $i < $len; $i=$i+2){//去掉字符串
    
            @$destr .=$data[$i];
    
        }
        $key = 'shunda';// 密钥
        $key = md5($key);
        $x = 0;
        $data = base64_decode($destr);
        $len = strlen($data);
        $l = strlen($key);
    
        for ($i = 0; $i < $len; $i++)
        {
            if ($x == $l)
            {
                $x = 0;
            }
            @$char .= substr($key, $x, 1);
            $x++;
        }
        for ($i = 0; $i < $len; $i++)
        {
            if (ord(substr($data, $i, 1)) < ord(substr($char, $i, 1)))
            {
                $str .= chr((ord(substr($data, $i, 1)) + 256) - ord(substr($char, $i, 1)));
            }
            else
            {
                @$str .= chr(ord(substr($data, $i, 1)) - ord(substr($char, $i, 1)));
            }
        }
        return $str;
    }
    
}
?>