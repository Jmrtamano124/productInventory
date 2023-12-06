<div class="container mx-auto pt-3">
  <table class="table table-bordered">
  <thead class="table-dark">
    <tr>
      <th scope="col" width="2%">#</th>
      <th scope="col">Student Name</th>
      <th scope="col">Product Name</th>
      <th scope="col">Reservation Date</th>
      <th scope="col">Released By</th>
      <th scope="col">Released Date</th>
    </tr>
  </thead>
  <tbody>
      <?php 
      $i= 1;
      while($resReleasedStocks = $selectReleasedStocks->fetch()){
        ?>
        <tr>
          <td><?php echo $i++ ?></td>
          <td><?php echo $resReleasedStocks['studentFullname'] ?></td>
          <td><?php echo $resReleasedStocks['product_description'] ?></td>
          <td width="15%" class="text-center"><?php echo $resReleasedStocks['created_at'] ?></td>
          <td width="16%" class="text-center"><?php echo $resReleasedStocks['releasedBy'] ?></td>
          <td width="16%" class="text-center"><?php echo $resReleasedStocks['updated_at'] ?></td>
        </tr>
        <?php
      }
      ?>
  </tbody>
</table>
</div>