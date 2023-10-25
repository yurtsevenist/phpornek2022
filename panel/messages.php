<?php
include ("header.php");
include ("../php/connect.php");
$sorgu=$conn->prepare("SELECT count(*) as toplammesaj FROM contact");
$sorgu->execute();
$toplammesaj=$sorgu->fetchColumn();

$status=1;
$sorgu=$conn->prepare("SELECT count(*) as okunanmesaj FROM contact WHERE status=?");
$sorgu->execute(array($status));
$okunanmesaj=$sorgu->fetchColumn();

$status=2;
$sorgu=$conn->prepare("SELECT count(*) as cevaplananmesaj FROM contact WHERE status=?");
$sorgu->execute(array($status));
$cevaplananmesaj=$sorgu->fetchColumn();

$status=0;
$sorgu=$conn->prepare("SELECT count(*) as bekleyenmesaj FROM contact WHERE status=?");
$sorgu->execute(array($status));
$bekleyenmesaj=$sorgu->fetchColumn();

$sorgu=$conn->prepare("SELECT * FROM contact");
$sorgu->execute();
$mesajlar=$sorgu-> fetchAll(PDO::FETCH_OBJ);
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Gelen Mesajlar</h1>                 
                    </div>
                    <!-- Content Row -->
                    <div class="row">
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Toplam Mesaj Sayısı</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $toplammesaj ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-envelope fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Cevaplanan Mesaj Sayısı</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php echo $cevaplananmesaj ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-pencil-alt fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Okunan Mesaj Sayısı
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                        <?php echo $okunanmesaj ?>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-envelope-open fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Cevap Bekleyen Mesaj Sayısı</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php echo $bekleyenmesaj ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-question-circle fa-2x text-gray-300"></i>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                         <!-- DataTales Example -->
                         <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Gelen Mesajların Listesi</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Sıra</th>
                                            <th>Kimden</th>
                                            <th>E-Posta</th>
                                            <th>Telefon</th>
                                            <th>Mesaj</th>
                                            <th>Durum</th>
                                            <th>İşlemler</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($mesajlar as $mesaj) { ?>
                                            <tr>
                                                <td>#</td>
                                                <td><?=$mesaj->name?></td>
                                                <td><?=$mesaj->email?></td>
                                                <td><?=$mesaj->phone?></td>
                                                <td><?=$mesaj->message?></td>
                                                <td><?php if($mesaj->status==0) { echo "Okunmadı";} elseif($mesaj->status==1) { echo "Okundu";} else {echo "Cevaplandı";}  ?></td>
                                                <td>
                                                <a type="button" class="btn btn-secondary" <?php if($_SESSION['who']==0) {echo 'hidden';} ?> data-bs-toggle="modal" data-bs-target="#answerModal" id="<?php echo $mesaj->id ?>" message="<?php echo $mesaj->message ?>" email="<?php echo $mesaj->email ?>"><span class="fas fa-pen" title="Cevapla"></span></a> 
                                                <a type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#readModal" id="<?php echo $mesaj->id ?>" message="<?php echo $mesaj->message ?>" ><span class="fas fa-eye" title="Görüntüle"></span></a>
                                                <a type="button" class="btn btn-danger" <?php if($_SESSION['who']==0) {echo 'hidden';} ?>  data-bs-toggle="modal" data-bs-target="#deleteModal" id="<?php echo $mesaj->id ?>"><i class="fas fa-trash" title="Sil"></i></a>
                                            
                                                </td>
                                            </tr>
                                         <?php } ?>   
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
             

                </div>
                <!-- /.container-fluid -->
              
            </div>
            <!-- End of Main Content -->
            <?php
   include ("answerModal.php");         
include ("deleteModal.php");
include ("readModal.php");
include ("footer.php");
?>

        