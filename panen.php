<?php 
require 'ceklogin.php';
//Membuat No Surat Otomatis
$bulan = date('n');
$romawi = getRomawi($bulan);
$tahun  = date ('y');
$nomor = "/PNDC-JP/".$romawi."/".$tahun;

// membaca kode / nilai tertinggi dari penomoran yang ada didatabase berdasarkan tanggal
$result = "SELECT * FROM tb_panen";
$hasil = mysqli_query($conn, $result);
$data  = mysqli_num_rows($hasil);
$noUrut= $data + 1;



//membuat Nomor Surat Otomatis dengan awalan depan 0 misalnya , 01,02 
//jika ingin 003 ,tinggal ganti %03
//$kode =  sprintf("%03s", $noUrut);
$nomorbaru = $noUrut.$nomor;

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
                        <h1 class="mt-4">DATA PANEN DOC</h1>
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
                                Daftar Panen
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Panen</th>
                                            <th>Tanggal Candling</th>
                                            <th>Tanggal Panen</th>
                                            <th>Jumlah</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    $getpanen = mysqli_query($conn, "SELECT * FROM tb_panen");
                                    $i=1;
                                    while($panen=mysqli_fetch_assoc($getpanen)){
                                        $idpanen = $panen['idpanen'];
                                        $no_panen= $panen['no_panen'];
                                        $tgl_candling = $panen['tgl_candling'];
                                        $tgl_panen = $panen['tgl_panen'];
                                        $total = $panen['total'];
                                    ?>
                                        <tr>
                                            <td><?=$i++?></td>
                                            <td><?=$no_panen;?></td>
                                            <td><?=date('d/m/Y',strtotime($tgl_candling));?></td>
                                            <td><?=date('d/m/Y',strtotime($tgl_panen));?></td>
                                            <td><?=number_format($total);?></td>
                                            <td>
                                            <a class="add" href="addsj.php?idpn=<?=$idpanen;?>"  target="blank" title="addsj"><i class="fa fa-pen-to-square"></i></a>
                                            <a class="edit" data-bs-toggle="modal" title="edit" data-bs-target="#ubah<?=$idpanen;?>"><i class="fa fa-arrows-rotate"></i></a>
                                            <a class="del" data-bs-toggle="modal" title="delete" data-bs-target="#hapus<?=$idpanen;?>"><i class="fa fa-trash-can"></i></a>
                                        </tr>
                                            <!-- The Modal Ubah data Panen-->
                                            <div class="modal fade" id="ubah<?=$idpanen;?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Ubah Data Panen DOC</h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>
                                                <form action="" method="post"
                                                <!-- Modal body -->
                                                        <div class="modal-body">
                                                            <input type="text" name="no_panen" class="form-control" placeholder="Kode Panen" value="<?=$no_panen;?>" readonly >
                                                            <input type="date" name="tgl_candling" class="form-control mt-2" placeholder="Tanggal Candling" value="<?=$tgl_candling;?>">
                                                            <input type="date" name="tgl_panen" class="form-control mt-2" placeholder="Tanggal Panen" value="<?=$tgl_panen;?>">
                                                            <input type="text" name="total" class="form-control mt-2" placeholder="Total" value="<?=$total;?>">
                                                            <input type="hidden" name="idpanen" value="<?=$idpanen;?>">
                                                        </div>

                                                <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-success" name="ubahpanen">ubah</button>
                                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- The Modal hapus data-->
                                            <div class="modal fade" id="hapus<?=$idpanen;?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Hapus <?=$no_panen;?></h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <form action="" method="post"
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    Apakah anda yakin menghapus data ini?
                                                    <input type="hidden" name="idpanen" value="<?=$no_panen;?>">
                                            </div>

                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success" name="hapuspanen">Hapus</button>
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
        <h4 class="modal-title">Tambah Data Panen</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
    <form action="" method="post"
      <!-- Modal body -->
      <div class="modal-body">
       <input type="text" name="no_panen" class="form-control" placeholder="Id Panen" value="<?=$nomorbaru?>" readonly> 
       <input type="text" name="tgl_candling" class="form-control" mt-2 placeholder="Tanggal Candling" onfocus="(this.type='date')" onblur="(this.type='text')" id="date">
       <input type="text" name="tgl_panen" class="form-control mt-2" placeholder="Tanggal Panen" onfocus="(this.type='date')" onblur="(this.type='text')" id="date">
       <input type="text" name="total" class="form-control mt-2" placeholder="Jumlah Panen">
        </select>
       
    </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" name="tambahpanen">Tambah</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </form>
    </div>
  </div>
</div>
</html>
