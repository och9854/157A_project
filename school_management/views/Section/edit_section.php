<?php
$obj = new Section();
$id = filter_input(INPUT_GET, 'id');
$obj->setID($id);
$detail = $obj->getDetail();
$classList = $obj->getClassList();
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Section Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Manage Section</a></li>
                        <li class="breadcrumb-item active">Edit Section Form</li>
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
                <form id="editSectionForm">
                    <input type="hidden" name="action" value="edit">
                    <input type="hidden" name="id" value="<?= $id; ?>">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Class:</label>
                                    <select class="select2" data-placeholder="Select class"
                                            style="width: 100%;" name="class_id">
                                        <?php
                                        if (!empty($classList)) {
                                            ?>
                                            <option value="">---Select---</option>
                                            <?php
                                            foreach ($classList as $key => $val) {
                                                ?>
                                                <option <?= ($detail['class_id'] == $key) ? 'selected="selected"' : ''; ?>
                                                        value="<?= $key; ?>"><?= $val; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Subject Name:</label>
                                    <input class="form-control" name="name"
                                           value="<?= $detail['name']; ?>" autofocus>
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