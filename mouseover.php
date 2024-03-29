<!DOCTYPE html>   
<html lang="en">   
<head>   
<meta charset="utf-8">   
<title>Twitter Bootstrap Popover Example</title>   
<meta name="description" content="Creating Modal Window with Twitter Bootstrap">  
<link href="/twitter-bootstrap/twitter-bootstrap-v2/docs/assets/css/bootstrap.css" rel="stylesheet">   
</head>  
<body>  
<div class="container">  
<h2>Example of creating Modal with Twitter Bootstrap</h2>  
<div class="well">  
<a href="#" id="example" class="btn btn-danger" rel="popover" data-content="It's so simple to create a tooltop for my website!" data-original-title="Twitter Bootstrap Popover">hover for popover</a>  
</div>  
</div>  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>  
<script src="/twitter-bootstrap/twitter-bootstrap-v2/js/bootstrap-tooltip.js"></script>  
<script src="/twitter-bootstrap/twitter-bootstrap-v2/js/bootstrap-popover.js"></script>  
<script>  
$(function ()  
{ $("#example").popover();  
});  
</script>  
</body>  
</html>  
       
 <link href="assets/css/bootstrap.css" rel="stylesheet">  
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">  
    <link href="assets/css/docs.css" rel="stylesheet">  
   <script src="assets/js/jquery.js"></script>  
   <script src="assets/js/bootstrap-tooltip.js"></script>  
   <script src="assets/js/bootstrap-popover.js"></script>  
   <script src="assets/js/bootstrap-transition.js"></script>  
   <script type="text/javascript">  
  $(document).ready(function () {  
    $("[rel=tooltip]").tooltip();  
  });  

 $(document).ready(function(){  
                $('#example').tooltip({'placement':'top', 'trigger' : 'hover'});  
            }); </script> 
   <a href="#" rel="tooltip" data-original-title="hello">hover on me</a> 
   
   
   <!DOCTYPE html>   
<html lang="en">   
<head>   
<meta charset="utf-8">   
<title>Twitter Bootstrap Popover with placement option Example</title>   
<meta name="description" content="Creating Modal Window with Twitter Bootstrap">  
<link href="/twitter-bootstrap/twitter-bootstrap-v2/docs/assets/css/bootstrap.css" rel="stylesheet">   
<style>  
a {  
margin-left : 400px;  
}  
</style>  
</head>  
<body>  
<div class="container">  
<h2>Example of creating Popover with Twitter Bootstrap with placement option</h2>  
<div class="well">  
<a href="#" id="example" class="btn btn-success" rel="popover" data-content="It's so simple to create a tooltip for my website!" data-original-title="Twitter Bootstrap Popover">hover for popover</a>  
</div>  
<div class="well">  
<a href="#" id="example_left" class="btn btn-success" rel="popover" data-content="It's so simple to create a tooltop for my website!" data-original-title="Twitter Bootstrap Popover">hover for popover</a>  
</div>  
<div class="well">  
<a href="#" id="example_top" class="btn btn-success" rel="popover" data-content="It's so simple to create a tooltop for my website!" data-original-title="Twitter Bootstrap Popover">hover for popover</a>  
</div>  
<div class="well">  
<a href="#" id="example_bottom" class="btn btn-success" rel="popover" data-content="It's so simple to create a tooltop for my website!" data-original-title="Twitter Bootstrap Popover">hover for popover</a>  
</div>  
</div>  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>  
<script src="/twitter-bootstrap/twitter-bootstrap-v2/js/bootstrap-tooltip.js"></script>  
<script src="/twitter-bootstrap/twitter-bootstrap-v2/js/bootstrap-popover.js"></script>  
<script>  
$(function ()  
{ $("#example").popover();  
  $("#example_left").popover({placement:'left'});  
  $("#example_top").popover({placement:'top'});  
  $("#example_bottom").popover({placement:'bottom'});  
});  
</script>  
</body>  
</html>  
