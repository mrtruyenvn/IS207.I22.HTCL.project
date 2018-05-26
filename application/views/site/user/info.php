  <div class="register">
            <div class="panel panel-default">
              <div class="panel-heading"><strong><a href="" title="Sản phẩm nổi bật"><h4>THÔNG TIN TÀI KHOẢN</h4></a></strong></div>
              <div class="panel-body">
                <div class="row">
                  <form class="form-horizontal" action="" method="post">
                    <div class="form-group">
                      <label class="control-label col-sm-4" for="email">Email:*</label>
                      <div class="col-sm-6">
                        <input type="name" class="form-control" name="email" placeholder="Nhập email" value="<?php echo $user->email?>" disabled>
                        <div class="error"><?php echo form_error('email')?></div>	
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-4" for="pwd">Mật khẩu:*</label>
                      <div class="col-sm-6"> 
                        <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu">
                        <div>Không cần nhập mật khẩu nếu không muốn thay đổi mật khẩu của bạn.</div>
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
                        <input type="text" class="form-control" name="first_name" placeholder="Nhập họ và tên đệm" value="<?php echo $user->first_name?>">
                      	<div class="error"><?php echo form_error('first_name')?></div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-4" for="pwd">Tên:*</label>
                      <div class="col-sm-6"> 
                        <input type="text" class="form-control" name="last_name" placeholder="Nhập tên" value="<?php echo $user->last_name?>">
                      	<div class="error"><?php echo form_error('last_name')?></div>
                      </div>
                    </div>
                     <div class="form-group">
                      <label class="control-label col-sm-4" for="pwd">Ngày sinh:*</label>
                      <div class="col-sm-6"> 
                        <input type="date" class="form-control" name="birthday" value="<?php echo $user->birthday?>">
                      	<div class="error"><?php echo form_error('birthday')?></div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-4" for="pwd">Số điện thoại:*</label>
                      <div class="col-sm-6"> 
                        <input type="text" class="form-control" name="phone" placeholder="Nhập SĐT liên hệ" value="<?php echo $user->phone?>">
                      	<div class="error"><?php echo form_error('phone')?></div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-4" for="pwd">Địa chỉ:*</label>
                      <div class="col-sm-6"> 
                        <input type="text" class="form-control" name="address" placeholder="Nhập địa chỉ liên hệ" value="<?php echo $user->address?>">
                      	<div class="error"><?php echo form_error('address')?></div>
                      </div>
                    </div>
                    <div class="form-group"> 
                      <div class="col-sm-offset-4 col-sm-6">
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
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