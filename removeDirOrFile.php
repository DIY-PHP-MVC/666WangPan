<?php
/**
 * Created by PhpStorm.
 * User: teemo
 * Date: 2017/11/22 0022
 * Time: 17:04:51
 */
ini_set("display_errors", "On");
error_reporting(E_ALL | E_STRICT);
header('Content-type:text/json;charset=utf-8');

if ($_REQUEST['path']) {
    $result = false;
    if ($_REQUEST['type'] == 'dir') {
        $result = rmdir($_REQUEST['path']);
    } else {
        $result = @unlink($_REQUEST['path']);
    }
    if ($result) {
        echo json_encode('删除成功!');
    } else {
        echo 'mmp 删除失败?';
    }

} else {
    die("fuck ur mom");
}