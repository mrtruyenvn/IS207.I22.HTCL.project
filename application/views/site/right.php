
          <div class="price-search">
           <h4 class="text-center">TÌM THEO GIÁ</h4>
           <form action="<?php echo site_url('products/price_search')?>" method="get" >
            <div class="form-group">
              <label for="sel1">Từ:</label>
              <select class="form-control" id="" name="price_from">
				<?php for($i=0;$i<=5000000;$i=$i+500000):?>
				<option value="<?php echo $i?>"><?php echo number_format($i)?> đ</option>
				<?php endfor;?>
              </select>
              <br>
              <label for="sel2">Đến:</label>
              <select class="form-control" id="" name="price_to">
                <?php for($i=500000;$i<=5000000;$i=$i+500000):?>
				<option value="<?php echo $i?>"><?php echo number_format($i)?> đ</option>
				<?php endfor;?>
              </select>
              <br>
              <div class="form-group text-center">        
                <button type="" class="btn btn-success">Tìm kiếm</button>
              </div>
            </div>
          </form>
        </div>
        <div class="right-banner1">
          <img src="<?php echo public_url()?>img/banner-right-01.png" alt="banner-right-01.png">
        </div>
        <div class="right-banner3">
         Website bán hoa là đồ án môn học "Phát triển ứng dụng web" được thực hiện bởi sinh viên: 
         Nguyễn Xuân Truyền Mssv: 14521031 
         dưới sự hướng dẫn của giảng viên môn học 
         Mai Xuân Hùng 

         Đây là một trang web thương mại điện tử, cho phép khách hàng tìm kiếm và đặt mua hoa theo nhu cầu, sở thích. Trang web cũng cho phép thanh toán online qua cổng thanh toán trực tuyến.
       </div>
       <div class="right-banner2">
        <img src="<?php echo public_url()?>img/banner-right-03.jpg" alt="banner-right-01.png">
      </div>
