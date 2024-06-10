<div class="container-fluid">
    <form action="" id="manage-user" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo isset($meta['id']) ? $meta['id']: '' ?>">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="<?php echo isset($meta['name']) ? $meta['name']: '' ?>" required>
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control" value="<?php echo isset($meta['username']) ? $meta['username']: '' ?>" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" value="<?php echo isset($meta['password']) ? $meta['password']: '' ?>" required>
        </div>
        <div class="form-group">
            <label for="type">User Type</label>
            <select name="type" id="type" class="custom-select">
                <option value="1" <?php echo isset($meta['type']) && $meta['type'] == 1 ? 'selected': '' ?>>Admin</option>
                <option value="2" <?php echo isset($meta['type']) && $meta['type'] == 2 ? 'selected': '' ?>>Staff</option>
                <option value="3" <?php echo isset($meta['type']) && $meta['type'] == 3 ? 'selected': '' ?>>Member</option> <!-- New Option for Member -->
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
            <input type="text" name="identification_number" id="identification_number" class="form-control" value="<?php echo isset($meta['identification_number']) ? $meta['identification_number']: '' ?>">
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
    </form>
</div>
