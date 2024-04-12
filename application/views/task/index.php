<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

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

    <div class="card shadow mb-4">
        <div class="card-header py-3 ">

            <div class="row">

                <div class="col-sm-9">
                    <h4 class="page-title"><i class="fa fa-list" aria-hidden="true"></i>
                        <?php echo $title; ?>
                    </h4>
                </div>
                <div class="col-sm-3 text-right"><a href="<?php echo site_url('task/create'); ?>"
                        class="btn btn-success"><i class="fa fa-plus-square" aria-hidden="true"></i> Add New
                        <?php echo $module_name; ?>
                    </a></div>

            </div>

        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-sm" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Task Id</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Assigned To</th>
                            <th>Date Time</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php
                        foreach ($task_arr as $item) {

                            ?>
                        <tr>
                            <td>
                                <?php echo $item['id']; ?>
                            </td>
                            <td>
                                <?php echo $item['title']; ?>
                            </td>
                            <td>
                                <?php echo $item['status']; ?>
                            </td>
                            <td>
                                <?php echo $item['assigned_to_name']; ?>
                            </td>
                            <td>
                                <?php echo date('Y-m-d @ H:i', strtotime($item['insert_date_time'])); ?>
                            </td>

                            <td>

                                <a href="<?php echo site_url('task/edit/' . $item['id']); ?>"
                                    class="btn btn-circle btn-info btn-sm" title="Edit <?php echo $module_name; ?>"><i
                                        class="fa fa-edit" aria-hidden="true"></i>
                                </a>

                                <a href="<?php echo site_url('task/delete/' . $item['id']); ?>"
                                    class="btn btn-circle btn-danger btn-sm" title="Edit <?php echo $module_name; ?>"><i
                                        class="fa fa-trash" aria-hidden="true"></i>
                                </a>

                            </td>


                        </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>



</div>
<!-- /.container-fluid -->