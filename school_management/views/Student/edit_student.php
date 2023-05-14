<?php
$obj = new Student();
$id = filter_input(INPUT_GET, 'id');
$obj->setID($id);
$stuDetail = $obj->getDetail($id);
$classList = $obj->getClassList();
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Student Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= ADMIN_URL; ?>">Home</a></li>
                        <li class="breadcrumb-item active">Edit Student Form</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Basic Details</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <form id="editStudentForm" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="edit">
                    <input type="hidden" name="id" value="<?= $id; ?>">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Roll No:</label>
                                    <input class="form-control" name="roll_no" value="<?= $stuDetail['roll_no'] ?>"
                                           readonly>
                                </div>
                                <div class="form-group">
                                    <label>First Name:</label>
                                    <input class="form-control" name="first_name"
                                           value="<?= $stuDetail['first_name']; ?>" autofocus>
                                </div>
                                <div class="form-group">
                                    <label>Middle Name:</label>
                                    <input class="form-control" name="middle_name"
                                           value="<?= $stuDetail['middle_name']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Sur Name:</label>
                                    <input class="form-control" name="sur_name" value="<?= $stuDetail['sur_name']; ?>">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Class:</label>
                                    <select class="select2" data-placeholder="Select a Class"
                                            style="width: 100%;" name="class_id" disabled>
                                        <?php
                                        if (!empty($classList)) {
                                            foreach ($classList as $key => $value) {
                                                if ($stuDetail['class_id'] == $key) {
                                                    $selected = "selected";
                                                } else {
                                                    $selected = "";
                                                }
                                                ?>
                                                <option <?= $selected; ?>value="<?= $key; ?>"><?= $value; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="exampleInputFile">Profile Pic:</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile"
                                                   name="pic">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <p><img height="150" width="150" class="img-fluid"
                                            src="<?= ADMIN_ASSETS_DIR . 'uploads/student/' . $stuDetail['roll_no'] . '/' . $stuDetail['profile_pic']; ?>">
                                    </p>
                                </div>
                                <div class="form-group">
                                    <label>Contact No:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="text" class="form-control"
                                               data-inputmask='"mask": "(999) 999-9999"' name="contact_no"
                                               value="<?= $stuDetail['contact_no']; ?>" data-mask>
                                    </div>
                                    <!-- /.input group -->
                                </div>

                                <div class="form-group">
                                    <label>Alternate Contact No:</label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="text" class="form-control"
                                               data-inputmask='"mask": "(999) 999-9999"' name="alternate_contact_no"
                                               value="<?= $stuDetail['alternate_contact_no']; ?>"
                                               data-mask>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                        </div>

                        <!-- /.row -->
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary submitBtn">Update</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
