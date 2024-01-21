<?php 
//Notifikasi kalau ada inpu error
	echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i>','</div>');
    
	//Form Open 
    echo form_open(base_url('user/update/'.$user->id_user));
    
?>

<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
            <div class="form-group">
            <label>Nama User</label>
            <input type="text" name="nama" class="form-control" placeholder="Nama User" value="<?php echo $user->nama ?>" required>
        </div>
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $user->username ?>" required>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="text" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password') ?>">
        </div>                       
    </div>
    <div class="col-md-3"></div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group text-center">
            <input type="submit" name="submit" class="btn btn-success" value="Update Data">
            <a href="<?php echo base_url('user') ?> " class="btn btn-default"> Back</a>
        </div>
    </div>
</div>
<?php 
	//Form Close
	echo form_close();
?>