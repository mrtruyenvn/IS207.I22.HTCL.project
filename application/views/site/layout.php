<html>
	<head>
		<?php $this->load->view('site/head');?>
	</head>
	<body>
		<div class="wrapper">
		<?php $this->load->view('site/header');?>
		<?php $this->load->view('site/menu');?>
		<?php $this->load->view('site/intro');?>
		<?php $this->load->view('site/themes');?>
		<div class="content container">
      		<div class="row">
      		<?php $this->load->view('site/left');?>
      		<?php $this->load->view('site/right');?>
      		</div>
      	</div>		
		<?php $this->load->view('site/footer');?>
		</div>
		
		
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo public_url()?>js/bootstrap.min.js"></script>
	</body>
</html>
