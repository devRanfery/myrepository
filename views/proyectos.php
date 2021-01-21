<?php
session_start();

if (isset($_SESSION['numControl'])) {
  require_once('../controllers/proyectosController.php');
  $num_Control = $_SESSION['numControl'];
  $filas = proyectosController::GetAllProjects($num_Control);
}else{
  header("Location: ../index.php");
}

?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>My Repository</title>
    <!-- Custom styles for this page -->
    <link
      rel="stylesheet"
      type="text/css"
      href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css"
    />


    <!-- Custom fonts for this template-->

    <link
      href="../vendor/fontawesome-free/css/all.min.css"
      rel="stylesheet"
      type="text/css"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
      rel="stylesheet"
    />

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet" />
  </head>

  <body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
      <!-- Sidebar -->
      <?php
      require_once('sidebar.php');
      ?>
      <!-- End of Sidebar -->

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
          <!-- Topbar -->
          <?php
            require_once('navbar.php');
          ?>
          <!-- End of Topbar -->

          <!-- Begin Page Content -->
          <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h1 class="h3 mb-0 text-gray-800">Mis proyectos</h1>
              <!-- <a
                href="#"
                class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
                ><i class="fas fa-download fa-sm text-white-50"></i>Subir Proyecto</a
              > -->
              <button
                type="button"
                class="btn btn-primary"
                data-toggle="modal"
                data-target="#exampleModal"
              >
                Subir proyecto
              </button>
            </div>

            <!-- Content Row -->
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mb-4">
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Lista</h6>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table
                        class="table table-bordered"
                        id="dataTableProjects"
                        width="100%"
                        cellspacing="0"
                      >
                        <thead>
                          <tr>
                            <th>Nombre</th>
                            <th>Alumno</th>
                            <th>Compañia</th>
                            <th>Fecha</th>
                            <th>Ruta</th>
                            <th></th>
                            <th></th>
                          </tr>
                        </thead>

                        <tbody>
                          <?php
                          foreach($filas as $proyecto){?>
                          <tr style="text-align: center">
                            <td><?php echo $proyecto['Nombre']?></td>
                            <td><?php echo $proyecto['Alumno']?></td>
                            <td><?php echo $proyecto['Compania']?></td>
                            <td><?php echo 
                            date_format($proyecto['Fecha'], 'Y-m-d')
                            ?></td>
                            <td><a href="../public/proyectos/<?php echo $proyecto['Ruta']?>">Abrir</a></td>
                            <td>
                            <button class="btn btn-primary" onclick="editProject(<?php echo $proyecto['Id']?>)">
                              <i class="fas fa-edit text-white"></i></button>
                            </td>
                            <td>
                              <button class="btn btn-danger" onclick="deleteProject(<?php echo $proyecto['Id']?>)">
                              <i class="fas fa-trash-alt text-white"></i></button>
                            </td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <?php
            require_once('footer.php');
          ?>
        <!-- End of Footer -->
      </div>
      <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>


    <!-- MODAL ADD -->
    <!-- Modal -->
    <div
      class="modal fade"
      id="exampleModal"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Nuevo proyecto</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="../ajax/addProject.php" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <label>Nombre del proyecto</label>
                <input
                  type="text"
                  class="form-control"
                  name="nombre"
                />
              </div>
              <div class="form-group" id="inpNoControl">
                <input
                  type="text"
                  class="form-control"
                  name="noControl"
                  value="<?php echo $num_Control;?>"
                />
              </div>
              <div class="form-group">
                <label>Compañia</label>
                <input
                  type="text"
                  class="form-control"
                  name="compania"
                />
              </div>
              <div class="form-group">
                <input
                  type="text"
                  class="form-control"
                  name="fecha"
                  id="inp_fecha"
                  style="display: none;"
                />
              </div>
              <div class="form-group">
              <label>Subir documento</label>
              <input type="file" class="form-control-file" name="archivo">
              </div>
              
              <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
          </div>
        </div>
      </div>
    </div>

<!-- MODAL UPDATE PROJECTO -->
    <div
      class="modal fade"
      id="ModalUpdateProject"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Proyecto</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="../ajax/updateProject.php" method="POST" enctype="multipart/form-data">

              <input
                  type="text"
                  class="form-control"
                  name="id"
                  id="idProject"
                  style="display:none"
                />
              <div class="form-group">
                <label>Nombre del proyecto</label>
                <input
                  type="text"
                  class="form-control"
                  name="nombre"
                  id="nombreUpdate"
                />
              </div>
              <div class="form-group" id="inpNoControlUpdate">
                <input
                  type="text"
                  class="form-control"
                  name="noControl"
                  value="<?php echo $num_Control;?>"
                />
              </div>
              <div class="form-group">
                <label>Compañia</label>
                <input
                  type="text"
                  class="form-control"
                  name="compania"
                  id="companiaUpdate"
                />
              </div>
              <div class="form-group">
                <input
                  type="text"
                  class="form-control"
                  name="fecha"
                  id="inpFecha"
                  style="display: none;"
                />
              </div>
              <!-- <div class="form-group">
              <label>Subir documento</label>
              <input type="file" class="form-control-file" id="fileProject" name="archivo">
              </div> -->

              <div class="form-group">
              <label>Documento</label>
              <br>
              <input type="text" class="form-control" id="link" name="ruta" style="display:none;">
              <a href="" id="linkDocument">Ver documento</a>
              </div>
              
              <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <script
      type="text/javascript"
      charset="utf8"
      src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"
    ></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>
    
    <script src="../js/projects.js"></script>

    
  </body>
</html>
