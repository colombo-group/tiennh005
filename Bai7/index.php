<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Bai 7</title>

	<style type="text/css">
		#calendar-container{
    		padding: 10px;
   			width: 256px;
    		height: 220px;
    		text-align: center;
    		margin: auto; 
    		border: 1px solid #eee;
    		border-radius: 10px;
    		font-size: 16px;
    		font-family: Arial;
   	 		background-color: #FFFEBE;
		}

		#calendar-container div{
    		padding: 0;
    		margin-bottom: 10px;
		}

		#calendar-month-year{
    		margin: 5px;
		}

		#calendar-header{
			border: solid 1px #d3d3d3;
		} 

		#calendar-dates table tr td{
    		padding: 5px;
    		border: solid 1px #d3d3d3;
            width: 24px;
            float: left;
		}

        .today {
            background-color: #0EEF5E;
        }
	</style>


	
</head>
<body>
<div id="calendar-container">
    <?php
        $month_name = ['January','February','March','April','May','June','July','August','September','October','November','December'];
        $year = date("Y");
        $month = date("m");
        $day = date("d");
        $tmp = mktime(0, 0, 0, $month, 1, $year);
        $first_day = date("l", $tmp);
        $first_day = substr($first_day,0,3);
        //echo $first_day;
        $day_no = -1;
        $day_name = ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'];
        for($i=0; $i < 7; $i++) {
            if($first_day == $day_name[$i]) {
                $day_no = $i;
                break;
            }
        }
        //echo $day_no;

        //calendar header
        echo "<div id='calendar-header'>";

        echo "<span id='calendar-month-year'>";
            echo $month_name[$month-1]." ".$year;
        echo "</span>";
        
        echo "</div>";

        //calendar dates
        echo "<div id='calendar-dates'>";
        
        echo "<table>";

        //row for the day letters
        echo "<tr>";
        for($c=0; $c<=6; $c++){
            echo "<td>";
            $day_name = ['Su','Mo','Tu','We','Th','Fr','Sa'];
            echo $day_name[$c];
            echo "</td>";
        }
        echo "</tr>";
       
        //create 2nd row
        echo "<tr>";
        $c = 0;
        for($c=0; $c<=6; $c++){
            if($c == $day_no){
                break;
            }
            echo "<td> </td>";
        }
    
        $count = 1;
        for($c=$day_no; $c<=6; $c++){
            if($c == $day) {
                echo "<td class='today'>";
                echo $count;
                echo "</td>";      
            } else {
                echo "<td>";
                echo $count;
                echo "</td>";
            }
           
            $count++;
           
        }
        echo "<tr>";
        $tmp = mktime(0, 0, 0, $month+1, 1, $year);
        //echo date("m",$tmp);
        $tmp = strtotime("-1 day", $tmp);
        $days = (int)date("d",$tmp);
        //echo $days;
        

        //rest of the date rows
        for($r=3; $r<=7; $r++){
            echo "<tr>";
            for($c=0; $c<=6; $c++){
                if($count > $days){
                    return 0;
                }
                if($count == $day) {
                    echo "<td class='today'>";
                    echo $count;
                    echo "</td>";
                } else {
                    echo "<td>";
                    echo $count;
                    echo "</td>";
                }
                
                $count++;
                
            }
            echo "</tr>";
        }
        echo "</table>";

        echo "</div>";
    ?>
</div>          
</body>
</html>