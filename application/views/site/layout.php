<html>
	<head>
		<?php $this->load->view('site/head');?>
		

	</head>
	<body>
		<div class="wrapper">
		<?php $this->load->view('site/header');?>
		<?php $this->load->view('site/menu', $this->data);?>
		<?php if(isset($intro)) $this->load->view($intro, $this->data);?>
		<?php if(isset($color)) $this->load->view($color, $this->data);?>
		<div class="content container">
		
      		<div class="row">
      			<div class="col-md-9 left">
      				<?php $this->load->view($temp , $this->data);?>
      			</div>
      			
      			<div class="col-md-3 right">
      				<?php $this->load->view('site/right');?>
      			</div>
      		</div>
      		
      	</div>		
		<?php $this->load->view('site/footer');?>
		</div>
		
			
		<a href="#" class="cd-top"></a>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo public_url()?>js/bootstrap.min.js"></script>
				<script src="<?php echo public_url()?>js/backtotop.js"></script>
	</body>
</html>
