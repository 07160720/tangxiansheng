<?php
/*========================================================*/
/*数组的索引按顺序生成*/
/*========================================================*/
function formatTree($items, $pid = 0){
    $arr = array();
    $field = array('id'=>'id','pid'=>'pid','child'=>'child');

    foreach ($items as &$val) {
        if ($val[$field['pid']] == $pid) {
            $temp = formatTree($items, $val[$field['id']], $field);
            /*判断是否存在子数组 */
            $temp && $val[$field['child']] = $temp;
            $arr[] = $val;
        }
    }
    return $arr;
}

/*========================================================*/
/*数组的索引按id生成*/
/*========================================================*/
function formatTreeById($items, $pid = 0){//数组的索引按id生成
    $arr = array();
    $field = array('id'=>'id','pid'=>'pid','child'=>'child');

    foreach ($items as &$val) {
        if ($val[$field['pid']] == $pid) {
            $temp = formatTreeById($items, $val[$field['id']]);
            /*判断是否存在子数组 */
            $temp && $val[$field['child']] = $temp;
            $arr[$val['id']] = $val;
        }
    }
    return $arr;
}
/////////////////////////////////////////////////////////////////////
/*========================================================*/
/*过滤要上传到数据库的内容*/
/*========================================================*/
function check_input($value){//过滤输入框传过来的数据防止sql注入

    $value = trim($value);
    // 去除斜杠
    if ( !get_magic_quotes_gpc() ){

        $value = addslashes($value);
    }

    return $value;
}
?>