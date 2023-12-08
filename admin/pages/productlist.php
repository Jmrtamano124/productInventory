<div class="w-75 mx-auto pt-3">
  <div class="text-end">
    <?php 
    if($_SESSION['access'] =='user'){
      ?>

      <?php
    }else{
      ?>
<button class="btn btn-primary my-2" data-bs-toggle="modal" data-bs-target="#addProductModal">Add New Product</button>
      <?php
    }
    ?>
  </div>
  <table class="table table-bordered">
  <thead class="table-dark">
    <tr>
      <th scope="col" width="2%">#</th>
      <th scope="col">Description</th>
      <th scope="col">Department</th>
      <th scope="col">Size</th>
      <th scope="col">Current Quantity</th>
      <?php 
      if($_SESSION['access'] == 'user'){

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
    $i=1;
    while($resProduct = $selectProduct->fetch()){
      ?>
      <tr>
        <td><?php echo $i++ ?></td>
        <td><?php echo $resProduct['product_description'] ?></td>
        <td><?php echo $resProduct['department'] ?></td>
        <td><?php echo strtoupper($resProduct['product_size']) ?></td>
        <td width="17%" class="text-center"><?php echo $resProduct['quantity'] ?></td>
        <?php 
if($_SESSION['access']=='user'){
  ?>

  <?php
}else{
  ?>
  <td width="20%" class="text-center"><a href="printqr.php?id=<?php echo $resProduct['product_code'].'&description='.$resProduct['product_description'] ?>" class="btn btn-secondary" target="_blank"><i class="fa fa-qrcode me-2"></i>QRCODE</a></td>
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

<!-- Modal -->
<form action="addProduct.php" method="POST">
  <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Product</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Product Code:</label>
          <input type="text" name="pcode" class="form-control" id="displayProductCode" readonly>
        </div>
        <div class="form-group my-2">
          <label>Product Name:</label>
          <input type="radio" name="pname" class="form-check-input" value="PE Uniform" id="pe"><label for="pe">PE Uniform</label>
          <input type="radio" name="pname" class="form-check-input" value="Scrub Suit" id="scrubsuit"><label for="scrubsuit">Scrub Suit</label>          
        </div>
        <div class="form-group">
          <label>Quantity:</label>
          <input type="text" name="pquantity" class="form-control">
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
        <div class="form-group">
          <label>Department</label>
          <select class="form-select" name="department">
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
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</form>
