<div class="w-50 mx-auto pt-3">
  <div class="text-end">
    <button class="btn btn-primary my-2" data-bs-toggle="modal" data-bs-target="#addProductModal">Add New Product</button>
  </div>
  <table class="table table-bordered">
  <thead class="table-dark">
    <tr>
      <th scope="col" width="2%">#</th>
      <th scope="col">Description</th>
      <th scope="col">Department</th>
      <th scope="col">Size</th>
      <th scope="col">Current Quantity</th>
      <th>Action</th>
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
        <td width="20%" class="text-center"><a href="printqr.php?id=<?php echo $resProduct['product_code'].'&description='.$resProduct['product_description'] ?>" class="btn btn-secondary" target="_blank"><i class="fa fa-qrcode me-2"></i>QRCODE</a></td>
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
        <div class="form-group">
          <label>Product Name:</label>
          <input type="text" name="pname" class="form-control">
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
          <input type="text" name="department" class="form-control">
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
