<?php $avisos = $this->requestAction('Avisos/index'); ?>
<script>
<?php 
//debug($avisos);
foreach ($avisos as $row): 
 switch($row['Aviso']['color']){
  case "negro":  $color="log";       break;
  case "verde":  $color="success";   break;
  case "rojo":   $color="error";     break;
 }
 echo 'alertify.'.$color.'("'.$row['Aviso']['aviso'].'");';
endforeach; 
?>
</script>

