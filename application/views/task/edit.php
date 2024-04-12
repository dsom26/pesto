<!-- Begin Page Content -->
<div class="container-fluid">

    <?php if ($this->session->flashdata('task_success')) { ?>

    <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong>
        <?php echo $this->session->flashdata('task_success'); ?>
    </div>

    <?php } else if ($this->session->flashdata('task_error')) { ?>

    <div class="alert alert-danger alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Error!</strong>
        <?php echo $this->session->flashdata('task_error'); ?>
    </div>

    <?php } ?>


    <!-- Content Row -->
    <div class="card mb-3">
        <div class="card-header">

            <div class="row">

                <div class="col-sm-8">
                    <h4 class="page-title"><i class="fa fa-edit" aria-hidden="true"></i>
                        <?php echo $title . ' (Task #' . $taskId . ')'; ?>
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

            <?php echo form_open_multipart('task/edit/' . $task_arr['id']); ?>



            <div class="form-group">

                <div class="row">

                    <div class="col-sm-6">
                        <label for="title">Title : <span class="required-red">*</span></label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Title" required
                            value="<?php echo $task_arr['title']; ?>">
                    </div>
                    <div class="col-sm-6">
                        <label for="description">Description : <span class="required-red">*</span></label>
                        <input type="text" class="form-control" name="description" id="description"
                            placeholder="Description" required value="<?php echo $task_arr['description']; ?>">
                    </div>

                </div>
                <br>

                <div class="row">

                    <div class="col-sm-6">
                        <label for="status">Assignment Status : <span class="required-red">*</span></label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="">Select</option>
                            <?php foreach ($this->config->item('task_status_arr') as $value) { ?>
                            <option value="<?php echo $value; ?>" <?php if ($task_arr['status'] == $value) {
                                       echo "selected";
                                   } ?>>
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
                            <option value="<?php echo $value['id']; ?>" <?php if ($task_arr['assigned_to'] == $value['id']) {
                                       echo "selected";
                                   } ?>>
                                <?php echo $value['name']; ?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>


                </div>
                <br>


            </div>
            <button type="submit" class="btn btn-success"><i class="fa fa-edit" aria-hidden="true"></i>
                Submit</button>

            <a href="<?php echo base_url('task/index'); ?>" class="btn btn-sm btn-danger"><i class="fa fa-arrow-left"
                    aria-hidden="true"></i> Back</a>

            <a href="<?php echo base_url('api/delete_task/' . $taskId); ?>" class="btn btn-md btn-danger"><i
                    class="fa fa-trash" aria-hidden="true"></i>
                Delete</a>


            </form>
        </div> <!-- card-body -->

    </div>


</div>
<!-- /.container-fluid -->