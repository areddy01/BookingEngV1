<?php
include('config.php');
 if(isset($_POST['SUBMIT']))
        {
			echo $_POST['files'][0].date('dmYhms');
              $bookid=$_POST['mySelect'];
			 $_SESSION['ppid']=$bookid;
			 $propid=$_POST['property'];
            $text=$_POST['tet'];
			
             $text1=$_POST['tet1'];
			
			 
			 
             
  //$inquery="insert into wp_addmappings values('','$bookid','$propid','$bookid1','$propid1','$roomid')";
              ///$q1=mysql_query($inquery);
			  
			 // echo count($text);
			  
			  // echo count($text1);
                  for($i=0;$i<count($text);$i++)
				  {
					  $tet=$text[$i];
					  echo $tet;
					  $tet1=$text1[$i];
					  echo $tet1;
					   $imgqry="INSERT INTO wp_image_upload VALUES('','$tet',$tet1,'')";
					   
				  }
				  //echo $tet;
				  
             //header("location:upload1.php");
        }
            ?>