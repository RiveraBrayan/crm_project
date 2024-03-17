<?php

if (isset($_GET['roles']) && $_GET['roles'] != '') {
    $id_page = $_GET['roles'];
    $tittle = "Pages Roles";
}

?>

<input type="hidden" id="id_page" value="<?php echo $id_page ?>">

<form method="post" id="form_rol" class="needs-validation" novalidate autocomplete="off" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-3">
            <div class="input-group input-group-static mb-4">
                <label for="txtRoles" class="ms-0">Roles</label>
                <select class="form-control required" id="txtRoles" data-parsley-required="true">
                    <option value="">Select an option</option>
                </select>
            </div>
        </div>
        <div class="col-md-1">
            <div class="input-group input-group-outline my-3">
                <button class="btn btn-icon btn-2 btn-info saveRol" type="submit">
                    <span class="btn-inner--icon"><i class="fas fa-plus-square"></i></span>
                </button>
            </div>
        </div>
    </div>
</form>

<table id="tableRoles" class="display" style="width:100%">
    <thead>
        <tr>
            <th>#</th>
            <th>Rol</th>
            <th>Actions</th>
        </tr>
    </thead>
</table>

<div class="d-flex justify-content-end" style="margin-top: 50px;">
    <a type="button" href="pages" class="btn btn-danger ml-2" style="color: white;">Cancel</a>
</div>