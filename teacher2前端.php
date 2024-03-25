<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>teacher2</title>
	<link rel="stylesheet" type="text/css" href="static/css/admin.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.bootcss.com/font-awesome/4.6.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="static/layui/css/layui.css">
	<link rel="stylesheet" type="text/css" href="static/css/global_style.css">
	<link rel="Shortcut Icon" href="ico.ico">
    <style type="text/css">
        body { font:14px/1.5 "microsoft yahei","\5FAE\8F6F\96C5\9ED1",tahoma,arial }
        ul_1,li_1,div {
            margin: 0;
            padding: 0;
        }
        ul_1,li_1 { list-style: none; }
        li_1 {
            float: left;
            margin-left: 5px;
            padding: 0 8px;
            border: 1px solid #999;
            color: #000;
            line-height: 24px;
        }

    </style>
</head>
<body>

	<div class="tm-tpl tpl-white-hn small-item" style-name="tpl-white-hn">
		<!--导航栏-->
		<div class="tpl-left-sidebar">
			<ul>
				<li class="logo">
					<img class="user-upload" src="static/images/4a251abe82900c79733daa753664f701.jpg" alt="admin" title="admin">
					<span></span>
				</li>
				<!--<li class="nav-item active">
				<a href="index.html" class="a-item"><i class="fa fa-home nav-icon" aria-hidden="true"></i><span>首页</span></a>
				</li>
				 -->
				<li class="nav-item">
					<a href="login.html" class="a-item"><i class="fa fa-home nav-icon"></i><span>首页</span></a>
				</li>
				<li class="nav-item">
					<a href="auth_index.html" class="a-item"><i class="fa fa-users nav-icon"></i><span>权限控制台</span></a>
					<ul class="nav-child-item has-child">
						<div class="nav-child-list">
							<li><a href="user.html"><i class="fa fa-user" aria-hidden="true"></i>关于我们</a></li>
						</div>
					</ul>
				</li>
			</ul>
		</div>
		<!--右侧内容-->
		<div class="tpl-right-item">
			<div class="tpl-body">
				<!--头部-->
				<div class="tpl-header">
					<div class="tpl-header-fluid">
						<div class="tpl-userbar">
							<ul>
								<li><a href="javascript:;" class="dashboard" tag="style-bar"><i class="fa fa-dashboard"></i>主题设置</a></li>
                                <li><a href="个人中心.html">个人中心</a></li>
								<li><a href="login.html" class="logout"><i class="fa fa-power-off"></i>退出登录</a></li>
							</ul>
						</div>
					</div>
				</div>


			<!--内容-->
				<div class="tpl-content">
					<div class="tpl-pannel clearfix">
						<div class="tpl-h-title">
						</div>
						<!--历史考勤-->
				        <div class="container-fluid">
	                        <div class="row-fluid">
		                        <div class="span12">
			                    <form id="form" class="form-search" name="form" method="post">
				                <h3>
					                <strong>查询考勤</strong>
				                </h3>			
				                <p>
					                  <input class="input-medium search-query" type="text" id="inputfind" name="inputfind" />
					                  <button  id="select" name="submit" class="btn" type="submit" onClick="" >查找</button> 									
				                </p>
			                    </form>
									<div id="div"></div>
		                        </div>
	                        </div>
                         </div>
                        <!--表格-->
						<table class="layui-table" lay-even="" lay-skin="row" id="table">
							<colgroup>
								<col width="230">
								<col width="230">
								<col width="230">
								<col width="230">
								<col width="230">
							</colgroup>
							<thead>
								<tr>
									<th>考勤日期</th>
									<th>是否已上传照片</th>
									<th>上传照片</th>
									<th>请假情况</th>
									<th>查看本次考勤情况</th>
								</tr> 
							</thead>
							<?php 	
				 require_once("pageturning.php");
				  $input=@$_POST['inputfind'];
                  //查询
	              if(isset($input)){
                  while($row = mysqli_fetch_array($retval,MYSQLI_ASSOC)){ ?>
					        		<td class="item-a" data-id="2" id="date"><?php echo $row["date"] ?></td>
                                    <td class="item-a" data-id="2" id="isupload"><?php  if($row["flag"]==1)  {echo "是";}  else { echo "否";} ?></td>
                                    <td class="item-a" data-id="2" id="upload">上传照片
							   				    <form action="upload_server.php" method="post" enctype="multipart/form-data">
		                                       <input type="hidden" name="max_file_size" value="1048576">
		                                       <input type="file" name="file">
		                                       <input type="submit" name="上传">		
											   </form></td>
									<td class="item-a" data-id="2" id="leaveNum"><a href="student2.html?key=2"><?php $leaveNum=leavenum($row["date"]);echo $leaveNum."人";?></a></td>
									<td class="item-a" data-id="2" id="attendedNum"><a href="student2.html?key=2"><?php $attendedNum=attendednum($row["date"]); echo $attendedNum."人/".$row_1["student_number"]."人";?></a></td>
                              <?php } } else {
							foreach($array as $key=>$values)   {
							?>
	                       <tr>
		                            <td class="item-a" data-id="2" id="date"><?php echo $values->date;?></td>
                                    <td class="item-a" data-id="2" id="isupload"><?php  if($values->flag==1)  {echo "是";}  else { echo "否";}?></td>
                                    <td class="item-a" data-id="2" id="">上传照片
							   		           <form action="upload_server.php?date=<?php echo $values->date;?>" method="post" enctype="multipart/form-data">
		                                       <input type="hidden" name="max_file_size" value="1048576">
		                                       <input type="file" name="file">
		                                       <input type="submit" name="上传" id="upload"  >		
												   </form></td>
									<td class="item-a" data-id="2" id="leaveNum"><a href="student2.html?key=2"><?php $leaveNum=leavenum($values->date);echo $leaveNum."人";?></a></td>
									<td class="item-a" data-id="2" id="attendedNum"><a href="student2.html?key=2"><?php $attendedNum=attendednum($values->date); echo $attendedNum."人/".$row_1["student_number"]."人";?></a></td>

	                       </tr>
							  <?php } } ?>
                           </table> 
					</div>
				</div>

				

		
<!--翻页-->
				<?php if(!isset($input)) { ?>
<div class="container-fluid" >
	<div class="row-fluid">
		<div class="span12">
			<div class="pagination pagination-centered">
				<ul_1>
					<li_1><a href="?pageNum=1">首页</a></li_1>
						<li_1><a href="?pageNum=<?php echo $pageNum==1?1:($pageNum-1);?>"> 上一页</a></li_1>
						<?php for($i=1;$i<=$endPage;$i++){ ?>						
					<li_1><a href="?pageNum=<?php echo $i; ?>"><?php echo $i;?></a></li_1>
						<?php   }  ?>
					<li_1><a href="?pageNum=<?php echo $pageNum==$endPage?$endPage:($pageNum+1);?>">下一页</a></li_1>
					<li_1 ><a href="?pageNum=<?php echo $endPage;?>">尾页</a></li_1>
				</ul_1>
			</div>
		</div>
	</div>
</div>
<?php }  ?>
				


				<!--配色方案-->
				<div class="right-bar style-bar">
					<div class="right-bar-fluid">
						<div class="tpl-header-text">配色方案</div>
						<ul class="style-item clearfix" id="style-list">
							<li data-style="tpl-black-n">
								<div class="header-style"></div>
								<div class="left-style black">
									<div class="logo-style"></div>
								</div>
							</li>
							<li data-style="tpl-black-hn">
								<div class="header-style black-child"></div>
								<div class="left-style black">
									<div class="logo-style"></div>
								</div>
							</li>
							<li data-style="tpl-red-hn">
								<div class="header-style red-child"></div>
								<div class="left-style red">
									<div class="logo-style"></div>
								</div>
							</li>
							<li data-style="tpl-red-n">
								<div class="header-style"></div>
								<div class="left-style red">
									<div class="logo-style"></div>
								</div>
							</li>
							<li data-style="tpl-blackred-hn">
								<div class="header-style red"></div>
								<div class="left-style black">
									<div class="logo-style"></div>
								</div>
							</li>
							<li data-style="tpl-blackgreen-hn">
								<div class="header-style green"></div>
								<div class="left-style black">
									<div class="logo-style"></div>
								</div>
							</li>
							<li data-style="tpl-green-hn">
								<div class="header-style green-child"></div>
								<div class="left-style green">
									<div class="logo-style"></div>
								</div>
							</li>
							<li data-style="tpl-green-n">
								<div class="header-style"></div>
								<div class="left-style green">
									<div class="logo-style"></div>
								</div>
							</li>
							<li data-style="tpl-white-hn">
								<div class="header-style"></div>
								<div class="left-style white">
									<div class="logo-style"></div>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<!--用户信息-->
				<div class="right-bar user-bar">
					<div class="right-bar-fluid">
						<div class="tpl-card">
							<div class="card-pannel">
								<div class="user-item">
									<img class="user-upload" src="static/images/4a251abe82900c79733daa753664f701.jpg">
									<h4 class="user-name">admin</h4>
									<p>时间模糊了很多东西，我依然爱你</p>
									<div class="user-tips">
										<a href="javascript:;" data-tips="13138003682"><i class="fa fa-phone"></i></a>
										<a href="javascript:;" data-tips="you can goin!"><i class="fa fa-star"></i></a>
										<a href="javascript:;" data-tips="547720744"><i class="fa fa-qq"></i></a>
										<a href="javascript:;" data-tips="Mr.LIU"><i class="fa fa-wechat"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--尾部-->
				<div class="tpl-footer">
					<div class="tpl-footer-fluid">
						<a class="f-item-text">厚德积学 励志敦行</a>
						<a class="f-item-text">SNNU</a>
						<a class="fitem-texy">2019 ©</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="static/layui/layui.js"></script>
	<script type="text/javascript" src="static/js/jquery.min.js"></script>
	<script type="text/javascript" src="static/js/jquery.cookie.js"></script>
	<script type="text/javascript" src="static/js/admin.js"></script>
			<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
		<script src="js/jquery-1.8.0.min.js"></script>
		<script  type="text/javascript">
				$(function(){
    $(".layui-table tr").click(function(){
var td = $( this ).find( "td" );
	var	d = td.eq( 0 ).html();//提取第一个数据
//$.ajax("upload_server.php?date="+date);
//$.post("upload_server.php",{date:date});
	//	alert(date);
//date = JSON.stringify(date);
		                          //      var str= JSON.stringify(date);//数组转string
                                //alert(typeof(str));
		var date=d;
                                $.ajax({
                                  url:'upload_server.php',
                                  type:'GET',
                                  data:{date:date},
                                  success:function(data){/*alert(data);*/}
                                 // error:function(){alert('php页面有错误！');}
                              });
		return False;
});
				});
	</script>  
</body>
</html>
