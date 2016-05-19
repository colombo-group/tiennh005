<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Bai 6</title>

	<style type="text/css">
		
	</style>
	
</head>
<body>
<div>
<form method="post">
	<input name="number1"></input>
	<input type="submit" value="+" name="add"></input>
	<input type="submit" value="-" name="sub"></input> 
	<input type="submit" value="x" name="mul"></input> 
	<input type="submit" value="/" name="dev"></input> 
	<input type="submit" value="^" name="exp"></input>
	<input name="number2"></input>
	<label>=</label>
	<?php
	if(isset($_POST["add"])) {
		if($_POST["number1"]==" " || !is_numeric($_POST["number1"]) || $_POST["number2"]==" " || !is_numeric($_POST["number2"])) {
				echo "Yêu cầu nhập một các số để thực hiện phép tính";
			} else
				$result = (int)$_POST["number1"] + (int)$_POST["number2"];
	}
	if(isset($_POST["sub"])) {
		if($_POST["number1"]==" " || !is_numeric($_POST["number1"]) || $_POST["number2"]==" " || !is_numeric($_POST["number2"])) {
				echo "Yêu cầu nhập một các số để thực hiện phép tính";
			} else
				$result = (int)$_POST["number1"] - (int)$_POST["number2"];
	}
	if(isset($_POST["mul"])) {
		if($_POST["number1"]==" " || !is_numeric($_POST["number1"]) || $_POST["number2"]==" " || !is_numeric($_POST["number2"])) {
				echo "Yêu cầu nhập một các số để thực hiện phép tính";
			} else
				$result = (int)$_POST["number1"] * (int)$_POST["number2"];
	}
	if(isset($_POST["dev"])) {
		if($_POST["number1"]==" " || !is_numeric($_POST["number1"]) || $_POST["number2"]==" " || !is_numeric($_POST["number2"])) {
				echo "Yêu cầu nhập một các số để thực hiện phép tính";
			} else
				$result = (int)$_POST["number1"] / (int)$_POST["number2"];
	}
	if(isset($_POST["exp"])) {
		if($_POST["number1"]==" " || !is_numeric($_POST["number1"]) || $_POST["number2"]==" " || !is_numeric($_POST["number2"])) {
				echo "Yêu cầu nhập một các số để thực hiện phép tính";
			} else
				$result = pow((int)$_POST["number1"], (int)$_POST["number2"]);
	}
	?>
	<input type"text" value = "<?php echo (isset($result))?$result:'';?>">
</form>
</div>

</body>
</html>