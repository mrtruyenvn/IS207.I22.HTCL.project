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
								<div class="panel-heading"><i class="glyphicon glyphicon-plus"></i> THÊM MỚI DANH MỤC SẢN PHẨM</div>
								<div class="panel-body">

									<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

										<div class="form-group">
											<label class="control-label col-sm-4">Tên danh mục:*</label>
											<div class="col-sm-6">
												<input type="text" class="form-control" name="name" value="<?php echo set_value('name')?>">
												<div name="name_error" class="input-error"><?php echo form_error('name')?></div>
											</div>	
										</div>
										
										<div class="form-group">
											<label class="control-label col-sm-4">Danh mục cha:*</label>
											<div class="col-sm-6">
											
												<select class="form-control" name="parent_id">
													<option value="0">Là danh mục cha</option>
													<?php foreach($list as $row):?>
													<option value="<?php echo $row->id?>"><?php echo $row->name?></option>
													<?php endforeach;?>												
												</select>
												
											</div>	
										</div>
										
										<div class="form-group">
											<label class="control-label col-sm-4">Sắp xếp:*</label>
											<div class="col-sm-6">
												<input type="text" class="form-control" name="sort" value="<?php echo set_value('sort')?>">
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