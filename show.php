<?php  
include('../uploadimage/config.php');
@$sql="select * from tbl_image";
@$query=mysql_query($sql);
$cnt=mysql_num_rows($query);?>
<html><body><table border="2" align="center"><tr><td><b>You have(<?php echo $cnt;?>)Images</b></td></tr></table>
<div id="body">
<?php 
while(@$row=mysql_fetch_array($query))
{
 @$image=$row ['photo'];
 ?>

<div id="img"><img src="server/php/files/<?php echo $image; ?>" width="160" height="50">
<a href="../uploadimage/editimg.php?id=<?php echo $row['id'];?>">Edit</a> &nbsp;&nbsp;|<a href="../uploadimage/deleteimg.php?id=<?php echo $row['id'];?>">Delete</a>
<?php
}
?>
</div>




<div id="upload">
<form name="form" action="../uploadimage/show.php" method="post" enctype="multipart/form-data">
<div id="file">
<label style="margin:0px 0px 0px 250px;"><font color="blue" face="Tahoma, Geneva, sans-serif Bold">IMAGES:</font></label>
 <input type="file" name="file[]"  multiple="multiple" /></div>
<div id="button">
<input type="submit" name="submit" value="UPLOAD" style="margin:0px 0px 0px 300px;" /> </div>
</form>
</div>
</div>

</body>
</html>
