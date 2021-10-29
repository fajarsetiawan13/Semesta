<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title, ': ', $submenu_choose[0]['title']; ?></h1>

    <!-- DataTales -->
    <div class="card shadow mb-4">
        <?= form_open_multipart('manage/changeSubmenu'); ?>
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
                            <th scope="col">Sub Menu ID</th>
                            <th scope="col">Menu ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Url</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($submenu_choose as $sm) : ?>
                            <tr>
                                <td scope="row">
                                    <input name="id" id="id" value="<?= $sm['id']; ?>" class="form-control input-sm" type="text" placeholder="Sub Menu ID" readonly>
                                </td>
                                <td scope="row">
                                    <input name="menu_id" id="menu_id" value="<?= $sm['menu_id']; ?>" class="form-control input-sm" type="text" placeholder="Menu ID">
                                </td>
                                <td scope="row">
                                    <input name="title" id="title" value="<?= $sm['title']; ?>" class="form-control input-sm" type="text" placeholder="Sub Menu Title">
                                </td>
                                <td scope="row">
                                    <input name="url" id="url" value="<?= $sm['url']; ?>" class="form-control input-sm" type="text" placeholder="URL">
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