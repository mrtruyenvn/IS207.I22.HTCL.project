<!-- start right content -->
<section class="col-md-10">
					<?php $this->load->view('admin/transaction/header',$this->data); ?>
					
					<?php $this->load->view('admin/alert',$this->data);?>
					<!-- start main-content -->
	<div class="main-content">


		<div class="row">
			<div class="listsanpham col-md-12">
				<table class="table table-striped ">
					<thead>
						<tr>
							<th colspan="8">DANH SÁCH CÁC GIAO DỊCH</th>
						</tr>
					</thead>
					<tbody class="text-center">
						<tr style="font-weight: bold;">
							<td colspan="8" style="background-color: #ffe6e6">
								<form class="form-inline" method="get" action="<?php echo admin_url('transaction')?>">
									<div class="form-group">
										<label>Mã giao dịch: </label> <input type="text" class="form-control" name="id" value="<?php echo $this->input->get('id')?>">
										<label> Khách hàng: </label> <input type="text" class="form-control" name="mail" value="<?php echo $this->input->get('mail')?>">
									</div>

									<input type="submit" class="btn btn-success" value="Tìm">
									<input type="reset" class="btn btn-primary" value="Reset" onclick="window.location.href='<?php echo admin_url('transaction')?>'">
								</form>
							</td>
						</tr>
						<tr style="font-weight: bold;">
							<td>STT</td>
							<td>Mã GD</td>
							<td>Khách hàng</td>
							<td>Ngày tạo</td>
							<td>Tổng tiền</td>
							<td>Hình thức</td>
							<td>Trạng thái</td>
							<td>Thao tác</td>
						</tr>
						<?php $stt=1; foreach ($list as $row):?>
						<tr>
							<td><?php echo $stt++?></td>
							<td><?php echo $row->id?></td>
							<td><?php echo $row->user_email?></td>
							<td><?php echo $row->created_at?></td>
							<td><?php echo number_format($row->amount)?></td>
							<td><?php if($row->payment=='tructiep') echo 'Trực tiếp'; if($row->payment=='nganluong') echo 'Ngân lượng'?></td>
							<td><?php if($row->status == 0) echo 'Đang chờ'; else echo 'Đã thanh toán';?></td>
							<td><a href="" title="Chi tiết"><i
									class="glyphicon glyphicon-list-alt" style="color: grey;"></i></a>&nbsp;
		
								<a href="<?php echo admin_url('transaction/delete/'.$row->id)?>" title="Xóa" onclick="return confirmDelete()"><i class="glyphicon glyphicon-trash" style="color: red;"></i></a>
							</td>
						</tr>
										<?php endforeach;?>
										</tbody>
					<tfoot>
						<tr>
							</td>
							<td colspan="8">
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