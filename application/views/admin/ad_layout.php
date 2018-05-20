<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('admin/head')?>
</head>
<body>
	<div class="wrapper">
		<?php $this->load->view('admin/header')?>
		
		<div class="content container-fluid-full">
			<div class="row">
			<?php $this->load->view('admin/left')?>
			
			<?php $this->load->view($temp, $this->data); ?>	        <!-- Content  -->
			</div>
		</div>
		<?php $this->load->view('admin/footer')?>
	</div>
	
	
	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="<?php echo public_url()?>js/bootstrap.min.js"></script>
	
</body>
</html>
