<?php

		echo $this->Html->css(array(
					    'uploads/bootstrap',
					    'uploads/plugins',
					    'uploads/main',
					    'uploads/themes',
					    'uploads/font-awesome/font-awesome'
                                            )
                                       );

		echo $this->Html->script(array(
                                               'modernizr'
                                              )
                                         );
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo 'Pruebas'; ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');


		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
 <div id="container">
  <div id="header"></div>
  <div id="content">


   <div id="page-container">
    <?php echo $this->element("tools_up");?>
    <div id="inner-container">
     <aside id="page-sidebar" class="nav-collapse collapse">
     <!--Buscador-->
     <form id="sidebar-search" action="page_search_results.php" method="post">
      <div class="input-append">
       <input type="text" placeholder="Search.." class="remove-box-shadow remove-transition remove-radius">
       <button><i class="icon-search"></i></button>
      </div>
     </form>
     <!--FIN Buscador-->
     <?php echo $this->element("tools_menu");?>
    </div>
    </aside>
    <div id="page-content">
     <?php echo $this->Session->flash(); ?>
     <?php echo $this->fetch('content'); ?>
    </div>
    <?php echo $this->element("footer");?>
   </div>
  </div>
  <a href="#" id="to-top"><i class="icon-chevron-up"></i></a>




  </div>
  <div id="footer"></div>
 </div>
<!--[if lte IE 8]><script src="js/helpers/excanvas.min.js"></script><![endif]-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>!window.jQuery && document.write(unescape('%3Cscript src="js/vendor/jquery-1.9.1.min.js"%3E%3C/script%3E'));</script>
<?php
		echo $this->Html->script(array('bootstrap.min-1.3'));
?>

<!--[if lte IE 8]><script src="js/helpers/excanvas.min.js"></script><![endif]-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>!window.jQuery && document.write(unescape('%3Cscript src="js/vendor/jquery-1.11.0.min.js"%3E%3C/script%3E'));</script>
<script src="js/vendor/bootstrap.min.1-6-1.js"></script>
<script src="js/plugins.1-6.js"></script>
<script src="js/main.1-6-1.js"></script><script>$(function(){$("#example-datatables").dataTable({aoColumnDefs:[{bSortable:!1,aTargets:[0]}]}),$("#example-datatables2").dataTable(),$("#example-datatables3").dataTable(),$(".dataTables_filter input").addClass("form-control").attr("placeholder","Search")});</script>
        <script>var _gaq=_gaq||[];_gaq.push(["_setAccount","UA-16158021-6"]),_gaq.push(["_setDomainName","pixelcave.com"]),_gaq.push(["_trackPageview"]),function(){var t=document.createElement("script");t.type="text/javascript",t.async=!0,t.src=("https:"==document.location.protocol?"https://ssl":"http://www")+".google-analytics.com/ga.js";var e=document.getElementsByTagName("script")[0];e.parentNode.insertBefore(t,e)}();</script>
</body>
</html>

<?php
		echo $this->Html->script(array(
					       'plugins-1.3',
					       'main'
                                              )
                                         );
              echo $this->element('sql_dump'); 
?>
