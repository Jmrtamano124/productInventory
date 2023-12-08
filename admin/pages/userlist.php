<div class="w-75 mx-auto pt-3">
  <div class="text-end">
    <button class="btn btn-primary my-2" data-bs-toggle="modal" data-bs-target="#addUserModal">Add New User</button>
  </div>
  <table class="table table-bordered">
  <thead class="table-dark">
    <tr>
      <th scope="col" width="2%">#</th>
      <th scope="col">First Name</th>
      <th scope="col">Middle Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Suffix</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      <?php 
      $i= 1;
      foreach($resUser as $resUsers){
        ?>
        <tr>
          <input type="hidden" class="accountId" value="<?php echo $resUsers['account_id'] ?>">
          <td><?php echo $i++ ?></td>
          <td><input type="text" class="border-0 form-control bg-transparent fname" readonly value="<?php echo $resUsers['fname'] ?>"></td>
          <td><input type="text" class="border-0 form-control bg-transparent mname" readonly value="<?php echo $resUsers['mname'] ?>"></td>
          <td><input type="text" class="border-0 form-control bg-transparent lname" readonly value="<?php echo $resUsers['lname'] ?>"></td>
          <td><input type="text" class="border-0 form-control bg-transparent namesuffix" readonly value="<?php echo $resUsers['namesuffix'] ?>"></td>
          <td width="10%" class="text-center">
            <button type="button" value="<?php echo $resUsers['account_id'] ?>" class="btn btn-warning editUserBtn" data-bs-toggle="modal" data-bs-target="#updateUserModal"><i class="fa fa-pencil"></i></button>
            <a href="deleteUser.php?user=<?php echo $resUsers['account_id'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
          </td>
        </tr>
        <?php
      }
      ?>
  </tbody>
</table>
</div>

<form action="addUser.php" method="POST">
  <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add New User</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>First Name:</label>
          <input type="text" name="fname" class="form-control">
        </div>
        <div class="form-group">
          <label>Middle Name:</label>
          <input type="text" name="mname" class="form-control">
        </div>
        <div class="form-group">
          <label>last Name:</label>
          <input type="text" name="lname" class="form-control">
        </div>
        <div class="form-group">
          <label>Suffix:</label>
          <input type="text" name="suffix" class="form-control">
        </div>
        <div class="form-group">
          <label>Username:</label>
          <input type="text" name="username" class="form-control">
        </div>
        <div class="form-group">
          <label>password:</label>
          <input type="text" name="password" class="form-control" id="generatePassword" readonly>
        </div>
        <div class="form-group">
          <label>Access:</label>
          <select class="form-select" name="accesstype">
            <option selected disabled>Select Access type</option>
            <option value="user">User</option>
            <option value="administrator">Administrator</option>
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



<form action="updateUser.php" method="POST">
  <div class="modal fade" id="updateUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Update User</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <input type="hidden" name="update_accId" class="form-control" id="displayAccId">
          <label>First Name:</label>
          <input type="text" name="update_fname" class="form-control" id="displayFname">
        </div>
        <div class="form-group">
          <label>Middle Name:</label>
          <input type="text" name="update_mname" class="form-control" id="displayMname">
        </div>
        <div class="form-group">
          <label>last Name:</label>
          <input type="text" name="update_lname" class="form-control" id="displayLname">
        </div>
        <div class="form-group">
          <label>Suffix:</label>
          <input type="text" name="update_suffix" class="form-control" id="displaySuffix">
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