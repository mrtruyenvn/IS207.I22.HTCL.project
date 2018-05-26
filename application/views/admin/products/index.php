<!-- start right content -->
<section class="col-md-10">
					<?php $this->load->view('admin/products/header',$this->data); ?>
					
					<?php $this->load->view('admin/alert',$this->data);?>
					<!-- start main-content -->
	<div class="main-content">


		<div class="row">
			<div class="listsanpham col-md-12">
				<table class="table table-striped ">
					<thead>
						<tr>
							<th colspan="8">DANH SÁCH SẢN PHẨM</th>
						</tr>
					</thead>
					<tbody class="text-center">
						<tr style="font-weight: bold;">
							<td colspan="8" style="background-color: #ffe6e6">
								<form class="form-inline" method="get" action="<?php echo admin_url('products')?>">
									<div class="form-group">
										<label>Mã sản phẩm:</label> <input type="text" class="form-control" name="id" value="<?php echo $this->input->get('id')?>">
									</div>
									<div class="form-group">
										<label>Tên sản phẩm:</label> <input type="text" class="form-control" name="name" value="<?php echo $this->input->get('name')?>">
									</div>
									<div class="form-group">
										<label>Loại:</label> 
										<select class="form-control" name="catalog" id="">
											<option value="">Loại sản phẩm</option>
											<?php foreach($catalog as $row):?>
											<?php if (count($row->sub) >=1):?>
											<optgroup label="<?php echo $row->name?>">
												<?php foreach ($row->sub as $sub):?>
												<option value="<?php echo $sub->id?>" <?php echo ($this->input->get('catalog')==$sub->id)? 'selected' :'';?>><?php echo $sub->name?>
												</option>
												<?php endforeach;?>
											</optgroup>
											<?php else:?>
											<option style="font-weight:bold" value="<?php echo $row->id?>" <?php echo ($this->input->get('catalog')==$row->id)? 'selected' :'';?>><?php echo $row->name?></option>
											<?php endif;?>
											<?php endforeach;?>
										</select>
									</div>
									<input type="submit" class="btn btn-success" value="Lọc">
									<input type="reset" class="btn btn-default" value="Reset" onclick="window.location.href='<?php echo admin_url('products')?>'">
								</form>
							</td>
						</tr>
						<tr style="font-weight: bold;">
							<td>STT</td>
							<td>Mã SP</td>
							<td>Tên sản phẩm</td>
							<td>Hình ảnh</td>
							<td>Giá</td>
							<td>Ngày tạo</td>
							<td>Đã bán</td>
							<td>Thao tác</td>
						</tr>
						<?php $stt=1; foreach ($list as $row):?>
						<tr>
							<td><?php echo $stt++?></td>
							<td><?php echo $row->id?></td>
							<td><?php echo $row->name?></td>
							<td><img style="width:75px; height:90px;" alt="<?php echo $row->image_id?>" src="<?php echo base_url('upload/products/'.$row->image_id)?>" title="<?php $row->image_id?>"></td>
							<td style="font-weight: bold"><?php if($row->discount > 0):?> 
								<p style="color: #e62e00"><?php echo number_format($row->price - $row->discount)?> đ<br />
								</p>
								<p style="color: #4040bf">
									<strike style="color: #4040bf"><?php echo number_format($row->price)?></strike>
									đ
								</p>
												<?php else:?>
												<?php echo number_format($row->price)?> đ
												<?php endif;?>
											</td>
							<td><?php echo $row->created_at?></td>
							<td><?php echo $row->buy_counter?></td>
							<td><a href="" title="Chi tiết"><i
									class="glyphicon glyphicon-list-alt" style="color: grey;"></i></a>&nbsp;
								<a href="<?php echo admin_url('products/edit/'.$row->id)?>" title="Chỉnh sửa"><i class="glyphicon glyphicon-cog"
									style="color: green;"></i></a>&nbsp; 
								<a href="<?php echo admin_url('products/delete/'.$row->id)?>" title="Xóa" onclick="return confirmDelete()"><i class="glyphicon glyphicon-trash" style="color: red;"></i></a>
							</td>
						</tr>
										<?php endforeach;?>
										</tbody>
					<tfoot>
						<tr>
							<td colspan="5"><button class="btn btn-success" onclick="location.href='<?php echo admin_url('products/add')?>'">Thêm mới</button>
							</td>
							<td colspan="3">
								<div class="pagination">
								<?php echo $this->pagination->create_links()?>
								</div>
							</td>
						</tr>
					</tfoot>
				</table>
			</div>
			<!-- /.listgiaodich -->
		</div>
	</div>
	<!-- end main-content -->
</section>
<!-- end right content -->