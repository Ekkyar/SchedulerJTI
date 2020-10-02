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
                    <?php echo form_open_multipart('Jam'); ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nama Jam</label>
                            <input type="text" class="form-control" class="form-control" id="nama_jam" name="nama_jam" value="<?= set_value('nama_jam'); ?>" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
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
                    <th scope="col">Id Jam</th>
                    <th scope="col">Nama Jam</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($jam as $tb) :
                ?>
                    <tr>
                        <th scope="row"><?= $no++ ?></th>
                        <td><?= $tb['id_jam'] ?></td>
                        <td><?= $tb['nama_jam'] ?></td>
                        <td>

                            <!-- Tombol -->
                            <!-- Edit -->
                            <a href="" class=" badge badge-success" data-toggle="modal" data-target="#exampleModal2<?= $tb['id_jam']; ?>">edit</a> |

                            <!-- Modal edit -->
                            <div class="modal fade" id="exampleModal2<?= $tb['id_jam']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel2">Edit <?= $title; ?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <form action="<?= base_url('jam/edit_jam/'); ?><?= $tb['id_jam']; ?>" method="post">
                                                <!-- Form -->
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput2">ID Jam</label>
                                                    <input type="text" class="form-control" class="form-control" id="id_jam" name="id_jam" placeholder="<?= $tb['id_jam']; ?>" readonly>

                                                    <div class="form-group">
                                                        <label for="exampleFormControlInput2">Nama Jam</label>
                                                        <input type="text" class="form-control" class="form-control" id="nama_jam" name="nama_jam" value="<?= $tb['nama_jam']; ?>" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">

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
                            <a href="<?= base_url('Jam/delete_jam/'); ?><?= $tb['id_jam']; ?>" class="badge badge-danger" onclick="return confirm('Your data will be delete. Are you sure to continue?');">delete</a>

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