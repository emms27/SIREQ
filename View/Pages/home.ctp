<?php 
/*
*/
?>
<div class="row page-header page-header-top">
 <div class="col-md-10" valign="top">
  <h3>
   <i class="fa fa-user"></i> <?php echo $this->Session->read('Auth.User.Personal.namefull'); ?> <small><?php echo $this->Session->read('Auth.User.Personal.puesto'); ?></small>
  </h3>
 </div>
 <div class="col-md-2" style="valign:middle;">
  <?php  echo$this->Html->image("logos/logo2.png", array("width"=>"175px","height"=>"42px","border"=>"0"));  ?><br>
 </div>
</div>


<h4 class="sub-header">¡Bienvenido!</h4>
<div class="row">
<div class="col-md-6">
<div class="media media-hover push clearfix">
<div class="media-body">
<h4 class="media-heading"><small><i class="fa fa-info-circle fa-2x"></i></small> ¿Cómo agregar una Requisición?</h4>
<a href="javascript:void(0)">Seguir los siguientes sencillos pasos:</a>
<li> Clic en requisición en el menú izquierdo.</li>
<li> Clic en agregar requisición.</li>
<li> Llenar la información solicitada en el sistema.</li>
</div>
</div>
</div>
<div class="col-md-6">
<div class="media media-hover push clearfix">
<div class="media-body">
<h4 class="media-heading"><small><i class="fa fa-info-circle fa-2x"></i></small> ¿Cómo agregar un mensaje?</h4>
<a href="javascript:void(0)">Seguir los siguientes sencillos pasos:</a>
<li> Clic en mensajes en el menú izquierdo.</li>
<li> Clic en escribir mensaje.</li>
<li> Llenar la información solicitada en el sistema.</li>
</div>
</div>
</div>
</div>

<h4 class="sub-header">Preguntas y Respuestas</h4>
<div class="row">
<div class="col-md-3">
<ul id="faq-tabs" class="nav nav-pills nav-stacked" data-toggle="tabs">
<li class="active"><a href="#faq1-section"><i class="fa fa-beer"></i> Requisición</a></li>
<li><a href="#faq2-section"><i class="fa fa-bell-o"></i> Mensajes</a></li>
<li><a href="#faq3-section"><i class="fa fa-book"></i> Productos</a></li>
<li><a href="#faq4-section"><i class="fa fa-umbrella"></i> Catálogo</a></li>
<li><a href="#faq5-section"><i class="fa fa-wrench"></i> Suporte</a></li>
</ul>
</div>
<div class="col-md-9">
<div class="tab-content tab-content-default">
<div id="faq1-section" class="tab-pane active">
<div id="faq1" class="panel-group">
<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title"><a class="accordion-toggle" data-toggle="collapse" data-parent="#faq1" href="#faq1_q1">01. Cuántas Requisiciones puedo Solicitar?</a></h4>
</div>
<div id="faq1_q1" class="panel-collapse collapse in">
<div class="panel-body">Usted puede solicitar una requisición por mes. Es importante que llene su solicitud a conciencia por que no podrá enviar otra</div>
</div>
</div>
<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title"><a class="accordion-toggle" data-toggle="collapse" data-parent="#faq1" href="#faq1_q2">02. En qué periodo de tiempo se podrá enviar una Requisición?</a></h4>
</div>
<div id="faq1_q2" class="panel-collapse collapse">
<div class="panel-body">Apartir del 15 de cada mes al último día de cada mes.</div>
</div>
</div>
<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title"><a class="accordion-toggle" data-toggle="collapse" data-parent="#faq1" href="#faq1_q3">03. Cuando se entrega una Requisición?</a></h4>
</div>
<div id="faq1_q3" class="panel-collapse collapse">
<div class="panel-body">Cuando el status de su requisición este en <span class="label label-info">Autorizada</span> o <span class="label label-info">Autorizada con Modificación</span> </div>
</div>
</div>
<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title"><a class="accordion-toggle" data-toggle="collapse" data-parent="#faq1" href="#faq1_q4">04. Cuánto es el tiempo máximo para recoger una Requisición?</a></h4>
</div>
<div id="faq1_q4" class="panel-collapse collapse">
<div class="panel-body">Tiene quince días naturales para recoger su Requisición.</div>
</div>
</div>





</div>
</div>
<div id="faq2-section" class="tab-pane">
<div id="faq2" class="panel-group">
<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title"><a class="accordion-toggle" data-toggle="collapse" data-parent="#faq2" href="#faq2_q1">09. Question?</a></h4>
</div>
<div id="faq2_q1" class="panel-collapse collapse in">
<div class="panel-body">Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
</div>
</div>
<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title"><a class="accordion-toggle" data-toggle="collapse" data-parent="#faq2" href="#faq2_q2">10. Question?</a></h4>
</div>
<div id="faq2_q2" class="panel-collapse collapse">
<div class="panel-body">Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
</div>
</div>
<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title"><a class="accordion-toggle" data-toggle="collapse" data-parent="#faq2" href="#faq2_q3">11. Question?</a></h4>
</div>
<div id="faq2_q3" class="panel-collapse collapse">
<div class="panel-body">Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
</div>
</div>
<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title"><a class="accordion-toggle" data-toggle="collapse" data-parent="#faq2" href="#faq2_q4">12. Question?</a></h4>
</div>
<div id="faq2_q4" class="panel-collapse collapse">
<div class="panel-body">Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
</div>
</div>
<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title"><a class="accordion-toggle" data-toggle="collapse" data-parent="#faq2" href="#faq2_q5">13. Question?</a></h4>
</div>
<div id="faq2_q5" class="panel-collapse collapse">
<div class="panel-body">Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
</div>
</div>
<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title"><a class="accordion-toggle" data-toggle="collapse" data-parent="#faq2" href="#faq2_q6">14. Question?</a></h4>
</div>
<div id="faq2_q6" class="panel-collapse collapse">
<div class="panel-body">Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
</div>
</div>
</div>
</div>
<div id="faq3-section" class="tab-pane">
<div id="faq3" class="panel-group">
<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title"><a class="accordion-toggle" data-toggle="collapse" data-parent="#faq3" href="#faq3_q1">15. Question?</a></h4>
</div>
<div id="faq3_q1" class="panel-collapse collapse in">
<div class="panel-body">Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
</div>
</div>
<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title"><a class="accordion-toggle" data-toggle="collapse" data-parent="#faq3" href="#faq3_q2">16. Question?</a></h4>
</div>
<div id="faq3_q2" class="panel-collapse collapse">
<div class="panel-body">Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
</div>
</div>
<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title"><a class="accordion-toggle" data-toggle="collapse" data-parent="#faq3" href="#faq3_q3">17. Question?</a></h4>
</div>
<div id="faq3_q3" class="panel-collapse collapse">
<div class="panel-body">Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
</div>
</div>
<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title"><a class="accordion-toggle" data-toggle="collapse" data-parent="#faq3" href="#faq3_q4">18. Question?</a></h4>
</div>
<div id="faq3_q4" class="panel-collapse collapse">
<div class="panel-body">Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
</div>
</div>
<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title"><a class="accordion-toggle" data-toggle="collapse" data-parent="#faq3" href="#faq3_q5">19. Question?</a></h4>
</div>
<div id="faq3_q5" class="panel-collapse collapse">
<div class="panel-body">Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
</div>
</div>
</div>
</div>
<div id="faq4-section" class="tab-pane">
<div id="faq4" class="panel-group">
<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title"><a class="accordion-toggle" data-toggle="collapse" data-parent="#faq4" href="#faq4_q1">20. Question?</a></h4>
</div>
<div id="faq4_q1" class="panel-collapse collapse in">
<div class="panel-body">Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
</div>
</div>
<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title"><a class="accordion-toggle" data-toggle="collapse" data-parent="#faq4" href="#faq4_q2">21. Question?</a></h4>
</div>
<div id="faq4_q2" class="panel-collapse collapse">
<div class="panel-body">Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
</div>
</div>
</div>
</div>
<div id="faq5-section" class="tab-pane">
<div id="faq5" class="panel-group">
<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title"><a class="accordion-toggle" data-toggle="collapse" data-parent="#faq5" href="#faq5_q1">22. Question?</a></h4>
</div>
<div id="faq5_q1" class="panel-collapse collapse in">
<div class="panel-body">Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
</div>
</div>
<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title"><a class="accordion-toggle" data-toggle="collapse" data-parent="#faq5" href="#faq5_q2">23. Question?</a></h4>
</div>
<div id="faq5_q2" class="panel-collapse collapse">
<div class="panel-body">Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
</div>
</div>
<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title"><a class="accordion-toggle" data-toggle="collapse" data-parent="#faq5" href="#faq5_q3">24. Question?</a></h4>
</div>
<div id="faq5_q3" class="panel-collapse collapse">
<div class="panel-body">Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
</div>
</div>
<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title"><a class="accordion-toggle" data-toggle="collapse" data-parent="#faq5" href="#faq5_q4">25. Question?</a></h4>
</div>
<div id="faq5_q4" class="panel-collapse collapse">
<div class="panel-body">Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
</div>
</div>
<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title"><a class="accordion-toggle" data-toggle="collapse" data-parent="#faq5" href="#faq5_q5">26. Question?</a></h4>
</div>
<div id="faq5_q5" class="panel-collapse collapse">
<div class="panel-body">Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
</div>
</div>
</div>
</div>


</div>
</div>
</div>


<!--
<table class="table table-bordered forum remove-margin">
<thead>
<tr>
<th class="text-center" colspan="2">Support</th>
<th class="cell-stat text-center hidden-xs hidden-sm">Topics</th>
<th class="cell-stat text-center hidden-xs hidden-sm">Posts</th>
<th class="cell-stat-2x hidden-xs hidden-sm">Last Post</th>
</tr>
</thead>
<tbody>
<tr>
<td class="cell-small text-center"><i class="fa fa-question-circle fa-2x"></i></td>
<td>
<h4><a href="javascript:void(0)">Help</a> <br><small>¿Cómo utilizar el Sistema de Gestión de Requisiciones?</small></h4>
</td>
<td class="text-center hidden-xs hidden-sm"><a href="javascript:void(0)">1</a></td>
<td class="text-center hidden-xs hidden-sm"><a href="javascript:void(0)">1</a></td>
<td class="hidden-xs hidden-sm">by <a href="page_profile.php">Emmanuel Carreón</a><br><small>09:17 - September 27, 2013</small></td>
</tr>
</tbody>
</table>
-->
