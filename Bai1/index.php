<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Bai 1</title>

	<style type="text/css">
		div {
			margin: auto;
			width: 420px;
		}

		p {
			text-align: center;
		}		
	</style>
	
</head>
<body>
<div>
<p>Bảng cửu chương</p>
<?php
	echo "<table border='1'>";
	for($i=1;$i<=2;$i++) {
		echo"<tr>";

		for($j=1;$j<=5;$j++) {
			echo"<td>";

				for($k=1;$k<=10;$k++) {
					$temp = $j + ($i-1) * 5;
					echo $temp." x ".$k." = ".$temp*$k."<br>";
				}

			echo"</td>";
		}

		echo"</tr>";
	}
	echo "</table>";
?>
</div>
</body>
</html>