
<!-- start right content -->
				<section class="col-md-10">

					<!-- start box -->
					<?php $this->load->view('admin/slide/header',$this->data); ?>
					<!-- end box -->

					<!-- start main-content -->
					<div class="main-content">

						<div class="row">
							<div class="col-md-12">	
								<div class="panel panel-success">
								<div class="panel-heading"><i class="glyphicon glyphicon-cog"></i> CHỈNH SỬA SLIDE</div>
								<div class="panel-body">

									<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

										<div class="form-group">
											<label class="control-label col-sm-4">Tiêu đề:*</label>
											<div class="col-sm-6">
												<input type="text" class="form-control" name="title" value="<?php echo $slide->title ?>">
												<div name="name_error" class="input-error"><?php echo form_error('title')?></div>
											</div>	
										</div>

										
										<div class="form-group">
											<label class="control-label col-sm-4">Hình ảnh:*</label>
											<div class="col-sm-6">
												<input type="file" class="form-control" name="image">
												<img src="<?php echo base_url('upload/slide/'.$slide->image)?>">
											</div>	
										</div>
										
										
										

										<div class="form-group">
											<label class="control-label col-sm-4">Đường dẫn tới:*</label>
											<div class="col-sm-6">
												<input type="text" class="form-control" name="link-to" value="<?php echo $slide->link_to?>">
												<div name="name_error" class="input-error"><?php echo form_error('link_to')?></div>
											</div>	
										</div>
										
										<div class="form-group">
											<label class="control-label col-sm-4">Thứ tự:*</label>
											<div class="col-sm-6">
												<input type="number" class="form-control" name="sort" value="<?php echo $slide->sort?>" >
							
											</div>	
										</div>

										<div class="form-group"> 
											<div class="col-sm-offset-4 col-sm-6">
												<input type="submit" class="btn btn-success" value="Cập nhật"></input>
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

