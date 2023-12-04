
<div class="p-3 mx-auto col-lg-6 col-md-8 col-sm-1">
	<canvas hidden="" class="w-100" id="qr-canvas"></canvas>
	<div class="d-flex align-items-center justify-content-center">
		<div class="row text-center">
			<a id="btn-scan-qr"><img src="qrscan.JPG"><br>Start Scann</a>
		</div>
	</div><br>


	<form>
		<div id="qr-result" hidden class="text-center">
		<textarea name="data" class="border-dark w-25 text-center mx-auto form-control" style="height: 30px;" id="outputData" readonly hidden></textarea><br>
		<div class="form-group">
			<label>Quantity:</label>
		<input type="number" name="qty_product" class="form-control w-25 mx-auto" id="productQuantity">
		</div>
		<div class="form-group mt-3">
			<label>Transaction:</label><br>
			<button type="button" class="btn btn-outline-primary w-25 stockBtn" value="stockin">Stock-In</button>
			<button type="button" class="btn btn-outline-success w-25 stockBtn" value="stockout">Stock-Out</button>
		</div>
	</div>
	</form>
</div>

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://rawgit.com/sitepoint-editors/jsqrcode/master/src/qr_packed.js"></script>
  <script src="src/qrCodeScanner.js"></script>