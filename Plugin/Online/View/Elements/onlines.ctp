<?php 
 //$onlineusers = $this->requestAction('Onlines/crud');
 //$onlineusers = $this->requestAction('Onlines/geodata');
 $onlines = $this->requestAction(array('plugin' => 'online', 'controller' => 'Online', 'action' => 'geodata'));         

if ($userid['ddfmgroup_id']=='1'){         
 echo "<tr><td>";
 if(!empty($onlines)): ?>
  <div class="onlineWidget">
    <div class="panel">
     <?php $ol=0; foreach ($onlines as $ousers): ?>
	<div class="geoRow">
 	 <div class="flag"><span class="add-on"><i class="icon-user"></i></span></div>
	 <div class="country" title="<?php echo long2ip($ousers['Online']['ip']); ?>">
          <?php 
            //echo $this->Html->link($ousers['User']['Personal']['namefull'],
            echo $this->Html->link($ousers['Online']['ddfmuser_id'],    	  	                   
                             array('controller'=>'Users','action' => 'view',$ousers['Online']['ddfmuser_id']), 
				   array('escape' => false)); 
          ?>
         </div>
	 <div class="people"></div>
	</div>
     <?php $ol++; endforeach; ?>
    </div>
    <div class="onlineWidgetcount"><?php echo $ol; ?></div>
    <div class="label">online</div>	   
    <div class="arrow"></div>
   </div>
<?php endif; echo '</td></tr>'; } ?>
