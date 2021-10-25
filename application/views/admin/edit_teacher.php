<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title, $teacher_choose[0]['fname']; ?></h1>

    <!-- DataTales-->
    <div class="card shadow mb-4">
        <?= form_open_multipart('admin/change_teacher'); ?>
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Teacher's List</h6>
            <div class="dropdown no-arrow">
                <button type="submit" style="all: unset; cursor:pointer;" data-toggle="tooltip" data-placement="top" title="Save">
                    <i class="fas fa-lg fa-save text-gray-600 mr-1"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Teacher ID</th>
                            <th scope="col">Active?</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($teacher_choose as $tc) : ?>
                            <tr>
                                <td scope="row"><?= $i; ?></td>
                                <td scope="row"><?= $tc['fname'], ' ', $tc['lname']; ?></td>
                                <td scope="row">
                                    <input name="email" id="email" value="<?= $tc['email']; ?>" class="form-control input-sm" readonly>
                                </td>
                                <td scope="row">
                                    <input name="teacher_ID" id="teacher_ID" value="<?= $tc['teacher_ID']; ?>" class="form-control input-sm" type="text" placeholder="Teacher Identity Number">
                                </td>
                                <td scope="row">
                                    <?php if ($tc['is_active'] == 1) : ?>
                                        <?= 'activated'; ?>
                                    <?php else : ?>
                                        <a href="<?= base_url(); ?>admin/activate_teacher/<?= $tc['teacher_ID']; ?>" onclick="return confirm('Are You Sure?');" class="badge badge-success">activate</a>
                                    <?php endif; ?>
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