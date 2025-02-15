<?php require('partials/header.php'); ?>
<?php require('partials/navbar.php'); ?>

<section class="pt-6 container pb-5">
    <h2 class="text-center">Welcome Admin <?= $myuser['username']; ?>!</h2>
    <div class="row">
        <div class="col-sm-4 mb-3">
            <div class="list-group" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action active bg-dark" id="list-home-list" data-bs-toggle="list" href="#list-home" role="tab" aria-controls="list-home">My Profile</a>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="tab-content" id="nav-tabContent">
                <!-- MY PROFILE -->
                <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                    <div class="card bg-dark">
                        <div class="card-body p-5">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-sm m-auto text-center">
                                        <img src="_backend/img/user/<?= $myuser['img']; ?>" alt="" class="mb-4 object-fit-cover border rounded-circle" width="300" height="300">
                                    </div>
                                    <div class="col-sm">
                                        <div class="mb-3">
                                            <div class="mb-3 mt-3">
                                                <input type="hidden" name="password">
                                                <input type="hidden" name="gambar_lama" value="<?= $myuser['img']; ?>">
                                                <label for="exampleFormControlInput1" class="form-label">Gambar :</label>
                                                <input type="file" name="gambar" class="form-control bg-dark img-upload" onchange="previewImage()" />
                                            </div>
                                            <div class="mb-3 mt-3">
                                                <label for="exampleFormControlInput1" class="form-label">Name :</label>
                                                <input type="text" name="username" class="form-control bg-dark" required value="<?= $myuser['username']; ?>" />
                                            </div>
                                            <div class="mt-5 d-grid gap-2">
                                                <button type="submit" name="create" class="btn btn-outline-light">
                                                    Save Changes
                                                </button>
                                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    Change Password
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require('partials/footer.php'); ?>