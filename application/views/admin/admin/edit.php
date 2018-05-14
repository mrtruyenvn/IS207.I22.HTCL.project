<?php $this->load->view('admin/admin/header',$this->data); ?>

<div class="line"></div>

<div class="wrapper">
	<form class="form" id="form" action="" method="post"
		enctype="multipart/form-data">
		<fieldset>
			<div class="widget">
				<div class="title">
					<img
						src="<?php echo public_url('admin')?>/images/icons/dark/add.png"
						class="titleIcon">
					<h6>Cập nhật thông tin quản trị viên</h6>
				</div>
				<div class="tab_container">
					<div class="formRow">
						<label class="formLeft" for="param_name">Họ và tên:<span
							class="req">*</span></label>
						<div class="formRight">
							<span class="oneTwo"><input name="name" id="param_name"
								_autocheck="true" type="text" value="<?php echo $info->name?>"></span> <span
								name="name_autocheck" class="autocheck"></span>
							<div name="name_error" class="clear error"><?php echo form_error('name')?></div>
						</div>
						<div class="clear"></div>

					</div>
					<div class="formRow">
						<label class="formLeft" for="param_username">Tên đăng nhập:<span
							class="req">*</span></label>
						<div class="formRight">
							<span class="oneTwo"><input name="username" id="param_username"
								_autocheck="true" type="text" value="<?php echo $info->username?>"></span> <span
								name="name_autocheck" class="autocheck"></span>
							<div name="name_error" class="clear error"><?php echo form_error('username')?></div>
						</div>
						<div class="clear"></div>

					</div>
					<div class="formRow">
						<label class="formLeft" for="param_password">Mật khẩu:<span
							class="req">*</span></label>
						<div class="formRight">
							<span class="oneTwo"><input name="password" id="param_password"
								_autocheck="true" type="password"></span> <span
								name="name_autocheck" class="autocheck"></span>
							<div name="name_error" class="clear error"><?php echo form_error('password')?></div>
						</div>
						<div class="clear"></div>

					</div>
					<div class="formRow">
						<label class="formLeft" for="param_repassword">Nhập lại mật khẩu:<span
							class="req">*</span></label>
						<div class="formRight">
							<span class="oneTwo"><input name="repassword"
								id="param_repassword" _autocheck="true" type="password"></span> <span
								name="name_autocheck" class="autocheck"></span>
							<div name="name_error" class="clear error"><?php echo form_error('repassword')?></div>
						</div>
						<div class="clear"></div>

					</div>
					<div class="formSubmit">
						<input type="submit" value="Chỉnh sửa" class="redB">
					</div>
					<div class="clear"></div>
				</div>
			</div>
		</fieldset>
	</form>
</div>