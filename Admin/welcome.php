<div id="header_msg">
<strong>SELAMAT DATANG</strong><br />Sistem Informasi Geografis Pembangunan Irigasi Baru pada Kabupaten Lamongan </div>
<script type="text/javascript">
var slideimages=new Array()
function slideshowimages()
{
for (i=0;i<slideshowimages.arguments.length;i++){
slideimages[i]=new Image()
slideimages[i].src=slideshowimages.arguments[i]
}
}
</script>
<div id="img_wel"><img src="img/6.jpg" alt="Slideshow Image Script" title="Slideshow Image Script" name="slide" class="img_wel"></div>
<script type="text/javascript">
slideshowimages("../img/1.jpg","../img/2.jpg","../img/3.jpg")
var slideshowspeed=2000
var whichimage=0
function slideit()
{
if (!document.images)
return
document.images.slide.src=slideimages[whichimage].src
if (whichimage<slideimages.length-1)
whichimage++
else
whichimage=0
setTimeout("slideit()",slideshowspeed)
}
slideit()
</script>