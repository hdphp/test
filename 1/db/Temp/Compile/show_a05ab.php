<?php if(!defined("HDPHP_PATH"))exit;C("DEBUG_SHOW",false);?><html>
<head>
	<meta charset="utf-8"/>
	<title>显示文章列表</title>
</head>
<body>
<form action="http://localhost:8081/test/1/db.php/News/show" method="post" name="form1">
<a href="http://localhost:8081/test/1/db.php/News/addNews">发表文章</a><br/>
<table border="1" width="80%">
	  <tr>
	  	<td>序号</td>
	  	<td>标题</td>
	  </tr>
	<?php $hd["list"]["n"]["total"]=0;if(isset($news) && !empty($news)):$_id_n=0;$_index_n=0;$lastn=min(1000,count($news));
$hd["list"]["n"]["first"]=true;
$hd["list"]["n"]["last"]=false;
$_total_n=ceil($lastn/1);$hd["list"]["n"]["total"]=$_total_n;
$_data_n = array_slice($news,0,$lastn);
if(count($_data_n)==0):echo "";
else:
foreach($_data_n as $key=>$n):
if(($_id_n)%1==0):$_id_n++;else:$_id_n++;continue;endif;
$hd["list"]["n"]["index"]=++$_index_n;
if($_index_n>=$_total_n):$hd["list"]["n"]["last"]=true;endif;?>

	  <tr>
	  	<td><?php echo $n['id'];?></td>
	  	<td><?php echo $n['title'];?></td>
	  </tr>
	<?php $hd["list"]["n"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
</table>
<?php echo $page;?>
</form>
</body>
</html>