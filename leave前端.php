<!DOCTYPE html>
<html>
	<head>


	</head>
	<body>
<form action="leave.php?date=<?php echo $values->date;?>" method="post" enctype="multipart/form-data">
		                                       <input type="hidden" name="max_file_size" value="1048576">
		                                       <input type="file" name="file">
		                                       <input type="submit" name="上传" id="upload"  >		
												   </form>
				<script type="text/javascript"> 
			function show(i)
			{ var s = document.getElementById(i); 
			 s.style.display="block"; 
			} 
			function hide(i){ 
				var h = document.getElementById(i); 
				h.style.display = "none"; 
			} 
//在这里,虽然说定义的变量s和h的意义是一样的,但是不能提取出来,这涉及到了文件的加载,如果提出出来的话,在定义这个变量时是我们还没有这个id属性,是加载不到的,如果一定要提取出来的话,就必须把整个JavaScript的代码放到放到body的最后面 
		</script> 

<table width="780" border="0" cellpadding="0" cellspacing="0">
<form name="form1" id="form1" method="post" action="">
 <tr>
     <td height="20" width="5%" class="top"> </td>
  <td width="5%" class="top">id</td>
  <td width="30%" class="top">class</td>
  <td width="10%" class="top">date</td>
  <td width="20%" class="top">show</td>
  <td width="10%" class="top">hide</td>
    <td width="10%" class="top">delete</td>
 </tr>
			<?php require_once("leave1.php");
$arr=array();
$arr=getDirContent($path2);
for($i=0;$i<count($arr);$i++){
	$arr1=array();
    $arr1=explode("-",$arr[$i]);
	if($arr1[0]==$id){
		?>
 <tr>
    <td height="25" align="center" class="m_td"><?php 	    echo $arr1[0];;?></td>
    <td height="25" align="center" class="m_td"><?php echo $arr1[1];?></td>
  <td height="25" align="center" class="m_td"><?php echo $arr1[2]."-".$arr1[3]."-".substr($arr1[4],0,2);?></td>
	 <td><input type="button" value="查看假条" onClick="show(<?php echo $i;?>)"> </td>
	 <td><input type="button" value="隐藏" onClick="hide(<?php echo $i;?>)"></td>
    <td class="m_td"><a href="deleteNote.php?path1=<?php echo $course."/leave/".$arr[$i];?>&path2=<?php echo $course."/".$arr1[2]."-".$arr1[3]."-".substr($arr1[4],0,2)."/leave/".$arr[$i];?>">删除</a></td>
	 		<img src="<?php echo $path2."/".$arr[$i]; ?>" id="<?php echo $i;?>" style="display:none"> 
 </tr>
	<?php 
	}
}
?>
</form>
</table>




</body>
</html>