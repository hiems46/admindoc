<?php 
 require 'ceklogin.php';
$idsj =$_GET['idsj'];
$getinv = mysqli_query($conn, "SELECT * FROM tb_sj sj, tb_driver dr, tb_cus cs WHERE sj.idsj=dr.idsj AND sj.idcus=cs.idcus AND sj.idsj='$idsj'");
$sj = mysqli_fetch_array($getinv);
$data = array (
    'tgl_kirim' => $sj['tgl_kirim'],
    'idcus' => $sj['idcus'],
    'nm_brg' => $sj['nm_brg'],
    'alamat' => $sj['alamat'],
    'jml_ekor' => $sj['jml_ekor']
        );

echo json_encode($data);

?>