 <div class="product_detail row">

              <div class="detail col-md-5 col-sm-6">
                <div class="thumbnail">
                  <img src="<?php echo base_url('upload/products/'.$product->image_id)?>" alt="">
                  <div class="caption text-center">
                    <h2 style="color:#189001">Mã SP:<?php echo $product->id?></h2>
                    <?php if($product->discount > 0):?>
                    <strike><h5>Giá cũ: <?php echo number_format($product->price)?> đ</h5></strike>
                    <h4 style="	color: #bd2026;">Giá mới: <?php echo number_format($product->price - $product->discount) ?> đ</h4>
                    <?php else:?>
                    <h4 style="	color: #bd2026;">Giá: <?php echo number_format($product->price) ?> đ</h4>
                    <?php endif;?>
                    <a href="<?php echo base_url('cart/add/'.$product->id)?>" class="btn btn-warning" role="button"><i class="glyphicon glyphicon-shopping-cart"></i> THÊM VÀO GIỎ </a>
                  </div>
                </div>
              </div>

              <div class="describe col-md-7 col-sm-6">

                <div class="panel">
                  <div class="panel-heading">
                    <h4><?php echo $product->name .' - '.$catalog->name?> </h4>
                    <hr>
                  </div>
                  <div class="panel-body">
                    <?php echo $product->describe?>
                  </div>
                </div>

               <div class="more">
                <ul>
                  <li><span class="badge badge-primary badge-pill">1</span> Giao miễn phí trong nội thành 63/63 tỉnh</li>
                  <li><span class="badge badge-primary badge-pill">2</span> Giao gấp trong vòng 2 giờ</li>
                  <li><span class="badge badge-primary badge-pill">3</span> Phí giao hàng 30.000 đ cho các đơn hàng ngoại thành, miễn phí cho các đơn hàng trên 1.000.000đ</li>
                  <li><span class="badge badge-primary badge-pill">4</span> Cam kết 100% hoàn lại tiền nếu Bạn không hài lòng</li>
                  <li><span class="badge badge-primary badge-pill">5</span> Cam kết hoa tươi trên 2 ngày</li>
                  <li><span class="badge badge-primary badge-pill">6</span> Giảm 5% đối với các đơn hàng trị giá trên 1,000,000 VND</li>
                </ul>
              </div>
            </div>
                   <div class="col-md-12 cungloai">
              <div class="panel panel-default">
                <div class="panel-heading"><strong><a href="" title="Sản phẩm nổi bật">SẢN PHẨM CÙNG DANH MỤC</a></strong></div>
                <div class="panel-body">
                
                  <div class="row">
					 <?php foreach($same_catalog as $row):?>
					 <?php if($row->id != $product->id):?>
                    <div class="col-md-3 col-sm-6"> 
                      <div class="thumbnail">
                      <a href="<?php echo base_url('products/view/'.$row->id)?>" title="Xem chi tiết">
                      <img src="<?php echo base_url('upload/products/'.$row->image_id)?>" alt="<?php echo $row->image_id?>">
                        <div class="caption text-center">
                          <h5><?php echo $row->name?></h5>
                          <?php if($row->discount > 0):?>
                          <h5><b style="color: #bd2026"><?php echo number_format($row->price - $row->discount)?> đ  </b><strike style="color: #0000b3"><b  style="color:#0000b3"><?php echo $row->price?> đ</b></strike> </h5></div>
                          <?php else:?>
                          <h5><b style="color: #bd2026"><?php echo number_format($row->price)?> đ</b></h5></div>
                          <?php endif;?>
                          </a> 
                        </div>
                      </div>
                      <?php endif;?>
                       <?php endforeach;?>	
                  </div>
                </div>
              </div>
            </div> <!-- /.giohoatuoi -->
            </div>