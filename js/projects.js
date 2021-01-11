$('#dataTableProjects').DataTable();

const Getfecha = () => {
  var hoy = new Date();
  var fecha = hoy.getFullYear() + '-' + (hoy.getMonth() + 1) + '-' + hoy.getDate();
  var hora =
    hoy.getHours() +
    ':' +
    hoy.getMinutes() +
    ':' +
    hoy.getSeconds() +
    ':' +
    hoy.getMilliseconds();

  return (fechaYHora = fecha + ' ' + hora);
};
var inp1 = document.getElementById('inpNoControl');
inp1.style.display = 'none';

var inp2 = document.getElementById('inpNoControlUpdate');
inp2.style.display = 'none';

document.getElementById('inpFecha').value = Getfecha();

const editProject = async (id) => {
  $('#ModalUpdateProject').modal('show');
  var data = { id: id };
  console.log(data);
  await $.ajax({
    url: '../ajax/GetProjectOne.php',
    method: 'POST',
    data: data,
    success: (response) => {
      var data = JSON.parse(response);
      // console.log(data[0].Proyecto);
      // console.log(data[0].Tipo_Memoria);

      $('#idProject').val(data[0].Id);
      $('#nombreUpdate').val(data[0].Nombre);
      $('#companiaUpdate').val(data[0].Compania);

      $('#linkDocument').attr('href', data[0].Ruta);
      var rta = $('#linkDocument').attr('href');

      $('#link').val(rta);

      //   console.log(rta);

      //   $('#asesor').val(data[0].Asesor);
    },
  });
};

const deleteProject = async (id) => {
  var data = { id: id };
  await $.ajax({
    url: '../ajax/deleteProject.php',
    method: 'POST',
    data: data,
    success: (response) => {
      alert('Se elimino correctamente');
      if (response) {
        location.reload();
      } else {
        console.log('Save error');
        location.reload();
      }
    },
  });
};
