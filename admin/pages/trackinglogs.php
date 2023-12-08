<div class="w-75 mx-auto pt-3">
  <table class="table table-bordered">
    <thead class="table-dark">
      <tr>
        <th scope="col" width="2%">#</th>
        <th scope="col">Department</th>
        <th scope="col">Product Name</th>
        <th scope="col">Product Size</th>
        <th scope="col">Quantity</th>
        <th scope="col">Transaction Type</th>
        <th scope="col">Transaction Date</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      $i= 1;
      while($resStocklogs = $selectStockLogs->fetch()){
        ?>
        <tr>
          <td><?php echo $i++ ?></td>
          <td><?php echo $resStocklogs['department'] ?></td>
          <td><?php echo $resStocklogs['product_description'] ?></td>
          <td><?php echo $resStocklogs['product_size'] ?></td>
          <td><?php echo $resStocklogs['quantity'] ?></td>
          <?php
          if($resStocklogs['transact_type'] =='stockin'){
            ?>
            <td width="15%" class="fw-bold text-center text-success"><?php echo $resStocklogs['transact_type'] ?></td>
            <?php
          }else{
            ?>
            <td width="15%" class="fw-bold text-center text-danger"><?php echo $resStocklogs['transact_type'] ?></td>
            <?php
          }
          ?>
          <td width="16%" class="text-center"><?php echo $resStocklogs['created_at'] ?></td>
        </tr>
        <?php
      }
      ?>
    </tbody>
  </table>
</div>