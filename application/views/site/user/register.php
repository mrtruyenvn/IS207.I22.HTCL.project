  <div class="register">
            <div class="panel panel-default">
              <div class="panel-heading"><strong><a href="" title="Sản phẩm nổi bật"><h4>BẠN CHƯA CÓ TÀI KHOẢN?</h4></a></strong></div>
              <div class="panel-body">
                <div class="row">
                  <form class="form-horizontal" action="" method="post">
                    <div class="form-group">
                      <label class="control-label col-sm-4" for="email">Email:*</label>
                      <div class="col-sm-6">
                        <input type="name" class="form-control" name="email" placeholder="Nhập email" value="<?php echo set_value('email')?>">
                        <div class="error"><?php echo form_error('email')?></div>	
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-4" for="pwd">Mật khẩu:*</label>
                      <div class="col-sm-6"> 
                        <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu">
                      	<div class="error"><?php echo form_error('password')?></div>
                      </div>
                    </div>
                     <div class="form-group">
                      <label class="control-label col-sm-4" for="pwd">Xác nhận mật khẩu:*</label>
                      <div class="col-sm-6"> 
                        <input type="password" class="form-control" name="repassword" placeholder="Xác nhận mật khẩu">
                      	<div class="error"><?php echo form_error('repassword')?></div>
                      </div>
                    </div>
                     <div class="form-group">
                      <label class="control-label col-sm-4" for="pwd">Họ và tên đệm:*</label>
                      <div class="col-sm-6"> 
                        <input type="text" class="form-control" name="first_name" placeholder="Nhập họ và tên đệm" value="<?php echo set_value('first_name')?>">
                      	<div class="error"><?php echo form_error('first_name')?></div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-4" for="pwd">Tên:*</label>
                      <div class="col-sm-6"> 
                        <input type="text" class="form-control" name="last_name" placeholder="Nhập tên" value="<?php echo set_value('last_name')?>">
                      	<div class="error"><?php echo form_error('last_name')?></div>
                      </div>
                    </div>
                     <div class="form-group">
                      <label class="control-label col-sm-4" for="pwd">Ngày sinh:*</label>
                      <div class="col-sm-6"> 
                        <input type="date" class="form-control" name="birthday" value="<?php echo set_value('birthday')?>">
                      	<div class="error"><?php echo form_error('birthday')?></div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-4" for="pwd">Số điện thoại:*</label>
                      <div class="col-sm-6"> 
                        <input type="text" class="form-control" name="phone" placeholder="Nhập SĐT liên hệ" value="<?php echo set_value('phone')?>">
                      	<div class="error"><?php echo form_error('phone')?></div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-4" for="pwd">Địa chỉ:*</label>
                      <div class="col-sm-6"> 
                        <input type="text" class="form-control" name="address" placeholder="Nhập địa chỉ liên hệ" value="<?php echo set_value('address')?>">
                      	<div class="error"><?php echo form_error('address')?></div>
                      </div>
                    </div>
                    <div class="form-group"> 
                      <div class="col-sm-offset-4 col-sm-6">
                        <div class="checkbox">
                          <label><input name="agree" value="ok" type="checkbox"> Đã đọc và đồng ý với điều khoản của chúng tôi</label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group"> 
                      <div class="col-sm-offset-4 col-sm-6">
                        <button type="submit" class="btn btn-primary">Đăng ký</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              
              </div>
              <div class="panel panel-default">
              <div class="panel-heading"><strong><a href="" title="Sản phẩm nổi bật"><h4>ĐIỀU KHOẢN VÀ THỎA THUẬN</h4></a></strong></div>
              <div class="panel-body"> Chưa cập nhật
              </div>
            </div>
            </div>