<!-- Delete -->
<div class="modal fade" id="del<?php echo $row['roomid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4>Delete</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<center>
					<h4 class="modal-title" id="myModalLabel"></h4>
				</center>
			</div>
			<div class="modal-body">
				<?php
				$del = mysqli_query($conn, "select * from room where roomid='" . $row['roomid'] . "'");
				$drow = mysqli_fetch_array($del);
				?>
				<div class="container-fluid">
					<h5>
						<center>roomname: <strong><?php echo $drow['roomname']; ?></strong></center>
					</h5>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
				<a href="deleteroom.php?roomid=<?php echo $row['roomid']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
			</div>

		</div>
	</div>
</div>
<!-- /.modal -->

<!-- Edit -->
<div class="modal fade" id="edit<?php echo $row['roomid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4>แก้ไขห้องประชุม</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<center>
					<h4 class="modal-title" id="myModalLabel"></h4>
				</center>
			</div>
			<div class="modal-body">
				<?php
				$edit = mysqli_query($conn, "select * from room where roomid='" . $row['roomid'] . "'");
				$erow = mysqli_fetch_array($edit);
				?>
				<div class="container-fluid">
					<form method="POST" action="editroom.php?roomid=<?php echo $erow['roomid']; ?>">
						<div class="row">
							<div class="col-lg-3">
								<label style="position:relative; top:7px;">ชื่อห้อง:</label>
							</div>
							<div class="col-lg-9">
								<input type="text" name="roomname" class="form-control" value="<?php echo $erow['roomname']; ?>">
							</div>
						</div>
						<div style="height:10px;"></div>
						<div class="row">
							<div class="col-lg-3">
								<label style="position:relative; top:7px;">สถานที่:</label>
							</div>
							<div class="col-lg-9">
								<input type="text" name="location" class="form-control" value="<?php echo $erow['location']; ?>">
							</div>
						</div>
						<div style="height:10px;"></div>
						<div class="row">
							<div class="col-lg-3">
								<label style="position:relative; top:7px;">ความจุ:</label>
							</div>
							<div class="col-lg-9">
								<input type="text" name="capacity" class="form-control" value="<?php echo $erow['capacity']; ?>">
							</div>
						</div>
						<div style="height:10px;"></div>
						<div class="row">
							<div class="col-lg-3">
								<label style="position:relative; top:7px;">โปรเจคเตอร์:</label>
							</div>
							<div class="col-lg-9">
								<input type="text" name="projector" class="form-control" value="<?php echo $erow['projector']; ?>">
							</div>
						</div>
						<div style="height:10px;"></div>
						<div class="row">
							<div class="col-lg-3">
								<label style="position:relative; top:7px;">จำนวนไมค์:</label>
							</div>
							<div class="col-lg-9">
								<input type="text" name="microphone" class="form-control" value="<?php echo $erow['microphone']; ?>">
							</div>
						</div>
						<div style="height:10px;"></div>
						<div class="row">
							<div class="col-lg-3">
								<label style="position:relative; top:7px;">อื่นๆ:</label>
							</div>
							<div class="col-lg-9">
								<input type="text" name="others" class="form-control" value="<?php echo $erow['others']; ?>">
							</div>
						</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
				<button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-check"></span> Save</button>
			</div>
			</form>
		</div>
	</div>
</div>
<!-- /.modal -->