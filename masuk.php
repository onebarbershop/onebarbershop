<?php
require 'function.php';
require 'cek.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Barang Masuk</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">One-Barbershop</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
           
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Persediaan Barang
                            </a>
                            <a class="nav-link" href="masuk.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Barang Masuk
                            </a>
                            <a class="nav-link" href="keluar.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Barang Keluar
                            </a>
                            <a class="nav-link" href="logout.php">
                                Logout
                            </a>
                        </div>
                    </div>                
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Barang Masuk</h1>
                        
                        
                        <div class="card mb-4">
                            <div class="card-header">
                               <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                 Tambah Barang
                                </button>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Tanggal</th>
                                                    <th>Nama Barang</th>
                                                    <th>Jumlah</th>
                                                    <th>Keterangan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>                                    
                                            <tbody>
                                            
                                                <?php
                                                $ambilsemuadatastock = mysqli_query($conn,"select * from masuk m, stock s where s.idbarang = m.idbarang");
                                                while($data=mysqli_fetch_array($ambilsemuadatastock)){
                                                    $idb = $data['idbarang'];
                                                    $idm = $data['idmasuk'];
                                                    $tanggal= $data['tanggal'];
                                                    $namabarang = $data['namabarang'];
                                                    $qty = $data['qty'];
                                                    $keterangan = $data['keterangan'];
                                                
                                                ?>
                                                <tr>
                                                    <td><?=$tanggal;?></td>
                                                    <td><?=$namabarang;?></td>
                                                    <td><?=$qty;?></td>
                                                    <td><?=$keterangan;?></td>
                                                    <td>
                                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$idb;?>">
                                                        Edit
                                                    </button> 
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$idb;?>">
                                                        Delete
                                                    </button> 
                                                    </td>
                                                </tr>  
                                                <!-- Edit Modal -->
                                                <div class="modal fade" id="edit<?=$idb;?>">
                                                    <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Edit Barang</h4>
                                                            <button type="button" class="btn btn-close" data-dismiss="modal"></button>
                                                        </div>
                                                        <form method="post">
                                                        <div class="modal-body">
                                                            <input type="text" name="keterangan" value="<?=$keterangan;?>" class="form-control" required>
                                                            <br>
                                                            <input type="number" name="qty" value="<?=$qty;?>" class="form-control" required>
                                                            <br>
                                                            <input type="hidden" name="idb" value="<?=$idb;?>">
                                                            <input type="hidden" name="idm" value="<?=$idm;?>">
                                                            <button type="submit" class="btn btn-primary" name="updatebarangmasuk">Submit</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                    </div>
                                                    </div>          
                                                    
                                                    <!-- Delete Modal -->
                                                    <div class="modal fade" id="delete<?=$idb;?>">
                                                    <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Delete Barang?</h4>
                                                            <button type="button" class="button btn-close" data-dismiss="modal"></button>
                                                        </div>
                                                        <form method="post">
                                                        <div class="modal-body">
                                                            Apakah Anda yakin ingin menghapus <?=$namabarang;?>?
                                                            <input type="hidden" name="idb" value="<?=$idb;?>">
                                                            <input type="hidden" name="idm" value="<?=$idm;?>">
                                                            <input type="hidden" name="kty" value="<?=$qty;?>">
                                                            <br>
                                                            <br>
                                                            <button type="submit" class="btn btn-danger" name="deletebarangmasuk">Delete</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                    </div>
                                                    </div>   


                                                <?php
                                                };
                                                ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>    
                            </div>
                        </div>          
                    </div>    
                    </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Kelompok 1</div>
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
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    
    </body>
      
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Barang Masuk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post">
            <div class="modal-body">
            <select name="barangnya" class="form-control">
                <?php
                    $ambilsemuadatanya = mysqli_query($conn,"select * from stock");
                    while($fetcharray = mysqli_fetch_array($ambilsemuadatanya)){
                        $namabarangnya = $fetcharray['namabarang'];
                        $idbarangnya = $fetcharray['idbarang'];
                ?>

                <option value="<?=$idbarangnya;?>"><?=$namabarangnya?></option>

                <?php
                    }   
                ?>                                 
            </select>
                <br>
                <input type="number" name="qty" class="form-control" placeholder="Quantity" required>
                <br>
                <input type="text" name="penerima" class="form-control" placeholder="Penerima" required>
                <br>
                <button type="submit" class="btn btn-primary" name="barangmasuk">Submit</button>
            </div>
            </form>
        </div>
    </div>
    </div>
</html>
