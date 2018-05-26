          <div class="register">

            <div class="panel panel-default">
              <div class="panel-heading"><strong><a href="" title="Sản phẩm nổi bật"><h4>BẠN ĐÃ CÓ TÀI KHOẢN?</h4></a></strong></div>
              <div class="panel-body">
                <div class="row">
                  <form class="form-horizontal" action="" method="post">
                    <div class="form-group">
                      <label class="control-label col-sm-4" for="email">Tài khoản đăng nhập:*</label>
                      <div class="col-sm-6">
                        <input type="name" class="form-control" name="email" placeholder="Nhập email">
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
                      <div class="col-sm-offset-4 col-sm-6">
                      	<div class="error"><?php echo form_error('login')?></div>
                        <button type="submit" class="btn btn-success">Đăng nhập</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              
            </div>
</div>