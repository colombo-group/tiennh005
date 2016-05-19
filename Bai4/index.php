<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Bai 4</title>

	<style type="text/css">	
	</style>

</head>
<body>
<div>
	<div>
		<form method="post">
			<input type="text" name ="number"></input>

			<input type="submit" value="Vẽ tam giác" name="submit"></input>	
		</form>
		
	</div>

	<?php
		if(isset($_POST["submit"])) {
			echo "<div>";
			if($_POST["number"]==" " || !is_numeric($_POST["number"]) ||(int)$_POST["number"]!=ceil($_POST["number"]) || (int)$_POST["number"]<1) {
				echo "Yêu cầu nhập một số nguyên dương";
			} else {
				$x = (int)$_POST["number"];
				for($i=1;$i<=$x;$i++) {
						for($j=$i;$j>=1;$j--) {
							echo $j%10;
							echo "   ";
						}
							
						echo "<br>";
				}
			}
			
			echo "</div>";
		}	
	?>
</div>
</body>
</html>