<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addRoleModal">Add New Role</a>
    <!-- DataTales -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Role</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($role as $r) : ?>
                            <tr>
                                <td scope="row"><?= $i; ?></td>
                                <td><?= $r['role']; ?></td>
                                <td>
                                    <a href="<?= base_url('manage/roleaccess/') . $r['id']; ?>" class="btn btn-warning btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Change Access"><i class="fas fa-key"></i></a>
                                    |
                                    <a href="<?= base_url(); ?>manage/editRole/<?= $r['id']; ?>" class="btn btn-info btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Change Role Name"><i class="fas fa-tools"></i></a>
                                    |
                                    <a href="<?= base_url(); ?>manage/deleteRole/<?= $r['id']; ?>" class="btn btn-danger btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Delete Role" onclick="return confirm('Are You Sure?');"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<!-- Modal Tambah Menu Baru-->
<div class="modal fade" id="addRoleModal" tabindex="-1" aria-labelledby="addRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addRoleModalLabel">Add New Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?= base_url('manage/role'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="role" name="role" placeholder="Role Name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>