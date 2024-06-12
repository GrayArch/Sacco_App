<?php 
include('db_connect.php');
if(isset($_GET['id'])){
    $qry = $conn->query("SELECT * FROM members where id = ".$_GET['id']);
    foreach($qry->fetch_array() as $k => $v){
        $$k = $v;
    }
}
?>
<div class="container-fluid">
    <div class="col-lg-12">
        <form action="" id="manage-member" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : '' ?>">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="<?php echo isset($name) ? $name : '' ?>" required>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control" value="<?php echo isset($username) ? $username : '' ?>" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" value="<?php echo isset($password) ? $password : '' ?>" required>
            </div>
            <div class="form-group">
                <label for="type">User Type</label>
                <select name="type" id="type" class="custom-select">
                    <option value="1" <?php echo isset($type) && $type == 1 ? 'selected' : '' ?>>Admin</option>
                    <option value="2" <?php echo isset($type) && $type == 2 ? 'selected' : '' ?>>Staff</option>
                    <option value="3" <?php echo isset($type) && $type == 3 ? 'selected' : '' ?>>Member</option> <!-- New Option for Member -->
                </select>
            </div>
            <!-- Profile Picture -->
            <div class="form-group">
                <label for="profile_picture">Profile Picture</label>
                <input type="file" name="profile_picture" id="profile_picture" class="form-control-file">
            </div>
            <!-- Identification Number -->
            <div class="form-group">
    <label for="identification_number">Identification Number</label>
    <input type="text" name="identification_number" id="identification_number" class="form-control" value="<?php echo isset($identification_number) ? $identification_number : '' ?>" pattern="\d{8}" title="Please enter 8 digits">
    <small class="text-muted">Please enter exactly 8 digits.</small>
</div>

            <!-- Identification Card Front Side -->
            <div class="form-group">
                <label for="id_card_front">ID Card Front</label>
                <input type="file" name="id_card_front" id="id_card_front" class="form-control-file">
            </div>
            <!-- Identification Card Back Side -->
            <div class="form-group">
                <label for="id_card_back">ID Card Back</label>
                <input type="file" name="id_card_back" id="id_card_back" class="form-control-file">
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Save</button>
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            </div>
        </form>
    </div>
</div>

<script>
    $('#manage-member').submit(function(e){
        e.preventDefault();
        start_load();
        $.ajax({
            url:'ajax.php?action=save_member',
            method:'POST',
            data: new FormData(this),
            contentType: false,
            processData: false,
            success:function(resp){
                if(resp == 1){
                    alert_toast("Member data successfully saved.","success");
                    setTimeout(function(){
                        location.reload();
                    },1500);
                }
            }
        });
    });
</script>
