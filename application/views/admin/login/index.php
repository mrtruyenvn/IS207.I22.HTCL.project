<html>
<head>
	<?php $this->load->view('admin/head');?>
</head>
<body>
	<div class="container-fluid-full">
		<div class="row">
			<div class="form-login col-sm-offset-4 col-sm-4">
				<div class="panel panel-primary form-login">
			
			<div class="panel-heading">
				ĐĂNG NHẬP VÀO TRANG QUẢN TRỊ
			</div>
			
			<div class="panel-body">
					<form class="form-horizontal" action="" method="post">
			<div class="form-group">
				<label class="control-label col-sm-4">Tên đăng nhập:</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="username">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-4">Mật khẩu:</label>
				<div class="col-sm-8"> 
					<input type="password" class="form-control" name="password">
				</div>
			</div>
			<div class="form-group"> 
				<div class="col-sm-offset-4 col-sm-10">
					<button type="submit" class="btn btn-primary">Đăng nhập</button>
				</div>
			</div>
								<div class=""> <?php echo form_error('login')?></div>

		</form>
			</div>
			</div>
			

		</div>
		</div>
	</div> <!-- /.wrapper -->
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="<?php echo public_url('admin')?>/js/bootstrap.min.js"></script>
</body>
</html>