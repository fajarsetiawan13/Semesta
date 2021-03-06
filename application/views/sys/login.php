<div class="container">

    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Login Page!</h1>
                                </div>
                                <?= $this->session->flashdata('message'); ?>
                                <form class="user" method="post" action="<?= base_url('sys/login'); ?>">
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user" id="email" name="email" aria-describedby="emailHelp" value="<?= set_value('email') ?>" placeholder="Enter Email Address...">
                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="row justify-content-center">
                                        <button type="submit" class="btn btn-primary btn-user">
                                            Login
                                        </button>
                                    </div>
                                </form>
                                <hr>
                                <div class="text-center">
                                    For test, use this Account.<br>
                                    Username : Fajar@semesta.sch.id<br>
                                    Password : 12345678
                                </div>
                                <div class="text-center">
                                    Create a
                                    <a class="small" href="<?= base_url('sys/student_registration') ?>">Student </a>
                                    |
                                    <a class="small" href="<?= base_url('sys/teacher_registration') ?>"> Teacher </a>
                                    Account!
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>