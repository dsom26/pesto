<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Content Row -->
    <div class="card mb-3">
        <div class="card-header">

            <div class="row">

                <div class="col-sm-8">
                    <h4 class="page-title"><i class="fa fa-plus" aria-hidden="true"></i>
                        <?php echo $title; ?>
                    </h4>
                </div>

                <div class="col-sm-4 text-right">
                    <a href="<?php echo base_url('task/index'); ?>" class="btn btn-sm btn-danger"><i
                            class="fa fa-arrow-left" aria-hidden="true"></i>
                        Back</a>
                </div>

            </div>
        </div>


        <div class="card-body">
            <?php echo validation_errors(); ?>

            <?php echo form_open_multipart('task/create'); ?>


            <div class="form-group">

                <div class="row">

                    <div class="col-sm-6">
                        <label for="title">Title : <span class="required-red">*</span></label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Title" required>
                    </div>
                    <div class="col-sm-6">
                        <label for="description">Description : <span class="required-red">*</span></label>
                        <input type="text" class="form-control" name="description" id="description"
                            placeholder="Description" required>
                    </div>

                </div>
                <br>

                <div class="row">

                    <div class="col-sm-6">
                        <label for="status">Assignment Status : <span class="required-red">*</span></label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="">Select</option>
                            <?php foreach ($this->config->item('task_status_arr') as $value) { ?>
                            <option value="<?php echo $value; ?>">
                                <?php echo $value; ?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class=" col-sm-6">
                        <label for="assigned_to">Assign To : <span class="required-red">*</span></label>
                        <select name="assigned_to" id="assigned_to" class="form-control" required>
                            <option value="">Select</option>
                            <?php foreach ($users_arr as $value) {

                ?>
                            <option value="<?php echo $value['id']; ?>">
                                <?php echo $value['name']; ?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>


                </div>
                <br>


            </div>
            <button type=" submit" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Save</button>
            <a href="<?php echo base_url('task/index'); ?>" class="btn btn-sm btn-danger"><i class="fa fa-arrow-left"
                    aria-hidden="true"></i> Back</a>

            </form>
        </div> <!-- card-body -->

    </div>
</div>
<!-- /.container-fluid -->