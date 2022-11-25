
let tblUsuarios;
document.addEventListener("DOMContentLoaded", function(){
  tblUsuarios = $('#tblUsuarios').DataTable({
    ajax: {
        url: base_url + 'Usuarios/Listar',
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
      'data' : 'estado' 
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

  }  else {
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
  document.getElementById("title").innerHTML = "Nuevo Usuario";
  document.getElementById("btnAccion").innerHTML = "Registrar";
  document.getElementById("claves").classList.remove("d-none");
  document.getElementById("frmUsuario").reset();
  $("#nuevo_usuario").modal("show");
  document.getElementById('id').value = "";
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

  if (cedula.value == "" || nombre.value == "" || apellido.value == "" || rol.value == "" || telefono.value == "" || usuario.value == ""  ) {
    Swal.fire({
      position: 'top-end',
      icon: 'error',
      title: 'Todos los campos son obligatorios',
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
            icon: 'success',
            title: 'Usuario registrado con exito',
            showConfirmButton: false,
            timer: 1500 
          })
          frm.reset();
          $("#nuevo_usuario").modal("hide");
          tblUsuarios.ajax.reload();
        } else if (res == "modificado"){
          Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Usuario modificado con exito',
            showConfirmButton: false,
            timer: 1500 
          })
          $("#nuevo_usuario").modal("hide");
          tblUsuarios.ajax.reload();
        }else{Swal.fire({
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
function btnEditarUser(id) {
  document.getElementById("title").innerHTML = "Actualizar Usuario";
  document.getElementById("btnAccion").innerHTML = "Modificar";
  const url = base_url + "Usuarios/editar/"+id;
  const http = new XMLHttpRequest();
  http.open("GET", url, true);
  http.send( );
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
    const res = JSON.parse(this.responseText);
    document.getElementById("id").value =  res.id;
     document.getElementById("cedula").value =  res.cedula;
     document.getElementById("nombre").value =  res.nombre;
     document.getElementById("apellido").value =  res.apellido;
     document.getElementById("rol").value =  res.rol;
     document.getElementById("telefono").value =  res.telefono;
     document.getElementById("usuario").value =  res.usuario;
     document.getElementById("claves").classList.add("d-none");
     $("#nuevo_usuario").modal("show");
    }
  }

}
function btnEliminarUser(id){
  Swal.fire({
    title: 'Seguro que quieres eliminar este usuario?',
    text: "No podras revertir los cambios",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si, estoy seguro!',
    cancelButtonText: 'Cancelar'
  }).then((result) => {
    if (result.isConfirmed) {
      document.getElementById("title").innerHTML = "Actualizar Usuario";
      document.getElementById("btnAccion").innerHTML = "Modificar";
      const url = base_url + "Usuarios/eliminar/" + id;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send( );
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText)
          if (res == "ok") {
            Swal.fire(
              'Mensaje!',
              'El usuario a sido eliminado correctamente.',
              'success'
            )
            tblUsuarios.ajax.reload();      
        }else{
          Swal.fire(
            'Mensaje!',
            res,
            'error'
          )
        }
        }
      }

    }
  })
}

function btnReingresarUser(id){
  Swal.fire({
    title: 'Esta seguro de reingresar el usuario?',
  
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si, estoy seguro!',
    cancelButtonText: 'Cancelar'
  }).then((result) => {
    if (result.isConfirmed) {
      document.getElementById("title").innerHTML = "Actualizar Usuario";
      document.getElementById("btnAccion").innerHTML = "Modificar";
      const url = base_url + "Usuarios/reingresar/" + id;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send( );
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText)
          if (res == "ok") {
            Swal.fire(
              'Mensaje!',
              'El usuario a sido reingresado correctamente.',
              'success'
            )
            tblUsuarios.ajax.reload();      
        }else{
          Swal.fire(
            'Mensaje!',
            res,
            'error'
          )
        }
        }
      }

    }
  })
}

/////////////////////FIN USUARIO////////////////////





function frmRuta() {
  document.getElementById("title").innerHTML = "Nueva ruta";
  document.getElementById("btnAccion").innerHTML = "Registrar";
  document.getElementById("frmRuta").reset();
  $("#nuevo_rutas").modal("show");
  document.getElementById('id').value = "";
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

  if (cedula.value == "" || nombre.value == "" || apellido.value == "" || rol.value == "" || telefono.value == "" || usuario.value == ""  ) {
    Swal.fire({
      position: 'top-end',
      icon: 'error',
      title: 'Todos los campos son obligatorios',
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
            icon: 'success',
            title: 'Usuario registrado con exito',
            showConfirmButton: false,
            timer: 1500 
          })
          frm.reset();
          $("#nuevo_usuario").modal("hide");
          tblUsuarios.ajax.reload();
        } else if (res == "modificado"){
          Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Usuario modificado con exito',
            showConfirmButton: false,
            timer: 1500 
          })
          $("#nuevo_usuario").modal("hide");
          tblUsuarios.ajax.reload();
        }else{Swal.fire({
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
function btnEditarUser(id) {
  document.getElementById("title").innerHTML = "Actualizar Usuario";
  document.getElementById("btnAccion").innerHTML = "Modificar";
  const url = base_url + "Usuarios/editar/"+id;
  const http = new XMLHttpRequest();
  http.open("GET", url, true);
  http.send( );
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
    const res = JSON.parse(this.responseText);
    document.getElementById("id").value =  res.id;
     document.getElementById("cedula").value =  res.cedula;
     document.getElementById("nombre").value =  res.nombre;
     document.getElementById("apellido").value =  res.apellido;
     document.getElementById("rol").value =  res.rol;
     document.getElementById("telefono").value =  res.telefono;
     document.getElementById("usuario").value =  res.usuario;
     document.getElementById("claves").classList.add("d-none");
     $("#nuevo_usuario").modal("show");
    }
  }

}
function btnEliminarUser(id){
  Swal.fire({
    title: 'Seguro que quieres eliminar este usuario?',
    text: "No podras revertir los cambios",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si, estoy seguro!',
    cancelButtonText: 'Cancelar'
  }).then((result) => {
    if (result.isConfirmed) {
      document.getElementById("title").innerHTML = "Actualizar Usuario";
      document.getElementById("btnAccion").innerHTML = "Modificar";
      const url = base_url + "Usuarios/eliminar/" + id;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send( );
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText)
          if (res == "ok") {
            Swal.fire(
              'Mensaje!',
              'El usuario a sido eliminado correctamente.',
              'success'
            )
            tblUsuarios.ajax.reload();      
        }else{
          Swal.fire(
            'Mensaje!',
            res,
            'error'
          )
        }
        }
      }

    }
  })
}

function btnReingresarUser(id){
  Swal.fire({
    title: 'Esta seguro de reingresar el usuario?',
  
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si, estoy seguro!',
    cancelButtonText: 'Cancelar'
  }).then((result) => {
    if (result.isConfirmed) {
      document.getElementById("title").innerHTML = "Actualizar Usuario";
      document.getElementById("btnAccion").innerHTML = "Modificar";
      const url = base_url + "Usuarios/reingresar/" + id;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send( );
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText)
          if (res == "ok") {
            Swal.fire(
              'Mensaje!',
              'El usuario a sido reingresado correctamente.',
              'success'
            )
            tblUsuarios.ajax.reload();      
        }else{
          Swal.fire(
            'Mensaje!',
            res,
            'error'
          )
        }
        }
      }

    }
  })
}
