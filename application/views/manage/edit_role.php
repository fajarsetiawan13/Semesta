<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title, ': ', $role_choose[0]['role']; ?></h1>

    <!-- DataTales -->
    <div class="card shadow mb-4">
        <?= form_open_multipart('manage/changeRole'); ?>
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Menu</h6>
            <div class="dropdown no-arrow">
                <button type="submit" style="all: unset; cursor:pointer;" data-toggle="tooltip" data-placement="top" title="Save">
                    <i class="fas fa-lg fa-save text-gray-600 mr-1"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive-sm">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">Role ID</th>
                            <th scope="col">Role Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($role_choose as $r) : ?>
                            <tr>
                                <td scope="row">
                                    <input name="id" id="id" value="<?= $r['id']; ?>" class="form-control input-sm" type="text" placeholder="Role ID" readonly>
                                </td>
                                <td scope="row">
                                    <input name="role" id="role" value="<?= $r['role']; ?>" class="form-control input-sm" type="text" placeholder="Role Name">
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