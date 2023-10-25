<?php
include ("header.php");
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Profil Bilgilerim</h1>
                            </div>
                            <form class="user" action="../php/userUpdate.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $_SESSION['id'] ?>">
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="text" name="name" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Adı Soyadı" readonly value="<?php echo $_SESSION['name'] ?>">
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email Address" readonly value="<?php echo $_SESSION['email'] ?>">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" name="confirm_password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repeat Password" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Güncelle
                                </button>
                                <hr>
                                                                
                            </form>
                            <hr>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
                    

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <?php
include ("footer.php");
?>