<!-- start right content -->
				<section class="col-md-10">

					<!-- start box -->
					<?php $this->load->view('admin/products/header',$this->data); ?>
					<!-- end box -->

					<!-- start main-content -->
					<div class="main-content">

						<div class="row">
							<div class="col-md-12">	
								<div class="panel panel-success">
								<div class="panel-heading"><i class="glyphicon glyphicon-cog"></i> CHỈNH SỬA SẢN PHẨM</div>
								<div class="panel-body">

									<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

										<div class="form-group">
											<label class="control-label col-sm-4">Tên sản phẩm:*</label>
											<div class="col-sm-6">
												<input type="text" class="form-control" name="name" value="<?php echo $product->name?>">
												<div name="name_error" class="input-error"><?php echo form_error('name')?></div>
											</div>	
										</div>
										
										<div class="form-group">
											<label class="control-label col-sm-4">Từ khóa:*</label>
											<div class="col-sm-6">
												<input type="text" class="form-control" name="keyword" value="<?php echo $product->keyword?>">
												<div name="name_error" class="input-error"><?php echo form_error('keyword')?></div>
											</div>	
										</div>
										
										<div class="form-group">
											<label class="control-label col-sm-4">Loại sản phẩm:*</label>
											<div class="col-sm-6">
											
													<select class="form-control" name="catalog_id" id="">
													<?php foreach($list as $row):?>
													<?php if (count($row->sub) >=1):?>
														<optgroup label="<?php echo $row->name?>">
														<?php foreach ($row->sub as $sub):?>
														<option value="<?php echo $sub->id?>" <?php if ($sub->id == $product->catalog_id) echo 'selected';?> ><?php echo $sub->name?>
														</option>
													<?php endforeach;?>
													</optgroup>
													<?php else:?>
													<option style="font-weight: bold" value="<?php echo $row->id?>" <?php if ($row->id == $product->catalog_id) echo 'selected';?>><?php echo $row->name?></option>
													<?php endif;?>
													<?php endforeach;?>
												</select>
												
											</div>	
										</div>
										
										<div class="form-group">
											<label class="control-label col-sm-4">Màu sắc:*</label>
											<div class="col-sm-6">
											
													<select class="form-control" name="color" id="">
													<option value="0">Unknown</option>
													<?php foreach($color as $row):?>
													<option style="font-weight: bold" value="<?php echo $row->id?>" <?php if ($row->id == $product->color_id) echo 'selected';?>><?php echo $row->name?></option>
													<?php endforeach;?>
												</select>
												
											</div>	
										</div>
										
										<div class="form-group">
											<label class="control-label col-sm-4">Hình ảnh:*</label>
											<div class="col-sm-6">
												<input type="file" class="form-control" name="image_id">
												
												<img src="<?php echo base_url('upload/products/'.$product->image_id)?>">	
											</div>	
										</div>
										
										
										<div class="form-group">
											<label class="control-label col-sm-4">Giá:*</label>
											<div class="col-sm-2">
												<input min="1" type="text" class="form-control" name="price" value="<?php echo $product->price?>">
												<div name="name_error" class="input-error"><?php echo form_error('price')?></div>	
											</div>	
											
											<label class="control-label col-sm-2">Giảm giá:</label>
											<div class="col-sm-2">
												<input min="0" type="number" class="form-control" name="discount" value="<?php echo $product->discount?>">
												<div name="name_error" class="input-error"><?php echo form_error('new_price')?></div>	
											</div>	
										</div>

										<div class="form-group">
											<label class="control-label col-sm-4">Mô tả:*</label>
											<div class="col-sm-6">
												<textarea rows="15" class="form-control" name="describe"><?php echo $product->describe?></textarea>
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