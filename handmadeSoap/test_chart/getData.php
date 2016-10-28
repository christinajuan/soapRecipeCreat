<?php 

	header("Content-Type: text/html; charset=utf-8");
	include("connMysql.php");
	$seldb = @mysql_select_db("soapTest");
	if (!$seldb) die("資料庫選擇失敗！");
	$sql_query = "SELECT * FROM `gustRecipe`";
	$result = mysql_query($sql_query);
	// 統計資料
	$total_records = mysql_num_rows($result);


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
// This is just an example of reading server side data and sending it to the client.
// It reads a json formatted text file and outputs it.

// $string = file_get_contents("../startbootstrap-freelancer-gh-pages/data_gustRecipe.php");
// echo $string;

// Instead you can query your database and parse into JSON etc etc

?> 