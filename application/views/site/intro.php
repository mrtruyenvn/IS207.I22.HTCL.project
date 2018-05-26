 <!-- .........................................intro & slider.................................. -->
      <div class="introduction container">
        <div class="row">

          <div class="col-md-4 col-sm-12 col-xs-0">
            <aside id="sidebar1">
              <div class="panel panel-default">
                <div class="panel-heading" title="Giới thiệu"><strong>GIỚI THIỆU</strong></div>
                <div class="panel-body">
                  Website bán hoa là đồ án môn học "Phát triển ứng dụng web" được thực hiện bởi sinh viên: <br>
                  <strong>Nguyễn Xuân Truyền</strong> 
                  Mssv: 14521031 <br>
                  dưới sự hướng dẫn của giảng viên môn học <br> <strong>Mai Xuân Hùng</strong> <br>
                  <br>
                  Đây là một trang web thương mại điện tử, cho phép khách hàng tìm kiếm và đặt mua hoa theo nhu cầu, sở thích. Trang web cũng cho phép thanh toán online qua cổng thanh toán trực tuyến. <br> <br>
                </div>
              </div>  
            </aside>
          </div> <!-- /.col-md-4 -->  
          <div class="slideshow col-md-8 col-sm-12">
            <div id="carousel-id" class="carousel slide" data-ride="carousel" data-interval="4000">
              <!-- <ol class="carousel-indicators">
                <li data-target="#carousel-id" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-id" data-slide-to="1" class=""></li>
                <li data-target="#carousel-id" data-slide-to="2" class=""></li>
              </ol> -->
              <div class="carousel-inner">
                 <?php foreach ($slide_list as $row):?>
                <div class="item <?php if ($row->sort ==1) echo 'active'?>">
                 <a href=""><img src="<?php echo base_url('upload/slide/').$row->image?>" alt="<?php echo $row->image?>"></a>
               </div>
               <?php endforeach;?>
            </div>
          </div> <!-- /.carousel -->
        </div> <!-- /.col-md-8 -->     
      </div> <!-- /.row -->
    </div> <!-- /.instroduction -->