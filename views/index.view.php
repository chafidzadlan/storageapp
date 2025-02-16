<?php require('partials/header.php'); ?>
<?php require('partials/navbar.php'); ?>

<section class="pt-6 container pb-5 vh-100">
    <div class="row pb-3">
        <div class="col-sm-1">
            <button type="button" class="btn btn-primary text-dark" data-bs-toggle="modal" data-bs-target="#folder">
                <div class="text-light">New</div>
            </button>
        </div>
        <div class="col-sm-1">
            <button type="button" class="btn btn-danger text-dark" data-bs-toggle="modal" data-bs-target="#delete">
                <div class="text-light">Delete</div>
            </button>
        </div>
        <div class="col-sm-10">
            <h2 class="text-center fw-bold">Storage App</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2 mb-3">
            <div class="list-group" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action active bg-dark " id="1" data-bs-toggle="list" href="#1" role="tab" aria-controls="1">
                    <i class="bi bi-folder p-2"></i>
                    test
                </a>
            </div>
        </div>
        <div class="col-sm-10">
            <div class="tab-content" id="nav-tabContent">
                <!-- HOME -->
                <div class="tab-pane fade show active" id="1" role="tabpanel" aria-labelledby="1">
                    <div class="row">
                        <div class="col-sm">
                            <div class="mb-3">
                                <button type="button" class="btn btn-light text-dark" data-bs-toggle="modal" data-bs-target="#file">
                                    + New File
                                </button>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="input-group mb-3">
                                <input type="hidden" name="" class="search" value="search">
                                <input type="text" class="form-control keyword-search" >
                            </div>
                        </div>
                    </div>
                    <div class="h-60-vh overflow-y-scroll overflow-x-hidden">
                        <table class="table text-light">
                            <thead>
                                <tr class="sticky-top bg-dark">
                                    <th scope="col"></th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Owner</th>
                                    <th scope="col">Last Modified</th>
                                    <th scope="col">Size</th>
                                    <th scope="col">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($files)) { ?>
                                    <tr>
                                        <td colspan="10" class="text-center">Data not found</td>
                                    </tr>
                                <?php }  ?>
                                <?php foreach ($files as $file) : ?>
                                    <tr>
                                        <th scope="row">
                                            <i class="bi bi-files"></i>
                                        </th>
                                        <td >
                                            <?= $file['file']; ?>
                                        </td>
                                        <td >
                                            <?= $file['username']; ?>
                                        </td>
                                        <td>
                                            <?= $file['created_at']; ?>
                                        </td>
                                        <td>
                                            <?php if (empty($file['size'])) { ?>
                                                -
                                            <?php } else { ?>
                                                <?= $file['size']; ?> 
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL FOLDER -->
    <div class="modal fade" id="folder" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-dark">
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" id="idu" value="<?= $_SESSION['idu']; ?>">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">New Folder</label>
                            <input type="text" class="form-control bg-dark" id="name" name="name" autocomplete="off" required />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" name="folder" class="btn btn-danger">
                            Create
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- MODAL FILE -->
    <div class="modal fade" id="file" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-dark">
                <form action="_backend/uploadFile.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" id="id" name="id" value="<?= $folders['id_folder']; ?>">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label"></label>
                            <input type="file" class="form-control bg-dark" id="file" name="file" autocomplete="off" required />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" name="createfile" class="btn btn-danger">
                            Create
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php require('partials/footer.php'); ?>