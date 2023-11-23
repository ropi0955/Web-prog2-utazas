

<div class="page-heading about-heading header-text" style="background-image: url(assets/images/heading-2-1920x500.jpg);">
<script type="text/javascript" src="obj_js/obj.js">
 </script>
  
  
  

      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h2>Objektumok JavaScript-ben</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
	
	<div class="best-features">
      <div class="container">
       
         
            <div class="section-heading">
              <h2>Objektumok JavaScript-ben</h2>
            </div>
         <h3>Állítsa be a kép méretét és elhelyezkedését.</h3>
            <script type="text/javascript">

var myimage = new Image("pelda.jpg", 950, 580, 200, 200);
</script>

<table>
<tr>

<td align="right">x koordináta:</td><td><input type="text" id="x" name="x"></td>
<td align="right">y koordináta:</td><td><input type="text" id="y" name="y"></td>

<td><button onclick="myimage.putAt(x.value,y.value)">Elfogad</button></td>
</tr>
<tr>
<td align="right">Szélesség:</td><td><input type="text" id="width" name="width"></td>
<td align="right">Magasság:</td><td><input type="text" id="height" name="height"></td>

<td><button onclick="myimage.resize(width.value,height.value)">Újraméretez</button></td>
</tr>
<tr>
<td colspan="4"></td>

<td><button onclick="myimage.show()">Mutat</button></td>
</tr>
<tr>
<td colspan="4"></td>

<td><button onclick="myimage.hide()">Elrejt</button></td>
</tr>
</table>
    </div>
    