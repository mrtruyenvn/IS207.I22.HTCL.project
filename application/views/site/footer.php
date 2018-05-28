<footer>
  <div class="container">
    <div class="row">
      
      <?php foreach ($address as $row):?>
      <div class="col-md-4">
        <h4><?php echo $row->title?></h4>
        <h5>SĐT: <?php echo $row->phone?></h5>
        <h5>Địa chỉ: <?php echo $row->address?></h5> 
        <h5><?php echo $row->describe?></h5>
       </div> 
        <?php endforeach; ?>

    </div>
    <div class="text-center">
      <hr>
      CopyRight © 2018 Designed by Truyền Xuân Nguyễn
    </div>
  </div>
</footer>