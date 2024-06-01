<?php 
require 'ceklogin.php';
if(isset($_GET['idkrm'])){
    $idkrm = $_GET['idkrm'];
} else {
    header('location:addsj.php');
}
$ambilsj = mysqli_query($conn, "SELECT * FROM tb_sj WHERE $idkrm=idsj");
while($sjku=mysqli_fetch_assoc($ambilsj)){
    $idsj = $sjku ['idsj'];
    $no_sj = $sjku ['no_sj'];
    $nm_ptrnk = $sjku ['nm_ptrnk'];
}
$total = mysqli_query($conn, "SELECT SUM(qtyttl) AS jml FROM tb_dtsj WHERE $idkrm=idsj");
while($ttl=mysqli_fetch_assoc($total)){
    $jumtot =$ttl['jml'];
    
}
$getidpn = mysqli_query($conn, "SELECT DISTINCT idpanen AS pnn FROM tb_sj WHERE $idkrm=idsj");
while($pn=mysqli_fetch_assoc($getidpn)){
    $panen =$pn['pnn'];

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
                        <h1 class="mt-4">DATA ASAL FARM</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">PT JANU PUTRA SEJAHTERA</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">No SJ :<?=$no_sj;?> - <?=$nm_ptrnk;?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <div class="small text-white">Jumlah DOC : <?=number_format($jumtot);?> Ekor </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                            <button type="button" class="btn btn-info mb-4" data-bs-toggle="modal" data-bs-target="#myModal">
                                Tambah
                            </button>
                            <a href=addsj.php?idpn=<?=$panen;?> button type="button" class="btn btn-secondary mb-4">Kembali</button></a>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Daftar Asal Farm
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Asal Hatchery</th>
                                            <th>Asal Farm</th>
                                            <th>Asal Kandang</th>
                                            <th>Bonus</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    $krm = $_GET['idkrm'];
                                    $getdtsj = mysqli_query($conn, "SELECT * FROM tb_dtsj d, tb_sj s, tb_htc h, tb_farm f where d.idsj=s.idsj AND d.idhtc=h.idhtc AND d.idfarm=f.idfarm AND d.idsj=$krm
                                    ");
                                    $i=1;
                                    while($sjdtl=mysqli_fetch_assoc($getdtsj)){
                                        $iddtsj = $sjdtl['iddtsj'];
                                        $no_sj = $sjdtl['no_sj'];
                                        $nm_htc = $sjdtl['nm_htc'];
                                        $nm_farm = $sjdtl['nm_farm'];
                                        $kd = $sjdtl['kd'];
                                        $bonus = $sjdtl['bonus'];
                                        $qty = $sjdtl['qty'];
                                        $qtyttl = $sjdtl['qtyttl'];
                                        $idsj = $sjdtl['idsj'];
                                        
                                    ?>
                                        <tr>
                                            <td><?=$i++?></td>
                                            <td><?=$nm_htc;?></td>
                                            <td><?=$nm_farm;?></td>
                                            <td><?=$kd;?></td>
                                            <td><?=number_format($bonus);?></td>
                                            <td><?=number_format($qty);?></td>
                                            <td><?=number_format($qtyttl);?></td>
                                            <td>
                                            
                                            
                                            <a class="edit" data-bs-toggle="modal" title="edit" data-bs-target="#ubah<?=$iddtsj;?>"><i class="fa fa-arrows-rotate"></i></a>
                                            <a class="del" data-bs-toggle="modal" title="delete" data-bs-target="#hapus<?=$iddtsj;?>"><i class="fa fa-trash-can"></i></a>

                                            
                                            </td>
                                        </tr>
                                            <!-- The Modal Ubah SJ-->
                                            <div class="modal fade" id="ubah<?=$iddtsj;?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                        <h4 class="modal-title">Ubah Data Detail SJ DOC</h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                        <form action="" method="post"                                        
                                        <!-- Modal body -->
                                        <div class="modal-body">
                                        <select name="idsj" input type="text" class="form-control mt-2" placeholder="Nomor SJ" value="<?=$idsj;?>" readonly>
                                        <?php 
                                        $krm = $_GET['idkrm'];
                                        $getnosj = mysqli_query($conn, "SELECT * FROM tb_sj WHERE $krm=idsj");
                                        while($sj=mysqli_fetch_assoc($getnosj)){
                                            $idsj = $sj['idsj'];
                                            $no_sj=$sj['no_sj'];
                                            ?>
                                            <option value="<?=$idsj?>"><?=$no_sj?></option>
                                        <?php 
                                        }
                                        ?>
                                        </select>
                                        <select type="text" name="idhtc" class="form-control mt-2" placeholder="Nama HTC" value="<?=$idhtc?>">
                                                <option selected value="<?=$idhtc?>"><?=$nm_htc?></option>
                                        <?php 
                                        
                                        $gethtc = mysqli_query($conn, "SELECT * FROM tb_htc");
                                        while($htc=mysqli_fetch_assoc($gethtc)){
                                            $idhtc = $htc['idhtc'];
                                            $nm_htc=$htc['nm_htc'];
                                            ?>
                                            <option value="<?=$idhtc?>"><?=$nm_htc?></option>
                                        <?php 
                                        }
                                        ?>
                                        </select>
                                        <select type="text" name="idfarm" class="form-control mt-2" placeholder="Nama Farm" value="<?=$idfarm?>">
                                                <option selected value="<?=$idfarm?>"><?=$nm_farm?></option>
                                        <?php 
                                        
                                        $getfrm = mysqli_query($conn, "SELECT * FROM tb_farm");
                                        while($frm=mysqli_fetch_assoc($getfrm)){
                                            $idfarm = $frm['idfarm'];
                                            $nm_farm=$frm['nm_farm'];
                                            ?>
                                            <option value="<?=$idfarm?>"><?=$nm_farm?></option>
                                        <?php 
                                        }
                                        ?>
                                        </select>
                                        <select input type="text" name="kd" class="form-select mt-2" aria-label="Default select example" value="<?=$kd;?>">
                                                <option selected><?=$kd;?></option>
                                                <option value="KD01">KD01</option>
                                                <option value="KD02">KD02</option>
                                                <option value="KD03">KD03</option>
                                                <option value="KD04">KD04</option>
                                                <option value="KD05">KD05</option>
                                                <option value="KD06">KD06</option>
                                                <option value="KD07">KD07</option>
                                                <option value="KD08">KD08</option>
                                                <option value="KD09">KD09</option>
                                                <option value="KD10">KD10</option>
                                                <option value="KD11">KD11</option>
                                                <option value="KD12">KD12</option>
                                                <option value="KD13">KD13</option>
                                                <option value="KD14">KD14</option>
                                                <option value="KD15">KD15</option>
                                                <option value="KD16">KD16</option>
                                                <option value="KD17">KD17</option>
                                                <option value="KD18">KD18</option>
                                                <option value="KD19">KD19</option>
                                                <option value="KD20">KD20</option>
                                            </select>
                                            <input type="number" name="qty" class="form-control mt-2" placeholder="Jumlah DOC" value="<?=$qty;?>">
                                            <input type="hidden" name="iddtsj" value="<?=$iddtsj;?>">
                                        </div>
                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success" name="ubahdtsj">ubah</button>
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                </div>
                                                </form>
                                                </div>
                                            </div>
                                            </div>

                                            <!-- The Modal hapus detail SJ-->
                                            <div class="modal fade" id="hapus<?=$iddtsj?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Hapus <?=$no_sj;?></h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <form action="" method="post"
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    Apakah anda yakin menghapus data ini?
                                                    <input type="hidden" name="iddtsj" value="<?=$iddtsj;?>">
                                            </div>

                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success" name="hapusdtsj">Hapus</button>
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
        <h4 class="modal-title">Tambah Data Asal DOC</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
    <form name="autoSumForm" action="" method="post"
      <!-- Modal body -->
      <div class="modal-body">
      <select name="idsj" input type="text" class="form-control mt-2" placeholder="Nomor SJ" readonly>
       <?php 
       $krm = $_GET['idkrm'];
       $getnosj = mysqli_query($conn, "SELECT * FROM tb_sj WHERE $krm=idsj");
       while($sj=mysqli_fetch_assoc($getnosj)){
        $idsj = $sj['idsj'];
        $no_sj=$sj['no_sj'];
        ?>
        <option value="<?=$idsj?>"><?=$no_sj?></option>
       <?php 
       }
       ?>
       </select>
       <select name="idhtc" input type="text" class="form-control mt-2" placeholder="Asal Hatchery">
       <?php 
       $idkrm = $_GET['idkrm'];
       $gethtc = mysqli_query($conn, "SELECT * FROM tb_htc");
       while($htc=mysqli_fetch_assoc($gethtc)){
        $idhtc = $htc['idhtc'];
        $nm_htc=$htc['nm_htc'];
        ?>
        <option value="<?=$idhtc?>"><?=$nm_htc?></option>
       <?php 
       }
       ?>
       </select>
       <select name="idfarm" input type="text" class="form-control mt-2" placeholder="Asal Farm">
       <?php 
       $getfrm = mysqli_query($conn, "SELECT * FROM tb_farm");
       while($frm=mysqli_fetch_assoc($getfrm)){
        $idfarm = $frm['idfarm'];
        $nm_farm=$frm['nm_farm'];
        ?>
        <option value="<?=$idfarm?>"><?=$nm_farm?></option>
       <?php 
       }
       ?>
       </select>
       <select input type="text" name="kd" class="form-select mt-2" aria-label="Default select example">
            <option selected>Asal Kandang</option>
            <option value="KD01">KD01</option>
            <option value="KD02">KD02</option>
            <option value="KD03">KD03</option>
            <option value="KD04">KD04</option>
            <option value="KD05">KD05</option>
            <option value="KD06">KD06</option>
            <option value="KD07">KD07</option>
            <option value="KD08">KD08</option>
            <option value="KD09">KD09</option>
            <option value="KD10">KD10</option>
            <option value="KD11">KD11</option>
            <option value="KD12">KD12</option>
            <option value="KD13">KD13</option>
            <option value="KD14">KD14</option>
            <option value="KD15">KD15</option>
            <option value="KD16">KD16</option>
            <option value="KD17">KD17</option>
            <option value="KD18">KD18</option>
            <option value="KD19">KD19</option>
            <option value="KD20">KD20</option>
        </select>
        <input type="text" name="bonus" id="bonus" class="form-control mt-2" placeholder="Bonus DOC" onFocus="startCalc();" required>
        <input type="text" name="qty" id="qty" class="form-control mt-2" placeholder="Jumlah DOC" min="1" onFocus="startCalc();" onBlur="stopCalc();" required>
        <input type="text" name="qtyttl" id="qtyttl" class="form-control mt-2" placeholder="Total" onchange="tryNumberFormat(this.form.thirdBox);" required>
    </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" name="tambahdtlsj">Tambah</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </form>
    <script type="text/javascript">
                function startCalc(){
                interval = setInterval("calc()",1);}
                function calc(){
                y = document.autoSumForm.bonus.value;
                z = document.autoSumForm.qty.value;
                document.autoSumForm.qtyttl.value = (y*1)+(z*1);}
                function stopCalc(){
                clearInterval(interval);}
            </script>
    </div>
  </div>
</div>
</html>
