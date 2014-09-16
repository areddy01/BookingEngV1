<?php
 @session_start();
if(!isset($_SESSION['userName'])) 
{
header('location:login.php');
}
require_once('functions.php');
require_once('connection.php');
$user=new User(); 
 $bf_id=$_GET['bf_id'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<TITLE>The Sample Hotel Departure</TITLE>
<META http-equiv=Content-Type content="text/html; charset=windows-1252">
</HEAD>
<BODY bgColor=#F9F9FF>

<TABLE align="center" cellSpacing="0" cellPadding="0" width="600" border="0">
<tr>
<td width="300" align="center">
<a href="propertySelection.php"><font color="#0066FF">G0 To Selectiom</a>  
</td>

</tr>
</table>
<br>

<TABLE>
  <TBODY>
  <TR>
  <TABLE align="center" cellSpacing="0" cellPadding="0" width="639" border="0" style="border-style: solid; border-width: 3px; border-color: #000080">

    <TD width=639>
       <IMG height=250 src="images/enquiry.JPG" width="100%" 
      border=0></TD></TR>
  <TR>
    <TD width=639>
      <TABLE cellSpacing=0 cellPadding=0 width=639 bgColor=#f4f4f4 border=0>
        <TBODY>
        <TR>
          <TD colSpan=3><FONT face=Verdana size=1><IMG height=3 
            src="Sample Departure 2_files/IMG_spacer.gif" width=639 
            border=0></FONT></TD></TR>
        <TR>
          <TD width=3><FONT face=Verdana size=1><IMG 
            src="Sample Departure 2_files/IMG_spacer.gif" width=3 
            border=0></FONT></TD>
          <TD width=639>
            <P style="MARGIN-TOP: -1px; MARGIN-BOTTOM: 0px" align=center><FONT 
            face="Monotype Corsiva" color=#000080 size=5>Thank You!</FONT></P>
            <TABLE borderColor=#ffffff cellSpacing=0 cellPadding=0 width="100%" 
            bgColor=#f4f4f4 border=1>
              <TBODY>
              <TR>
                <TD bgColor=#ffffff>
                  <P style="MARGIN: 10px 6px 0px"><font face="Trebuchet MS" size="2">Dear Mr. and Mrs. ***, <BR><BR>Thank you for being 
                  our guests at the Sample Hotel and Casino. We sincerely hope 
                  you enjoyed your visit with us and we were able to meet all of 
                  your expectations. <BR><BR>Feedback from our guests is very 
                  helpful in determining how we are doing in satisfying your 
                  needs. We would greatly appreciate your taking a moment to 
                  share any feelings you have about your recent stay. In 
                  particular, we would be grateful for the names of any 
                  employees who were especially helpful to you, so we can 
                  recognize their efforts. Please click here to complete our <u><font color="#0000FF"><a href="#">Survey</a></font></u>. <BR><BR>Thank you for 
                  your thoughts. We look forward to having you as our guests 
                  once again in the near future.<BR><BR><BR>**** 
                  ****<BR>Managing Director<br><br></font></P>
                  <P style="MARGIN: 10px 6px 0px"><font face="Trebuchet MS" size="2">P.S.&nbsp; If you didn't have a chance to join 
                  our&nbsp;<a href="#">Preferred Guest Program</a> while visiting us, 
                  please click here. It's a free membership that will provide 
                  you updates on our events and promotions; VIP access; 
                  discounts at retailers; cash back and other great special 
                  benefits in our casino.</font></P>
                  <P 
                  style="MARGIN-LEFT: 15px; MARGIN-RIGHT: 15px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                  &nbsp;&nbsp;&nbsp; <IMG height=55 src="images/wot.png" width=115 border=0> 
                  </P></TD></TR></TBODY>
            </TABLE></TD>
          <TD width=3><FONT face=Verdana size=1><IMG 
            src="images/spacer.gif" width=3 
            border=0></FONT></TD></TR>
        <TR>
          <TD colSpan=3><FONT face=Verdana size=1><IMG height=3 
            src="images/spacer.gif" width=639 
            border=0></FONT></TD></TR></TBODY></TABLE></TD></TR></TABLE>
</BODY>
</html>