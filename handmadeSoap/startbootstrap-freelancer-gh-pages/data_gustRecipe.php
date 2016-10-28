<?php 
	header("Content-Type: text/html; charset=utf-8");
	include("connMysql.php");
	$seldb = @mysql_select_db("soapTest");
	if (!$seldb) die("資料庫選擇失敗！");
	$sql_query = "SELECT * FROM `gustRecipe`";
	$result = mysql_query($sql_query);
	// 統計資料
	$total_records = mysql_num_rows($result);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>你的手工皂配方</title>
<script type="text/javascript" src="jquery.js"></script>
</head>
<body>
<h1 align="center">你的手工皂配方</h1>
<p align="center">目前資料筆數：<?php echo $total_records;?>，<a href="RecipeHome.html">新增配方</a>。</p>
<table border="1" align="center">
  <!-- 表格表頭 -->
  <tr>
  	<th>ID</th>
  	<th>姓名</th>
    <th>椰子油</th>
    <th>棕櫚核油</th>
    <th>棕櫚油</th>
    <th>橄欖油</th>
    <th>甜杏仁油</th>
    <th>蓖麻油</th>
    <th>酪梨油</th>
    <th>澳洲胡桃油</th>
    <th>榛果油</th>
    <th>芝麻油</th>
    <th>可可脂</th>
    <th>乳木果脂</th>
    <th>玫瑰果油</th>
  </tr>
  <!-- 資料內容 -->
<?php
	while($row_result=mysql_fetch_assoc($result)){
		echo "<tr>";
		echo "<td>".$row_result["oID"]."</td>";
		echo "<td>".$row_result["fName"]."</td>";
		echo "<td>".$row_result["coconut"]."</td>";
		echo "<td>".$row_result["palmkernel"]."</td>";
		echo "<td>".$row_result["palm"]."</td>";
		echo "<td>".$row_result["olive"]."</td>";
		echo "<td>".$row_result["sweetAlmond"]."</td>";
		echo "<td>".$row_result["caster"]."</td>";
		echo "<td>".$row_result["avocado"]."</td>";
		echo "<td>".$row_result["macadamiaNut"]."</td>";
		echo "<td>".$row_result["hazelnut"]."</td>";
		echo "<td>".$row_result["sesame"]."</td>";
		echo "<td>".$row_result["cocoaButter"]."</td>";
		echo "<td>".$row_result["sheaButter"]."</td>";
		echo "<td>".$row_result["rosehip"]."</td>";
		// echo "<td><a href='update.php?id=".$row_result["oID"]."'>修改</a> ";
		// echo "<a href='delete.php?id=".$row_result["oID"]."'>刪除</a></td>";
		echo "</tr>";
	}
?>
</table>
<p align="center">姓名有標*者，為清爽型配方；若無，則為保濕型</p>
<!--<div>-->
<!--	<h1>滋潤度<p id="compute"></p></h1>-->
<!--	<h1>清潔力<p id="computeA"></p></h1>-->
<!--</div>-->
<!--<script>-->
<!--	var a1=30;-->
<!--	var a2=70;-->
<!--	var a3=0;-->
<!--	var a4=35;-->
<!--	var a5=45;-->
<!--	var a6=0;-->
<!--	var a7=0;-->
<!--	var a8=0;-->
<!--	var a9=0;-->
<!--	var a10=20;-->
<!--	var a11=70;-->
<!--	var a12=30;-->
<!--	var a13=0;-->
	<!--//滋潤度計算-->
<!--	var ans=(a1*2.7-->
<!--					+a2*3.8-->
<!--					+a3*6-->
<!--					+a4*8.8-->
<!--					+a5*8.7-->
<!--					+a6*8.1-->
<!--					+a7*8.6-->
<!--					+a8*8.3-->
<!--					+a9*7.4-->
<!--					+a10*8.1-->
<!--					+a11*6.3-->
<!--					+a12*7.8-->
<!--					+a13*7.9)/100;-->
<!--	$("#compute").text(ans);-->
	<!--//清潔力計算-->
<!--	var ansA=(a1*9.6-->
<!--					+a2*10.3-->
<!--					+a3*5.6-->
<!--					+a4*6.95-->
<!--					+a5*7.15-->
<!--					+a6*1.8-->
<!--					+a7*7.2-->
<!--					+a8*6.65-->
<!--					+a9*6.55-->
<!--					+a10*7.2-->
<!--					+a11*4.15-->
<!--					+a12*4.65-->
<!--					+a13*7.9)/100;-->
<!--	$("#computeA").text(ansA);-->
<!--</script>-->
</body>
</html>