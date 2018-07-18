<nav id="primary-nav">
<ul>
<li><?php echo $this->Html->link('<i class="fa fa-home"></i> Home','/pages/home',
				   array('title'=>'Inicio','escape' => false,"class"=>"active"));
?></li>

<?php if (($userid['Role']['id']==1) ){ ?>
<!--
<li><a href="#"><i class="fa fa-building"></i> Adscripción</a>
 <ul>
  <li><a href="<?php echo $this->base.'/Personals/add'; ?>">
    <i class="fa fa-plus-square-o"></i> Agregar Adscripción</a>
  </li>
  <li><a href="<?php echo $this->base.'/AssignmentPersonals/add'; ?>">
    <i class="fa fa-link"></i> Adscripcion - Titular</a>
  </li>
 </ul>
</li>
-->
<!--
<li><a href="#"><i class="fa fa-users"></i> Clientes</a>
 <ul>
  <li><a href="<?php echo $this->base.'/Customers/add'; ?>">
   <i class="fa fa-plus-square-o"></i> Alta Parte</a></li>
  <li><a href="<?php echo $this->base.'/Customers/'; ?>"><i class="fa fa-search"></i> Buscar Parte</a></li>
 </ul>
</li>
-->
<?php } if (($userid['Role']['id']==1) || ($userid['Role']['id']==2) || ($userid['Role']['id']==4)){ ?>
<li><a href="#"><i class="fa fa-file-text-o"></i> Requisición</a>
<ul>
 <li><a href="<?php echo $this->base.'/Requisitions/add'; ?>">
  <i class="fa fa-plus-square-o"></i>Agregar Requisicion</a>
</li>
<li><a href="<?php echo $this->base.'/ProductRequisitions/add'; ?>"><i class="fa fa-plus-square-o"></i>  Agregar Producto en Requisición</a></li>
 <li><a href="<?php echo $this->base.'/Requisitions/'; ?>" ><i class="fa fa-search"></i> Buscar Requisicion</a></li>
 </ul>
</li>
<?php } if (($userid['Role']['id']==1)){ ?>
	<li><a href="#"><i class="fa fa-file-text-o"></i> Facturas</a>
	<ul>
	 <li><a href="<?php echo $this->base.'/Invoices/add'; ?>">
	  <i class="fa fa-plus-square-o"></i>Agregar Factura</a></li>
	 <li><a href="<?php echo $this->base.'/Invoices/'; ?>" ><i class="fa fa-search"></i> Buscar Factura</a></li>
	 </ul>
	</li>
	<li><a href="#"><i class="fa fa-file-text-o"></i> Reportes</a>
	<ul>
		<li><a href="<?php echo $this->base.'/Requisitions/consulta_fechas'; ?>">
	   <i class="fa fa-print"></i> Reporte de Requisiciones</a>
	  </li>
	 </ul>
	</li>
<li>
<a href="#"><i class="fa fa-th-list"></i> Catálogo</a>
<ul>
  <li><a href="<?php echo $this->base.'/Categorias/'; ?>"><i class="fa fa-search"></i>  Familias</a></li>
	<li><a href="<?php echo $this->base.'/Products/'; ?>" ><i class="fa fa-search"></i> Productos</a></li>
	<li><a href="<?php echo $this->base.'/Providers/'; ?>" ><i class="fa fa-search"></i> Proveedores</a></li>
  <li><a href="<?php echo $this->base.'/ProductRoles/'; ?>" ><i class="fa fa-search"></i> Plantillas</a></li>
	<li><a href="<?php echo $this->base.'/Personals/'; ?>"><i class="fa fa-user"></i>  Personal</a></li>
  <li><a href="<?php echo $this->base.'/Users/'; ?>"><i class="fa fa-user"></i>  Usuarios</a></li>
  <li><a href="<?php echo $this->base.'/Logs/'; ?>"><i class="fa fa-clock-o"></i>  Actividades</a></li>
  <li><a href="<?php echo $this->base.'/Avisos/'; ?>"><i class="fa fa-exclamation-triangle"></i>  Avisos</a></li>
 </ul>
</li>
<?php } if (($userid['Role']['id']==1) || ($userid['Role']['id']==2 || ($userid['Role']['id']==4))){ ?>
<li>
 <a href="#"><i class="fa fa-envelope"></i> Mensajes</a>
<ul>
  <li><a href="<?php echo $this->base.'/Messages/nuevo'; ?>"><i class="fa fa-pencil"></i>  Escribir Mensaje</a></li>
  <li><a href="<?php echo $this->base.'/Messages/inbox'; ?>"><i class="fa fa-inbox"></i> Entrada</a></li>
  <li><a href="<?php echo $this->base.'/Messages/send'; ?>"><i class="fa fa-paper-plane"></i>  Enviados</a></li>
 </ul>
</li>
<?php } ?>

</ul>
</nav>

<div id="theme-options" class="text-left visible-md visible-lg">
 <a href="javascript:void(0)" class="btn btn-theme-options"><i class="fa fa-cog"></i> Theme Options</a>
 <div id="theme-options-content">
  <h5>Color Themes</h5>
  <ul class="theme-colors clearfix">
   <li class="active">
    <a href="javascript:void(0)" class="themed-background-default themed-border-default" data-theme="default" data-toggle="tooltip" title="Default"></a>
   </li>
   <li>
    <a href="javascript:void(0)" class="themed-background-deepblue themed-border-deepblue" data-theme="css/themes/deepblue.css" data-toggle="tooltip" title="DeepBlue"></a>
   </li>
   <li>
<a href="javascript:void(0)" class="themed-background-deepwood themed-border-deepwood" data-theme="css/themes/deepwood.css" data-toggle="tooltip" title="DeepWood"></a>
   </li>
   <li>
<a href="javascript:void(0)" class="themed-background-deeppurple themed-border-deeppurple" data-theme="	<?php echo $this->webroot; ?>css/deeppurple.css" data-toggle="tooltip" title="DeepPurple"></a>
   </li>
   <li>
<a href="javascript:void(0)" class="themed-background-deepgreen themed-border-deepgreen" data-theme="css/themes/deepgreen.css'" data-toggle="tooltip" title="DeepGreen"></a>
   </li>
  </ul>



<h5>Header</h5>
<!--
<label id="topt-fixed-header-top" class="switch switch-success" data-toggle="tooltip" title="Top fixed header"><input type="checkbox"><span></span></label>
<label id="topt-fixed-header-bottom" class="switch switch-success" data-toggle="tooltip" title="Bottom fixed header"><input type="checkbox"><span></span></label>
<label id="topt-fixed-layout" class="switch switch-success" data-toggle="tooltip" title="Fixed layout (for large resolutions)"><input type="checkbox"><span></span></label>

-->
  <div id="topt-fixed-header-top" class="input-switch switch switch-success" data-toggle="tooltip" title="Top fixed header" data-on="success" data-off="danger" data-on-label="<i class='fa fa-check fa fa-white'></i>" data-off-label="<i class='fa fa-times'></i>">
   <input type="checkbox">
  </div>
  <div id="topt-fixed-header-bottom" class="input-switch switch switch-success" data-toggle="tooltip" title="Bottom fixed header" data-on="success" data-off="danger" data-on-label="<i class='fa fa-check fa fa-white'></i>" data-off-label="<i class='fa fa-times'></i>">
   <input type="checkbox">
  </div>

 </div>
</div>
