<!DOCTYPE html>
<html>
<head>
	<title>Phân trang</title>
	<style>
	    li {
	    	float:left; 
	    	margin: 3px; 
	    	border: solid 1px gray; 
	    	list-style-type: none;
	    }
	    a {
	    	padding: 5px;
	    }
	    span {
	    	display:inline-block; 
	    	padding: 0px 3px; 
	    	background: blue; 
	    	color:white 
	    }

	    div {
	    	width: 200px;
	    	margin-left: 100px;
	    	margin-top: 30px;
	    }
	</style>
</head>
<body>
<form action="paginator.php" method="post">
	<input type="text" name="numberA"></input>
	<input type="text" name="numberB"></input>
	<input type="text" name="numberC"></input>
	<input type="submit" value="Hiển thị" name="submit"></input>
</form>
</body>
</html>

<?php 
	
	class Pagination{
	    protected $_config = array(
	        'current_page'  => 1, 
	        'total_record'  => 1, 
	        'total_page'    => 1, 
	        'limit'         => 10,
	        'start'         => 0, 
	        'link_full'     => '',
	        'link_first'    => '',
	    );
	     
	     function getStart() {
	     	return $this->_config['start'];
	     }
	   
	    function init($config = array()){
	        
	        foreach ($config as $key => $val){
	            if (isset($this->_config[$key])){
	                $this->_config[$key] = $val;
	            }
	        }
	         
	        if ($this->_config['limit'] < 0){
	            $this->_config['limit'] = 0;
	        }
	         
	        $this->_config['total_page'] = ceil($this->_config['total_record'] / $this->_config['limit']);
	         
	        if (!$this->_config['total_page']){
	            $this->_config['total_page'] = 1;
	        }
	         
	        if ($this->_config['current_page'] < 1){
	            $this->_config['current_page'] = 1;
	        }
	         
	        if ($this->_config['current_page'] > $this->_config['total_page']){
	            $this->_config['current_page'] = $this->_config['total_page'];
	        }
	         
	        $this->_config['start'] = ($this->_config['current_page'] - 1) * $this->_config['limit'];
	    }
	     
	    private function __link($page){
	        
	        if ($page <= 1 && $this->_config['link_first']){
	            return $this->_config['link_first'];
	        }
	        return str_replace('{page}', $page, $this->_config['link_full']);
	    }
	     
	    function html(){   

	        $p = '';
	       
	        if ($this->_config['total_record'] > $this->_config['limit'])
	        {
	            $p = '<ul>';
	             
	            if ($this->_config['current_page'] > 1)
	            {
	                $p .= '<li><a href="'.$this->__link('1').'">First</a></li>';
	                $p .= '<li><a href="'.$this->__link($this->_config['current_page']-1).'">Prev</a></li>';
	            }
	             
	            for ($i = 1; $i <= $this->_config['total_page']; $i++)
	            {
	                
	                if ($this->_config['current_page'] == $i){
	                    $p .= '<li><span>'.$i.'</span></li>';
	                }
	                else{
	                    $p .= '<li><a href="'.$this->__link($i).'">'.$i.'</a></li>';
	                }
	            }
	 
	            if ($this->_config['current_page'] < $this->_config['total_page'])
	            {
	                $p .= '<li><a href="'.$this->__link($this->_config['current_page'] + 1).'">Next</a></li>';
	                $p .= '<li><a href="'.$this->__link($this->_config['total_page']).'">Last</a></li>';
	            }
	             
	            $p .= '</ul>';
	        }
	        return $p;
	    }
	}

	$i = 0;
	$a = 0;
	$b = 0;
	$c = 0;
	$check = 1;

	if(isset($_POST['submit'])) {
		if(isset($_POST['numberA'])) {
			$a = $_POST['numberA'];
			if(!is_numeric($a)) {
				//echo "Yêu cầu nhập lại";
				$check=0;
			}
			
		}
		if(isset($_POST['numberB'])) {
			$b = $_POST['numberB'];
			if(!is_numeric($b)) {	
				//echo "Yêu cầu nhập lại";
				$check=0;
			}
			
		}
		if(isset($_POST['numberC'])) {
			$c = $_POST['numberC'];
			if(!is_numeric($c)) {
				//echo "Yêu cầu nhập lại";
				$check=0;
			}
		}
		if($check==1) {
			while ($b*$i<=$a) {
				$i++;
			}
			$i--;	
		} else
			echo "Yêu cầu nhập lại";
		
	} else {
		$check = 0;
		if(isset($_GET['a']))
			$a= $_GET['a'];
		if(isset($_GET['b']))
			$b = $_GET['b'];
		if(isset($_GET['c']))
			$c = $_GET['c'];

	}
	if(isset($_GET['a']) || $check==1) {
		while ($b*$i<=$a) {
			$i++;
		}
		$i--;
		$config = array(
		'current_page'  => isset($_GET['page']) ? $_GET['page'] : 1, 
		'total_record'  => $i,
		'limit'         => $c,
		'link_full'     => 'paginator.php?page={page}&a='.$a.'&b='.$b.'&c='.$c,
		'link_first'    => 'paginator.php?&a='.$a.'&b='.$b.'&c='.$c,
		);
		 
		$paging = new Pagination();
			 
		$paging->init($config);

		echo "<div>";
		$result = $paging->getStart() * $b;
		for($j=0;$j<$c;$j++) {
			if($result <= $a) {
				echo $result." ";
				$result+=$b;
			}
			else 
				break;
		}
		echo "</div>";
			 
		echo $paging->html();	
	}
	

	
?>
 
