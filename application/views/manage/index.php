<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('message'); ?>

    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Management
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                Menu
                            </div>
                        </div>
                        <div class="col-auto" data-toggle="tooltip" data-placement="top" title="Click to see details">
                            <a href="<?= base_url('manage/menu') ?>"><i class="fas fa-folder fa-2x text-gray-300"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Management
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                Sub Menu
                            </div>
                        </div>
                        <div class="col-auto" data-toggle="tooltip" data-placement="top" title="Click to see details">
                            <a href="<?= base_url('manage/submenu') ?>"><i class="far fa-folder-open fa-2x text-gray-300"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Management
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                Role</div>
                        </div>
                        <div class="col-auto" data-toggle="tooltip" data-placement="top" title="Click to see details">
                            <a href="<?= base_url('manage/role') ?>"><i class="fas fa-user-tie fa-2x text-gray-300"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Management
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                Subjects
                            </div>
                        </div>
                        <div class="col-auto" data-toggle="tooltip" data-placement="top" title="Click to see details">
                            <a href="<?= base_url('manage/subjects') ?>"><i class="fas fa-book fa-2x text-gray-300"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Management
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                Courses
                            </div>
                        </div>
                        <div class="col-auto" data-toggle="tooltip" data-placement="top" title="Click to see details">
                            <a href="<?= base_url('manage/courses') ?>"><i class="fas fa-chalkboard-teacher fa-2x text-gray-300"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-secondary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Management
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                Schedules
                            </div>
                        </div>
                        <div class="col-auto" data-toggle="tooltip" data-placement="top" title="Click to see details">
                            <a href="<?= base_url('manage/schedules') ?>"><i class="fas fa-calendar-alt fa-2x text-gray-300"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<!-- /.container-fluid -->