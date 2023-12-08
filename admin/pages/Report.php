  <form action="index.php?page=Report" class="w-100 mb-3" method="POST">
    <div class="row m-0">
      <div class="col">
        <label>Date Released:</label>
        <input type="date" name="date" class="form-control">
      </div>
      <div class="col">
        <label>By Department:</label>
        <select name="college" class="form-select">
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
      <div class="col">
        <label>Section:</label>
        <input type="text" name="section" class="form-control">
      </div>
      <div class="col">
        <label>Status:</label>
        <input type="text" name="status" class="form-control">
      </div>
      <div class="col">
        <button type="submit" class="btn btn-primary mt-4">Apply Filter</button>
        <button type="submit" class="btn btn-secondary mt-4 ms-3">Clear Filter</button>
      </div>
    </div>
  </div>
</form>
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
        <th scope="col">Total Released Quantity</th>
        <th scope="col">Total Pending Quantity</th>
        <th scope="col">Total Available Current Quantity</th>
        <th scope="col">Status</th>
        <th scope="col">Reservation Date</th>
        <th scope="col">Released By</th>
        <th scope="col">Released Date</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      $i= 1;
      $date = $_POST['date'] ?? '';
      $college = $_POST['college'] ?? '';
      $section = $_POST['section'] ?? '';
      $status = $_POST['status'] ?? '';
      $selectReportStocks= "";
      if(!empty($date)){
        $selectReportStocks = $pdo->query("SELECT rsv.college_course
          , rsv.student_number
          , rsv.student_yr
          ,rsv.student_section
          , rsv.status
          , rsv.created_at
          , rsv.reserve_size
          , p.product_description
          , p.product_code
          , rsv.reserve_quantity
          , rsv.released_by
          , rsv.updated_at
          , rsv.student_lname
          , rsv.student_fname
          , rsv.student_mname
          , rsv.student_namesuffix
          , p.product_id FROM reservation as rsv 
          LEFT JOIN product_list as p ON p.product_code = rsv.product_id
          WHERE rsv.is_released = 1 AND DATE(rsv.updated_at)=DATE('$date') ORDER BY rsv.updated_at ASC");
      }elseif(!empty($college)){
        $selectReportStocks = $pdo->query("SELECT rsv.college_course
          , rsv.student_number
          , rsv.student_yr
          ,rsv.student_section
          , rsv.status
          , rsv.created_at
          , rsv.reserve_size
          , p.product_description
          , p.product_code
          , rsv.reserve_quantity
          , rsv.released_by
          , rsv.updated_at
          , rsv.student_lname
          , rsv.student_fname
          , rsv.student_mname
          , rsv.student_namesuffix
          , p.product_id FROM reservation as rsv 
          LEFT JOIN product_list as p ON p.product_code = rsv.product_id
          WHERE rsv.is_released = 1 AND rsv.college_course='$college' ORDER BY rsv.rsv_id ASC");
      }elseif(!empty($section)){
        $selectReportStocks = $pdo->query("SELECT rsv.college_course
          , rsv.student_number
          , rsv.student_yr
          ,rsv.student_section
          , rsv.status
          , rsv.created_at
          , rsv.reserve_size
          , p.product_description
          , p.product_code
          , rsv.reserve_quantity
          , rsv.released_by
          , rsv.updated_at
          , rsv.student_lname
          , rsv.student_fname
          , rsv.student_mname
          , rsv.student_namesuffix
          , p.product_id FROM reservation as rsv 
          LEFT JOIN product_list as p ON p.product_code = rsv.product_id
          WHERE rsv.is_released = 1 AND rsv.student_section='$section' ORDER BY rsv.rsv_id ASC");
      }elseif(!empty($status)){
        if(strtolower($status) == "pending"){
          $status = '0';
        }elseif((strtolower($status) == "released")){
          $status = '1';
        }else{

        }
        $selectReportStocks = $pdo->query("SELECT rsv.college_course
          , rsv.student_number
          , rsv.student_yr
          ,rsv.student_section
          , rsv.status
          , rsv.created_at
          , rsv.reserve_size
          , p.product_description
          , p.product_code
          , rsv.reserve_quantity
          , rsv.released_by
          , rsv.updated_at
          , rsv.student_lname
          , rsv.student_fname
          , rsv.student_mname
          , rsv.student_namesuffix
          , p.product_id FROM reservation as rsv 
          LEFT JOIN product_list as p ON p.product_code = rsv.product_id
          WHERE rsv.is_released = '$status' ORDER BY rsv.rsv_id ASC");
      }else{
         $selectReportStocks = $pdo->query("SELECT rsv.college_course
          , rsv.student_number
          , rsv.student_yr
          ,rsv.student_section
          , rsv.status
          , rsv.created_at
          , rsv.reserve_size
          , p.product_description
          , p.product_code
          , rsv.reserve_quantity
          , rsv.released_by
          , rsv.updated_at
          , rsv.student_lname
          , rsv.student_fname
          , rsv.student_mname
          , rsv.student_namesuffix
          , p.product_id FROM reservation as rsv 
          LEFT JOIN product_list as p ON p.product_code = rsv.product_id
          WHERE rsv.is_released = 1 ORDER BY rsv.rsv_id ASC");
      }
      $countRow = $selectReportStocks->rowCount();
      if($countRow >= 1){
      while($resReportStocks = $selectReportStocks->fetch()){
        ?>
        <tr>
          <td><?php echo $i++ ?></td>
          <td width="27%"><?php echo $resReportStocks['student_number'] ?></td>
          <td width="27%"><?php echo $resReportStocks['student_fname'] ?></td>
          <td width="27%"><?php echo $resReportStocks['student_mname'] ?></td>
          <td width="27%"><?php echo $resReportStocks['student_lname'] ?></td>
          <td width="27%"><?php echo $resReportStocks['student_namesuffix'] ?></td>
          <td><?php echo $resReportStocks['college_course'] ?></td>
          <td><?php echo $resReportStocks['student_yr'] ?></td>
          <td><?php echo $resReportStocks['student_section'] ?></td>
          <td><?php echo $resReportStocks['product_description'] ?></td>
          <td><?php echo strtoupper($resReportStocks['reserve_size']) ?></td>
          <td><?php echo $resReportStocks['reserve_quantity'] ?></td>
          <td><?php echo $resReportStocks['status'] ?></td>
          <td width="16%" class="text-center"><?php echo $resReportStocks['created_at'] ?></td>
          <td width="16%" class="text-center"><?php echo $resReportStocks['released_by'] ?></td>
          <td width="16%" class="text-center"><?php echo $resReportStocks['updated_at'] ?></td>
        </tr>
        <?php
      }
    }else{
      echo "asdfaposdf";
    
    }
        ?>
    </tbody>
  </table>
</div>