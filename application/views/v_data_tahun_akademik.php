<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="container-fluid">

        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
        <div class="row">
            <div class="col-lg-3 mb-3">
                <button class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                    <i class="fas fa-fw fa-plus"></i>
                    Add Data
                </button>
            </div>
        </div>

        <!-- Notif (Sukses insert data, edit data, delete data) -->
        <?= $this->session->flashdata('message'); ?>

        <!-- Modal Insert -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add <?= $title; ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <!-- Form -->
                    <?php echo form_open_multipart('TahunAkademik'); ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nama Tahun Akademik</label>
                            <input type="text" class="form-control" class="form-control" id="nama_tahun_akademik" name="nama_tahun_akademik" value="<?= set_value('nama_tahun_akademik'); ?>" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    </form>

                </div>
            </div>
        </div>
        <!-- Akhir Modal Insert -->

        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Id Tahun Akademik</th>
                    <th scope="col">Nama Tahun Akademik</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($tahun_akademik as $tb) :
                ?>
                    <tr>
                        <th scope="row"><?= $no++ ?></th>
                        <td><?= $tb['id_tahun_akademik'] ?></td>
                        <td><?= $tb['nama_tahun_akademik'] ?></td>
                        <td>

                            <!-- Tombol -->
                            <!-- Edit -->
                            <a href="" class=" badge badge-success" data-toggle="modal" data-target="#exampleModal2<?= $tb['id_tahun_akademik']; ?>">edit</a> |

                            <!-- Modal edit -->
                            <div class="modal fade" id="exampleModal2<?= $tb['id_tahun_akademik']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel2">Edit <?= $title; ?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <form action="<?= base_url('TahunAkademik/edit_tahun_akademik/'); ?><?= $tb['id_tahun_akademik']; ?>" method="post">
                                                <!-- Form -->
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput2">ID Tahun Akademik</label>
                                                    <input type="text" class="form-control" class="form-control" id="id_tahun_akademik" name="id_tahun_akademik" placeholder="<?= $tb['id_tahun_akademik']; ?>" readonly>

                                                    <div class="form-group">
                                                        <label for="exampleFormControlInput2">Nama Tahun Akademik</label>
                                                        <input type="text" class="form-control" class="form-control" id="nama_tahun_akademik" name="nama_tahun_akademik" value="<?= $tb['nama_tahun_akademik']; ?>" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">

                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Akhir Modal Edit -->

                            <!-- Delete -->
                            <a href="<?= base_url('TahunAkademik/delete_tahun_akademik/'); ?><?= $tb['id_tahun_akademik']; ?>" class="badge badge-danger" onclick="return confirm('Your data will be delete. Are you sure to continue?');">delete</a>

                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>



    </div>
</div>
<!-- End of Begin Page -->

</div>
<!-- End of Main Content -->