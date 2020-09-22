<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="container-fluid">

        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

        <div class="row">
            <div class="mb-3 col-lg-8">
                <?= $this->session->flashdata('message'); ?>
            </div>
        </div>
        <div class="card mb-3 col-lg-8">
            <div class="row no-gutters">
                <div class="col-md-4 my-auto">
                    <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img" alt="profile">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><?= $user['name']; ?></h5>
                        <p class="card-text"><?= $user['email']; ?></p>
                        <p class="card-text"><small class="text-muted">Since <?= date('d F Y', $user['date_created']); ?></small></p>
                        <a href="<?= base_url('Admin/edit_profile'); ?>">
                            <button type="button" class="btn btn-primary float-right"> Edit</button>

                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- End of Begin Page -->

</div>
<!-- End of Main Content -->