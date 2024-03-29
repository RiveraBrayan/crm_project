<?php
    $id_user = isset($_GET['edition']) && $_GET['edition'] != '' ? $_GET['edition'] : '';
    $tittle = isset($_GET['edition']) && $_GET['edition'] != '' ? 'Edit User Info' : 'Create User Info';
?>

<div class="row">
    <h4><?php echo $tittle ?> </h4>
    <form method="post" id="form" class="needs-validation" novalidate autocomplete="off" enctype="multipart/form-data">
        <div class="row">
            <input type="hidden" id="txtId" value="<?php echo $id_user ?>">

            <div class="col-md-6">
                <div class="input-group input-group-static mb-4">
                    <label>Username</label>
                    <input type="text" class="form-control" id="txtUsername" value="" data-parsley-required="true">
                </div>
            </div>

            <div class="col-md-6" id="inputPassword" style="display:none">
                <div class="input-group input-group-static mb-4">
                    <label>Password</label>
                    <input type="text" class="form-control" id="txtPassword" <?php echo  $id_user == '' ? 'data-parsley-required="true"' : '' ?>>
                </div>
            </div>

            <div class="col-md-6">
                <div class="input-group input-group-static mb-4">
                    <label>Full Name</label>
                    <input type="text" class="form-control" id="txtFullname" value="" data-parsley-required="true">
                </div>
            </div>

            <div class="col-md-6">
                <div class="input-group input-group-static mb-4"> 
                    <label>Email</label>
                    <input type="email" class="form-control" id="txtEmail" value="" data-parsley-type="email" data-parsley-required="true">
                </div>
            </div>

            <div class="col-md-6">
                <div class="input-group input-group-static mb-4">
                    <label>Phone</label>
                    <input type="text" class="form-control" id="txtPhone" value="" data-parsley-pattern="^\d{10}$" data-parsley-pattern-message="Please enter a valid 10-digit phone number" data-parsley-required="true">
                </div>
            </div>

            <div class="col-md-6">
                <div class="input-group input-group-static mb-4">
                    <label>Deparment</label>
                    <input type="text" class="form-control" id="txtDeparment" value="" data-parsley-required="true">
                </div>
            </div>

            <div class="col-md-6">
                <div class="input-group input-group-static mb-4">
                    <label>Position</label>
                    <input type="text" class="form-control" id="txtPosition" value="" data-parsley-required="true">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="checkboxSuperSu">
                    <label class="form-check-label" for="checkboxSuperSu">Is SuperUs?</label>
                </div>
            </div>

            <div class="col-md-6" id="inputCheckbox" style="display:none">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="checkboxActive">
                    <label class="form-check-label" for="checkboxActive">Is Active?</label>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-info userSubmit">Save</button>
                <a type="button" href="users" class="btn btn-danger ml-2" style="color: white;">Cancel</a>
            </div>


        </div>
    </form>
</div>
