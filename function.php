<?php
session_start();

//membuat koneksi ke database
$conn = mysqli_connect("localhost","root","","stockbarang");


//menambah barang baru
if(isset($_POST['addnewbarang'])){
    $namabarang = $_POST['namabarang'];
    $deskripsi = $_POST['deskripsi'];
    $stock = $_POST['stock'];

    $addtotable = mysqli_query($conn,"Insert Into stock (namabarang, deskripsi, stock) values('$namabarang', '$deskripsi', '$stock')");
    if($addtotable){
        header('location:index.php');
    } else {
        echo 'Gagal';
        header('location:index.php');
    }
};

//menambah barang masuk
if(isset($_POST['barangmasuk'])){
    $barangnya = $_POST['barangnya'];
    $penerima = $_POST['penerima'];
    $qty = $_POST['qty'];

    $cekstocksekarang = mysqli_query($conn,"select * from stock where idbarang='$barangnya'");
    $ambildatanya = mysqli_fetch_array($cekstocksekarang);

    $stocksekarang = $ambildatanya['stock'];
    $tambahkanstocksekarangdenganquantity = $stocksekarang+$qty;

    $addtomasuk = mysqli_query($conn,"insert into masuk (idbarang, keterangan, qty) values('$barangnya', '$penerima', '$qty')");
    $updatestocksekarang = mysqli_query($conn,"update stock set stock='$tambahkanstocksekarangdenganquantity' where idbarang='$barangnya'");
    if($addtomasuk&&$updatestocksekarang){
        header('locaton:masuk.php');
    } else {
        echo 'Gagal';
        header('location:masuk.php');
    }
    
};


//menambah barang masuk
if(isset($_POST['barangkeluar'])){
    $barangnya = $_POST['barangnya'];
    $penerima = $_POST['penerima'];
    $qty = $_POST['qty'];

    $cekstocksekarang = mysqli_query($conn,"select * from stock where idbarang='$barangnya'");
    $ambildatanya = mysqli_fetch_array($cekstocksekarang);

    $stocksekarang = $ambildatanya['stock'];
    $kurangkanstocksekarangdenganquantity = $stocksekarang-$qty;

    $addtokeluar = mysqli_query($conn,"insert into keluar (idbarang, penerima, qty) values('$barangnya', '$penerima', '$qty')");
    $updatestocksekarang = mysqli_query($conn,"update stock set stock='$kurangkanstocksekarangdenganquantity' where idbarang='$barangnya'");
    if($addtokeluar&&$updatestocksekarang){
        header('locaton:keluar.php');
    } else {
        echo 'Gagal';
        header('location:keluar.php');
    }
    
};


//update info barang
if(isset($_POST['updatebarang'])){
    $idb = $_POST['idb'];
    $namabarang = $_POST['namabarang'];
    $deskripsi = $_POST['deskripsi'];

    $update = mysqli_query($conn,"update stock set namabarang='$namabarang', deskripsi='$deskripsi' where idbarang='$idb'");
    if($update){
        header('locaton:index.php');
    } else {
        echo 'Gagal';
        header('location:index.php');
    }

}


//menghapus barang dari stock
if(isset($_POST['deletebarang'])){
    $idb = $_POST['idb'];
    
    $hapus = mysqli_query($conn,"delete from stock where idbarang='$idb'");
    if($hapus){
        header('locaton:index.php');
    } else {
        echo 'Gagal';
        header('location:index.php');
    }

};

//mengubah data barang masuk
if(isset($_POST['updatebarangmasuk'])){
    $idb = $_POST['idb'];
    $idm = $_POST['idm'];
    $deskripsi = $_POST['keterangan'];  
    $qty = $_POST['qty'];

    $lihatstock = mysqli_query($conn,"select * from stock where idbarang='$idb'");
    $stocknya = mysqli_fetch_array($lihatstock);
    $stockskrg = $stocknya['stock'];

    $qtyskrg = mysqli_query($conn,"select * from masuk where idmasuk='$idm'");
    $qtynya = mysqli_fetch_array($qtyskrg);
    $qtyskrg = $qtynya['qty'];
    
    if($qty>$qtyskrg){
        $selisih = $qty-$qtyskrg;
        $kurangin = $stockskrg+$selisih;
        $kurangistocknya = mysqli_query($conn,"update stock set stock='$kurangin' where idbarang='$idb'");
        $updatenya = mysqli_query($conn,"update masuk set qty='$qty', keterangan='$deskripsi' where idmasuk='$idm'");
            if($kurangistocknya&&$updatenya){
                header('locaton:masuk.php');
            } else {
                echo 'Gagal';
                header('location:masuk.php');
            }
    } else {
        $selisih = $qtyskrg-$qty;
        $kurangin = $stockskrg-$selisih;
        $kurangistocknya = mysqli_query($conn,"update stock set stock='$kurangin' where idbarang='$idb'");
        $updatenya = mysqli_query($conn,"update masuk set qty='$qty', keterangan='$deskripsi' where idmasuk='$idm'");
            if($kurangistocknya&&$updatenya){
                header('locaton:masuk.php');
            } else {
                echo 'Gagal';
                header('location:masuk.php');
            }

    }
}


//menghapus barang masuk
if(isset($_POST['deletebarangmasuk'])){
    $idb = $_POST['idb'];
    $idm = $_POST['idm'];
    $qty = $_POST['kty'];

    $getdatastock = mysqli_query($conn,"select * from stock where idbarang='$idb'");
    $data = mysqli_fetch_array($getdatastock);
    $stok = $data['stock'];
    
    $selisih = $stok-$qty;

    $update = mysqli_query($conn,"update stock set stock='$selisih' where idbarang='$idb'");
    $hapusdata = mysqli_query($conn,"delete from masuk where idmasuk='$idm'");
    
    if($update&&$hapusdata){
        header('locaton:masuk.php');
    } else {
        header('location:masuk.php');
    }

};
    

//mengubah data barang keluar
if(isset($_POST['updatebarangkeluar'])){
    $idb = $_POST['idb'];
    $idk = $_POST['idk'];
    $penerima = $_POST['penerima'];  
    $qty = $_POST['qty'];

    $lihatstock = mysqli_query($conn,"select * from stock where idbarang='$idb'");
    $stocknya = mysqli_fetch_array($lihatstock);
    $stockskrg = $stocknya['stock'];

    $qtyskrg = mysqli_query($conn,"select * from keluar where idkeluar='$idk'");
    $qtynya = mysqli_fetch_array($qtyskrg);
    $qtyskrg = $qtynya['qty'];
    
    if($qty>$qtyskrg){
        $selisih = $qty-$qtyskrg;
        $kurangin = $stockskrg-$selisih;
        $kurangistocknya = mysqli_query($conn,"update stock set stock='$kurangin' where idbarang='$idb'");
        $updatenya = mysqli_query($conn,"update keluar set qty='$qty', penerima='$penerima' where idkeluar='$idk'");
            if($kurangistocknya&&$updatenya){
                header('locaton:keluar.php');
            } else {
                echo 'Gagal';
                header('location:keluar.php');
            }
    } else {
        $selisih = $qtyskrg-$qty;
        $kurangin = $stockskrg+$selisih;
        $kurangistocknya = mysqli_query($conn,"update stock set stock='$kurangin' where idbarang='$idb'");
        $updatenya = mysqli_query($conn,"update keluar set qty='$qty', penerima='$penerima' where idkeluar='$idk'");
            if($kurangistocknya&&$updatenya){
                header('locaton:keluar.php');
            } else {
                echo 'Gagal';
                header('location:keluar.php');
            }

    }
}


//menghapus barang keuar
if(isset($_POST['deletebarangkeluar'])){
    $idb = $_POST['idb'];
    $idk = $_POST['idk'];
    $qty = $_POST['kty'];

    $getdatastock = mysqli_query($conn,"select * from stock where idbarang='$idb'");
    $data = mysqli_fetch_array($getdatastock);
    $stok = $data['stock'];
    
    $selisih = $stok+$qty;

    $update = mysqli_query($conn,"update stock set stock='$selisih' where idbarang='$idb'");
    $hapusdata =mysqli_query($conn,"delete from keluar where idkeluar='$idk'");
    if($update&&$hapusdata){
        header('location:keluar.php');
    } else {
        header('location:keluar.php');
    }

};

?>