<?php

    if(isset($_GET['edition']) && $_GET['edition'] != ''){
        $id = $_GET['edition'];
        $tittle = "Edit Client";

    }else{
        $id = '';
        $tittle = "Add Client";

    }

?>
<!-- Prueba de edicion -->
<div class="row">
    <h4><?php echo $tittle ?> </h4>
    <form method="post" id="form" class="needs-validation" novalidate autocomplete="off" enctype="multipart/form-data">
        <div class="row">
            <input type="hidden" id="txtId" value="<?php echo $id ?>">

            <div class="col-md-6">
            <div class="input-group input-group-static mb-4">
                <label>First Name</label>
                <input type="text" class="form-control required" id="firstName_client" data-parsley-required="true">
            </div>
        </div>

            <div class="col-md-6">
                <div class="input-group input-group-static mb-4"> 
                    <label>Second Name</label>
                    <input type="text" class="form-control required" id="secondName_client" data-parsley-required="true">
                </div>
            </div>

            <div class="col-md-6">
                <div class="input-group input-group-static mb-4"> 
                    <label>Phone</label>
                    <input type="text" class="form-control required" id="phone_client" data-parsley-pattern="^\d{10}$" data-parsley-pattern-message="Please enter a valid 10-digit phone number"  data-parsley-required="true">
                </div>
            </div>

            <div class="col-md-6">
                <div class="input-group input-group-static mb-4">
                    <label>Mail</label>
                    <input type="mail" class="form-control required" id="mail_client" data-parsley-type="email" data-parsley-required="true">
                </div>
            </div>

            <div class="col-md-6">
                <div class="input-group input-group-static mb-4">
                    <label>Address</label>
                    <input type="text" class="form-control required" id="address_client" data-parsley-required="true">
                </div>
            </div>

            <div class="col-md-6">
                <div class="input-group input-group-static mb-4">
                    <label>Organization</label>
                    <input type="text" class="form-control required" id="organization_client" data-parsley-required="true">
                </div>
            </div>

            <div class="col-md-6" id="inputCheckbox" style="display:none;">
                <div class="form-check form-switch" style="margin-top: 5% !important;">
                    <input class="form-check-input" type="checkbox" id="checkboxActive">
                    <label class="form-check-label" for="checkboxActive">Is Active?</label>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-info saveSubmit">Save</button>
                <a type="button" href="clients" class="btn btn-danger ml-2" style="color: white;">Cancel</a>
            </div>
        </div>
    </form>
</div>