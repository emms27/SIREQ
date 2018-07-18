<?php 
/**
 * View alta almacenamiento de Depositos.
 * @version 1.0
 * @author Emmanuel Sanchez Carreon
 * @email  esanchez@htsjpuebla.gob.mx
 * @email2 carreon.emmanuel@gmail.com
 */
?>
<ul id="nav-info" class="clearfix">
<li>
<?php echo $this->Html->link('', 
                                array('controller'=>'pages','action'=>'home'),
				array('title'=>'Inicio','escape' => false,'class'=>'fa fa-home')); ?>
</li>
<li class="active">
<?php
         echo $this->Html->link('Dashboard', 
                                array('controller'=>'pages','action'=>'dashboard'),
				array('title'=>'dashboard','escape' => false));
?>
</li>
</ul>

<h3 class="page-header page-header-top"><i class="fa fa-user"></i> <?php echo strval(Configure::read('Empresa.autor')); ?> <small>Web developer</small></h3>
<div class="row">
<div class="col-md-3">
<div class="text-center">
<?php 
   echo $this->Html->image("uploads/user/filename/autor.jpg",array("class"=>"img-circle","width"=>"150px","height"=>"150px","border"=>"0"));
     ?>
</div><br>
<div class="list-group">
<a href="javascript:void(0)" class="list-group-item"><i class="fa fa-envelope-o"></i>&nbsp;&nbsp;esanchez@htsjpuebla.gob.mx</a>
<a href="javascript:void(0)" class="list-group-item"><i class="fa fa-envelope-o"></i>&nbsp;&nbsp;carreon.emmanuel@gmail.com</a>
<a href="javascript:void(0)" class="list-group-item"><i class="fa fa-facebook"></i>&nbsp;&nbsp;@esacarreon</a>
<a href="javascript:void(0)" class="list-group-item"><i class="fa fa-twitter"></i>&nbsp;&nbsp;@esacarreon</a>
<a href="javascript:void(0)" class="list-group-item"><i class="fa fa-whatsapp"></i>&nbsp;&nbsp;2224.02.54.08</a>
<a href="javascript:void(0)" class="list-group-item"><i class="fa fa-phone"></i>&nbsp;&nbsp;229.66.00 ext 5203</a>
</div>
</div>

<div class="col-md-6">
<h4><i class="fa fa-paperclip"></i> Projects</h4>
<ul class="fa-ul push">
<li><i class="fa fa-li fa-arrow-right"></i> <strong>Centro Estatal de Mediación</strong>,<br><em>© 2011 This is the description of the company..</em><br><a href="javascript:void(0)">examplecompany.com</a></li>
<li><i class="fa fa-li fa-arrow-right"></i> <strong>Asistencia</strong>,<br><em>© 2012 This is the description of the company..</em><br><a href="javascript:void(0)">examplecompany.com</a></li>
<li><i class="fa fa-li fa-arrow-right"></i> <strong>Expediente Virtual/ Web</strong>,<br><em>© 2012 This is the description of the company..</em><br><a href="javascript:void(0)">examplecompany.com</a></li>
<li><i class="fa fa-li fa-arrow-right"></i> <strong>SIDFM</strong>,<br><em>© 2012 - 2015 This is the description of the company..</em><br><a href="javascript:void(0)">examplecompany.com</a></li>
<li><i class="fa fa-li fa-arrow-right"></i> <strong>SIREQ</strong>,<br><em>© 2015 This is the description of the company..</em><br><a href="javascript:void(0)">examplecompany.com</a></li>
</ul>
<h4>About</h4>
<p class="push">Licenciado en Informática, egresado del Instituto Tecnológico de Puebla (2004-2009). En 2009 realizó su residencia profesional en el Poder Judicial del Estado, desarrollando un proyecto nombrado: “Re-estructuración De La Red De Voz Y Datos Del Honorable Tribunal Superior De Justicia”. Desde 2010 se incorpora laboralmente al Poder Judicial, desarrollando un Sistema Integral en el Centro Estatal de Medición. En 2012 desarrolló el sistema de asistencia y participó en el desarrollo del Tribunal Virtual como creador en el ambiente Web. En (2012-2015) desarrolló el sistema SIDFM y actualmente participa en el proyecto de Almacen "SIREQ" del Honorable Tribunal Superior De Justicia.</p>

</div>
<div class="col-md-3">
<h5 class="page-header-sub">Actions</h5>
<div class="btn-group push">
<button class="btn btn-danger" data-toggle="tooltip" title="Add to favorites"><i class="fa fa-star"></i></button>
<button class="btn btn-info" data-toggle="tooltip" title="Send a message"><i class="fa fa-envelope"></i></button>
<button class="btn btn-warning" data-toggle="tooltip" title="Follow"><i class="fa fa-share"></i></button>
<button class="btn btn-primary" data-toggle="tooltip" title="Share Profile"><i class="fa fa-share-square-o"></i></button>
</div>
<h5 class="page-header-sub"><i class="fa fa-certificate"></i> Skills</h5>
<table class="table table-borderless">
<tbody>
<tr>
<td class="cell-small"><span class="label label-inverse">HTML</span></td>
<td>
<div class="progress progress-mini">
<div class="progress-bar progress-bar-success" style="width: 85%"></div>
</div>
</td>
</tr>
<tr>
<td><span class="label label-inverse">CSS</span></td>
<td>
<div class="progress progress-mini">
<div class="progress-bar progress-bar-info" style="width: 70%"></div>
</div>
</td>
</tr>
<tr>
<td><span class="label label-inverse">Javascript</span></td>
<td>
<div class="progress progress-mini">
<div class="progress-bar progress-bar-success" style="width: 100%"></div>
</div>
</td>
</tr>
<tr>
<td><span class="label label-inverse">PHP</span></td>
<td>
<div class="progress progress-mini">
<div class="progress-bar progress-bar-success" style="width: 100%"></div>
</div>
</td>
</tr>
<tr>
<td><span class="label label-inverse">Fireworks</span></td>
<td>
<div class="progress progress-mini">
<div class="progress-bar progress-bar-info" style="width: 60%"></div>
</div>
</td>
</tr>
<tr>
<td><span class="label label-inverse">Cakephp</span></td>
<td>
<div class="progress progress-mini">
<div class="progress-bar progress-bar-warning" style="width: 45%"></div>
</div>
</td>
</tr>
<tr>
<td><span class="label label-inverse">Java</span></td>
<td>
<div class="progress progress-mini">
<div class="progress-bar progress-bar-danger" style="width: 40%"></div>
</div>
</td>
</tr>
</tbody>
</table>
</div>
</div>
