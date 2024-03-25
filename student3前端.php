<!DOCTYPE html>
<html>
<head>
		<?php session_start();require_once("student3.php");
	if(!$_SESSION['id']){
			 echo"<script type='text/javascript'>alert('请重新登陆');location='login.html';</script>";exit(0);
	} ?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<!-- Le styles -->
<link href="css/bootstrap-combined.min.css" rel="stylesheet">
<link href="css/layoutit.css" rel="stylesheet">

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
	<![endif]-->

	<html lang="en"></html>
	<script>
function isattend(){
		"<?php if(isattended()){ ?>"
		alert("已考勤成功,请勿重复考勤"); 
		document.getElementById("no").setAttribute("disabled","true" );exit(0);
	"<?php } ?>"
}
function yes()
{
	"<?php if(isattended()){ ?>"
		alert("已考勤成功,请勿重复考勤"); 
		document.getElementById("yes").setAttribute("disabled","true" );exit(0);
	"<?php } ?>"
  var str="yes";
  var xmlhttp;
  if (str.length==0)
  { 
    document.getElementById("txtHint").innerHTML="";
    return;
  }
  if (window.XMLHttpRequest)
  {
    // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
    xmlhttp=new XMLHttpRequest();
  }
  else
  {
    // IE6, IE5 浏览器执行代码
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function()
  {
    if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
      alert(xmlhttp.responseText);
    }
  }
  xmlhttp.open("GET","student3_attend.php?q="+str,true);
  xmlhttp.send();
}
function no()
{
  var str=document.getElementById("order").value;
  var xmlhttp;
  if (str.length==0)
  { 
    document.getElementById("txtHint").innerHTML="";
    return;
  }
  if (window.XMLHttpRequest)
  {
    // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
    xmlhttp=new XMLHttpRequest();
  }
  else
  {
    // IE6, IE5 浏览器执行代码
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function()
  {
    if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
      alert(xmlhttp.responseText);
    }
  }
  xmlhttp.open("GET","student3_attend.php?q="+str,true);
  xmlhttp.send();
}
</script>
	</head>
<body>
<?php require_once("student3.php");?>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="col-lg-11">
			<ul class="breadcrumb">
				<li>
					<a href="login.html">登陆</a> <span class="divider"></span>
				</li>
				<li class="active">
					<?php findclass(); ?>
				</li>
				<li class="active">
					<?php echo $date; ?>
				</li>
			</ul>
		</div>
		<li>
			<a href="leave前端.php">请假</a> <span class="divider"></span>
			</li>
	</div>
</div>
			<div class="row-fluid">
				<div class="col-lg-3">
					<?php require_once("student3.php");
					echo '<img src="'.$img_photograph.'" alt="30x30" />';  ?>
				</div>
	</div>
				<div class="col-lg-1">
					<p>
						<strong>这张照片是你吗？</strong>
					</p>
					<?php 
		                     echo '<img  src="'.$img_detected.'" alt="30x30" />';
                    ?>
				</div>


<div class="col-lg-3">
<!-- 按钮触发模态框 否-->
<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" name="no" id="no" onClick="isattend()">
	否
</button>
<!-- 模态框（Modal） -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title" id="myModalLabel">
					手动选择你的序号
				</h4>
			</div>
			<!-- 输入框代码-->
			<div style="padding: 100px 100px 10px;">
	<form class="bs-example bs-example-form" role="form" method="post">
		<div class="input-group">
			<span class="input-group-addon">@</span>
			<input type="text" class="form-control" placeholder="请输入你的序号" id="order" name="order">
		</div>
		<br>
		<br>
	</form>
</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal" onClick="no()" name="submit" id="submit">提交
				</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal -->
</div>

<div class="col-lg-5">
					<!-- 按钮触发模态框 是 -->
<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModa2" onClick="yes()" id="yes" name="yes" >
	是
	</button>

	
    </div>
    <div class="ma0 clearfix small-wrapper" style="max-width: 7000px; width: 100%; ">
	</div>
</body>
</html>
