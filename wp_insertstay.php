<?php
include('config.php');
 if(isset($_POST['Attach']))
 {
              $id=$_POST['mySelect'];
              $hid=$_REQUEST['ar1'];
              if($id)
                  {       
                   $q="select * from staypays where id='$id'";
                   $q1=mysql_query($q);
                   $row = mysql_fetch_array($q1);
                   $from=$row['fromdate'];
                   $to=$row['todate'];
                   $sn=$row['snight'];
                   $fn=$row['fnight'];
                   $hid;
               $mf=$row['mfnight'];
               $inquery="insert into staypays_add values('','$from','$to','$sn','$fn','$mf','$id','$hid')";
               $q1=mysql_query($inquery);
                  }
              header("location:staypays.php?rid=$hid");
        }
            ?>