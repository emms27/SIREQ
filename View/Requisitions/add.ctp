<?php
echo $this->Html->css(array(
          '../themes/uadmin/mixup/style',
));
$url=explode($this->webroot,Router::url(null, true ));
 echo $this->Form->create('Requisition', array('action'=>'add',"name"=>"FrmPass","class"=>"form-horizontal form-box"));
    echo $this->Form->input('Requisition.id',array('type'=>'hidden'));
?>
<style media="screen">
.control[data-filter=".pinkMX"], .pinkMX{
  color: #f91195;
}

.control[data-filter=".orange"], .orange{
  color: #f9aa11;
}

.control[data-filter=".red"], .red{
  color:#eeae64;
}

.control[data-filter=".brown"], .brown{
  color:#9f8721;
}

.control[data-filter=".purple"], .purple{
  color: #bc3de8;
}

.control[data-filter=".white"], .white{
  color: #fff;
}

.control[data-filter=".greennew"], .greennew{
  color: #55e83d;
}

.container {
    width: 100%;
}

.mix:before {
   padding-top: 0;
}

.mix h4, .mix p{
  color:black;
}

.mix h4{
  text-align: center;
  height: 70px;
}

.mix p{
  padding: 0px;
  margin: 0px;
}

.controls {
    padding: 1rem;
    background: #333;
    font-size: 0.1px;

}

html, div {

    font: inherit;

}


.control {
    position: relative;
    display: inline-block;

    background: #444;
    cursor: pointer;

    color: white;
    transition: background 150ms;

    width: 5rem;
    height: 3.5rem;
    font-size: 10px;
}
button {
    background: transparent;
    border-radius: 0;
    border: 0;
    padding: 0;
    -webkit-appearance: none;
    -webkit-border-radius: 0;
    user-select: none;
}


</style>
<h4 class="form-box-header">Requisiciones</h4>
<div class="form-box-content">
 <div class="form-group">
<label class="control-label col-md-2" for="example-input-success"></label>
<?php
      echo $this->Form->input('Requisition.htsjpemployee_id',
                                  array('type'=>'select',
                                        'label'=> 'Departamento o Área',
				        'div' => array('class' => 'col-md-4'),
					'id'=>"example-select-chosen",
					'class'=>"form-control select-chosen",
                                        'empty' => 'Por favor, seleccione...',
				        'onchange' => 'this.form.submit()',
				        'autofocus'
                                       )
                            );
?>

 </div>
</div>
<?php if (!empty($almacenproducts)): ?>
        <h4 class="form-box-header">Productos</h4>


<div class="controls">
  <!-- <button type="button" class="control" data-filter="all">
    <br><br>Todos
  </button> -->
  <?php foreach ($cat as $cat): ?>
    <button type="button" class="control" data-filter=".<?php echo $cat['Categoria']['color']; ?>">
      <br><br>
      <?php echo $cat['Categoria']['descripcion']; ?>
    </button>
  <?php endforeach; ?>
  <!-- <button type="button" class="control" data-filter="none">
    <br><br>
    Ninguno
  </button> -->

  <button type="button" class="control" data-sort="default:asc">
    <br><br>Asc</button>
  <button type="button" class="control" data-sort="default:desc">
    <br><br>Desc</button>
</div>
<?php endif; ?>

        <div class="container">
          <?php
            $i=1; $p=0; foreach ($almacenproducts as $row):
          ?>
          <div class="mix <?php echo $row['Product']['Categoria']['color'];  ?>" >
            <?php
            ?>
            </a>
            <h4><?php echo $row['Product']['descripcion'];  ?></h4>
            <p><b>Familia:</b> <?php echo $row['Product']['Categoria']['descripcion']; ?></p>

            <div class="form-group">
             <label class="control-label col-md-2">Cantidad</label>
             <div class="col-md-12">
                              <?php
                              echo $this->Form->input('ProductRequisition.'.$p.'.almacenproduct_id',
                                                    array('label'=>false,
                                                          'type'=>'hidden',
                                                          'value'=>$row['Product']['id'])
                              );

            		  echo $this->Form->input('ProductRequisition.'.$p.'.cantidad',
            				          array(
                                'label' =>false,
            							      'type'=>'text',
            						        'placeholder'=>'0',
                                // 'value'=>0,
            							      'class'=>"form-control",
                                // 'onchange' => 'this.form.submit()'
            							  )
            		                                );
            		 ?>
             </div>
            </div>

          </div>

          <?php $p++; $i++; endforeach; ?>

            <div class="gap"></div>
            <div class="gap"></div>
            <div class="gap"></div>
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



        <div class="form-group form-actions">
        <div class="col-md-10 col-md-offset-2">
        <button class="btn btn-success"><i class="fa fa-paper-plane"></i> Enviar Requisición</button>
        </div>
        </div>
        </div>
<?php  echo $this->Form->end(); ?>


        <?php
        echo $this->Html->script(array(
                  '../themes/uadmin/mixup/mixitup.min',
        ));
        ?>

<script type="text/javascript">
            var containerEl = document.querySelector('.container');
            var mixer = mixitup(containerEl);
</script>
