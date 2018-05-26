
      <nav class="navbar navbar-default " role="navigation">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
            <li><a href="<?php echo base_url()?>">TRANG CHỦ</a></li>
            <?php foreach ($catalog_list as $row):?>
            	<?php if(!empty($row->sub)):?>

              <li class="dropdown">
                <a href="<?php echo base_url('products/catalog/'.$row->id)?>" class="dropdown-toggle" data-toggle="dropdown"><?php echo $row->name?><b class="caret"></b></a>
                
                <ul class="dropdown-menu">
                <?php foreach ($row->sub as $sub):?>
                  <li><a href="<?php echo base_url('products/catalog/'.$sub->id)?>"><?php echo $sub->name?></a></li>
        		<?php endforeach;?>
                </ul>
                </li>
                <?php else:?>
                              <li><a href="<?php echo base_url('products/catalog/'.$row->id)?>"><?php echo $row->name?></a></li>
                              <?php endif;?>
              
         
              <?php endforeach;?>
            </ul>
            
            <ul class="nav navbar-nav navbar-right">
            <li><a href="">LIÊN HỆ</a></li>
            <li><a href="<?php echo base_url('cart')?>">GIỎ HÀNG (<?php echo $total_items?>)</a></li>
            <li class="dropdown">
            <?php if(isset($user_info)):?>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo 'Hi, '. $user_info->last_name?><b class="caret"></b></a>
                <ul class="dropdown-menu">
                <li><a href="<?php echo base_url('user/info')?>">THÔNG TIN TÀI KHOẢN</a></li>
                  <li><a href="<?php echo base_url('user/log_out')?>">ĐĂNG XUẤT</a></li>
                </ul>
                <?php else:?>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">TÀI KHOẢN<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo base_url('user/login')?>">ĐĂNG NHẬP</a></li>
                  <li><a href="<?php echo base_url('user/register')?>">ĐĂNG KÝ</a></li>
                </ul>
              </li>
              <?php endif;?>

              
            </ul>
          </div><!-- /.navbar-collapse -->
        </div>
      </nav>