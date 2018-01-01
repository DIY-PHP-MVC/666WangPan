<?php
ini_set( "display_errors", "On" );
error_reporting( E_ALL | E_STRICT );
require_once 'class.dir.php';

$path = "D:/AppService/UPUPW_AP5.3/htdocs/exe/upload/";
$dir  = new dir();
if (empty($_GET['search'])) {
	$_GET['search'] = "";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/index.css"/>
    <script src="/js/jquery/jquery-1.11.2.min.js"></script>
    <script src="/js/layer/layer.js"></script>
    <script src="/js/base.js"></script>
</head>
<body>
<form action="/upload.php" enctype="multipart/form-data" method="post" name="upload" style="display: none">
    选择文件:<input type="file" name="file" id="files" onchange="submitFiles()"/>
    <input type="submit" value="上传文件" id="submitId"/>
</form>
<div class="file">
    <ul>
		<?php
		$dir->odir( $path, $_GET['search'] );
		?>
    </ul>
</div>
<script type="application/javascript">
    function delFileOrDir(path, type, obj) {
        layer.confirm("你TM要删除吗?", {
            btn: ["确认", "取消"]
        }, function () {
            $.postJSON("/removeDirOrFile.php",
                {
                    path: path,
                    type: type
                },
                function (data) {
                    layer.msg(data)
                    $(obj).parent().parent().remove();
                }
            )
        });
    }

    function uploadFile() {
        document.getElementById("files").click();
    }

    function submitFiles() {
        document.getElementById("submitId").click();
    }

    $(function () {
        $("#search").keydown(function (key) {
            if (key.keyCode == 13) {
                window.location.href = "?search=" + $("#search").val();
            }
        })
        $("#search").focus();
    })
</script>
</body>
</html>