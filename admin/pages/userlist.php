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
      while($resUsers = $selectUser->fetch()){
        ?>
        <tr>
          <td><?php echo $i++ ?></td>
          <td><?php echo $resUsers['fname'] ?></td>
          <td><?php echo $resUsers['mname'] ?></td>
          <td><?php echo $resUsers['lname'] ?></td>
          <td><?php echo $resUsers['namesuffix'] ?></td>
          <td width="10%" class="text-center">
            <a href="deleteUser.php?user=<?php echo $resUsers['account_id'] ?>" class="btn btn-danger">Delete</a>
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
            <option value="User">User</option>
            <option value="Administrator">Administrator</option>
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
