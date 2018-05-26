<!-- start right content -->
				<section class="col-md-10">

					<!-- start box -->
						<?php $this->load->view('admin/slide/header',$this->data); ?>
					<!-- end box -->
					
					<?php $this->load->view('admin/alert',$this->data);?>
					
					<!-- start main-content -->
					<div class="main-content">
	
							
						<div class="row">
							<div class="col-md-12">
								<table class="table table-striped">
									<thead>
										<tr>
											<th colspan="8">DOANH SÁCH SLIDE</th>
										</tr>
									</thead>
									<tbody class="text-center">
										<tr style="font-weight: bold;">
											<td>STT</td>
											<td>Hình ảnh</td>
											<td>Tiêu đề</td>
											<td>Sắp xếp</td>
											<td>Đường dẫn tới:</td>
											<td>Thao tác</td>
										</tr>
										
										<?php 
										$i =1;
										foreach($list as $row):?>
										<tr>
											<td><?php echo $i++?></td>
											<td><img style="width:480px; height:250px;" alt="<?php echo $row->image?>" src="<?php echo base_url('upload/slide/'.$row->image)?>"></td>
											<td><?php echo $row->title?></td>
											<td><?php echo $row->sort?></td>
											<td><?php echo $row->link_to?></td>
											<td><a href="<?php echo admin_url('slide/edit/'.$row->id)?>"  title="Chỉnh sửa"><i class="glyphicon glyphicon-cog" style="color: green;"></i></a>&nbsp;
											<a href="<?php echo admin_url('slide/delete/'.$row->id)?>" onclick="return confirmDelete()" title="Xóa"><i class="glyphicon glyphicon-trash" style="color: red;"></i></a></td>
										</tr>
										<?php endforeach; ?>
										
									</tbody>
										
									<tfoot>
										<tr>
											<th colspan="8"><button class="btn btn-success" onclick="location.href='<?php echo admin_url('slide/add')?>'">Thêm mới</button></th>
										</tr>
									</tfoot>
								</table>
							</div> <!-- /.listgiaodich -->
						</div>
					</div>
					<!-- end main-content -->
				</section>
				<!-- end right content -->
