<?php
$id_client = $_GET['interaction'];
?>

<style>
    td {
        text-align: center !important;
    }
</style>

<div class="row">
    <div class="col-md-10"></div>
    <div class="col-md-2">
        <input type="hidden" id="id_client" value="<?php echo $id_client ?>">
        <div class="input-group input-group-outline my-3">
            <a class="btn btn-icon btn-2 btn-success btnModalClients" id="btnModalClients" type="button" style="color :white; margin-left: 30%;" href='javascript:;' data-toggle='modal' data-target='#editionInformationModal'>
                <span class="btn-inner--icon"><i class="fas fa-plus-square modalEditUser"></i> Add Interaction</span>
            </a>
        </div>
    </div>
</div>

<table id="tableInteractions" class="display" style="width:100%">
    <thead>
        <tr>
            <th>#</th>
            <th>Type</th>
            <th>date</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
</table>

<div class="d-flex justify-content-end" style="margin-top: 50px;">
    <a type="button" href="clients" class="btn btn-danger ml-2" style="color: white;">Cancel</a>
</div>

<!-- Modal Interaction Information-->
<div class="modal fade" id="editionInformationModal" tabindex="-1" role="dialog" aria-labelledby="editionInformationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editionInformationModalLabel">Edit tableInteractions Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="post" id="form" class="needs-validation" novalidate autocomplete="off" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" id="id_interaction" value="">
                    <div class="row">
                        <div class="input-group input-group-static mb-4">
                            <label for="txtTypeInteraction" class="ms-0">Type</label>
                            <select class="form-control" id="txtTypeInteraction" data-parsley-required="true">
                                <option value="">Select an option</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        <div class="input-group input-group-static my-3">
                            <label>Date</label>
                            <input type="date" id="txtDate" class="form-control" data-parsley-required="true">
                        </div>
                        <div class="input-group input-group-dynamic">
                            <textarea class="form-control" rows="5" id="txtDescription" placeholder="Say a few words about who you are or what you're working on." spellcheck="false" data-parsley-required="true"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="profileSubmit" class="btn btn-success">Save changes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>