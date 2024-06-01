<?php 
require 'ceklogin.php';
//Membuat No Surat Otomatis
$bulan = date('n');
$romawi = getRomawi($bulan);
$tahun  = date ('y');
$nomor = "/DCVK-JP/".$romawi."/".$tahun;

// membaca kode / nilai tertinggi dari penomoran yang ada didatabase berdasarkan tanggal
$result = "SELECT MAX(idsj) as maxKode FROM tb_sj";
$hasil = mysqli_query($conn, $result);
$data  = mysqli_fetch_assoc($hasil);
$no= $data['maxKode'];
$noUrut= $no + 1;

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
                                    <a class="nav-link" href="kirim.php">Kirim DOC</a>
                                    
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
                        <h1 class="mt-4">DATA SURAT JALAN DOC</h1>
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
                                Daftar Surat Jalan
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Surat Jalan</th>
                                            <th>No Panen</th>
                                            <th>Nama Pelanggan</th>
                                            <th>Nama Peternak</th>
                                            <th>Alamat Peternak</th>
                                            <th>No Hp Peternak</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah Box</th>
                                            <th>Jumlah DOC</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    $getsj = mysqli_query($conn, "SELECT * FROM tb_sj
                                    JOIN tb_cus ON tb_sj.idcus=tb_cus.idcus 
                                    JOIN tb_panen ON tb_sj.idpanen=tb_panen.idpanen
                                    ");
                                    $i=1;
                                    while($sj=mysqli_fetch_assoc($getsj)){
                                        $idsj = $sj['idsj'];
                                        $no_sj= $sj['no_sj'];
                                        $idpanen = $sj['idpanen'];
                                        $idcus = $sj['idcus'];
                                        $no_panen= $sj['no_panen'];
                                        $nama_cus= $sj['nama_cus'];
                                        $nm_ptrnk= $sj['nm_ptrnk'];
                                        $almt_ptrnk= $sj['almt_ptrnk'];
                                        $nohp_ptrnk= $sj['nohp_ptrnk'];
                                        $nm_brg= $sj['nm_brg'];
                                        $jml_box= $sj['jml_box'];
                                        $jml_ekor= $sj['jml_ekor'];
                                        $ket= $sj['ket'];
                                    ?>
                                        <tr>
                                            <td><?=$i++?></td>
                                            <td><?=$no_sj;?></td>
                                            <td><?=$no_panen;?></td>
                                            <td><?=$nama_cus;?></td>
                                            <td><?=$nm_ptrnk;?></td>
                                            <td><?=$almt_ptrnk;?></td>
                                            <td><?=$nohp_ptrnk;?></td>
                                            <td><?=$nm_brg;?></td>
                                            <td><?=number_format($jml_box);?></td>
                                            <td><?=number_format($jml_ekor);?></td>
                                            <td><?=$ket;?></td>
                                            <td>
                                            <a class="add" href="kirimdtl.php?idkrm=<?=$idsj;?>" target="blank" title="add"><i class="fa fa-pen-to-square"></i></a>
                                            <a class="edit" data-bs-toggle="modal" title="ubah" data-bs-target="#ubah<?=$idsj;?>"><i class="fa fa-arrows-rotate"></i></a>
                                            <a class="del" data-bs-toggle="modal" title="del" data-bs-target="#hapus<?=$idsj;?>"><i class="fa fa-trash-can"></i></a>
                                            
                                            
                                            </td>
                                        </tr>
                                            <!-- The Modal Ubah data Kirim-->
                                            <div class="modal fade" id="ubah<?=$idsj;?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Ubah Data Surat Jalan DOC</h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>
                                                <form action="" method="post"
                                                <!-- Modal body -->
                                                        <div class="modal-body">
                                                            <input type="text" name="no_sj" class="form-control" placeholder="Nomor SJ" value="<?=$no_sj;?>" readonly >    
                                                            <select input type="text" name="idcus" class="form-control mt-2" placeholder="Nama Pelanggan" value="<?=$idcus;?>">
                                                            <option selected value="<?=$idcus?>"><?=$nama_cus?></option>
                                                                <?php 
                                                                $ambilcus = mysqli_query($conn, "SELECT * FROM tb_cus");
                                                                while($hslcus=mysqli_fetch_assoc($ambilcus)){
                                                                    $idcus=$hslcus['idcus'];
                                                                    $nama_cus=$hslcus['nama_cus'];
                                                                    ?>
                                                                    <option value="<?=$idcus?>"><?=$nama_cus?></option>
                                                                <?php 
                                                                }
                                                                ?>
                                                                        
                                                            </select>
                                                            <input type="text" name="nm_ptrnk" class="form-control mt-2" placeholder="Nama Peternak" value="<?=$nm_ptrnk;?>">
                                                            <input type="text" name="almt_ptrnk" class="form-control mt-2" placeholder="Alamat Peternak" value="<?=$almt_ptrnk;?>">
                                                            <input type="text" name="nohp_ptrnk" class="form-control mt-2" placeholder="No HP Peternak" value="<?=$nohp_ptrnk;?>">
                                                            <input type="text" name="nm_brg" class="form-control mt-2" placeholder="Nama Barang" value="<?=$nm_brg;?>">
                                                            <input type="number" name="jml_box" class="form-control mt-2" placeholder="Jumlah Box" value="<?=$jml_box;?>">
                                                            <input type="number" name="jml_ekor" class="form-control mt-2" placeholder="Jumlah Ekor" value="<?=$jml_ekor;?>">
                                                            <input type="text" name="ket" class="form-control mt-2" placeholder="Keterangan" value="<?=$ket;?>">
                                                            <input type="hidden" name="idsj" value="<?=$idsj;?>">
                                                            <input type="hidden" name="idpanen" value="<?=$idpanen;?>">
                                                            
                                                        </div>

                                                <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-success" name="ubahsj">ubah</button>
                                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- The Modal hapus Farm-->
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
        <h4 class="modal-title">Tambah Data Surat Jalan</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
    <form action="" method="post"
      <!-- Modal body -->
      <div class="modal-body">
       <input type="text" name="no_sj" class="form-control" placeholder="No SJ" value="<?=$nomorbaru?>" readonly> 
       <select name="idpanen" input type="text" class="form-control mt-2" placeholder="Nomor Panen">
       <?php 
       $ambilnopanen = mysqli_query($conn, "SELECT * FROM tb_panen");
       while($pnn=mysqli_fetch_assoc($ambilnopanen)){
        $idpanen = $pnn['idpanen'];
        $no_panen=$pnn['no_panen'];
        ?>
        <option value="<?=$idpanen?>"><?=$no_panen?></option>
       <?php 
       }
       ?>
       </select>
       <select input type="text" name="idcus" class="form-control mt-2" placeholder="Nama Pelanggan">
       <?php 
       $ambilcus = mysqli_query($conn, "SELECT * FROM tb_cus");
       while($hslcus=mysqli_fetch_assoc($ambilcus)){
        $idcus=$hslcus['idcus'];
        $nama_cus=$hslcus['nama_cus'];
        ?>
        <option value="<?=$idcus?>"><?=$nama_cus?></option>
       <?php 
       }
       ?>
       </select>
       
       <input type="text" name="nm_ptrnk" class="form-control mt-2" placeholder="Nama Peternak">
       <input type="text" name="almt_ptrnk" class="form-control mt-2" placeholder="Alamat Peternak">
       <input type="text" name="nohp_ptrnk" class="form-control mt-2" placeholder="No Hp Peternak">
       <input type="text" name="nm_brg" class="form-control mt-2" placeholder="Nama Barang">
       <input type="text" name="jml_box" class="form-control mt-2" placeholder="Jumlah Box">
       <input type="text" name="jml_ekor" class="form-control mt-2" placeholder="Jumlah Ekoran">
       <input type="text" name="ket" class="form-control mt-2" placeholder="Keterangan">
    </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" name="tambahsj">Tambah</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </form>
    </div>
  </div>
</div>
</html>
