<?php
$url=explode($this->webroot,Router::url(null, true ));
/**
 * @version 3.0
 * @author Emmanuel Sanchez Carreon
 * @email  esanchez@htsjpuebla.gob.mx
 * @email2 carreon.emmanuel@gmail.com
 *
 */

/*
   $options = array(
    'label' => 'Guardar Información',
    'class'=> 'btn btn-success',
    'onClick'=>"validar()",
    'type'=>'button',
    'escape' => false,
    'div' => array('class' => ''));
*/

$encabezado= $this->Html->tableHeaders(array('#',
    '<i class="fa fa-file-text-o"></i> Producto',
    '<i class="fa fa-tasks"></i> Categoría',
    '<i class="fa fa-tasks"></i> Cantidad',
   // '<i class="fa fa-tasks"></i> U/Métrica',
    '<i class="fa fa-bolt"></i> Acci&oacute;n'
   ));

 // echo $this->Html->css(array('../themes/uadmin/fancyBox2.1.5/source/jquery.fancybox'));
 // echo $this->Html->script(array('../themes/uadmin/fancyBox2.1.5/source/jquery.fancybox.pack'));
?>

<ul id="nav-info" class="clearfix">
<li>
<?php
     echo $this->Html->link('',
                                array('controller'=>'pages','action'=>'home'),
				array('escape' => false,'class'=>'fa fa-home')); ?>
</li>
<li>
<?php
     echo $this->Html->link('Requisiciones',
                                array('controller'=>'Customers','action'=>'index'),
				array('escape' => false));
?>
</li>
<li class="active">
<?php
         echo $this->Html->link('Add',
                                array('controller'=>'Depositos','action'=>'index'),
				array('escape' => false));
?>
</li>
</ul>
<h3 class="page-header page-header-top">Agregar Requisición<small> ...</small></h3>
<br>

<style media="screen">
  .mix_all{
    margin-bottom: 50px;
  }

   ul.nav-esc {
    padding: 0;
    /* margin: 0; */
    text-align: center;
    list-style: none;
}

ul.nav-esc li {
    margin: 10px 10px;
}
ul.nav-esc li {
    display: inline-block;
    /*margin: 10px 2px;*/
    /* padding-top: 7px; */
    font-size: 12px;
    color: black;
    border: 1px solid red;
    /*padding: 5px 10px;*/
}

.nav-pills > li > a:hover, .nav-pills > .active > a, .nav-pills > .active > a:hover, .nav-pills > .active > a:focus {
    background: #e37c17;
    color: #fff;
    text-decoration: none;
}
</style>

<?php
 echo $this->Form->create('Requisition', array('action'=>'add',"name"=>"FrmPass","class"=>"form-horizontal form-box"));
    echo $this->Form->input('Requisition.id',array('type'=>'hidden'));
?>
<h4 class="form-box-header">Requisiciones</h4>
<div class="form-box-content">
 <div class="form-group">
<label class="control-label col-md-2" for="example-input-success"></label>
<?php
      echo $this->Form->input('Requisition.htsjpassignmentemployee_id',
                                  array('type'=>'select',
                                        'label'=> 'Clientes',
				        'div' => array('class' => 'col-md-4'),
					'id'=>"example-select-chosen",
					'class'=>"form-control select-chosen",
                                        'empty' => 'Por favor, seleccione...',
				        'onchange' => 'this.form.submit()',
 			                //'placeholder'=>'Seleccione la opcion deseada',
				        'autofocus'
                                       )
                            );
?>

 </div>
</div>
<br><br>


<div class="col-xs-12">

<h4 class="form-box-header">Productos o Servicios</h4>
<ul class="nav nav-pills">
            <!-- <li class="sort" data-sort="random">
                <a href="#noAction" class="animated">Aleatorio</a>
            </li> -->
            <li class="filter active" data-filter="all">
                <a href="#noAction" class="animated">Todos</a>
            </li>
            <?php foreach ($cat as $cat): ?>
              <li class="filter" data-filter="<?php echo $cat['Categoria']['id']; ?>">
                <a href="#noAction" class="animated"><?php echo $cat['Categoria']['descripcion']; ?></a>
              </li>
            <?php endforeach; ?>
</ul>

<div id="portfolio-grid" class="row">
  <?php
    $i=1; $p=0; foreach ($almacenproducts as $row):
    if ($row['Product']['filename']!=NULL) $picture=$row['Product']['filename'];
    else $picture='no_picture.png';
  ?>
  <div class="col-xs-6 col-sm-3 mix <?php echo $row['Product']['Categoria']['id'];  ?>" data-sort="<?php echo $i; ?>">
            <div class="">
              <a href="<?php echo $url[0].$this->webroot.'img/uploads'.DS.'almacenproducts'.DS.'filename'.DS.$picture; ?>" >
               <div class="img">
                 <?php
                 echo $this->Html->image($url[0].$this->webroot."img/uploads/almacenproducts/filename/".$picture,
                   array("alt" => "Brownies","width" => "300px", "height"=>"300px","class"=>"img-responsive"),
                     array('escape' => false)
                 );
                 ?>
                 <!-- <img width="300" height="300" src="http://www.cloudbits.org.mx/wp-content/uploads/2018/03/meriva-capital-300x300.png" class="img-responsive wp-post-image" alt="meriva capital" srcset="http://www.cloudbits.org.mx/wp-content/uploads/2018/03/meriva-capital-300x300.png 300w, http://www.cloudbits.org.mx/wp-content/uploads/2018/03/meriva-capital-150x150.png 150w, http://www.cloudbits.org.mx/wp-content/uploads/2018/03/meriva-capital.png 388w" sizes="(max-width: 300px) 100vw, 300px">           -->
               </div>
               <div class="info">
                 <h4><?php echo $row['Product']['descripcion'];  ?></h4>
                 <p>Familia: <?php echo $row['Product']['Categoria']['descripcion'];  ?></p>
                 <p>
                   <?php
                   echo $this->Form->input('ProductRequisition.'.$p.'.almacenproduct_id',
                                         array('label'=>false,
                                               'type'=>'hidden',
                                               'value'=>$row['Product']['id']));

                     //  echo $this->Form->input('ProductRequisition.'.$p.'.umetrica',
                   	//                        array('label'=>false,
                   	// 			     'div' => array('class' => 'col-md-9'),
                   	// 	                     'placeholder'=>'2m'
                     //  ));
                   echo $this->Form->input('ProductRequisition.'.$p.'.cantidad',
                	                       array('label'=>"Cantidad",
                				     'div' => array('class' => 'col-md-12'),
                		                     'placeholder'=>'27'
                   ));
                    ?>
                 </p>
               </div>
              </a>
            </div>
  </div>
 <?php $p++; $i++; endforeach; ?>
</div>
</div>



  <h4 class="form-box-header">Observaciones</h4>
  <div class="form-group">
  <label class="control-label col-md-2" for="example-input-success"></label>
  <?php
     echo $this->Form->input('Requisition.notas',
  	                       array('rows' => '5',
  	 		   	     'class'=>'ckeditor',
  				        'div' => array('class' => 'col-md-9'),
  		                     'cols' => '5',
  		                     'placeholder'=>'Escriba una observacion si es necesario'
     ));
  ?>
  </div>



  <?php //echo $this->Form->end($options);?>



<div class="form-group form-actions">
 <div class="col-md-10 col-md-offset-2">
   <?php  //echo $this->Form->end($options); ?>
  <button class="btn btn-success"><i class="fa fa-paper-plane"></i> Enviar Requisición</button>
 </div>
</div>
 </div><?php  echo $this->Form->end(); ?>



 <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->



  <script type="text/javascript" src="http://www.cloudbits.org.mx/systems/FOXv2/webroot/themes/fox/template/v2/js/jquery.min1.11.3.js"></script>
	<!-- <script type="text/javascript" src="http://www.cloudbits.org.mx/systems/FOXv2/webroot/themes/fox/template/v2/js/jquery.min2.1.4.js"></script> -->
	<script type="text/javascript" src="http://www.cloudbits.org.mx/systems/FOXv2/webroot/themes/fox/template/plugins/UItoTop/js/jquery.ui.totop.min.js"></script>
	<script type="text/javascript" src="http://www.cloudbits.org.mx/systems/FOXv2/webroot/themes/fox/template/plugins/tether-1.3.3/dist/js/tether.min.js"></script>
	<script type="text/javascript" src="http://www.cloudbits.org.mx/systems/FOXv2/webroot/themes/fox/template/v2/js/4.0.0-alpha.2.bootstrap.min.js"></script>
	<script type="text/javascript" src="http://www.cloudbits.org.mx/systems/FOXv2/webroot/themes/fox/template/plugins/slick-1.6.0/slick/slick.js"></script>
	<script type="text/javascript" src="http://www.cloudbits.org.mx/systems/FOXv2/webroot/themes/fox/template/plugins/fancyBox/source/jquery.fancybox.pack.js"></script>
	<script type="text/javascript" src="http://www.cloudbits.org.mx/systems/FOXv2/webroot/themes/fox/template/js/jquery.easing.min.js"></script>
	<script type="text/javascript" src="http://www.cloudbits.org.mx/systems/FOXv2/webroot/themes/fox/template/v2/js/jquery.mixitup.js"></script>
	<!-- <script type="text/javascript" src="http://www.cloudbits.org.mx/systems/FOXv2/webroot/themes/fox/template/v2/js/app.js"></script> -->

<script type="text/javascript">
// $(document).ready(function() {
//     $("#single_1").fancybox({
//           helpers: {
//               title : {
//                   type : 'float'
//               }
//           }
//       });
//
//     $("#single_2").fancybox({
//     	openEffect	: 'elastic',
//     	closeEffect	: 'elastic',
//
//     	helpers : {
//     		title : {
//     			type : 'inside'
//     		}
//     	}
//     });
//
//     $("#single_3").fancybox({
//     	openEffect : 'none',
//     	closeEffect	: 'none',
//     	helpers : {
//     		title : {
//     			type : 'outside'
//     		}
//     	}
//     });
//
//     $("#single_4").fancybox({
//     	helpers : {
//     		title : {
//     			type : 'over'
//     		}
//     	}
//     });
// });


// $('#portfolio-grid').mixItUp({'sort', 'random'});

'use strict';

jQuery(document).ready(function($) {
    //Initial mixitup, used for animated filtering portgolio.
    // $().UItoTop({ easingType: 'easeOutQuart' });
    // $('#portfolio-grid').mixItUp({'sort', 'random'});
    $('#portfolio-grid').mixitup({
      elementSort: 'sort'
      // controls: {
      //   live: true
      // }
      // animation: {
      //   effects: 'rotateY(-25deg)',
      //   perspectiveDistance: '2000px'
      // },
      // classNames: {
      //   block: 'portfolio-grid',
      // //  elementSort: 'sort',
      //   elementSort: 'multimix'
      //   // elementMultimix: 'multimix'
      // }
        // selectors: {
        //   filter: '.filter-1',
        //   sort: '.sort-1'
        // }
        // 'onMixStart': function (config) {
        //     $('div.toggleDiv').hide();
        // }
    });
// (function ($) {

});

</script>
