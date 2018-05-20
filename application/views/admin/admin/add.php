<!-- start right content -->
				<section class="col-md-10">

					<!-- start box -->
					<?php $this->load->view('admin/admin/header',$this->data); ?>
					<!-- end box -->

					<!-- start main-content -->
					<div class="main-content">

						<div class="row">
							<div class="col-md-12">	
								<div class="panel panel-success">
								<div class="panel-heading"><i class="glyphicon glyphicon-plus"></i> THÊM QUẢN TRỊ VIÊN</div>
								<div class="panel-body">

									<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

										<div class="form-group">
											<label class="control-label col-sm-4">Họ và tên:*</label>
											<div class="col-sm-6">
												<input type="text" class="form-control" name="name" value="<?php echo set_value('name')?>">
												<div name="name_error" class="input-error"><?php echo form_error('name')?></div>
											</div>
											
										</div>

										<div class="form-group">
											<label class="control-label col-sm-4">Tên đăng nhập:*</label>
											<div class="col-sm-6"> 
												<input type="text" class="form-control" name="username" value="<?php echo set_value('username')?>">
												<div name="name_error" class="input-error"><?php echo form_error('username')?></div>
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-sm-4">Mật khẩu:*</label>
											<div class="col-sm-6"> 
												<input type="password" class="form-control" name="password" value="<?php echo set_value('password')?>">
												<div name="name_error" class="input-error"><?php echo form_error('password')?></div>
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-sm-4">Nhập lại mật khẩu:*</label>
											<div class="col-sm-6"> 
												<input type="password" class="form-control" name="repassword" value="<?php echo set_value('repassword')?>">
												<div name="name_error" class="input-error"><?php echo form_error('repassword')?></div>
											</div>
										</div>

										<div class="form-group"> 
											<div class="col-sm-offset-4 col-sm-6">
												<input type="submit" class="btn btn-success" value="Thêm mới"></input>
											</div>
										</div>
									</form>
								</div>
							</div>
							</div>
							
						</div>
					</div>
					<!-- end main-content -->
				</section>
				<!-- end right content -->