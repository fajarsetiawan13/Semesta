<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Teacher List</h6>
            <div class="dropdown no-arrow">
                <button onclick="genPDF()" style="all: unset; cursor:pointer;" data-toggle="tooltip" data-placement="top" title="Save as PDF">
                    <i class="fas fa-lg fa-file-pdf text-gray-600 mr-1"></i>
                </button>
                <button onclick="exportTableToCSV('teachers.csv')" style="all: unset; cursor:pointer;" data-toggle="tooltip" data-placement="top" title="Save as CSV">
                    <i class="fas fa-lg fa-file-csv text-gray-600"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">Teacher ID</th>
                            <th scope="col">Photos</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Date of Birth</th>
                            <th scope="col">Address</th>
                            <th scope="col">Active?</th>
                            <th scope="col">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($teachers as $tc) : ?>
                            <tr>
                                <td><?= $tc['teacher_ID']; ?></td>
                                <td>
                                    <img src="<?= base_url('assets/dashboard/img/profile/') . $tc['image']; ?>" style="width: 30px;">
                                </td>
                                <td><?= $tc['fname'], ' ', $tc['lname']; ?></td>
                                <td><?= $tc['email']; ?></td>
                                <td><?= $tc['gender']; ?></td>
                                <td><?= $tc['birth']; ?></td>
                                <td><?= $tc['address']; ?></td>
                                <td>
                                    <?php if ($tc['is_active'] == 1) : ?>
                                        <?= 'activated'; ?>
                                    <?php else : ?>
                                        <?= 'not activated'; ?>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('admin/edit_teacher/') . $tc['teacher_ID']; ?>" class="btn btn-info btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Change Teacher ID"><i class="fas fa-tools"></i></a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->