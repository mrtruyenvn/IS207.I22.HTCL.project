<!-- start right content -->
				<section class="col-md-10">

					<!-- start box -->
						<?php $this->load->view('admin/admin/header',$this->data); ?>
					<!-- end box -->
					
					<?php $this->load->view('admin/alert',$this->data);?>
					
					<!-- start main-content -->
					<div class="main-content">
	
							
						<div class="row">
							<div class="listthanhvien col-md-12">
								<table class="table table-striped">
									<thead>
										<tr>
											<th colspan="8">DOANH SÁCH SHOP LIÊN HỆ</th>
										</tr>
									</thead>
									<tbody class="text-center">
										<tr style="font-weight: bold;">
											<td>STT</td>
											<td>Tiêu đề</td>
											<td>SĐT</td>
											<td>Địa chỉ</td>
											<td>Giới thiệu</td>
											<td>Thao tác</td>
										</tr>
										
										<?php 
										$i =1;
										foreach($list as $row):?>
										<tr>
											<td><?php echo $i++?></td>
											<td><?php echo $row->title?></td>
											<td><?php echo $row->phone?></td>
											<td><?php echo $row->address?></td>
											<td><?php echo $row->describe?></td>
											<td><a href="<?php echo admin_url('address/edit/'.$row->id)?>"  title="Chỉnh sửa"><i class="glyphicon glyphicon-cog" style="color: green;"></i></a>&nbsp;
											<a href="<?php echo admin_url('address/delete/'.$row->id)?>" onclick="return confirmDelete()" title="Xóa"><i class="glyphicon glyphicon-trash" style="color: red;"></i></a></td>
										</tr>
										<?php endforeach; ?>
										
									</tbody>
										
									<tfoot>
										<tr>
											<th colspan="8"><button class="btn btn-success" onclick="location.href='<?php echo admin_url('address/add')?>'">Thêm mới</button></th>
										</tr>
									</tfoot>
								</table>
							</div> <!-- /.listgiaodich -->
						</div>
					</div>
					<!-- end main-content -->
				</section>
				<!-- end right content -->
