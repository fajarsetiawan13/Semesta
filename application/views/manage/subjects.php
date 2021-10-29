<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

    <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addSubjectsModal">Add New Subjects</a>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ID</th>
                            <th scope="col">Subjects</th>
                            <th scope="col">Courses ID</th>
                            <th scope="col">Description</th>
                            <th scope="col">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($subjects as $s) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $s['sub_ID']; ?></td>
                                <td><?= $s['title']; ?></td>
                                <td><?= $s['course_ID']; ?></td>
                                <td><?= $s['description']; ?></td>
                                <td>
                                    <a href="#" class="btn btn-info btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Change Subjects"><i class="fas fa-tools"></i></a>
                                    |
                                    <a href="<?= base_url(); ?>manage/deleteSubjects/<?= $s['sub_ID']; ?>" class="btn btn-danger btn-circle btn-sm" data-toggle="tooltip" data-placement="top" title="Delete Subjects" onclick="return confirm('Are You Sure?');"><i class="fas fa-trash"></i></a>
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

<!-- Modal Add New Subjects-->
<div class="modal fade" id="addSubjectsModal" tabindex="-1" aria-labelledby="addSubjectsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSubjectsModalLabel">Add New Subjects</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?= base_url('manage/subjects'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Subjects's Title">
                    </div>
                    <div class="form-group">
                        <select name="sub1" id="sub1" class="form-control">
                            <option value="">Choose School</option>
                            <option value="SES">Elementary School</option>
                            <option value="SJH">Junior High School</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="sub2" id="sub2" class="form-control">
                            <option value="">Curriculum Year</option>
                            <option value="16">2016</option>
                            <option value="19">2019</option>
                            <option value="20">2020</option>
                            <option value="21">2021</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="sub3" id="sub3" class="form-control">
                            <option value="">Grade Class</option>
                            <?php for ($i = 1; $i <= 12; $i++) : ?>
                                <option value="<?= $i ?>"><?= $i ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="sub4" name="sub4" placeholder="Sub ID (i.e. 002/003/004">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="desc" name="desc" placeholder="Description">
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