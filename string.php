<!DOCTYPE html>
<html>
<head>
	<title>Phân tích đoạn văn</title>
	<meta charset="UTF-8">
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
</body>
</html>
<?php
	function chuyenChuoi($str) {
		// In thường
	     $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
	     $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
	     $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
	     $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
	     $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
	     $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
	     $str = preg_replace("/(đ)/", 'd', $str);    
		// In đậm
	     $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
	     $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
	     $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
	     $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
	     $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
	     $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
	     $str = preg_replace("/(Đ)/", 'D', $str);
	     return $str; // Trả về chuỗi đã chuyển
	}  
   
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
	$str="";
	$let="";
	if(isset($_POST['analysis'])) {
		$str = $_POST['passage'];
		//echo "[".$str."]"."<br>";
		//for($i=0; $i < strlen($str); $i++)
			//echo $str[$i]." ";
		$let = $_POST['letter'];
	}
?>
<div>
	<form action="string.php" method="post">
		<textarea name="passage" rows="20" cols="100"><?php echo $str?></textarea><br><br>
		<input type="text" name="letter" value="<?php echo $let?>"></input>
		<input type="submit" name="analysis" value="Phân tích" ></input>
	</form>
</div>
<?php
	if(isset($_POST['analysis'])) {
		
		if(strlen($let) > 1 || $let == "")
			echo "Hãy nhập 1 kí tự";
		else {
			$count = 0;
			$temp = chuyenChuoi($str);
			$len = strlen($temp);
			for($i=0; $i < $len; $i++)
				if($temp[$i] == $let || $temp[$i]  == strtoupper($let) || $temp[$i] == strtolower($let))
					$count++;
			echo "Có ".$count." kí tự ".$let."<br>";
			if($count > 0) {
				$word = explode(' ', $str);
				//var_dump($word);
				//echo count($word);
				echo "Các từ có chứa kí tự '".$let."':<br>";
				for($i=0;$i<count($word);$i++) {
					if(strpos(chuyenChuoi($word[$i]), $let)!==FALSE || strpos(chuyenChuoi($word[$i]), strtoupper($let))!==FALSE || strpos(chuyenChuoi($word[$i]), strtolower($let))!==FALSE){
						//echo strpos($word[$i], $let);
						echo $word[$i]. " ";
					}
				}
				echo "<br>";
				for ($i=0;$i<count($word);$i++) { 
					
					if(strpos(chuyenChuoi($word[$i]), $let)!==FALSE || 
						strpos(chuyenChuoi($word[$i]), strtoupper($let))!==FALSE || 
						strpos(chuyenChuoi($word[$i]), strtolower($let))!==FALSE){
						echo "<p class='word'>";
						echo $word[$i]." ";
						echo "</p>";
					} else

					if(strpos(chuyenChuoi($word[$i]), $let)===FALSE || 
						strpos(chuyenChuoi($word[$i]), strtoupper($let))===FALSE || 
						strpos(chuyenChuoi($word[$i]), strtolower($let))===FALSE){
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
