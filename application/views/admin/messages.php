<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <!-- DataTales-->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Messages</h6>
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
                            <th scope="col">#</th>
                            <th scope="col">Sender</th>
                            <th scope="col">Message</th>
                            <th scope="col">Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($message as $m) : ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $m['sender']; ?></td>
                                <td><?= $m['message']; ?></td>
                                <td><?= $m['date']; ?></td>
                                <td>
                                    <?php if ($m['is_read'] == 0) : ?>
                                        <a href="<?= base_url('admin/checkMessage/') . $m['id']; ?>" class="btn btn-success btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Read Message"><i class="fas fa-check"></i></a>
                                    <?php else : ?>
                                        <a href="<?= base_url('admin/checkMessage/') . $m['id']; ?>" class="btn btn-secondary btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Unread Message"><i class="fas fa-check"></i></a>
                                    <?php endif ?>
                                    |
                                    <a href="<?= base_url('admin/deleteMessage/') . $m['id']; ?>" class="btn btn-danger btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Delete Message" onclick="return confirm('Are You Sure?');"><i class="fas fa-trash"></i></a>
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