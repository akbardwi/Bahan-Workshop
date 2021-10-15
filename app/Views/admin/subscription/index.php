        <?= $this->extend('admin/layout/MainLayout') ?>
        <?= $this->section('content') ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>DataTables</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">
                                    <a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Subscriber</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
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
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">List Subscriber</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Email</th>
                                                <th>Subscription Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $no = 1;
                                            foreach($list_subsribe as $row) : ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td><?= $row['email']; ?></td>
                                                <td><?= $row['subscription_date']; ?></td>
                                                <td>
                                                    <a href="<?= base_url('admin/subscription/edit/'.$row['id']); ?>" class="btn btn-primary btn-sm">Edit</a>
                                                    <a href="<?= base_url('admin/subscription/delete/'.$row['id']); ?>" class="btn btn-danger btn-sm">Delete</a>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                            <tr>
                                                <th>No</th>
                                                <th>Email</th>
                                                <th>Subscription Date</th>
                                                <th>Action</th>
                                            </tr>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?= $this->endSection() ?>