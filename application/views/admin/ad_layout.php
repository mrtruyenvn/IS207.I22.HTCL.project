<html>
<head>
	<?php $this->load->view('admin/head') ?>
</head>
<body>
	<div id="left-content">
		<?php $this->load->view('admin/left');?>
	</div>
	<div id="rightSide">
		<?php $this->load->view('admin/header');?>
		
	
		<!-- 		/.content -->
		<?php $this->load->view($temp, $this->data); ?>	
		
		<?php $this->load->view('admin/footer');?>
	</div>
</body>
</html>
