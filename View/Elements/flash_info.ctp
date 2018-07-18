<?php 

 echo $this->Html->scriptBlock('
 	$(function(){
		$.gritter.add({
                        title: "Información",
			text: "' . $message. '",
			image: webroot + "img/jquery.png",
			sticky: true
		});
	});');
/*
echo $this->Html->scriptBlock('
	$(function(){
		$.gritter.add({
			title: "Error",
			text: "' . $message. '",
			class_name: "error",
			image: webroot + "img/icons/error_48.png",
			sticky: true
		});
          return false;
	});');
/*
echo $this->Html->scriptBlock('
	$(function(){
		$("#add-regular").click(function(){
			$.gritter.add({
				title: "This is a regular notice!",
				text: "This will fade out after a certain amount of time. Vivamus eget tincidunt velit. Cum sociis natoque penatibus et montes, nascetur ridiculus mus.",
				image: "http://a0.twimg.com/profile_images/59268975/jquery_avatar_bigger.png",
				sticky: false,
				time: ""
			});

			return false;

		});
        });');
*/

