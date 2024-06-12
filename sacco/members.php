<?php include 'db_connect.php' ?>

<div class="container-fluid">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<large class="card-title">
					<b>Members List</b>
				</large>
				<button class="btn btn-primary col-md-2 float-right" type="button" id="new_member"><i class="fa fa-plus"></i> New Member</button>
			</div>
			<div class="card-body">
				<table class="table table-bordered" id=member-list">
					<colgroup>
						<col width="10%">
						<col width="35%">
						<col width="30%">
						<col width="15%">
						<col width="10%">
					</colgroup>
					<thead>
						<tr>
							<th class="text-center">#</th>
							<th class="text-center">Member</th>
							<th class="text-center">Loan</th>
							<th class="text-center">Status</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i = 1;
							$qry = $conn->query("SELECT * FROM members order by id desc");
							while($row = $qry->fetch_assoc()):

						 ?>
						 <tr>
						 	
						 	<td class="text-center"><?php echo $i++ ?></td>
						 	<td>
						 		<p>Name :<b><?php echo ucwords($row['lastname'].", ".$row['firstname'].' '.$row['middlename']) ?></b></p>
						 		<p>ID no. :<b><?php echo $row['identification_number'] ?></b></p>
						 		<p>Contact # :<b><?php echo $row['contact_number'] ?></b></p>
						 		<p>Email :<b><?php echo $row['email'] ?></b></p>
						 		
						 		
						 	</td>
						 	<td class="">None</td>
						 	<td class="">N/A</td>
						 	<td class="text-center">
						 			<button class="btn btn-primary edit_member" type="button" data-id="<?php echo $row['id'] ?>"><i class="fa fa-edit"></i></button>
						 			<button class="btn btn-danger delete_member" type="button" data-id="<?php echo $row['id'] ?>"><i class="fa fa-trash"></i></button>
						 	</td>

						 </tr>

						<?php endwhile; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<style>
	td p {
		margin:unset;
	}
	td img {
	    width: 8vw;
	    height: 12vh;
	}
	td{
		vertical-align: middle !important;
	}
</style>	
<script>
	$('#member-list').dataTable()
	$('#new_member').click(function(){
		uni_modal("New member","manage_member.php",'mid-large')
	})
	$('.edit_member').click(function(){
		uni_modal("Edit member","manage_member.php?id="+$(this).attr('data-id'),'mid-large')
	})
	$('.delete_member').click(function(){
		_conf("Are you sure to delete this member?","delete_member",[$(this).attr('data-id')])
	})
function delete_member($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_member',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("member successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>