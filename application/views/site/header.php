<header>
</script>
        <div class="container">
          <div class="row">
            <div class="web-logo col-xs-12 col-sm-8 col-md-8">
              <a href="<?php echo base_url()?>"><img src="<?php echo public_url()?>img/logoWeb.png" alt="" title="Shop hoa yêu thương"></a>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4">
            <form action="<?php echo site_url('products/search')?>" method="get">
              <div id="imaginary_container"> 
                <div class="input-group stylish-input-group">
                  <input name="key_search" type="text" class="form-control" id="text-search" placeholder="Tìm sản phẩm" value="<?php echo isset($key)? $key : ''?>">
                  <span class="input-group-addon">
                    <button type="submit">
                      <span class="glyphicon glyphicon-search"></span>
                    </button>  
                  </span>
                </div>
              </div>
              </form>
            </div>
          </div> <!-- /.row -->
        </div> <!-- /.container -->
</header>