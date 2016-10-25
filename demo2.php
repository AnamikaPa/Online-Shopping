<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>jQuery Zoom Image on Mouse Hover</title>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script>
<script src="js/jquery.elevatezoom.min.js" type="text/javascript"></script>
</head>
<body>
<div>
<img id="img1" style="width:100px; height:100px;" src="girl.jpg" data-zoom-image="girl.jpg"/>
</div>
<script type="text/javascript">
$(function() {
$("#img1").elevateZoom();
});
</script>
</body>
</html>