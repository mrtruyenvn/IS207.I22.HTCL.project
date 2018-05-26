
<div class="register">
	<div class="panel panel-default">
		<div class="panel-heading">
			<strong><a href="" title="Sản phẩm nổi bật"><h4>CHỈNH SỬA THÔNG TIN
						MUA HÀNG</h4></a></strong>
		</div>
		<?php if(isset($user) && $user):?>
		<div class="panel-body">
			<div class="row">
				<form class="form-horizontal" action="<?php echo site_url('order/checkout')?>" method="post">
					<div class="form-group">
						<label class="control-label col-sm-4" for="email">Email:*</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="email"
								placeholder="Nhập email" value="<?php echo $user->email?>">
							<div class="error"><?php echo form_error('email')?></div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-4" for="pwd">Họ và tên đệm:*</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="first_name"
								placeholder="Nhập họ và tên đệm"
								value="<?php echo $user->first_name?>">
							<div class="error"><?php echo form_error('first_name')?></div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-4" for="pwd">Tên:*</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="last_name"
								placeholder="Nhập tên" value="<?php echo $user->last_name?>">
							<div class="error"><?php echo form_error('last_name')?></div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-4" for="pwd">Số điện thoại:*</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="phone"
								placeholder="Nhập SĐT liên hệ" value="<?php echo $user->phone?>">
							<div class="error"><?php echo form_error('phone')?></div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-4" for="pwd">Địa chỉ nhận
							hàng:*</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="address"
								placeholder="Nhập địa chỉ nhận hàng"
								value="<?php echo $user->address?>">
							<div class="error"><?php echo form_error('address')?></div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-4" for="pwd">Thời gian nhận
							hàng:*</label>
						<div class="col-sm-6">
							<input type="date" class="form-control" name="timerec"
								placeholder=""
								value="">
							<div class="error"><?php echo form_error('timerec')?></div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-4">Hình thức thanh toán:*</label>
						<div class="col-sm-6">
							<select name="payment" class="form-control">
								<option value="nganluong">Ngân lượng</option>
								<option value="tructiep">Trực tiếp</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-4" for="pwd">Tổng số tiền thanh toán:*</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name=""
								placeholder=""
								value="<?php echo number_format($total_amount) .' VNĐ'?>" disabled>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-4 col-sm-6">
							<button type="submit" class="btn btn-primary">Thanh toán</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<?php else:?>
		<div class="panel-body">
			<div class="row">
				<form class="form-horizontal" action="<?php echo site_url('order/checkout')?>" method="post">
					<div class="form-group">
						<label class="control-label col-sm-4" for="email">Email:*</label>
						<div class="col-sm-6">
							<input type="name" class="form-control" name="email"
								placeholder="Nhập email" value="<?php set_value('email')?>">
							<div class="error"><?php echo form_error('email')?></div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-4" for="pwd">Họ và tên đệm:*</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="first_name"
								placeholder="Nhập họ và tên đệm"
								value="<?php set_value('first_name')?>">
							<div class="error"><?php echo form_error('first_name')?></div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-4" for="pwd">Tên:*</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="last_name"
								placeholder="Nhập tên" value="<?php set_value('last_name')?>">
							<div class="error"><?php echo form_error('last_name')?></div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-4" for="pwd">Số điện thoại:*</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="phone"
								placeholder="Nhập SĐT liên hệ" value="<?php set_value('phone')?>">
							<div class="error"><?php echo form_error('phone')?></div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-4" for="pwd">Địa chỉ nhận
							hàng:*</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="address"
								placeholder="Nhập địa chỉ nhận hàng"
								value="<?php set_value('address')?>">
							<div class="error"><?php echo form_error('address')?></div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-4" for="pwd">Thời gian nhận
							hàng:*</label>
						<div class="col-sm-6">
							<input type="date" class="form-control" name="timerec"
								placeholder=""
								value="">
							<div class="error"><?php echo form_error('timerec')?></div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-4">Hình thức thanh toán:*</label>
						<div class="col-sm-6">
							<select name="payment" class="form-control">
								<option value="nganluong">Ngân lượng</option>
								<option value="tructiep">Trực tiếp</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-4" for="pwd">Tổng số tiền thanh toán:*</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name=""
								placeholder=""
								value="<?php echo number_format($total_amount) .' VNĐ'?>" disabled>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-4 col-sm-6">
							<button type="submit" class="btn btn-primary">Thanh toán</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<?php endif;?>
	</div>
</div>