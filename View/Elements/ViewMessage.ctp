<ul class="inbox-messages-content-actions clearfix">
<li><a href="javascript:void(0)"><i class="fa fa-mail-reply"></i> Reply</a></li>
<li><a href="javascript:void(0)"><i class="fa fa-mail-reply-all"></i> Reply to all</a></li>
<li><a href="javascript:void(0)"><i class="fa fa-mail-forward"></i> Forward</a></li>
<li><a href="javascript:void(0)"><i class="fa fa-print"></i> Print</a></li>
<li><a href="javascript:void(0)"><i class="fa fa-briefcase"></i> Archive</a></li>
<li><a href="javascript:void(0)"><i class="fa fa-times"></i> Delete</a></li>
</ul>

<div class="inbox-messages-content-header content-text">
<?php
 if (($userid['filename']=='') || ($userid['filename']==NULL)) $foto2='user.jpg'; else $foto2=$userid['filename'];
 echo $this->Html->image("uploads/user/filename/".$foto2,array("border"=>"0","width"=>"60px","height"=>"60px","class"=>"pull-left"));
?>
<a href="javascript:void(0)"><strong>Username</strong></a>
<span class="label label-info"><?php echo $ficha['Contacteno']['fecha_registro']; ?></span>
<h5><?php echo $ficha['Contacteno']['asunto']; ?></h5>
</div>
<div class="inbox-messages-content-body"><?php echo $ficha['Contacteno']['mensaje']; ?></div>
<div class="inbox-messages-content-reply">
<form action="page_inbox.php" method="post" class="form-horizontal remove-margin" onsubmit="return false;">
<div class="form-group">
<div class="col-md-12">
<textarea id="inbox-reply-message" name="inbox-reply-message" class="textarea-editor" rows="6"></textarea>
<button class="btn btn-success"><i class="fa fa-pencil-square-o"></i> Reply</button>
</div>
</div>
</form>
</div>
