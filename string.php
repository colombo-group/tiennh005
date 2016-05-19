<!DOCTYPE html>
<html>
<head>
	<title>Phân tích đoạn văn</title>
	<style type="text/css">
		p {
			float: left;
			padding-right: 5px;
		}
		p.word {
			font-weight: bold;
			background-color: #green;
		}
	</style>
</head>
<body>
<div>
	<form action="string.php" method="post">
		<textarea name="passage" rows="20" cols="100"></textarea><br><br>
		<input type="text" name="letter"></input>
		<input type="submit" name="analysis" value="Phân tích"></input>
	</form>
</div>
</body>
</html>
<?php
	function standarzedStr($str) {
		$str = trim($str);
		$len = strlen($str);
		$count = 0;
		for($i=0;$i<$len-1;$i++) {
			if($str[$i] == ' ' && $str[$i+1] == ' ') {
				$count++;
				for($j=$i+1;$j<$len-1;$j++) {
					$str[$j] = $str[$j+1];
				}
				$i--;
			}

		}
		$str = substr($str, 0, $len-$count);	
		return $str;
	}

	if(isset($_POST['analysis'])) {
		$str = $_POST['passage'];
		//echo "[".$str."]"."<br>";
		$str = standarzedStr($str);
		
		$let = $_POST['letter'];
		if(strlen($let) > 1 || $let == "")
			echo "Hãy nhập 1 kí tự";
		else {
			$count = 0;
			$len = strlen($str);
			for($i=0; $i < $len; $i++)
				if($str[$i] == $let || $str[$i] == strtoupper($let) || $str[$i] == strtolower($let))
					$count++;
			echo "Có ".$count." kí tự ".$let."<br>";
			if($count > 0) {
				$word = explode(' ', $str);
				//var_dump($word);
				//echo count($word);
				echo "Các từ có chứa kí tự '".$let."':<br>";
				for($i=0;$i<count($word);$i++) {
					if(strpos($word[$i], $let)!==FALSE || strpos($word[$i], strtoupper($let))!==FALSE || strpos($word[$i], strtolower($let))!==FALSE){
						//echo strpos($word[$i], $let);
						echo $word[$i]. " ";
					}
				}
				echo "<br>";
				for ($i=0;$i<count($word);$i++) { 
					
					if(strpos($word[$i], $let)!==FALSE || strpos($word[$i], strtoupper($let))!==FALSE || strpos($word[$i], strtolower($let))!==FALSE){
						echo "<p class='word'>";
						echo $word[$i]." ";
						echo "</p>";
					} else

					if(strpos($word[$i], $let)===FALSE || strpos($word[$i], strtoupper($let))===FALSE || strpos($word[$i], strtolower($let))===FALSE){
						echo "<p>";
						echo $word[$i]." ";
						echo "</p>";
					}
					
					//echo $word[$i]. " ";	
				}
			}
			
		}
		
	}
?>