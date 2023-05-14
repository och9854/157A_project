<?php
$obj = new Dashboard();
?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= BASE_URL . 'module=dashboard&action=index' ?>">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3><?= $obj->total_student; ?></h3>

                            <p>Students</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="<?= BASE_URL . 'module=student&action=student_list' ?>" class="small-box-footer">More
                            info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3><?= $obj->total_teachers; ?></h3>

                            <p>Teachers</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="<?= BASE_URL . 'module=teacher&action=teacher_list' ?>" class="small-box-footer">More
                            info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= $obj->total_classes; ?></h3>

                            <p>Classes</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-files-o"></i>
                        </div>
                        <a href="<?= BASE_URL . 'module=group&action=class_list' ?>" class="small-box-footer">More
                            info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= $obj->total_sections; ?></h3>

                            <p>Sections</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-files-o"></i>
                        </div>
                        <a href="<?= BASE_URL . 'module=section&action=section_list' ?>" class="small-box-footer">More
                            info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= $obj->total_subjects; ?></h3>

                            <p>Subjects</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-files-o"></i>
                        </div>
                        <a href="<?= BASE_URL . 'module=subject&action=subject_list' ?>" class="small-box-footer">More
                            info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>