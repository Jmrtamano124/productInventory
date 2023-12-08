



<div class="p-3 mx-auto col-lg-6 col-md-8 col-sm-1">
	<canvas hidden="" class="w-100" id="qr-canvas"></canvas>
	<div class="d-flex align-items-center justify-content-center">
		<div class="row text-center">
			<a id="btn-scan-qr"><img src="qrscan.JPG"><br>Start Scann</a>
		</div>
	</div><br>
	<form  action="stockout.php" method="POST">
		<div id="qr-result" hidden class="text-center">
			<textarea name="data" class="border-dark w-25 text-center mx-auto form-control" style="height: 30px;" id="outputData" readonly hidden></textarea><br>

			<?php 
			$type = $_GET['type'] ?? '';
			if($type == "stockout"){
				?>
				<div class="text-start w-75 mx-auto">
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
					<div class="form-group mt-3">
						<button type="submit" class="btn btn-outline-success w-100">Stock-Out</button>
					</div>
				</div>
				<?php
			}else{
				?>
				<div class="form-group">
					<label>Quantity:</label>
					<input type="number" name="qty_product" class="form-control w-25 mx-auto" id="productQuantity">
				</div>
				<div class="form-group mt-3">
					<button type="button" class="btn btn-outline-primary w-25 stockBtn" value="stockin">Stock-In</button>
					<!-- <button type="button" class="btn btn-outline-success w-25 stockBtn" value="stockout">Stock-Out</button> -->
				</div>
				<?php
			}
			?>
		</div>
	</form>
</div>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://rawgit.com/sitepoint-editors/jsqrcode/master/src/qr_packed.js"></script>
<script src="src/qrCodeScanner.js"></script>