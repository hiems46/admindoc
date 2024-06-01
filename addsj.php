<?php 
require 'ceklogin.php';
if(isset($_GET['idpn'])){
    $idpn = $_GET['idpn'];
} else {
    header('location:panen.php');
}
//Membuat No Surat Otomatis
$bulan = date('n');
$romawi = getRomawi($bulan);
$tahun  = date ('y');
$nomor = "/DCVK-JP/".$romawi."/".$tahun;

// membaca kode / nilai tertinggi dari penomoran yang ada didatabase berdasarkan tanggal
$result = "SELECT * FROM tb_sj";
$hasil = mysqli_query($conn, $result);
$data  = mysqli_num_rows($hasil);
$noUrut= $data + 1;


//membuat Nomor Surat Otomatis dengan awalan depan 0 misalnya , 01,02 
//jika ingin 003 ,tinggal ganti %03
//$kode =  sprintf("%03s", $noUrut);
$nomorbaru = $noUrut.$nomor;


$getpn = mysqli_query($conn, "SELECT * FROM tb_panen WHERE $idpn=idpanen");
while($pndc=mysqli_fetch_assoc($getpn)){
   $idpanen = $pndc ['idpanen'];
   $no_panen = $pndc ['no_panen'];
}
$total = mysqli_query($conn, "SELECT SUM(ttldoc) AS jml FROM tb_sj WHERE $idpn=idpanen");
while($ttl=mysqli_fetch_assoc($total)){
    $jumtot =$ttl['jml'];
    
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
                    
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">DATA KIRIM DOC</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">PT JANU PUTRA SEJAHTERA</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">No Panen : <?=$no_panen;?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <div class="small text-white">Jumlah DOC : <?=number_format($jumtot);?> Ekor </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                            <button type="button" class="btn btn-info mb-4" data-bs-toggle="modal" data-bs-target="#myModal">
                                Tambah
                            </button>
                            <a href=panen.php button type="button" class="btn btn-secondary mb-4">Kembali</button></a>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data Kirim DOC
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No SJ</th>
                                            <th>Nama Customer</th>
                                            <th>Nama Peternak</th>
                                            <th>Alamat Peternak</th>
                                            <th>No Hp Peternak</th>
                                            <th>Nama Barang</th>
                                            <th>Box</th>
                                            <th>Bonus</th>
                                            <th>Doc</th>
                                            <th>Total</th>
                                            <th>Ket</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $pn = $_GET['idpn'];
                                    $getdtpn = mysqli_query($conn, "SELECT * FROM tb_sj sj,tb_panen pn, tb_cus cs WHERE sj.idpanen=pn.idpanen AND sj.idcus=cs.idcus AND sj.idpanen=$pn
                                    ");
                                    
                                    while($pndtl=mysqli_fetch_assoc($getdtpn)){
                                        $idsj = $pndtl['idsj'];
                                        $idcus = $pndtl['idcus'];
                                        $cabang = $pndtl['cabang'];
                                        $nama_cus = $pndtl['nama_cus'];
                                        $no_sj= $pndtl['no_sj'];
                                        $idpanen = $pndtl['idpanen'];
                                        $no_panen= $pndtl['no_panen'];
                                        $nm_ptrnk= $pndtl['nm_ptrnk'];
                                        $almt_ptrnk= $pndtl['almt_ptrnk'];
                                        $nohp_ptrnk= $pndtl['nohp_ptrnk'];
                                        $nm_brg= $pndtl['nm_brg'];
                                        $jml_box= $pndtl['jml_box'];
                                        $bns_ekor= $pndtl['bns_ekor'];
                                        $jml_ekor= $pndtl['jml_ekor'];
                                        $ttldoc= $pndtl['ttldoc'];
                                        $ket= $pndtl['ket'];  
                                    ?>
                                        <tr>
                                            <td><?=$no_sj;?></td>
                                            <td><?=$nama_cus;?></td>
                                            <td><?=$nm_ptrnk;?></td>
                                            <td><?=$almt_ptrnk;?></td>
                                            <td><?=$nohp_ptrnk;?></td>
                                            <td><?=$nm_brg;?></td>
                                            <td><?=number_format($jml_box);?></td>
                                            <td><?=number_format($bns_ekor);?></td>
                                            <td><?=number_format($jml_ekor);?></td>
                                            <td><?=number_format($ttldoc);?></td>
                                            <td><?=$ket;?></td>
                                            <td>
                                            <a class="add" href="kirimdtl.php?idkrm=<?=$idsj;?>"  target="blank" title="addfarm"><i class="fa fa-pen-to-square"></i></a>
                                            <a class="edit" data-bs-toggle="modal" title="edit" data-bs-target="#ubah<?=$idsj;?>"><i class="fa fa-arrows-rotate"></i></a>
                                            <a class="del" data-bs-toggle="modal" title="delete" data-bs-target="#hapus<?=$idsj;?>"><i class="fa fa-trash-can"></i></a>
                                            </td>                                       
                                        </tr>
                                        
                                            <!-- The Modal Ubah SJ-->
                                            <div class="modal fade" id="ubah<?=$idsj;?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                            <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Ubah Data SJ DOC</h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>
                                                <form name="hitAutoForm2" action="" method="post"
                                                <!-- Modal body -->
                                                        <div class="modal-body">
                                                            <input type="text" name="no_sj" class="form-control" placeholder="Nomor SJ" value="<?=$no_sj;?>" readonly >
                                                            <select name="idcus" input type="text" class="form-control mt-2" placeholder="Nama Customer">
                                                            <option selected value="<?=$idcus?>"><?=$nama_cus?>-<?=$cabang?></option>
                                                                <?php 
                                                                $ablidcus = mysqli_query($conn, "SELECT * FROM tb_cus");
                                                                while($cuss=mysqli_fetch_assoc($ablidcus)){
                                                                $idcus = $cuss['idcus'];
                                                                $nama_cus=$cuss['nama_cus'];
                                                                $cabang=$cuss['cabang'];
                                                                ?>
                                                                <option value="<?=$idcus?>"><?=$nama_cus?>-<?=$cabang?></option>
                                                                <?php 
                                                                }
                                                                ?>
                                                                </select>
                                                                <input type="text" name="nm_ptrnk" class="form-control mt-2" placeholder="Nama Peternak" value="<?=$nm_ptrnk;?>">
                                                                <input type="text" name="almt_ptrnk" class="form-control mt-2" placeholder="Alamat Peternak" value="<?=$almt_ptrnk;?>">
                                                                <input type="text" name="nohp_ptrnk" class="form-control mt-2" placeholder="No HP Peternak" value="<?=$nohp_ptrnk;?>">
                                                                <input type="text" name="nm_brg" class="form-control mt-2" placeholder="Nama Barang" value="<?=$nm_brg;?>">
                                                                <input type="text" name="jml_box" class="form-control mt-2" placeholder="Jumlah Box" value="<?=$jml_box;?>">
                                                                <input type="text" name="bns_ekor" id="bns_ekor" class="form-control mt-2" placeholder="Bonus DOC" value="<?=$bns_ekor;?>" onFocus="startHit();" required>
                                                                <input type="text" name="jml_ekor" id="jml_ekor" class="form-control mt-2" placeholder="Jumlah DOC" value="<?=$jml_ekor;?>" onFocus="startHit();" onBlur="stopHit();" required>
                                                                <input type="text" name="ttldoc"  id="ttldoc" class="form-control mt-2" placeholder="total" onchange="tryNumberFormat(this.form.thirdBox);" readonly>
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
                                                        
                                            <script type="text/javascript">
                                                function startHit(){
                                                interval = setInterval("hit()",1);}
                                                function hit(){
                                                a = document.hitAutoForm2.bns_ekor.value;
                                                b = document.hitAutoForm2.jml_ekor.value;
                                                document.hitAutoForm2.ttldoc.value = (a*1)+(b*1);}
                                                function stopHit(){
                                                clearInterval(interval);}
                                            </script>
                                                                                                        
                                                
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- The Modal hapus Farm-->
                                            <div class="modal fade" id="hapus<?=$idsj?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Hapus <?=$nama_cus;?> - <?=$nm_ptrnk;?></h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <form action="" method="post"
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    Apakah anda yakin menghapus data ini?
                                                    <input type="hidden" name="idsj" value="<?=$idsj;?>">
                                            </div>

                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success" name="hapussj">Hapus</button>
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
                    <h4 class="modal-title">Tambah Data Kirim DOC</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
    <form name="autoSumForm" action="" method="post"
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
                    <select name="idcus" input type="text" class="form-control mt-2" placeholder="Nama Customer">
                    <?php 
                    $ablidcus = mysqli_query($conn, "SELECT * FROM tb_cus");
                    while($cuss=mysqli_fetch_assoc($ablidcus)){
                        $idcus = $cuss['idcus'];
                        $nama_cus=$cuss['nama_cus'];
                        $cabang=$cuss['cabang'];
                        ?>
                        <option value="<?=$idcus?>"><?=$nama_cus?>-<?=$cabang?></option>
                    <?php 
                    }
                    ?>
                    </select>
                    <input type="text" name="nm_ptrnk" class="form-control mt-2" placeholder="Nama Peternak">
                    <input type="text" name="almt_ptrnk" class="form-control mt-2" placeholder="Alamat Peternak">
                    <input type="text" name="nohp_ptrnk" class="form-control mt-2" placeholder="No Hp Peternak">
                    <input type="text" name="nm_brg" class="form-control mt-2" placeholder="Nama Barang">
                    <input type="text" name="jml_box" class="form-control mt-2" placeholder="Jumlah Box" min="1" required>
                    <input type="text" name="bns_ekor" class="form-control mt-2" placeholder="Bonus DOC" onFocus="startCalc();" required>
                    <input type="text" name="jml_ekor" class="form-control mt-2" placeholder="Jumlah DOC" min="1" onFocus="startCalc();" onBlur="stopCalc();" required>
                    <input type="text" name="ttldoc" class="form-control mt-2" placeholder="Total" onchange="tryNumberFormat(this.form.thirdBox);" readonly>
                    <input type="text" name="ket" class="form-control mt-2" placeholder="Keterangan">
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" name="tambahsj">Tambah</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    </form> 
            <script type="text/javascript">
                function startCalc(){
                interval = setInterval("calc()",1);}
                function calc(){
                y = document.autoSumForm.bns_ekor.value;
                z = document.autoSumForm.jml_ekor.value;
                document.autoSumForm.ttldoc.value = (y*1)+(z*1);}
                function stopCalc(){
                clearInterval(interval);}
            </script>
        </div>
    </div>
</div>

</html>
