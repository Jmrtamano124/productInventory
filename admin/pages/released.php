<div class="mx-2 pt-3">
  <table class="table table-bordered">
  <thead class="table-dark">
    <tr>
      <th scope="col" width="2%">#</th>
        <th scope="col">ID Number</th>
        <th scope="col">Student  <br>First Name</th>
        <th scope="col">Student Middle Name</th>
        <th scope="col">Student  <br>Last Name</th>
        <th scope="col">Student Suffix</th>
        <th scope="col">College</th>
        <th scope="col">Year</th>
        <th scope="col">Section</th>
        <th scope="col">Reserved Product</th>
        <th scope="col">Size</th>
        <th scope="col">Quantity</th>
        <th scope="col">Status</th>
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
           <td width="27%"><?php echo $resReleasedStocks['student_number'] ?></td>
           <td width="27%"><?php echo $resReleasedStocks['student_fname'] ?></td>
           <td width="27%"><?php echo $resReleasedStocks['student_mname'] ?></td>
           <td width="27%"><?php echo $resReleasedStocks['student_lname'] ?></td>
           <td width="27%"><?php echo $resReleasedStocks['student_namesuffix'] ?></td>
          <td><?php echo $resReleasedStocks['college_course'] ?></td>
          <td><?php echo $resReleasedStocks['student_yr'] ?></td>
          <td><?php echo $resReleasedStocks['student_section'] ?></td>
          <td><?php echo $resReleasedStocks['product_description'] ?></td>
          <td><?php echo strtoupper($resReleasedStocks['reserve_size']) ?></td>
          <td><?php echo $resReleasedStocks['reserve_quantity'] ?></td>
          <td><?php echo $resReleasedStocks['status'] ?></td>
          <td width="16%" class="text-center"><?php echo $resReleasedStocks['created_at'] ?></td>
          <td width="16%" class="text-center"><?php echo $resReleasedStocks['released_by'] ?></td>
          <td width="16%" class="text-center"><?php echo $resReleasedStocks['updated_at'] ?></td>
        </tr>
        <?php
      }
      ?>
  </tbody>
</table>
</div>