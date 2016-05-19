<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Bai 2</title>

	<style type="text/css">
		input {
			margin-left: 5px;
			margin-bottom: 5px;
		}

		div {
			margin: auto;
			width: 250px;
		}

		div#graph {
			margin-top: 10px;
		}

		div#graph table {
			border: outset 1px;
		}

		div#graph table tbody tr {
			height: 10px;
		}

		div#graph table td {
			border: inset 1px;
		}

		div#graph table td.second {
			width: 200px;
			height: 100%;
		}	
        
        div#graph p.percent {
        	float: left;
        }

		div#line {
			height: 20px;
			background-color: red;
			float: left;
			margin-top: 15px;
			margin-right: 10px;
		}
	</style>

</head>
<body>
<div>
	<form method="post">
		Anh:<input type="text" name="data0"></input><br>
		Pháp:<input type="text" name="data1"></input><br>
		Đức:<input type="text" name="data2"></input><br>
		Nga:<input type="text" name="data3"></input><br>
		Nhật:<input type="text" name="data4"></input><br>
		<input type="submit" value="Vẽ đồ thị" name="submit"></input>
	</form>
</div>
<div id="graph">
	
</div>
<?php
	if(isset($_POST['submit'])) {
		$myArray = array("Anh","Pháp","Đức","Nga","Nhật");
		$len = count($myArray);
		$check = 1;
		echo "<div id='graph'>";
		
		echo "<table>";
		
	    $sum = 0;
		for($i=0;$i<=4;$i++) {
			$nameValue = "data".$i;
			if($_POST["$nameValue"] == ""||!is_numeric($_POST["$nameValue"])) {
				echo "Yêu cầu nhập lại";
				$check = 0;
				break;		
			}
			
	   		$sum += (float)$_POST["$nameValue"];
				
		}
		if($check == 1) {
			
			for($i=0;$i<=4;$i++) {
				$percent = 0;
				echo "<tr>";
							
		   		echo "<td>";
		   		echo $myArray[$i];
		   		echo "</td>";
		   				
		   		echo "<td class='second'>";
		   		$nameValue = "data".$i;
		   		$percent = (float)$_POST["$nameValue"] * 100 / $sum;
		   						
		   		echo "<div id='line' style='width:".$percent."px'></div>";
		   		echo "<p class='percent'>".$percent."%"."</p";

		   		echo "</td>";
						
				echo "</tr>";	
			}	
		}

		echo "</table>";
		
		echo "</div>";	
	}
	
?>
</body>
</html>