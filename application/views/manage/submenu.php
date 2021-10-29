<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

    <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addSubMenuModal">Add New Sub Menu</a>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Sub Menu/Title</th>
                            <th scope="col">Menu</th>
                            <th scope="col">Url</th>
                            <th scope="col">Active</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($submenu as $sm) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $sm['title']; ?></td>
                                <td><?= $sm['menu_id']; ?></td>
                                <td><?= $sm['url']; ?></td>
                                <td><?= $sm['is_active']; ?></td>
                                <td>
                                    <a href="<?= base_url('manage/editSubmenu/') . $sm['id']; ?>" class="btn btn-info btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Change Sub Menu"><i class="fas fa-tools"></i></a>
                                    |
                                    <a href="<?= base_url(); ?>manage/deleteSubMenu/<?= $sm['id']; ?>" class="btn btn-danger btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Delete Sub Menu" onclick="return confirm('Are You Sure?');"><i class="fas fa-trash"></i></a>
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
<div class="modal fade" id="addSubMenuModal" tabindex="-1" aria-labelledby="addSubMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSubMenuModalLabel">Add New Sub Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?= base_url('manage/submenu'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Sub Menu / Title">
                    </div>
                    <div class="form-group">
                        <select name="menu_id" id="menu_id" class="form-control">
                            <option value="">Choose Menu</option>
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="url" name="url" placeholder="Url Sub Menu">
                    </div>
                    <div class="form-group">
                        <div class="form-group col-sm-3">
                            <input type="checkbox" class="form-check-input" value="1" name="is_active" id="is_active" checked>
                        </div>
                        <div class="form-group col-sm-6">
                            <label class="form-check-input" for="is_active">Active?</label>
                            <br>
                        </div>
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