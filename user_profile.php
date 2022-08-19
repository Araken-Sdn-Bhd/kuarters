<?php

include 'db_conn.php'; 
$aid=$_SESSION['aid'];
$query=mysqli_query($conn,"SELECT * from user where id= '$aid'");
$ret=mysqli_fetch_array($query);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> <?php echo $ret['name']; ?> </title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

<?php

include 'navbar.php'; 

?>
        
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    
                <div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">

<?php  
            
            $db_host="localhost"; //localhost server 
            $db_user="root";	//database username
            $db_password="";	//database password   
            $db_name="ekuarters_admin";	//database name
                        
            try
            {
            $db=new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                }
            catch(PDOEXCEPTION $e)
                {
                $e->getMessage();
                }

            $select_stmt=$db->prepare("SELECT gambar FROM user where id='$aid'");	//sql select query
            $select_stmt->execute();
            $row=$select_stmt->fetch(PDO::FETCH_ASSOC); 

            $query=mysqli_query($conn,"SELECT * from user where id= '$aid'");
            $ret=mysqli_fetch_array($query);
?>
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="img/<?php echo $row['gambar']; ?>"><span class="font-weight-bold"> <?php echo $ret['name']; ?> </span><span class="text-black-50">roslan@mail.com.my</span><span> </span></div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profil Anda</h4>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Nama</label><input type="text" readonly class="form-control" placeholder="nama" value="<?php echo $ret['name']; ?>"></div>
                    <div class="col-md-12"><label class="labels">Nombor Tentera</label><input type="text" readonly class="form-control" placeholder="nombor tentera" value="<?php echo $ret['no_tentera']; ?>"></div>
                    <div class="col-md-12"><label class="labels">Taraf Pendidikan</label><input type="text" readonly class="form-control" placeholder="" value="<?php echo $ret['taraf_pendidikan']; ?>"></div>
                    <div class="col-md-12"><label class="labels">Pangkat</label><input type="text" readonly class="form-control" placeholder="pangkat" value="<?php echo $ret['pangkat']; ?>"></div>
                    <div class="col-md-12"><label class="labels">Status</label><input type="text" readonly class="form-control" placeholder="status" value="<?php echo $ret['status']; ?>"></div>
                    <div class="col-md-12"><label class="labels">Alamat Baris 1</label><input type="text" readonly class="form-control" placeholder="" value="<?php echo $ret['alamat_baris1']; ?>"></div>
                    <div class="col-md-12"><label class="labels">Alamat Baris 2</label><input type="text" readonly class="form-control" placeholder="" value="<?php echo $ret['alamat_baris2']; ?>"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">Poskod</label><input type="text" readonly class="form-control" placeholder="" value="<?php echo $ret['poskod']; ?>"></div>
                    <div class="col-md-6"><label class="labels">Negeri</label><input type="text" readonly class="form-control" value="<?php echo $ret['negeri']; ?>" placeholder=""></div>
                </div>
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" readonly type="button">Permohonan Kemaskini ke HRMIS</button></div>
            </div>
        </div> 
        <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience"><span>Ruang Tambahan</span></div><br>
                <!-- <div class="col-md-12"><label class="labels">Experience in Designing</label><input type="text" class="form-control" placeholder="experience" value=""></div> <br>
                <div class="col-md-12"><label class="labels">Additional Details</label><input type="text" class="form-control" placeholder="additional details" value=""></div> -->
            </div>
        </div>
    </div>
</div>
</div>
</div>
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
                </div>
                <!-- /.container-fluid -->

                
            
            </div>
            <!-- End of Main Content (from navbar.php)-->


            


        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>