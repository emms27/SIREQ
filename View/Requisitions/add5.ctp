<?php echo "hi!"; 	?>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript">
var nextinput = 0;
function AgregarCampos(){
nextinput++;
campo = '<tr><td id="rut'+nextinput+'">Campo:<input type="text" size="20" id="campo' + nextinput + '"&nbsp; name="campo' + nextinput + '"&nbsp; /></td><td></td><td></td><td></td></tr>';
$("#campos").append(campo);
}
</script>

  <a href="#" onclick="AgregarCampos();">Agregar Campos</a>
<table border="1">
 <tr>
  <td width=”175″>Nombre</td>
  <td width=”175″>Sitio Web </td>
  <td width=”100″>Correo</td>
  <td width=”100″>Acciones</td>
 </tr>
<form id="form" name="form" method="post">
<tr><div id="campos"></div></tr>


</form>
</table>







