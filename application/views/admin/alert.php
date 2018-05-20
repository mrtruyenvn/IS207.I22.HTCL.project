

<?php if(isset($message) && $message):?>
<div class="success-alert">
			<i class="glyphicon glyphicon-ok-sign"></i> <?php echo $message?>
</div>
<?php endif;?>
<?php if(isset($fmessage) && $fmessage):?>
<!-- start alert -->
<div class="fail-alert">
			<i class="glyphicon glyphicon-info-sign"></i> <?php echo $fmessage?>
</div>
<!-- end alert -->
<?php endif;?>