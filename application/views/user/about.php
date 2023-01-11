<?php $this->load->view('template/header');
// print_r(
//     $this->session->userdata()
// );
// print_r($donor);
?>

<!-- Page Wrapper -->
<div id="wrapper">



    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-gradient-primary topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <!-- <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button> -->

                <!-- Topbar Search -->

                <h3 class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 ">
                    <div class="input-group text-white">
                        <i class="fa-solid fa-file-medical"></i> &nbsp; <?= $title ?>

                    </div>
                </h3>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <?php if (isset($user['name'])) { ?>
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-white small"><?= $user['name'] ?></span>
                                <img class="img-profile rounded-circle" src="<?= base_url('asset/ui/img/') . $user['profile_pic'] ?>">
                            <?php } else { ?>
                                <a style="text-decoration:none" href="<?= base_url('auth/login') ?>">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                        <?= 'login' ?></span></a>
                            <?php } ?>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                                <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    My Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                    </li>

                </ul>

            </nav>

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <!-- This web is using CodeIgniter as Framework with MVC architecture. CodeIgniter made the website easier to build. For the appearance, this website is using Framework Sb Admin from Bootstrap. <br><br> -->

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-12 text-center">
                        <h4><strong>The web</strong></h4>
                    </div>
                    <div class="col-12">
                        Maded for final term in Web Programming II class for 4<sup>th</sup> semester,
                        this website in general is able to manage data about blood donor, spesifically in Palu City, Central Sulawesi. In this website, it is able for the user to make an account, so the user can use all the features. Without login, user only able to see input data from other user. In menu Peta Lokasi (Location Map), User can see a map that shows Palu City with some marker which pointing to some places for blood donor purpose. This website is integrated to database. The user can do CRUD (Create, Read, Update Delete) in menu <a href="<?= base_url('user/inputanSaya') ?>">Inputan saya (my input)</a>. This web has an Admin account, which can be only accessed with spessific email and password. Admin can do CRUD in both <a href="<?= base_url('user/inputanSaya') ?>">Inputan saya (my input)</a> menu and Admin's Dashboard menu (strictly only can be accessed by Admin)
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-12 text-center">
                        <h4><strong>The Developer</strong></h4>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Merryska Christy Mait</h5>
                                    <hr class=" topbar-divider">
                                    <p class="card-text">Currently studying at Tadulako University, majoring Informatics Engineering. I am interested in Back-End Development and Graphic design.
                                        Have studied some programming language in my sophomore, such as Python, HTML, CSS, C#, JavaScript, PHP, MatLab, with many frameworks and still going on.
                                        <br><br><br><br>
                                        You can contact me or kindly visit my GitHub to see my projects.
                                    </p>
                                    <div class="text-center">
                                        <a href="https://web.whatsapp.com/send?phone=6281342090439" target="_blank"><i class="fa-brands fa-whatsapp fa-2x text-success px-1"></i></a>
                                        <a href="https://www.instagram.com/merryskac/" target="_blank"><i class="fa-brands fa-instagram fa-2x px-1 text-primary"></i></a>
                                        <a href="https://github.com/merryskac" target="_blank"><i class="fa-brands fa-github fa-2x text-black px-1"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">M. Fahril</h5>
                                    <hr class=" topbar-divider">
                                    <p class="card-text">Currently studying at Tadulako University, majoring Informatics Engineering. following my passion, following my hobby i started to learn basic html since high school. As time goes by I'm getting more and more interested in graphic design and also some web programming methods ranging from HTML, CSS, JS, Bootstrap, until now I'm studying web-based application development using CodeIgniter.
                                        <br><br>
                                        You can also contact me or kindly visit my GitHub to see my projects.
                                    </p>
                                    <div class="text-center">
                                        <a href="https://web.whatsapp.com/send?phone=628134246239" target="_blank"><i class="fa-brands fa-whatsapp fa-2x text-success px-1"></i></a>
                                        <a href="https://www.instagram.com/muhammad_fchrl/" target="_blank"><i class="fa-brands fa-instagram fa-2x px-1 text-primary"></i></a>
                                        <a href="https://github.com/Fahril33" target="_blank"><i class="fa-brands fa-github fa-2x text-black px-1"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <h4><strong>What's Inside</strong></h4>
                        <div class="row">
                            <div class="col-12">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-2 col-md-6 col-sm-12">
                                                <i class="fa-brands fa-bootstrap fa-7x" style="color:blueviolet;"></i>
                                                <h5>Bootstrap</h5>
                                            </div>
                                            <div class="col-lg-2 col-md-6 col-sm-12"><i class="fa-brands fa-html5 fa-7x" style="color: orange;"></i>
                                                <h5>HTML</h5>
                                            </div>
                                            <div class="col-lg-2 col-md-6 col-sm-12"><i class="fa-brands fa-css3-alt fa-7x " style="color: orange;"></i>
                                                <h5>CSS</h5>
                                            </div>
                                            <div class="col-lg-2 col-md-6 col-sm-12"> <i class="fa-brands fa-js-square fa-7x" style="color: yellow;"></i>
                                                <h5>JavaScript</h5>
                                            </div>
                                            <div class="col-lg-2 col-md-6 col-sm-12"> <i class="fa-brands fa-php fa-7x" style="color: blue;"></i>
                                                <h5>PHP</h5>
                                            </div>
                                            <div class="col-lg-2 col-md-6 col-sm-12">
                                                <img src="<?= base_url("asset/ui/img/codeigniter.svg") ?>" alt="" style="width: 95px;">
                                                <h5>CodeIgniter</h5>
                                            </div>
                                        </div>




                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- <footer class="sticky-footer bg-gradient-primary">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span style="color:white;">Copyright &copy; Merryska Christy Mait & M. Fahril<br>2022</span>
                </div>
            </div>
        </footer> -->
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url(); ?>asset/ui/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>asset/ui/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url(); ?>asset/ui/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url(); ?>asset/ui/js/sb-admin-2.min.js"></script>

</body>

</html>