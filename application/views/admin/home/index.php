<!-- start right content -->
				<section class="col-md-10">

					<!-- start box -->
					<div class="box">
						<div class="row">

								<div class="col-md-6">
								<a href="<?php echo admin_url()?>"><i class="glyphicon glyphicon-home"></i> BẢNG ĐIỀU KHIỂN	</a>
								</div>		
						</div>
						
					</div>
					<!-- end box -->

					<!-- start main-content -->
					<div class="main-content">
						<div class="row">

							<div class="thongke col-md-6">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th colspan="2">THỐNG KÊ</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Tổng số giao dịch</td>
											<td><?php echo $trans_total?></td>
										</tr>
										<tr>
											<td>Tổng số sản phẩm</td>
											<td><?php echo $product_total?></td>
										</tr>
										<tr>
											<td>Tổng số thành viên</td>
											<td><?php echo $user_total?></td>
										</tr>
										<tr>
											<td>Tổng số quản trị viên</td>
											<td><?php echo $admin_total?></td>
										</tr>
										<tr>
											<td>Tổng số liên hệ</td>
											<td>5</td>
										</tr>
									</tbody>
								</table>
							</div> <!-- /.thongke -->

							<div class="doanhso col-md-6">
								<table class="table table-bordered table-curved">
									<thead>
										<tr>
											<th colspan="2">DOANH SỐ</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Doanh số hôm nay</td>
											<td>15.000.000 đ</td>
										</tr>
										<tr>
											<td>Doanh số tháng này</td>
											<td>120.000.000 đ</td>
										</tr>
										<tr>
											<td>Tổng doanh thu</td>
											<td>347.000.000 đ</td>
										</tr>

									</tbody>
								</table>
							</div> <!-- /.doanhso -->
												
						</div>

						<div class="row">
							<div class="listgiaodich col-md-12">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th colspan="8">DOANH SÁCH CÁC GIAO DỊCH</th>
										</tr>
									</thead>
									<tbody class="text-center">
										<tr style="font-weight: bold;">
											<td>Mã GD</td>
											<td>Thành viên</td>
											<td>Tổng tiền</td>
											<td>Hình thức GD</td>
											<td>Ngày tạo</td>
											<td>Trạng thái</td>
											<td colspan="2">Thao tác</td>
										</tr>
										<tr>
											<td>02</td>
											<td>Nguyễn Anh Tú</td>
											<td>5.000.000 đ</td>
											<td>Bảo Kim</td>
											<td>18/5/2018</td>
											<td>Chờ xử lý</td>
											<td><a href=""><i class="glyphicon glyphicon-ok" style="color: green;"></i></a></td>
											<td><a href=""><i class="glyphicon glyphicon-remove" style="color: red;"></i></a></td>
										</tr>
									</tbody>
								</table>
							</div> <!-- /.listgiaodich -->
						</div>
					</div>
					<!-- end main-content -->
				</section>
				<!-- end right content -->