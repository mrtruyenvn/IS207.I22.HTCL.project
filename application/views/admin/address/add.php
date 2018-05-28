<!-- start right content -->
				<section class="col-md-10">

					<!-- start box -->
					<?php $this->load->view('admin/address/header',$this->data); ?>
					<!-- end box -->

					<!-- start main-content -->
					<div class="main-content">

						<div class="row">
							<div class="col-md-12">	
								<div class="panel panel-success">
								<div class="panel-heading"><i class="glyphicon glyphicon-plus"></i> THÊM LIÊN HỆ</div>
								<div class="panel-body">

									<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

										<div class="form-group">
											<label class="control-label col-sm-4">Tiêu đề:*</label>
											<div class="col-sm-6">
												<input type="text" class="form-control" name="title" value="<?php echo set_value('title')?>">
												<div name="name_error" class="input-error"><?php echo form_error('title')?></div>
											</div>
											
										</div>

										<div class="form-group">
											<label class="control-label col-sm-4">SĐT:*</label>
											<div class="col-sm-6"> 
												<input type="text" class="form-control" name="phone" value="<?php echo set_value('phone')?>">
												<div name="name_error" class="input-error"><?php echo form_error('phone')?></div>
											</div>
										</div>
										

										<div class="form-group">
											<label class="control-label col-sm-4">Địa chỉ:*</label>
											<div class="col-sm-6"> 
												<input type="text" class="form-control" name="address" value="<?php echo set_value('address')?>">
												<div name="name_error" class="input-error"><?php echo form_error('address')?></div>
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-sm-4">Mô tả:*</label>
											<div class="col-sm-6"> 
												<textarea rows="5" class="form-control" name="describe" value="<?php echo set_value('describe')?>"></textarea>
												<div name="name_error" class="input-error"><?php echo form_error('describe')?></div>
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