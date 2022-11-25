
let tblUsuarios;
document.addEventListener("DOMContentLoaded", function(){
  tblUsuarios = $('#tblUsuarios').DataTable({
    ajax: {
        url: base_url + '/Usuarios/Listar',
        dataSrc: ''
    },
    columns: [{ 
      'data' : 'id'      
    },
    {
    'data' : 'cedula'
    },
    {
      'data' : 'nombre' 
    },
    {
      'data' : 'apellido' 
    },
    {
      'data' : 'nombre_rol' 
    },
    {
      'data' : 'telefono' 
    },
    {
      'data' : 'usuario' 
    },
    {
      'data' : 'clave' 
    },
    {
      'data' : 'acciones'
    }
    
  ]
  });
})


function frmlogin(e) {
  e.preventDefault();
  const usuario = document.getElementById("usuario");
  const clave = document.getElementById("clave");
  if (usuario.value == "") {
    clave.classList.remove("is-invalid");
    usuario.classList.add("is-invalid");
    usuario.focus();

  } else if (clave.value == "") {
    usuario.classList.remove("is-invalid");
    clave.classList.add("is-invalid");
    clave.focus();
  } else {
    const url = base_url + "Usuarios/validar";
    const frm = document.getElementById("frmlogin");
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(new FormData(frm));
    http.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        const res = JSON.parse(this.responseText);
        if (res == "ok") {
          window.location = base_url + "Usuarios";
        } else {
          document.getElementById("alerta").classList.remove("d-none");
          document.getElementById("alerta").innerHTML = res;
        }
      }
    }
  }

}
function frmUsuario() {
  $("#nuevo_usuario").modal("show");
}
function registrarUser(e) {
  e.preventDefault();
  const cedula = document.getElementById("cedula");
  const nombre = document.getElementById("nombre");
  const apellido = document.getElementById("apellido");
  const rol = document.getElementById("rol");
  const telefono = document.getElementById("telefono");
  const usuario = document.getElementById("usuario");
  const clave = document.getElementById("clave");
  const confirmar = document.getElementById("confirmar");

  if (cedula.value == "" || nombre.value == "" || apellido.value == "" || rol.value == "" || telefono.value == "" || usuario.value == "" || clave.value == "" || confirmar.value == "") {
    Swal.fire({
      position: 'top-end',
      icon: 'error',
      title: 'Todos los campos son obligatorios',
      showConfirmButton: false,
      timer: 1500 
    })

  } else if (clave.value != confirmar.value) {
    Swal.fire({
      position: 'top-end',
      icon: 'error',
      title: 'las claves no coinciden',
      showConfirmButton: false,
      timer: 1500 
    })
  } else {
    const url = base_url + "Usuarios/registrar";
    const frm = document.getElementById("frmUsuario");
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(new FormData(frm));
    http.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        const  res = JSON.parse(this.responseText);
        if(res == "si"){
          Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Usuario registrado con exito',
            showConfirmButton: false,
            timer: 1500 
          })
          frm.reset();
          $("#nuevo_usuario").modal("hide");
        } else {
          Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: res,
            showConfirmButton: false,
            timer: 1500 
          })
       }
      }
    }
  }

}