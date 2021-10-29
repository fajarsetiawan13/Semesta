<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <a href="#" class="btn btn-primary mb-3">Edit Schedules</a>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive-sm">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Schedules ID</th>
                            <th scope="col">Course ID</th>
                            <th scope="col">Subjects ID</th>
                            <th scope="col">Day</th>
                            <th scope="col">Time Start</th>
                            <th scope="col">Time End</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($schedules as $c) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $c['schedules_ID']; ?></td>
                                <td><?= $c['course_ID']; ?></td>
                                <td><?= $c['subjects_ID']; ?></td>
                                <td><?= $c['day']; ?></td>
                                <td><?= $c['time_start']; ?></td>
                                <td><?= $c['time_end']; ?></td>
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