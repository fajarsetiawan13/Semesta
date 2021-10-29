<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> Dashboard</h1>
    <?= $this->session->flashdata('message'); ?>

    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Number of Teachers</div>
                            <?php $i = 0; ?>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php foreach ($teachers as $k) : ?>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                                <?= $i ?> Teachers
                            </div>
                        </div>
                        <div class="col-auto" data-toggle="tooltip" data-placement="top" title="Click to see details">
                            <a href="<?= base_url('admin/teacher') ?>"><i class="fas fa-id-card fa-2x text-gray-300"></i></a>
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
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Number of Students</div>
                            <?php $i = 0; ?>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php foreach ($students as $k) : ?>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                                <?= $i ?> Students
                            </div>
                        </div>
                        <div class="col-auto" data-toggle="tooltip" data-placement="top" title="Click to see details">
                            <a href="<?= base_url('admin/student') ?>"><i class="far fa-id-card fa-2x text-gray-300"></i></a>
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
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">New Registration
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto" data-toggle="tooltip" data-placement="top" title="Click to see details">
                            <a href="#"><i class="fas fa-clipboard-list fa-2x text-gray-300"></i></a>
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
                                New Message</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                        </div>
                        <div class="col-auto" data-toggle="tooltip" data-placement="top" title="Click to see details">
                            <a href="#"><i class="fas fa-comments fa-2x text-gray-300"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-6 col-lg-7">
            <!-- Bar Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Average Grade per Subjects</h6>
                </div>
                <div class="card-body">
                    <div class="chart-bar">
                        <canvas id="myBarChartSubjects"></canvas>
                    </div>
                    <hr>
                    This graph shows the average grades of
                    <code> Elementary School</code> by subjects.
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-lg-7">
            <!-- Bar Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Average Grade per Class</h6>
                </div>
                <div class="card-body">
                    <div class="chart-bar">
                        <canvas id="myBarChartClass"></canvas>
                    </div>
                    <hr>
                    This graph shows the average grades of
                    <code> Junior High School</code> by class.
                </div>
            </div>
        </div>

    </div>

</div>
<!-- /.container-fluid -->