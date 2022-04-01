<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>




<!-- Add New -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4>จองการประชุม</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<center>
					<h4 class="modal-title" id="myModalLabel"></h4>
				</center>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<form method="POST" action="addmeet_model.php" enctype="multipart/form-data">
						<div class="row">
							<div class="col-lg-4">
								<label class="control-label" style="position:relative; top:7px;">วาระประชุม:</label>
							</div>
							<div class="col-lg-8">
								<input type="text" class="form-control" name="title">
							</div>
						</div>

						<div style="height:10px;"></div>
						<div class="row">
							<div class="col-lg-4">
								<label class="control-label" style="position:relative; top:7px;">ประธานการประชุม:</label>
							</div>
							<div class="col-lg-8">
								<select class="form-control" id="head" name="head">
									<option>นายกเทศมนตรี </option>
									<option>รองนายกเทศมนตรี1</option>
									<option>รองนายกเทศมนตรี2</option>
									<option>รองนายกเทศมนตรี3</option>
								</select>
							</div>
						</div>
						<div style="height:10px;"></div>
						<div class="row">
							<div class="col-lg-4">
								<label class="control-label" style="position:relative; top:7px;">จำนวนผู้เข้าประชุม:</label>
							</div>
							<div class="col-lg-8">
								<input type="text" class="form-control" name="numattend">
							</div>
						</div>
						<div style="height:10px;"></div>
						<div class="row">
							<div class="col-lg-4">
								<label class="control-label" style="position:relative; top:7px;">ผู้เข้าร่วมประชุม:</label>
							</div>
							<div class="col-lg-8">
								<input type="text" class="form-control" name="listname">
							</div>
						</div>

						<div style="height:10px;"></div>
						<div class="row">
							<div class="col-lg-4">
								<label class="control-label" style="position:relative; top:7px;">ห้องประชุม:</label>
							</div>
							<div class="col-lg-8">
								<select class="form-control" id="roomid" name="roomid">
									<?php
									include('conn.php');
									$query = mysqli_query($conn, "select * from room");
									while ($row = mysqli_fetch_array($query)) {
									?>
										<option value="<?php echo $row['roomid']; ?>"><?php echo $row['roomname']; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div style="height:10px;"></div>
						<div class="row">
							<div class="col-lg-4">
								<label class="control-label" style="position:relative; top:7px;">เริ่มเวลา:</label>
							</div>
							<div class="col-lg-8">
								<input type="datetime-local" class="form-control" name="start">
							</div>
						</div>
						<div style="height:10px;"></div>
						<div class="row">
							<div class="col-lg-4">
								<label class="control-label" style="position:relative; top:7px;">สิ้นสุดเวลา:</label>
							</div>
							<div class="col-lg-8">
								<input type="datetime-local" class="form-control" name="end">
							</div>
						</div>
						<div style="height:10px;"></div>						
						<div class="row">
							<div class="col-lg-4">
								<label class="control-label" style="position:relative; top:7px;">อุปกรณ์เพิ่มเติม:</label>
							</div>
							<div class="col-lg-8">
								<input type="text" class="form-control" name="addequipment">
							</div>
						</div>
						<div style="height:10px;"></div>
						<div class="row">
							<div class="col-lg-4">
								<label class="control-label" style="position:relative; top:7px;">หมายเหตุ:</label>
							</div>
							<div class="col-lg-8">
								<textarea type="text" class="form-control" name="remark"></textarea>
							</div>
						</div>
						<div style="height:10px;"></div>
						<div class="row">
							<div class="col-lg-4">
								<label class="control-label" style="position:relative; top:7px;">ไฟล์วาระประชุม:</label>
							</div>
							<div class="col-lg-8">
								<input type="file" class="form-control" name="meetfile">
							</div>
						</div>
						<div style="height:10px;"></div>
						<div class="row">
							<div class="col-lg-4">
								<label class="control-label" style="position:relative; top:7px;">สี:</label>
							</div>
							<div class="col-lg-8">
								<input type="color" class="form-control" name="color">
							</div>
						</div>
						<div style="height:10px;"></div>
						<div class="row">
							<div class="col-lg-4">
								<label class="control-label" style="position:relative; top:7px;">ผู้จองประชุม:</label>
							</div>
							<div class="col-lg-8">
								<?php
								include('conn.php');
								$userrequest = $_SESSION['user'];
								$queryuser = mysqli_query($conn, "select * from user where username='$userrequest'");
								while ($row = mysqli_fetch_array($queryuser)) {
								?>
									<div class="col-lg-10">
									<?php echo $row['username'];
								} ?>
									</div>
							</div>
						</div>


				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
				<button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a>
					</form>
			</div>

		</div>
	</div>
</div>