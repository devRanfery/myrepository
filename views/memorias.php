<?php
session_start();

if (isset($_SESSION['numControl'])) {
  $num_Control = $_SESSION['numControl'];
  require_once('../controllers/memoriasController.php');
  $filas = memoriasController::GetAllMemory($num_Control);

  require_once('../controllers/memoriasController.php');
  $typesMemory = memoriasController::GetAllTypeMemory();


  require_once('../controllers/asignacionesController.php');
  $adviser = asignacionesController::GetAdviserByStudent($num_Control);

  require_once('../controllers/proyectosController.php');
  $project= proyectosController::GetAllProjects($num_Control);
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
        <!-- Custom styles for this page -->
        <link
      rel="stylesheet"
      type="text/css"
      href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css"
    />

    <title>My Repository</title>

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
              <h1 class="h3 mb-0 text-gray-800">Memorias</h1>
              <button
                type="button"
                class="btn btn-primary"
                data-toggle="modal"
                data-target="#ModalAddMemory"
              >
                Subir proyecto
              </button>
            </div>

            <!-- Content Row -->
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mb-4">
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Lista de proyectos</h6>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table
                        class="table table-bordered"
                        id="dataTable"
                        width="100%"
                        cellspacing="0"
                      >
                        <thead>
                          <tr>
                            <th>Fecha</th>
                            <th>Proyecto</th>
                            <th>Compañia</th>
                            <th>Memoria</th>
                            <th>Asesor</th>
                            <th>Ruta</th>
                            <th></th>
                            <th></th>
                          </tr>
                        </thead>

                        <tbody>
                          <?php
                          foreach($filas as $memoria){?>
                          <tr style="text-align: center">
                            <td><?php echo date_format($memoria['Fecha'], 'Y-m-d')?></td>
                            <td><?php echo $memoria['N_Proyecto']?></td>
                            <td><?php echo $memoria['Compania']?></td>
                            <td><?php echo $memoria['Descripcion']?></td>
                            <td><?php echo $memoria['Nombre']; echo $memoria['Ape_P']; echo $memoria['Ape_M'];?></td>
                            <td><a href="public/proyectos/<?php echo $memoria['Ruta']?>">Abrir</a></td>
                            <td>
                            <button class="btn btn-primary modificar" onclick="editMemory(<?php echo $memoria['Id']?>)">
                              <i class="fas fa-edit text-white"></i></button>
                            </td>
                            <td>
                              <button class="btn btn-danger eliminar" onclick="deleteMemory(<?php echo $memoria['Id']?>)">
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

    <!-- Logout Modal-->
    <div
      class="modal fade"
      id="logoutModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            Select "Logout" below if you are ready to end your current session.
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">
              Cancel
            </button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- MODAL ADD MEMORY -->
    <div
      class="modal fade"
      id="ModalAddMemory"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Memorias</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="../ajax/addMemory.php" method="POST" enctype="multipart/form-data">

            <div class="form-group">
                <label>Proyecto</label>
                <select class="form-control" name="proyecto">
                <option selected>Seleccionar</option>
                <?php foreach($project as $proyecto){?>
                      <option value=<?php echo $proyecto['Id'];?>>
                      <?php 
                      echo $proyecto['Nombre']; 
                      ?>
                      <strong>(<?php  echo $proyecto['Compania'];?>)</strong>
                      </option>
                <?php } ?>
                </select>
              </div>

              <div class="form-group">
                <label>Tipo de Memoria</label>
                <select class="form-control" id="typeMemory" name="tipoMemoria">
                <option selected>Seleccionar</option>
                <?php foreach($typesMemory as $tipoMemoria){?>
                      <option value=<?php echo $tipoMemoria['Id'];?>>
                      <?php 
                      echo $tipoMemoria['Descripcion'];
                      ?>
                      </option>
                <?php } ?>
                </select>
              </div>
              
            <div class="form-group" id="selectAsesor">
                <label>Asesor</label>
                <select class="form-control" name="asesor">
                <option selected>Seleccionar</option>
                <?php foreach($adviser as $asesor){?>
                      <option value=<?php echo $asesor['Asesor'];?>>
                      <?php 
                      echo $asesor['Nombre']; 
                      echo ' ';
                      echo $asesor['Ape_P'];
                      echo ' '; 
                      echo $asesor['Ape_M'];
                      ?>
                      <strong>(<?php  echo $asesor['Descripcion'];?>)</strong>
                      </option>
                <?php } ?>
                </select>
              </div>

              <div class="form-group" id="selectAsesor2" style="display:none">
                <label>Asesor 2</label>
                <select class="form-control" name="asesor2">
                <option selected>Seleccionar</option>
                <?php foreach($adviser as $asesor){?>
                      <option value=<?php echo $asesor['Asesor'];?>>
                      <?php 
                      echo $asesor['Nombre']; 
                      echo ' ';
                      echo $asesor['Ape_P'];
                      echo ' '; 
                      echo $asesor['Ape_M'];
                      ?>
                      <strong>(<?php  echo $asesor['Descripcion'];?>)</strong>
                      </option>
                <?php } ?>
                </select>
              </div>

              <div class="form-group" id="selectAsesor3"  style="display:none">
                <label>Asesor 3</label>
                <select class="form-control" name="asesor3">
                <option selected>Seleccionar</option>
                <?php foreach($adviser as $asesor){?>
                      <option value=<?php echo $asesor['Asesor'];?>>
                      <?php 
                      echo $asesor['Nombre']; 
                      echo ' ';
                      echo $asesor['Ape_P'];
                      echo ' '; 
                      echo $asesor['Ape_M'];
                      ?>
                      <strong>(<?php  echo $asesor['Descripcion'];?>)</strong>
                      </option>
                <?php } ?>
                </select>
              </div>

              <div class="form-group">
                <input
                  type="text"
                  class="form-control"
                  name="fechaMemoria"
                  id="inp_fechaMemoria"
                  style="display: none;"
                />
              </div>
              
              <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
          </div>
        </div>
      </div>
    </div>


    <!-- MODAL UPDATE MEMORY -->
    <div
      class="modal fade"
      id="ModalUpdateMemory"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Memorias</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="../ajax/updateMemory.php" method="POST" enctype="multipart/form-data">
            <input
                  type="text"
                  class="form-control"
                  name="id"
                  id="idMemory"
                  style="display: none;"
                />

            <div class="form-group">
                <label>Proyecto</label>
                <select class="form-control" name="proyecto" id="proyecto">
                <option selected>Seleccionar</option>
                <?php foreach($project as $proyecto){?>
                      <option value=<?php echo $proyecto['Id'];?>>
                      <?php 
                      echo $proyecto['Nombre']; 
                      ?>
                      <strong>(<?php  echo $proyecto['Compania'];?>)</strong>
                      </option>
                <?php } ?>
                </select>
              </div>

              <div class="form-group">
                <label>Tipo de Memoria</label>
                <select class="form-control" id="tipoMemoria" name="tipoMemoria">
                <option selected>Seleccionar</option>
                <?php foreach($typesMemory as $tipoMemoria){?>
                      <option value=<?php echo $tipoMemoria['Id'];?>>
                      <?php 
                      echo $tipoMemoria['Descripcion'];
                      ?>
                      </option>
                <?php } ?>
                </select>
              </div>
              
            <div class="form-group" id="selectAsesor">
                <label>Asesor</label>
                <select class="form-control" name="asesor" id="asesor">
                <option selected>Seleccionar</option>
                <?php foreach($adviser as $asesor){?>
                      <option value=<?php echo $asesor['Asesor'];?>>
                      <?php 
                      echo $asesor['Nombre']; 
                      echo ' ';
                      echo $asesor['Ape_P'];
                      echo ' '; 
                      echo $asesor['Ape_M'];
                      ?>
                      <strong>(<?php  echo $asesor['Descripcion'];?>)</strong>
                      </option>
                <?php } ?>
                </select>
              </div>

              <div class="form-group" id="selectAsesor2" style="display:none">
                <label>Asesor 2</label>
                <select class="form-control" name="asesor2">
                <option selected>Seleccionar</option>
                <?php foreach($adviser as $asesor){?>
                      <option value=<?php echo $asesor['Asesor'];?>>
                      <?php 
                      echo $asesor['Nombre']; 
                      echo ' ';
                      echo $asesor['Ape_P'];
                      echo ' '; 
                      echo $asesor['Ape_M'];
                      ?>
                      <strong>(<?php  echo $asesor['Descripcion'];?>)</strong>
                      </option>
                <?php } ?>
                </select>
              </div>

              <div class="form-group" id="selectAsesor3"  style="display:none">
                <label>Asesor 3</label>
                <select class="form-control" name="asesor3">
                <option selected>Seleccionar</option>
                <?php foreach($adviser as $asesor){?>
                      <option value=<?php echo $asesor['Asesor'];?>>
                      <?php 
                      echo $asesor['Nombre']; 
                      echo ' ';
                      echo $asesor['Ape_P'];
                      echo ' '; 
                      echo $asesor['Ape_M'];
                      ?>
                      <strong>(<?php  echo $asesor['Descripcion'];?>)</strong>
                      </option>
                <?php } ?>
                </select>
              </div>

              <div class="form-group">
                <input
                  type="text"
                  class="form-control"
                  name="fechaMemoria"
                  id="inpfechaMemoria"
                  style="display: none;"
                />
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
    <script src="../js/memory.js"></script>
  </body>
</html>
