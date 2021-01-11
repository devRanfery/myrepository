$('#dataTable').DataTable();

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

//ADD SELECT
document.getElementById('inp_fechaMemoria').value = Getfecha();
document.getElementById('inpfechaMemoria').value = Getfecha();
var typeMemory = document.getElementById('typeMemory');
var select2 = document.getElementById('selectAsesor2');
var select3 = document.getElementById('selectAsesor3');
typeMemory.addEventListener('change', async function () {
  if (typeMemory.value == 2) {
    console.log('CAMBIO');
    select2.style.display = 'block';
    select3.style.display = 'block';
  } else {
    select2.style.display = 'none';
    select3.style.display = 'none';
  }
});

const editMemory = async (id) => {
  $('#ModalUpdateMemory').modal('show');
  var data = { id: id };
  await $.ajax({
    url: '../ajax/GetMemoryOne.php',
    method: 'POST',
    data: data,
    success: (response) => {
      var data = JSON.parse(response);
      console.log(data[0].Proyecto);
      console.log(data[0].Tipo_Memoria);

      $('#idMemory').val(data[0].Id);
      $('#proyecto').val(data[0].Proyecto);
      $('#tipoMemoria').val(data[0].Tipo_Memoria);
      $('#asesor').val(data[0].Asesor);
    },
  });
};

const deleteMemory = async (id) => {
  // console.log('si entra');
  var data = { id: id };
  await $.ajax({
    url: '../ajax/deleteMemory.php',
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
