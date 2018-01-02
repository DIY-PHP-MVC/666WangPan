
<?php
require_once 'class.dir.php';
header("Content-Type:text/html; charset=utf-8");

$config = require_once "config.php";
$path = $config['path'];

/**
 * @param $bit
 *
 * @return string 文件单位转换
 */
function count_size($bit)
{
    $type = array('Bytes', 'KB', 'MB', 'GB', 'TB');
    for ($i = 0; $bit >= 1024; $i++) {
        $bit /= 1024;
    }
    return (floor($bit * 100) / 100) . $type[$i];
}

$name = @$_FILES['file']['name'];
$type = @$_FILES['file']['type'];
$tmp_name = @$_FILES['file']['tmp_name'];
$size = @$_FILES['file']['size'];
$temp = count_size($size);

if ($name) {
    echo '<div style="margin-left: 25%;margin-top: 10%">';
    echo '文件信息:' . '<br />';
    echo '--------------------------------' . '<br />';
    echo "文件名：" . $name . '<br />';
    echo '文件类型：' . $type . '<br />';
    echo '临时文件名字:' . $tmp_name . '<br />';
    echo '文件大小:' . $temp . '<br />';
    echo '<br />' . '上传状态:' . '<br />';
    echo '--------------------------------' . '<br />';
    if (move_uploaded_file($tmp_name, $path . $name))
        echo '文件上传成功！' . '<br />';
    else
        echo '文件上传失败！' . '<br />';
    echo '<button type="button" onclick="window.location.href=\'/\'">返回</button>';
    echo '</div>';
}