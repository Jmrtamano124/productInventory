<div class="w-75 mx-auto pt-3">
  <div class="text-end my-2">
    <button class="btn btn-primary px-2" data-bs-toggle="modal" data-bs-target="#addReservationModal">Add Reservation</button>
  </div>
  <table class="table table-bordered">
    <thead class="table-dark">
      <tr class="text-center">
        <th scope="col" width="2%">#</th>
        <th scope="col">Student Name</th>
        <th scope="col">College</th>
        <th scope="col">Year & Section</th>
        <th scope="col">Status</th>
        <th scope="col">Reservation Date</th>
        <th>Action</th>
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
          <td><?php echo $resReservation['yr_section'] ?></td>
          <td><?php echo $resReservation['status'] ?></td>
          <td width="16%" class="text-center"><?php echo $resReservation['created_at'] ?></td>
          <td class="text-center"><a href="release.php?studentid=<?php echo $resReservation['account_id'].'&productid='.$resReservation['product_id'].'&size='.$resReservation['reserve_size'] ?>" class="btn btn-primary px-2">Release</a></td>
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
          <div class="form-group mb-2">
            <label>Product</label>
            <select class="form-select" name="product" id="reserveProduct">
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
          </div>
          <div class="form-group mb-2" id="reserveCourse">
            <label>College</label>
            <select class="form-select" name="college">
              <option selected disabled>Select College --</option>
              <option value="Nursing">Nursing</option>
              <option value="Dentistry">Dentistry</option>
              <option value="Medicine">Medicine</option>
              <option value="RadTech">RadTech</option>
            </select>
          </div>
          <div class="form-group mb-2">
            <label>Student Name:</label>
            <select class="form-select" name="studentId">
              <option selected disabled>Select Student -- </option>
              <?php 
              foreach($resUser as $resrvUser){
                ?>
                <option value="<?php echo $resrvUser['account_id'] ?>"><?php echo $resrvUser['studentFullname'] ?></option>
                <?php
              }
              ?>
            </select>
          </div>
          <div class="form-group mb-2" id="college2">
            <label>College</label>
            <input type="text" name="college2" class="form-control">
          </div>
          <div class="form-group mb-2">
            <label>Year & Section</label>
            <input type="text" name="yrsection" class="form-control">
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
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</form>
