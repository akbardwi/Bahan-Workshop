        <?= $this->extend('admin/layout/MainLayout') ?>
        <?= $this->section('content') ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0">Edit Subscriber</h1>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <!-- Main row -->
                        <div class="row">
                            <div class="col-12">
                                <?php
                                $inputs = session()->getFlashdata('inputs');
                                $errors = session()->getFlashdata('errors');
                                $error = session()->getFlashdata('error');
                                $success = session()->getFlashdata('success');
                                if (!empty($errors)) { ?>
                                <div class="alert alert-danger" role="alert">
                                    <ul>
                                        <?php foreach ($errors as $errors) : ?>
                                            <li><?= esc($errors) ?></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                                <?php
                                }
                                if (!empty($error)) { ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= esc($error) ?><br />
                                </div>
                                <?php }
                                if (!empty($success)) { ?>
                                <div class="alert alert-success" role="alert">
                                    <?= esc($success) ?><br />
                                </div>
                                <?php } ?>
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Edit Subscriber</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form method="post">
                                        <?= csrf_field() ?>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="password">Email <span class="text-danger">*</span></label>
                                                <input type="email" class="form-control" id="email" name="email" value="<?= $subsriber['email']; ?>" required>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row (main row) -->
                    </div><!-- /.container-fluid -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
        <?= $this->endSection() ?>