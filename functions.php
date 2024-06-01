<?php 
session_start();
// koneksi ke database
$conn = mysqli_connect("localhost","root","","admdoc");

//function registrasi
function registrasi($data) {
    global $conn;
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $passconfirm = mysqli_real_escape_string($conn, $data["passconfirm"]);

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM tb_users WHERE username = '$username'");

    if(mysqli_fetch_assoc($result)){
        echo   "<script>
               alert ('username sudah terdaftar');
               </script>";
    return false;
    }
// cek konfirmasi password
   if( $password !== $passconfirm) {
    echo    "<script>
            alert ('konfirmasi password tidak sama');
            </script>";
   return false;
   }
   //enkripsi password
   $password = password_hash($password, PASSWORD_DEFAULT);
   
   //tambah user baru ke database
   mysqli_query($conn, "INSERT INTO tb_users VALUES('', '$username', '$password')");
   return mysqli_affected_rows($conn);
}
//Function Login
if( isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM tb_users WHERE username='$username'" );

    //Cek username
    if( mysqli_num_rows($result) === 1 ){
        //cek password
        $row = mysqli_fetch_assoc($result);
        if( password_verify($password, $row["password"]) ) {
            //cek session
            $_SESSION["login"] = true ;
            header("location: index.php");
            exit;
        }
    }
    $error = true;
}
//CRUD DATA PELANGGAN
//Function Tambah pelanggan
if( isset($_POST['tambahcus'])){
    $nama_cus = $_POST['nama_cus'];
    $alamat = $_POST['alamat'];
    $kota = $_POST['kota'];
    $propinsi = $_POST['propinsi'];
    $kategori = $_POST['kategori'];
    $cabang = $_POST['cabang'];

    $tambah = mysqli_query($conn, "INSERT INTO tb_cus(nama_cus,alamat,kota,propinsi,kategori,cabang)
    VALUES ('$nama_cus','$alamat','$kota','$propinsi','$kategori','$cabang')
    ");
    if($tambah){
        header('location: cus.php');
    } else {
        echo '
        <script>alert("Gagal Menambah Pelanggan Baru");
        window.location.href="cus.php"
        </script>
        ';
    }

}

//Function Ubah Pelanggan
if( isset($_POST['ubahcus'])){
    $idcus = $_POST['idcus'];
    $nama_cus = $_POST['nama_cus'];
    $alamat = $_POST['alamat'];
    $kota = $_POST['kota'];
    $propinsi = $_POST['propinsi'];
    $kategori = $_POST['kategori'];
    $cabang = $_POST['cabang'];

    $query = mysqli_query($conn, "UPDATE tb_cus SET 
            nama_cus='$nama_cus',
            alamat='$alamat',
            kota='$kota',
            propinsi='$propinsi',
            kategori='$kategori',
            cabang='$cabang'
        WHERE idcus='$idcus'
     ");
    if($query){
        header('location: cus.php');
    } else {
        echo '
        <script>alert("Gagal Ubah Pelanggan Baru");
        window.location.href="cus.php"
        </script>
        ';
    }
}
//Hapus data Pelanggan
if( isset($_POST['hapuscus'])){
    $idcus = $_POST['idcus'];
    $query = mysqli_query($conn, "DELETE FROM tb_cus WHERE idcus='$idcus'");
    if($query){
        header('location: cus.php');
    } else {
        echo '
        <script>alert("Gagal Hapus Pelanggan Baru");
        window.location.href="cus.php"
        </script>
        ';
    }
}
//Function Tambah farm
if( isset($_POST['tambahfarm'])){
    $nm_farm = $_POST['nm_farm'];
    $almt_farm = $_POST['almt_farm'];
    $kota = $_POST['kota'];
    $propinsi = $_POST['propinsi'];
    $status = $_POST['status'];

    $tambah = mysqli_query($conn, "INSERT INTO tb_farm(nm_farm,almt_farm,kota,propinsi,status)
    VALUES ('$nm_farm','$almt_farm','$kota','$propinsi','$status')
    ");
    if($tambah){
        header('location: farm.php');
    } else {
        echo '
        <script>alert("Gagal Menambah Farm Baru");
        window.location.href="farm.php"
        </script>
        ';
    }

}
//Function Ubah Farm
if( isset($_POST['ubahfarm'])){
    $idfarm = $_POST['idfarm'];
    $nm_farm = $_POST['nm_farm'];
    $almt_farm = $_POST['almt_farm'];
    $kota = $_POST['kota'];
    $propinsi = $_POST['propinsi'];
    $status = $_POST['status'];

    $query = mysqli_query($conn, "UPDATE tb_farm SET 
            nm_farm='$nm_farm',
            almt_farm='$almt_farm',
            kota='$kota',
            propinsi='$propinsi',
            status='$status'
        WHERE idfarm='$idfarm'
     ");
    if($query){
        header('location: farm.php');
    } else {
        echo '
        <script>alert("Gagal Ubah Data Farm ");
        window.location.href="farm.php"
        </script>
        ';
    }
}
//Hapus data Farm
if( isset($_POST['hapusfarm'])){
    $idfarm = $_POST['idfarm'];
    $query = mysqli_query($conn, "DELETE FROM tb_farm WHERE idfarm='$idfarm'");
    if($query){
        header('location: farm.php');
    } else {
        echo '
        <script>alert("Gagal Hapus Data Pelanggan");
        window.location.href="Farm.php"
        </script>
        ';
    }
}
//Function Tambah hatchery
if( isset($_POST['tambahhtc'])){
    $nm_htc = $_POST['nm_htc'];
    $almt_htc = $_POST['almt_htc'];
    $kota = $_POST['kota'];
    $propinsi = $_POST['propinsi'];
    $status = $_POST['status'];

    $tambah = mysqli_query($conn, "INSERT INTO tb_htc(nm_htc,almt_htc,kota,propinsi,status)
    VALUES ('$nm_htc','$almt_htc','$kota','$propinsi','$status')
    ");
    if($tambah){
        header('location: htc.php');
    } else {
        echo '
        <script>alert("Gagal Menambah Hatchery Baru");
        window.location.href="htc.php"
        </script>
        ';
    }

}
//Function Ubah Hatchery
if( isset($_POST['ubahhtc'])){
    $idhtc = $_POST['idhtc'];
    $nm_htc = $_POST['nm_htc'];
    $almt_htc = $_POST['almt_htc'];
    $kota = $_POST['kota'];
    $propinsi = $_POST['propinsi'];
    $status = $_POST['status'];

    $query = mysqli_query($conn, "UPDATE tb_htc SET 
            nm_htc='$nm_htc',
            almt_htc='$almt_htc',
            kota='$kota',
            propinsi='$propinsi',
            status='$status'
        WHERE idhtc='$idhtc'
     ");
    if($query){
        header('location: htc.php');
    } else {
        echo '
        <script>alert("Gagal Ubah Data htc ");
        window.location.href="htc.php"
        </script>
        ';
    }
}
//Hapus data Hatchery
if( isset($_POST['hapushtc'])){
    $idhtc = $_POST['idhtc'];
    $query = mysqli_query($conn, "DELETE FROM tb_htc WHERE idhtc='$idhtc'");
    if($query){
        header('location: htc.php');
    } else {
        echo '
        <script>alert("Gagal Hapus Data Pelanggan");
        window.location.href="htc.php"
        </script>
        ';
    }
}
//Function Tambah ekspedisi
if( isset($_POST['tambaheks'])){
    $nm_eksp = $_POST['nm_eksp'];
    $nm_pmilik = $_POST['nm_pmilik'];
    $alamat = $_POST['alamat'];
    $status = $_POST['status'];

    $tambah = mysqli_query($conn, "INSERT INTO tb_eksp(nm_eksp,nm_pmilik,alamat,status)
    VALUES ('$nm_eksp','$nm_pmilik','$alamat','$status')
    ");
    if($tambah){
        header('location: eksp.php');
    } else {
        echo '
        <script>alert("Gagal Menambah Ekspedisi Baru");
        window.location.href="eksp.php"
        </script>
        ';
    }

}
//Function Ubah ekspedisi
if( isset($_POST['ubaheks'])){
    $ideks = $_POST['ideks'];
    $nm_eksp = $_POST['nm_eksp'];
    $nm_pmilik = $_POST['nm_pmilik'];
    $alamat = $_POST['alamat'];
    $status = $_POST['status'];

    $query = mysqli_query($conn, "UPDATE tb_eksp SET 
            nm_eksp='$nm_eksp',
            nm_pmilik='$nm_pmilik',
            alamat='$alamat',
            status='$status'
        WHERE ideks='$ideks'
     ");
    if($query){
        header('location: eksp.php');
    } else {
        echo '
        <script>alert("Gagal Ubah Data htc ");
        window.location.href="eksp.php"
        </script>
        ';
    }
}
//Hapus data ekspedisi
if( isset($_POST['hapuseks'])){
    $ideks = $_POST['ideks'];
    $query = mysqli_query($conn, "DELETE FROM tb_eksp WHERE ideks='$ideks'");
    if($query){
        header('location: eksp.php');
    } else {
        echo '
        <script>alert("Gagal Hapus Data panen");
        window.location.href="eksp.php"
        </script>
        ';
    }
}

//Fungsi Membuat Nomor ROMAWI
function getRomawi($bln){
    switch ($bln){
    case 1: 
        return "I";
    break;
    case 2:
        return "II";
    break;
    case 3:
        return "III";
    break;
    case 4:
        return "IV";
    break;
    case 5:
        return "V";
    break;
    case 6:
        return "VI";
    break;
    case 7:
        return "VII";
    break;
    case 8:
        return "VIII";
    break;
    case 9:
        return "IX";
    break;
    case 10:
        return "X";
    break;
    case 11:
        return "XI";
    break;
    case 12:
        return "XII";
    break;
    }
}

//Function Tambah Data Panen
if( isset($_POST['tambahpanen'])){
    $idpanen = $_POST['idpanen'];
    $no_panen = $_POST['no_panen'];
    $tgl_candling = $_POST['tgl_candling'];
    $tgl_panen = $_POST['tgl_panen'];
    $total = $_POST['total'];

    $tambah = mysqli_query($conn, "INSERT INTO tb_panen(idpanen,no_panen,tgl_candling,tgl_panen,total)
    VALUES ('$idpanen','$no_panen','$tgl_candling','$tgl_panen','$total')
    ");
    if($tambah){
        header('location: panen.php');
    } else {
        echo '
        <script>alert("Gagal Menambah Data Panen Baru");
        window.location.href="panen.php"
        </script>
        ';
    }

}
//Function Ubah Data Panen
if( isset($_POST['ubahpanen'])){
    $idpanen = $_POST['idpanen'];
    $no_panen = $_POST['no_panen'];
    $tgl_candling = $_POST['tgl_candling'];
    $tgl_panen = $_POST['tgl_panen'];
    $total = $_POST['total'];

    $query = mysqli_query($conn, "UPDATE tb_panen SET 
            idpanen='$idpanen',
            no_panen='$no_panen',
            tgl_candling='$tgl_candling',
            tgl_panen='$tgl_panen',
            total='$total'
        WHERE idpanen='$idpanen'
     ");
    if($query){
        header('location: panen.php');
    } else {
        echo '
        <script>alert("Gagal Ubah Data Panen ");
        window.location.href="panen.php"
        </script>
        ';
    }
}
//Hapus data Panen
if( isset($_POST['hapuspanen'])){
    $idpanen = $_POST['idpanen'];
    $query = mysqli_query($conn, "DELETE FROM tb_panen WHERE idpanen='$idpanen'");
    if($query){
        header('location: panen.php');
    } else {
        echo '
        <script>alert("Gagal Hapus Data panen");
        window.location.href="panen.php"
        </script>
        ';
    }
}
//Function Tambah Data Kirim DOC
if( isset($_POST['tambahsj'])){
    $idsj = $_POST['idsj'];
    $idcus = $_POST['idcus'];
    $no_sj = $_POST['no_sj'];
    $idpanen = $_POST['idpanen'];
    $nm_ptrnk = $_POST['nm_ptrnk'];
    $almt_ptrnk = $_POST['almt_ptrnk'];
    $nohp_ptrnk = $_POST['nohp_ptrnk'];
    $nm_brg = $_POST['nm_brg'];
    $jml_box = $_POST['jml_box'];
    $bns_ekor = $_POST['bns_ekor'];
    $jml_ekor = $_POST['jml_ekor'];
    $ttldoc = $_POST['ttldoc'];
    $ket = $_POST['ket'];

// Total Stok panen
   $hit1 = mysqli_query($conn,"SELECT * FROM tb_panen WHERE idpanen='$idpanen'");
   $hit2 = mysqli_fetch_assoc($hit1);
   $pnnow = $hit2['total'];
// jumlah total doc terkirim
   $total = mysqli_query($conn, "SELECT SUM(ttldoc) AS jml FROM tb_sj WHERE idpanen='$idpanen'");
   while($ttl=mysqli_fetch_assoc($total)){
       $jumtot =$ttl['jml'];
   }
       if($pnnow>$jumtot){
    //Panen Ok
            $tambah = mysqli_query($conn, "INSERT INTO tb_sj(idsj,idcus,no_sj,idpanen,nm_ptrnk,
            almt_ptrnk,nohp_ptrnk,nm_brg,jml_box,bns_ekor,jml_ekor,ttldoc,ket)
            VALUES ('$idsj','$idcus','$no_sj','$idpanen','$nm_ptrnk','$almt_ptrnk','$nohp_ptrnk'
            ,'$nm_brg','$jml_box','$bns_ekor','$jml_ekor','$ttldoc','$ket')
            ");
            if($tambah){
            header('location: addsj.php?idpn='.$idpanen);
            } else {
                echo '
                <script>alert("Gagal Menambah Data Kirim Baru");
                window.location.href="addsj.php?idpn='.$idpanen.'"
                </script>
                ';
            }
   } else {
                echo '
                <script>alert("Jumlah Panen tidak cukup");
                window.location.href="addsj.php?idpn='.$idpanen.'"
                </script>
                ';
   }
  
        
}
//Function Ubah Data Kirim DOC
if( isset($_POST['ubahsj'])){
    $idsj = $_POST['idsj'];
    $idcus = $_POST['idcus'];
    $no_sj = $_POST['no_sj'];
    $idpanen = $_POST['idpanen'];
    $nm_ptrnk = $_POST['nm_ptrnk'];
    $almt_ptrnk = $_POST['almt_ptrnk'];
    $nohp_ptrnk = $_POST['nohp_ptrnk'];
    $nm_brg = $_POST['nm_brg'];
    $jml_box = $_POST['jml_box'];
    $bns_ekor = $_POST['bns_ekor'];
    $jml_ekor = $_POST['jml_ekor'];
    $ttldoc = $_POST['ttldoc'];
    $ket = $_POST['ket'];

    $query = mysqli_query($conn, "UPDATE tb_sj SET 
            idsj='$idsj',
            idcus='$idcus',
            no_sj='$no_sj',
            idpanen='$idpanen',
            nm_ptrnk='$nm_ptrnk',
            almt_ptrnk='$almt_ptrnk',
            nohp_ptrnk='$nohp_ptrnk',
            nm_brg='$nm_brg',
            jml_box='$jml_box',
            bns_ekor='$bns_ekor',
            jml_ekor='$jml_ekor',
            ttldoc='$ttldoc',
            ket='$ket'
        WHERE idsj='$idsj'
     ");
    if($query){
        header('location: addsj.php?idpn='.$idpanen);
    } else {
        echo '
        <script>alert("Gagal Ubah Data kirim ");
        window.location.href="addsj.php?idpn='.$idpanen.'"
        </script>
        ';
    }
}
//Hapus data kirim doc
if( isset($_POST['hapussj'])){
    $idpanen = $_POST['idsj'];
    $query = mysqli_query($conn, "DELETE FROM tb_sj WHERE idsj='$idsj'");
    if($query){
        header('location: addsj.php?idpn='.$idpanen);
    } else {
        echo '
        <script>alert("Gagal Hapus Data panen");
        window.location.href="addsj.php?idpn='.$idpanen.'"
        </script>
        ';
    }
}

//Function Tambah Data detail kirim DOC
if( isset($_POST['tambahdtlsj'])){
    
    $idsj = $_POST['idsj'];
    $idhtc = $_POST['idhtc'];
    $idfarm = $_POST['idfarm'];
    $kd = $_POST['kd'];
    $bonus = $_POST['bonus'];
    $qty = $_POST['qty'];
    $qtyttl = $_POST['qtyttl'];

// Jumlah DOC yg dikirim berdasar no sj
    $hit1 = mysqli_query($conn,"SELECT * FROM tb_sj WHERE idsj='$idsj'");
    $hit2 = mysqli_fetch_assoc($hit1);
    $qtypersj = $hit2['ttldoc'];
// jumlah total doc berdasarkan farm
    $total = mysqli_query($conn, "SELECT SUM(qtyttl) AS Qty  FROM tb_dtsj WHERE idsj='$idsj'");
    while($ttl=mysqli_fetch_assoc($total)){
    $jumtot =$ttl['Qty'];
    
}
    if($qtypersj>$jumtot){
            $tambah = mysqli_query($conn, "INSERT INTO tb_dtsj(iddtsj,idsj,idhtc,idfarm,kd,bonus,
            qty,qtyttl)
            VALUES ('','$idsj','$idhtc','$idfarm','$kd','$bonus','$qty','$qtyttl')
            ");
            if($tambah){
            header('location: kirimdtl.php?idkrm='.$idsj);
            } else {
            echo '
            <script>alert("Gagal Data");
            window.location.href="kirimdtl.php?idkrm='.$idsj.'"
            </script>
            ';
            }
    } else {
        echo '
                <script>alert("Inputan melebihi Data DOC SJ");
                window.location.href="kirimdtl.php?idkrm='.$idsj.'"
                </script>
                ';
    }
}
//Function Ubah Data Detail Kirim DOC
if( isset($_POST['ubahdtsj'])){
    $iddtsj = $_POST['iddtsj'];
    $idsj = $_POST['idsj'];
    $idhtc = $_POST['idhtc'];
    $idfarm = $_POST['idfarm'];
    $kd = $_POST['kd'];
    $qty = $_POST['qty'];

    $query = mysqli_query($conn, "UPDATE tb_dtsj SET 
            iddtsj='$iddtsj',
            idsj='$idsj',
            idhtc='$idhtc',
            idfarm='$idfarm',
            kd='$kd',
            qty='$qty'
            
        WHERE iddtsj='$iddtsj'
     ");
    if($query){
        header('location: kirimdtl.php?idkrm='.$idsj);
    } else {
        echo '
        <script>alert("Gagal Ubah Data");
        window.location.href="kirimdtl.php?idkrm='.$idsj.'"
        </script>
        ';
    }
}

//Hapus data detail kirim doc
if( isset($_POST['hapusdtsj'])){
    $iddtsj = $_POST['iddtsj'];
    $query = mysqli_query($conn, "DELETE FROM tb_dtsj WHERE iddtsj='$iddtsj'");
    if($query){
        header('location: kirimdtl.php?idkrm='.$idsj);
    } else {
        echo '
        <script>alert("Gagal Hapus Data ");
        window.location.href="kirimdtl.php?idkrm='.$idsj.'"
        </script>
        ';
    }
}
//Function Tambah Data Driver
if( isset($_POST['tmbdrv'])){
    $iddrv = $_POST['iddrv'];
    $idsj = $_POST['idsj'];
    $ideks = $_POST['ideks'];
    $nm_driver = $_POST['nm_driver'];
    $nohp_driver = $_POST['nohp_driver'];
    $no_kend = $_POST['no_kend'];
    $tgl_kirim = $_POST['tgl_kirim'];
    $jam_kirim = $_POST['jam_kirim'];

    $tambah = mysqli_query($conn, "INSERT INTO tb_driver(iddrv,idsj,ideks,nm_driver,nohp_driver,no_kend,tgl_kirim,jam_kirim)
    VALUES ('$iddrv','$idsj','$ideks','$nm_driver','$nohp_driver','$no_kend','$tgl_kirim','$jam_kirim')
    ");
    if($tambah){
        header('location:driver.php');
    } else {
        echo '
        <script>alert("Gagal Menambah Data Baru");
        window.location.href="driver.php"
        </script>
        ';
    }

}
//Function Ubah Data driver
if( isset($_POST['ubahdrv'])){
    $iddrv = $_POST['iddrv'];
    $idsj = $_POST['idsj'];
    $ideks = $_POST['ideks'];
    $nm_driver = $_POST['nm_driver'];
    $nohp_driver = $_POST['nohp_driver'];
    $no_kend = $_POST['no_kend'];
    $tgl_kirim = $_POST['tgl_kirim'];
    $jam_kirim = $_POST['jam_kirim'];

    $query = mysqli_query($conn, "UPDATE tb_driver SET 
            iddrv='$iddrv',
            idsj='$idsj',
            ideks='$ideks',
            nm_driver='$nm_driver',
            nohp_driver='$nohp_driver',
            tgl_kirim='$tgl_kirim',
            jam_kirim='$jam_kirim'
            WHERE iddrv='$iddrv'
            ");
        if($query){
            header('location: driver.php');
            } else {
            echo '
               <script>alert("Gagal Ubah Data ");
               window.location.href="driver.php"
               </script>
                '; 
            }
}  

//Hapus data data driver
if( isset($_POST['hapusdrv'])){
    $iddrv = $_POST['iddrv'];
    $query = mysqli_query($conn, "DELETE FROM tb_driver WHERE iddrv='$iddrv'");
    if($query){
        header('location: driver.php');
    } else {
        echo '
        <script>alert("Gagal Hapus Data ");
        window.location.href="driver.php"
        </script>
        ';
    }
}
//Function Tambah Data Invoice
if( isset($_POST['tbpj'])){
    $idinv = $_POST['idinv'];
    $idsj = $_POST['idsj'];
    $tgl_inv = $_POST['tgl_inv'];
    $tgl_jtp = $_POST['tgl_jtp'];
    $harga = $_POST['harga'];
    $total = $_POST['total'];

    $tambah = mysqli_query($conn, "INSERT INTO tb_pjn(idinv,idsj,tgl_inv,tgl_jtp,harga,total)
    VALUES ('$idinv','$idsj','$tgl_inv','$tgl_jtp','$harga','$total')
    ");
    if($tambah){
        header('location: jual.php');
    } else {
        echo '
        <script>alert("Gagal Menambah Data ");
        window.location.href="jual.php"
        </script>
        ';
    }

}
?>