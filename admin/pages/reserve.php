<div class="w-75 mx-auto pt-3">
  <div class="d-flex mb-2">
    <div class="me-auto my-2">
     <?php 
     if($_SESSION['access'] =='user'){

     }else{
      ?>
      <a href="index.php?page=QRCODE&type=stockout" class="btn btn-secondary px-2"> <i class="fa fa-qrcode me-2"></i>Scann QR</a>
      <?php
    }
    ?>
    </div>
    <div class="text-end my-2">
      <button class="btn btn-primary px-2" data-bs-toggle="modal" data-bs-target="#addReservationModal">Add Reservation</button>
  </div>
</div>
<table class="table table-bordered" id="reserveTable">
  <thead class="table-dark">
    <tr class="text-center">
      <th scope="col" width="2%">#</th>
      <th scope="col">Student Name</th>
      <th scope="col">College</th>
      <th scope="col">Year</th>
      <th scope="col">Section</th>
      <th scope="col">Reserved Product</th>
      <th scope="col">Size</th>
      <th scope="col">Quantity</th>
      <th scope="col">Status</th>
      <th scope="col">Reservation Date</th>
      <?php 
      if($_SESSION['access'] =='user'){

      }else{
        ?>
        <th>Action</th>
        <?php
      }
      ?>
    </tr>
  </thead>
  <tbody>
    <?php 
    $i= 1;
    while($resReservation = $selectReservation->fetch()){
      ?>
      <tr>
        <td><?php echo $i++ ?></td>
        <td><?php echo $resReservation['studentFullname'] ?></td>
        <td><?php echo $resReservation['college_course'] ?></td>
        <td><?php echo $resReservation['student_yr'] ?></td>
        <td><?php echo $resReservation['student_section'] ?></td>
        <td><?php echo $resReservation['product_description'] ?></td>
        <td><?php echo strtoupper($resReservation['reserve_size']) ?></td>
        <td><?php echo $resReservation['reserve_quantity'] ?></td>
        <td><?php echo $resReservation['status'] ?></td>
        <td width="16%" class="text-center"><?php echo $resReservation['created_at'] ?></td>
        <?php 
        if($_SESSION['access'] == 'user'){

        }else{
          ?>
          <td class="text-center"><a href="release.php?productid=<?php echo $resReservation['product_code'].'&size='.$resReservation['reserve_size'].'&q='.$resReservation['reserve_quantity'] ?>" class="btn btn-primary px-2">Release</a></td>
          <?php
        }
        ?>
      </tr>
      <?php
    }
    ?>
  </tbody>
</table>
</div>

<form action="reserveProduct.php" method="POST">
  <!-- Modal -->
  <div class="modal fade" id="addReservationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Reservation</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-group mb-2" >
            <label>College</label>
            <select class="form-select" name="college">
              <option selected disabled>Select College --</option>
              <?php 
              $slectDept= $pdo->query("SELECT * FROM department");
              while($resDept = $slectDept->fetch()){
                ?>
                <option value="<?php echo $resDept['deptName'] ?>"><?php echo $resDept['deptName'] ?></option>
                <?php
              }
              ?>
            </select>
          </div>
          <div class="form-group mb-2">
            <label>Student ID Number:</label>
            <input type="text" name="idnumber" class="form-control">
          </div>
          <div class="form-group mb-2">
            <label>Student First Name:</label>
            <input type="text" name="fname" class="form-control">
          </div>
          <div class="form-group mb-2">
            <label>Student Middle Name:</label>
            <input type="text" name="mname" class="form-control">
          </div>
          <div class="form-group mb-2">
            <label>Student Last Name:</label>
            <input type="text" name="lname" class="form-control">
          </div>
          <div class="form-group mb-2">
            <label>Student Suffix:</label>
            <input type="text" name="namesuffix" class="form-control">
          </div>
          <div class="form-group mb-2">
            <label>Year</label>
            <input type="text" name="studentYr" class="form-control">
          </div>
          <div class="form-group mb-2">
            <label>Section</label>
            <input type="text" name="studentSection" class="form-control">
          </div>
          <div class="form-group mb-2">
            <label>Product</label>
            <div class="float-end">
              <button type="button" class="btn btn-success" id="addproductBtn"><i class="fa fa-plus"></i></button>
            </div>
            <select class="form-select" name="product[]" id="reserveProduct">
              <option selected disabled>Select Product -- </option>
              <?php 
              $selectProduct = $pdo->query("SELECT * FROM product_list GROUP BY product_description");
              while($resProduct = $selectProduct->fetch()){
                ?>
                <option value="<?php echo $resProduct['product_description'] ?>"><?php echo $resProduct['product_description'] ?></option>
                <?php
              }
              ?>
            </select>
            <div id="displayAdditionalProduct"></div>
          </div>
          <div class="form-group">
            <label>Size:</label>
            <div class="d-flex">
              <div class="mx-1">
                <input type="radio" name="product_size" class="form-check-input" value="s" id="s"><label for="s">Small</label>
              </div>
              <div class="mx-1">
                <input type="radio" name="product_size" class="form-check-input" value="m" id="m"><label for="m">Medium</label>
              </div>
              <div class="mx-1">
                <input type="radio" name="product_size" class="form-check-input" value="l" id="l"><label for="l">Large</label>
              </div>
              <div class="mx-1">
                <input type="radio" name="product_size" class="form-check-input" value="xl" id="xl"><label for="xl">Extra-Large</label>
              </div>
              <div class="mx-1">
                <input type="radio" name="product_size" class="form-check-input" value="xxl" id="xxl"><label for="xxl">X-Extra-Large</label>
              </div>
            </div>
          </div>
          <div class="form-group mb-2">
            <label>Quantity:</label>
            <input type="text" name="reserve_quantity" class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</form>
