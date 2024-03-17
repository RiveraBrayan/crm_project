<?php

    if(isset($_GET['edition']) && $_GET['edition'] != ''){
        $id = $_GET['edition'];
        $tittle = "Edit Client";

    }else{
        $id = '';
        $tittle = "Add Client";

    }

?>

<div class="row">
    <h4><?php echo $tittle ?> </h4>
    <form method="post"  class="needs-validation" novalidate autocomplete="off" enctype="multipart/form-data">
        <div class="row">
            <input type="hidden" id="txtId" value="<?php echo $id ?>">

            <div class="col-md-6">
            <div class="input-group input-group-static mb-4">
                <label>First Name</label>
                <input type="text" class="form-control required" id="firstName_client">
                <div class="invalid-feedback">Campo vacío, rellenar</div>
            </div>
        </div>

            <div class="col-md-6">
                <div class="input-group input-group-static mb-4">
                    <label>Second Name</label>
                    <input type="text" class="form-control required" id="secondName_client" >
                </div>
            </div>

            <div class="col-md-6">
                <div class="input-group input-group-static mb-4">
                    <label>Phone</label>
                    <input type="text" class="form-control required" id="phone_client" pattern="^[0-9]+$">
                </div>
            </div>

            <div class="col-md-6">
                <div class="input-group input-group-static mb-4">
                    <label>Mail</label>
                    <input type="mail" class="form-control required" id="mail_client" >
                </div>
            </div>

            <div class="col-md-6">
                <div class="input-group input-group-static mb-4">
                    <label>Address</label>
                    <input type="text" class="form-control required" id="address_client" >
                </div>
            </div>

            <div class="col-md-6">
                <div class="input-group input-group-static mb-4">
                    <label>Organization</label>
                    <input type="text" class="form-control required" id="organization_client" >
                </div>
            </div>

            <div class="col-md-6" id="inputCheckbox" style="display:none;">
                <div class="form-check form-switch" style="margin-top: 5% !important;">
                    <input class="form-check-input" type="checkbox" id="checkboxActive">
                    <label class="form-check-label" for="checkboxActive">Is Active?</label>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-info saveSubmit">Save</button>
                <a type="button" href="clients" class="btn btn-danger ml-2" style="color: white;">Cancel</a>
            </div>
        </div>
    </form>
</div>