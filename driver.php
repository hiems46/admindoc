<?php 
require 'ceklogin.php';
$getsj = mysqli_query($conn, "SELECT MIN(idsj) AS ssj FROM tb_driver");
while($hslsj=mysqli_fetch_assoc($getsj)){
$sj = $hslsj['ssj'];

}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>JANU FARM - Admin DOC</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">JANU FARM</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        
                        <li><a class="dropdown-item" href=logout.php>Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">MENU</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Data Master
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="cus.php">Master Pelanggan </a>
                                    <a class="nav-link" href="farm.php">Master Farm</a>
                                    <a class="nav-link" href="htc.php">Master Hatchery</a>
                                    <a class="nav-link" href="eksp.php">Master Ekspedisi</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Kirim DOC
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="panen.php">Data Panen </a>
                                    <a class="nav-link" href="driver.php">Data Driver </a>
                               
                                    
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts3" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Penjualan DOC
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts3" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="jual.php">Input Penjualan</a>
                                    <a class="nav-link" href="byr.php">Input Pembayaran</a>
                                </nav>
                        </div>
                            
                            
                            
                        </div>
                    </div>
                    
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">DATA DRIVER</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">PT JANU PUTRA SEJAHTERA</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Primary Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <button type="button" class="btn btn-info mb-4" data-bs-toggle="modal" data-bs-target="#myModal">
                                Tambah
                            </button>
                            <a href=index.php button type="button" class="btn btn-secondary mb-4">Kembali</button></a>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Daftar Driver
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No SJ</th>
                                            <th>Nama Sopir</th>
                                            <th>No Hp</th>
                                            <th>Ekspedisi</th>
                                            <th>No Plat</th>
                                            <th>Tgl Kirim</th>
                                            <th>Jam Kirim</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    $getdrv = mysqli_query($conn, "SELECT * FROM tb_driver 
                                    JOIN tb_sj ON tb_driver.idsj=tb_sj.idsj 
                                    JOIN tb_eksp ON tb_driver.ideks=tb_eksp.ideks
                                    ");
                                    $i=1;
                                    while($drv=mysqli_fetch_assoc($getdrv)){
                                        $no_sj = $drv['no_sj'];
                                        $nm_driver = $drv['nm_driver'];
                                        $nohp_driver = $drv['nohp_driver'];
                                        $nm_eksp = $drv['nm_eksp'];
                                        $no_kend = $drv['no_kend'];
                                        $tgl_kirim = $drv['tgl_kirim'];
                                        $jam_kirim = $drv['jam_kirim'];
                                        $iddrv = $drv['iddrv'];
                                        $idsj = $drv['idsj'];
                                       
                                    ?>
                                        <tr>
                                            <td><?=$i++?></td>
                                            <td><?=$no_sj;?></td>
                                            <td><?=$nm_driver;?></td>
                                            <td><?=$nohp_driver;?></td>
                                            <td><?=$nm_eksp;?></td>
                                            <td><?=$no_kend;?></td>
                                            <td><?=$tgl_kirim;?></td>
                                            <td><?=$jam_kirim;?></td>

                                            <td>
                                            <a class="edit" data-bs-toggle="modal" title="edit" data-bs-target="#ubah<?=$iddrv;?>"><i class="fa fa-arrows-rotate"></i></a>
                                            <a class="del" data-bs-toggle="modal" title="delete" data-bs-target="#hapus<?=$iddrv;?>"><i class="fa fa-trash-can"></i></a>
                                            
                                            </td>
                                        </tr>
                                            <!-- The Modal Ubah Pelanggan-->
                                            <div class="modal fade" id="ubah<?=$iddrv;?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Ubah Data Driver</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <form action="" method="post"
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                <input type="text" name="no_sj" class="form-control" placeholder="No SJ" value="<?=$no_sj?>" readonly>
                                                <select input type="text" name="ideks" class="form-control mt-2" placeholder="Nama Ekspedisi" value="<?=$ideks?>">
                                                <option selected value="<?=$ideks?>"><?=$nm_eksp?></option>
                                                                <?php 
                                                                $ambileksp = mysqli_query($conn, "SELECT * FROM tb_eksp");
                                                                while($hslcus=mysqli_fetch_assoc($ambileksp)){
                                                                    $ideksp=$hsleksp['ideksp'];
                                                                    $nm_eksp=$hsleksp['nm_eksp'];
                                                                    ?>
                                                                    <option value="<?=$ideksp?>"><?=$nm_eksp?></option>
                                                                <?php 
                                                                }
                                                                ?>
                                                </select>
                                                <input type="text" name="nm_driver" class="form-control mt-2" placeholder="Nama Driver" value="<?=$nm_driver?>">
                                                <input type="text" name="nohp_driver" class="form-control mt-2" placeholder="No Hp Driver" value="<?=$nohp_driver?>">
                                                <input type="text" name="no_kend" class="form-control mt-2" placeholder="No Kendaraan" value="<?=$no_kend?>">
                                                <input type="date" name="tgl_kirim" class="form-control mt-2" placeholder="Tanggal Kirim" value="<?=$tgl_kirim?>">
                                                <input type="time" id="appt" name="jam_kirim" class="form-control mt-2" placeholder="Waktu Kirim" value="<?=$jam_kirim?>">
                                                <input type="hidden" name="iddrv" value="<?=$iddrv;?>">
                                                <input type="hidden" name="idsj" value="<?=$idsj;?>">
                                            </div>

                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success" name="ubahdrv">ubah</button>
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                </div>
                                                </form>
                                                </div>
                                            </div>
                                            </div>

                                            <!-- The Modal hapus Pelanggan-->
                                            <div class="modal fade" id="hapus<?=$iddrv;?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Hapus <?=$nm_driver;?></h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <form action="" method="post"
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    Apakah anda yakin menghapus data ini?
                                                    <input type="hidden" name="iddrv" value="<?=$iddrv;?>">
                                            </div>

                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success" name="hapusdrv">Hapus</button>
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                </div>
                                                </form>
                                                </div>
                                            </div>
                                            </div>
                                        <?php 
                                         }; //end while
                                        ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
    <!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Input Data Driver</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
    <form action="" method="post"
      <!-- Modal body -->
      <div class="modal-body">
      <select input type="text" name="idsj" class="form-control mt-2" placeholder="Nomor SJ">
       <?php 
       $ambilcus = mysqli_query($conn, "SELECT * FROM tb_sj WHERE idsj NOT IN (SELECT idsj from tb_driver WHERE idsj='$sj')");
       while($hslcus=mysqli_fetch_assoc($ambilcus)){
        $idsj=$hslcus['idsj'];
        $no_sj=$hslcus['no_sj'];
        $nm_ptrnk=$hslcus['nm_ptrnk'];
        ?>
        <option value="<?=$idsj?>"><?=$no_sj?> - <?=$nm_ptrnk?></option>
       <?php 
       }
       ?>
       </select>
       
       
       <select input type="text" name="ideks" class="form-control mt-2" placeholder="Nama Ekspedisi">
       <?php 
       $ambileks = mysqli_query($conn, "SELECT * FROM tb_eksp");
       while($hsleks=mysqli_fetch_assoc($ambileks)){
        $ideks=$hsleks['ideks'];
        $nm_eksp=$hsleks['nm_eksp'];
        
        ?>
        <option value="<?=$ideks?>"><?=$nm_eksp?></option>
       <?php 
       }
       ?>
       </select>
       <input type="text" name="nm_driver" class="form-control mt-2" placeholder="Nama Driver">
       <input type="text" name="nohp_driver" class="form-control mt-2" placeholder="No Hp Driver">
       <input type="text" name="no_kend" class="form-control mt-2" placeholder="No Kendaraan">
       <input type="text" name="tgl_kirim" class="form-control mt-2" placeholder="Tanggal Kirim" onfocus="(this.type='date')" onblur="(this.type='text')" id="date">
       <input type="text" id="appt" name="jam_kirim" class="form-control mt-2" placeholder="Waktu Kirim" onfocus="(this.type='time')" onblur="(this.type='text')" id="time">
       
       
    </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" name="tmbdrv">Tambah</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </form>
    </div>
  </div>
</div>
</html>
