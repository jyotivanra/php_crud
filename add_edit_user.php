<?php
    include_once('inc/user.inc.php');
    include_once('layout/header.php');

    if (isset($_GET['success']) && $_GET['success']!='') {
    ?>
        <div class="alert alert-success" role="alert">
        <?php echo $_GET['success']; ?>
        </div>
    <?php   
    }
     

?>

    
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><b><u><i>ADD NEW USER</b></u></i>
    <a class="btn btn-primary float-right" href="user.php"><b><u><i>BACK</b></u></i></a>
</h1>
 <?php 
    if(isset($_GET['errors']) && $_GET['errors']!="") {
        $errors = explode(",", $_GET['errors']);
        if(is_array($errors) && !empty($errors)) {
            foreach ($errors as $error) {
                ?>
                    <div class="alert alert-danger" role="alert"><?php echo $error; ?></div>
                <?php
            }
        }
    }
    if(isset($_GET['success']) && $_GET['success']!="") {
        $errors = explode(",", $_GET['success']);
        if(is_array($success) && !empty($success)) {
            foreach ($success as $success) {
                ?>
                    <div class="alert alert-danger" role="alert"><?php echo $data; ?></div>
                <?php
            }
        }
    }
    ?> 
      


<form action="<?php site_url("add_edit_user.php"); ?>" method="post">
    <div class="row">
        <!-- Fields -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                <b><u><i>USER DETAILS</b></u></i>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="first_name"><b><u><i>First Name*</b></u></i></label>
                           
                            <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo (isset($result['first_name']) && $result['first_name']!='' ? $result['first_name'] : '') ?>" >
                         </div>

                        <div class="form-group col-md-6">
                            <label for="last_name"><b><u><i>Last Name*</b></u></i></label>
                            <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo (isset($result['last_name']) && $result['last_name']!='' ? $result['last_name'] : '') ?>">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="email"><b><u><i>Email*</b></u></i></label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo (isset($result['email']) && $result['email']!='' ? $result['email'] : '') ?>">
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="phone_number"><b><u><i>Phone Number*</b></u></i></label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?php echo (isset($result['phone_number']) && $result['phone_number']!='' ? $result['phone_number'] : '') ?>">
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="age"><b><u><i>Age*</b></u></i></label>
                                <input type="number" class="form-control" id="age" name="age" value="<?php echo (isset($result['age']) && $result['age']!='' ? $result['age'] : '') ?>">
                            </div>
                            <div>
                                <label class="w-100"><b><u><i>Status*</b></u></i></label>
                                <div class="form-check form-check-inline">
                                    <input <?php echo (isset($result['status']) && $result['status']==1 ? "checked=checked" : '') ?>class="form-check-input" type="radio" name="status" id="status_1" value="1">
                                    <label class="form-check-label" for="status_1">Enable</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input <?php echo (isset($result['status']) && $result['status']==0 ? "checked=checked" : '') ?> class="form-check-input" type="radio" name="status" id="status_0" value="0">
                                    <label class="form-check-label" for="status_0">Disable</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="address"><b><u><i>Address*</b></u></i></label>
                            <textarea name="address" id="address" rows="4" class="form-control"><?php echo (isset($result['address']) && $result['address']!='' ? $result['address'] : '') ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- EOF Fields -->
        <!-- Action -->
        <div class="col-md-3">
        <div class="card">
                <div class="card-header">
                    <u>ACTION</u>
                </div>
                <div class="card-body">
                    <button type="submit"  class="btn btn-primary"><u>SAVE</u></button>
                    <button type="reset" class="btn btn-secondary"><u>CLEAR</u></button>
                    <button type="reset" class="btn btn-danger"><u>DELETE</u></button>
                  
                </div>
            </div>
        </div>
        <!-- EOF Action -->
    </div>
    
    <input type="hidden" name="action" value="<?php echo (isset($_GET['action']) && $_GET['action']=="add") ? "add" : "edit" ?>">
    <input type="hidden" name="user_id" value="<?php echo (isset($_GET['user_id']) && $_GET['user_id']!='') ? $_GET['user_id'] : "" ?>">
</form>

<?php
    include_once('layout/footer.php');
?>