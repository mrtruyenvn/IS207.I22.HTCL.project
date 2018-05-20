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
											<th colspan="8">DOANH SÁCH DANH MỤC SẢN PHẨM</th>
										</tr>
									</thead>
									<tbody class="text-center">
										<tr style="font-weight: bold;">
											<td>STT</td>
											<td>Mã số</td>
											<td>Tên</td>
											<td>Mã danh mục cha</td>
											<td>Sắp xếp</td>
											<td>Thao tác</td>
										</tr>
										
										<?php 
										$i =1;
										foreach($list as $row):?>
										<tr>
											<td><?php echo $i++?></td>
											<td><?php echo $row->id?></td>
											<td><?php echo $row->name?></td>
											<td><?php echo $row->parent_id?></td>
											<td><?php echo $row->sort?></td>
											<td><a href="<?php echo admin_url('catalog/edit/'.$row->id)?>"  title="Chỉnh sửa"><i class="glyphicon glyphicon-cog" style="color: green;"></i></a>&nbsp;
											<a href="<?php echo admin_url('catalog/delete/'.$row->id)?>" title="Xóa"><i class="glyphicon glyphicon-trash" style="color: red;"></i></a></td>
										</tr>
										<?php endforeach; ?>
										
									</tbody>
									<tfoot>
										<tr>
											<th colspan="8"><button class="btn btn-success" onclick="location.href='<?php echo admin_url('catalog/add')?>'">Thêm mới</button></th>
										</tr>
									</tfoot>
								</table>
							</div> <!-- /.listgiaodich -->
						</div>
					</div>
					<!-- end main-content -->
				</section>
				<!-- end right content -->
