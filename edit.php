<?php
//读取文件edit.php
require_once 'class.dir.php';

if(!isset($_GET['f'])){
	die("no error");
}
$edit = new edit();
$edits = $edit->edits($_GET['f']);

?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $edits['filename']; ?>-编辑</title>
	<style type="text/css">
		* {
			padding: 0;
			margin: 0;
			border: 0;
		}
		.box {
			width: 800px;
			margin: 0 auto;
			border: 1px solid #eee;
		}
		.title {
			text-align: center;
			height: 80px;
			line-height: 80px;
		}
		.bjcontent {
			min-height:500px; 
		}
		textarea {
			width: 100%;
			margin: 0 auto;
			min-height: 500px;
			border: 1px solid #000;
			padding: 5px;
			outline: none;
		}
		.but {
			text-align: center;
		}
		.but button{
			margin-top:10px;
			width: 60px;
			height: 30px;
			text-align: center;
			line-height: 30px;
			border: 0;
			background: blue;
			color: #fff;
			outline: none;
		}
		.marleft {
			margin-left: 10px;
		}
	</style>
</head>
<body>
<div class="box">
	<div class="title"><?php echo $edits['filename']; ?>-编辑</div>
	<div class="bjcontent">
		<form action='' method="post">
		<textarea name='filenr'>
			<?php echo $edits['filecontent']; ?>
		</textarea>
	</div>
	<div class='but'><button name='bc'>保存</button><button name='out' class="marleft" onclick="window.history.back(-1);return false;">取消</button></div>
</div>
<?php
if(isset($_POST['bc'])){
	//把总路径减去文件名得到上级目录
	$tzPath = str_replace($edits['filename'], '', $edits['filepath']);
	//得到url
	$tzUrl = "index.php?path=".$tzPath;

	$filecontent = $_POST['filenr'];
	$xieru = $edit->bc($edits['filepath'],$filecontent);
	if(!$xieru){
		echo "<script>alert('保存失败')</script>";
		echo "<script>location.href='{$tzUrl}'</script>";
	}else {
		echo "<script>alert('保存成功')</script>";
		echo "<script>location.href='{$tzUrl}'</script>";
	}

}
?>
</body>
</html>