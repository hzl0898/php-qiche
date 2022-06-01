
<?php 
include_once('config/init.php'); //加载配置文件
$setting = $mysql->where("id='1'")->find("tb_setting");

//商家推荐
 $sql= "select * from tb_cars where is_recommend=1 and status=1 order by add_time desc  limit 12";
$recommend_list = $mysql->doSql($sql);

//最新上交
 $sql= "select * from tb_cars where  status=1 order by add_time desc  limit 12";
$news_list = $mysql->doSql($sql);

//热卖汽车
 $sql= "select * from tb_cars where  status=1 order by sales desc  limit 12";
$hot_list = $mysql->doSql($sql);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<title>首页</title>
		<!-- 引入bootsrap的基础样式文件 -->
		<link href="bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
		<!-- 引入jquery库 -->
		<script src="bootstrap/js/jquery-3.4.1.min.js"></script>
		<!-- 引入boosrapt的js基础库 -->
		<script src="bootstrap/js/bootstrap.min.js"></script>
		<style type="text/css">
			.logo{ margin-top: -15px;;}
			
		</style>
	</head>
	<body>
		<div class="container">
			<!-- 导航栏开始 -->
		  <div class="row">
			<?php include_once('nav.php') ?>
		</div>
		 <!-- 幻灯片开始 -->
		  <div class="row">
			 <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			   <!-- Indicators -->
			   <ol class="carousel-indicators">
			     <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			     <li data-target="#carousel-example-generic" data-slide-to="1"></li>
			     <li data-target="#carousel-example-generic" data-slide-to="2"></li>
			   </ol>
			 
			   <!-- Wrapper for slides -->
			   <div class="carousel-inner" role="listbox">
			     <div class="item active">
			       <img src="<?php echo $setting ['banner1'] ?>" alt="..." style="height: 300px; margin: auto;">
			       <div class="carousel-caption">
			         ...
			       </div>
			     </div>
			     <div class="item">
			       <img src="<?php echo $setting ['banner2'] ?>" alt="..." style="height: 300px; margin: auto;">
			       <div class="carousel-caption">
			         ...
			       </div>
			     </div>
			     <div class="item">
			       <img src="<?php echo $setting ['banner3'] ?>" alt="..." style="height: 300px; margin: auto;">
			       <div class="carousel-caption">
			         ...
			       </div>
			     </div>
			   </div>
			 
			   <!-- Controls -->
			   <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
			     <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			     <span class="sr-only">上一张</span>
			   </a>
			   <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
			     <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			     <span class="sr-only">下一张</span>
			   </a>
			 </div>
		  </div>
		  <!-- 幻灯片结束 -->
		  <!-- 商家推荐开始 -->
		  <div class="row" style="margin-top: 10px;">
			 <div class="panel panel-default">
			   <div class="panel-heading">商家推荐</div>
			   <div class="panel-body">
					 <div class="row">
						<?php foreach($recommend_list as $key=>$val){ ?> 
						 <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
							 <img src="<?php echo $val['car_image'] ?>" alt="..." class="img-thumbnail">
							 <p><?php echo $val['car_name'] ?></p>
							 <p><?php echo $val['car_price'] ?></p>
							 <p><a href="info.php?id=<?php echo $val['id'] ?>" class="btn btn-danger">详情</a></p>
						 </div>
						 <?php } ?>
						 
					 </div>
			   </div>
			 </div>
		</div>
		<!-- 商家推荐结束 -->
		
		<!-- 最新上架开始 -->
		<div class="row" style="margin-top: 10px;">
			 <div class="panel panel-default">
			   <div class="panel-heading">最新上架</div>
			   <div class="panel-body">
					 <div class="row">
						<?php foreach($news_list as $key=>$val){ ?> 
						 <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
							 <img src="<?php echo $val['car_image'] ?>" alt="..." class="img-thumbnail">
							 <p><?php echo $val['car_name'] ?></p>
							 <p><?php echo $val['car_price'] ?></p>
							 <p><a href="info.php?id=<?php echo $val['id'] ?>" class="btn btn-danger">详情</a></p>
						 </div>
						 <?php } ?>
						 
					 </div>
			   </div>
			 </div>
		</div>
		 <!-- 最新上架结束 --> 
		 
		 
		 <!-- 热卖开始 -->
		 <div class="row" style="margin-top: 10px;">
		 	 <div class="panel panel-default">
		 	   <div class="panel-heading">热卖汽车</div>
		 	   <div class="panel-body">
		 			 <div class="row">
		 				<?php foreach($hot_list as $key=>$val){ ?> 
		 				 <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
		 					 <img src="<?php echo $val['car_image'] ?>" alt="..." class="img-thumbnail">
		 					 <p><?php echo $val['car_name'] ?></p>
		 					 <p><?php echo $val['car_price'] ?></p>
							 <p>已售:<?php echo $val['sales'] ?>辆</p>
		 					 <p><a href="info.php?id=<?php echo $val['id'] ?>" class="btn btn-danger">详情</a></p>
		 				 </div>
		 				 <?php } ?>
		 				 
		 			 </div>
		 	   </div>
		 	 </div>
		 </div>
		  <!-- 热卖结束 --> 
		  
		  <div class="row" style="margin-top:10px;">
			<?php include_once('footer.php') ?>
		  </div>
		  
		</div>
	</body>
</html>
