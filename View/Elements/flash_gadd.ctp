<?php
 echo $this->Html->scriptBlock('
       (function($){
  	 $(document).ready(function(){
		$.extend($.gritter.options, {
		        //class_name: "gritter-light", // color blanco
			position: "bottom-right", //possibilities: bottom-left, bottom-right, top-left, top-right
			//fade_in_speed: 100, // how fast notifications fade in (string or int)
			//fade_out_speed: 100, // how fast the notices fade out
			time: 3000 // hang on the screen for...
		});

		$.gritter.add({
                        title: "Notificación",
			text: "' . $message. '",
			image: webroot + "img/email.png",
			sticky: false
		});
	});// document
      })(jQuery);');
?>
		

