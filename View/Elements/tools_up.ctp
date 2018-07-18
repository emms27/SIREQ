<?php
 $mensajes = $this->requestAction('Messages/notify/limit:15');
 $rrows = $this->requestAction('Requisitions/notify/limit:15');
?>
  <header class="navbar navbar-inverse">
<ul class="navbar-nav-custom pull-right hidden-md hidden-lg">
<li class="divider-vertical"></li>
<li>
<a href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-main-collapse">
<i class="fa fa-bars"></i>
</a>
</li>
</ul>
<a href="home" class="navbar-brand">
    <?php  echo$this->Html->image("logos/logo4.png", array("width"=>"125px","height"=>"30px","border"=>"0"));  ?>
</a>
<div id="loading" class="pull-left"><i class="fa fa-certificate fa-spin"></i></div>
<ul id="widgets" class="navbar-nav-custom pull-right">
<li class="divider-vertical"></li>
<li id="rss-widget" class="dropdown dropdown-left-responsive">
<a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
<i class="fa fa-rss"></i>
<span class="badge badge-warning display-none"></span>
</a>
<ul class="dropdown-menu dropdown-menu-right widget widget-fluid">
<li class="widget-heading text-center">Web Design</li>
<li class="li-hover"><a href="javascript:void(0)" class="widget-link"><i class="fa fa-umbrella"></i>This is a headline</a></li>
<li class="divider"></li>
<li class="li-hover"><a href="javascript:void(0)" class="widget-link"><i class="fa fa-trophy"></i>Another headline</a></li>
<li class="divider"></li>
<li class="li-hover"><a href="javascript:void(0)" class="widget-link"><i class="fa fa-suitcase"></i>Headlines keep coming!</a></li>
<li class="widget-heading text-center">Web Developent</li>
<li class="li-hover"><a href="javascript:void(0)" class="widget-link"><i class="fa fa-phone"></i>New headline</a></li>
<li class="divider"></li>
<li class="li-hover"><a href="javascript:void(0)" class="widget-link"><i class="fa fa-pencil"></i>Another one</a></li>
<li class="divider"></li>
<li><a href="javascript:void(0)" class="text-center">All News</a></li>
</ul>
</li>

<li class="divider-vertical"></li>
<li id="messages-widget" class="dropdown dropdown-left-responsive">
<a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
<i class="fa fa-envelope"></i>
<span class="badge badge-success"><?php echo count($mensajes); ?></span>
</a>
<ul class="dropdown-menu dropdown-menu-right widget">
<li class="widget-heading"><i class="fa fa-comment pull-right"></i>Últimos Mensajes</li>

<?php foreach ($mensajes as $row): ?>
<!-- <li class="new-on"> -->
<li>
<div class="media">
<?php
 if (($row['User']['filename']=='') || ($row['User']['filename']==NULL)) $foto='user.jpg';
 else $foto=$row['User']['filename'];
         echo $this->Html->link(
                $this->Html->image("uploads/user/filename/".$foto,
				   array("width"=>"64px","height"=>"64px","border"=>"0")),
                                   array('controller'=>'Users','action'=>'view/'.$userid['id']),
				   array('title'=>'Inicio','escape' => false,"class"=>"pull-left"));
     ?>
<div class="media-body">
<h6 class="media-heading">
     <?php
         echo $this->Html->link($row['User']['Personal']['namefull'],
                                   array('controller'=>'Messages','action'=>'view/'.$row['Message']['id']),
				   array('title'=>'Inicio','escape' => false));
     ?><span class="label label-success">2 min ago</span></h6>
<div class="media"><?php echo $row['Message']['asunto'];  ?></div>
</div>
</div>
</li>
<li class="divider"></li>
<?php endforeach; ?>
<li class="text-center">
     <?php
         echo $this->Html->link("Ver todos los mensajes",
                             array('controller'=>'Messages','action'=>'index'),
			     array('title'=>'Inicio','escape' => false));
     ?>
</li>
</ul>
</li>
<li class="divider-vertical"></li>
<li id="notifications-widget" class="dropdown dropdown-center-responsive">
<a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
<i class="fa fa-flag"></i>
<span class="badge badge-danger"><?php echo count($rrows); ?></span>
</a>
<ul class="dropdown-menu dropdown-menu-right widget">
<li class="widget-heading"><a href="javascript:void(0)" class="pull-right widget-link"><i class="fa fa-file-text-o"></i></a><a href="javascript:void(0)" class="widget-link">Requisiciones</a></li>
<li class="label label-danger">20 min ago</li>
<?php foreach ($rrows as $orden): ?>
<!-- <li class="new-on"> -->
<li>
<div class="media">
<div class="media-body">
<h6 class="media-heading">
     <?php
         echo $this->Html->link($orden['Personal']['Assignment']['descripcion'],
                                   array('controller'=>'Requisitions','action'=>'view/'.$orden['Requisition']['id']),
				   array('title'=>'Inicio','escape' => false));
     ?><span class="label label-success">2 min ago</span></h6>
<div class="media"><?php echo $orden['Personal']['namefull'];  ?></div>
<div class="media"><?php echo "#".$orden['Requisition']['id'];  ?></div>
</div>
</div>
</li>
<li class="divider"></li>
<?php endforeach; ?>

<li class="divider"></li>
<li class="text-center"><a href="javascript:void(0)">View All Notifications</a></li>
</ul>
</li>
<li class="divider-vertical"></li>
<li class="dropdown pull-right dropdown-user">

<a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
<?php
 if (($userid['filename']=='') || ($userid['filename']==NULL)) $foto2='user.jpg'; else $foto2=$userid['filename'];
 echo $this->Html->image("uploads/user/filename/".$foto2,array("border"=>"0","width"=>"30px","height"=>"30px"));
?>
<b class="caret"></b></a>

<ul class="dropdown-menu">
<li>
<a href="javascript:void(0)" class="loading-on"><i class="fa fa-refresh"></i> Refresh</a>
</li>
<li class="divider"></li>
<li>
<a href="#modal-user-settings" role="button"><i class="fa fa-user"></i> User Profile</a>
</li>
<li>
<a href="javascript:void(0)"><i class="fa fa-wrench"></i> App Settings</a>
</li>
<li class="divider"></li>
<li>
  <?php
         echo $this->Html->link('<i class="fa fa-lock"></i> Log out',
                                   array('controller'=>'Users','action' => 'logout'),
				   array('title'=>'Cerrar sesión','escape' => false));
  ?>
</li>
</ul>
</li>
</ul>
</header>
