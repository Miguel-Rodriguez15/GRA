 <html lang="en">

 <head>
     <meta charset="utf-8" />
     <meta http-equiv="X-UA-Compatible" content="IE=edge" />
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
     <meta name="description" content="" />
     <meta name="author" content="" />
     <title>Panel Administrativo</title>
     <link href="<?php echo base_url;?>Assets/css/styles.css" rel="stylesheet" />
     <link href="<?php echo base_url;?>Assets/css/dataTables.bootstrap.min.css" rel="stylesheet" />
     <script src="<?php echo base_url;?>Assets/js/all.min.js" crossorigin="anonymous"></script>
 </head>

 <body class="sb-nav-fixed">
     <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
         <!-- Navbar Brand-->
         <a class="navbar-brand ps-3" href="index.html">GRA</a>
         <!-- Sidebar Toggle-->
         <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                 class="fas fa-bars"></i></button>
         <!-- Navbar Search-->
         <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
             <div class="input-group">
                 <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                     aria-describedby="btnNavbarSearch" />
                 <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
                         class="fas fa-search"></i></button>
             </div>
         </form>
         <!-- Navbar-->
         <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
             <li class="nav-item dropdown">
                 <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                     data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                 <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                     <li><a class="dropdown-item" href="<?php echo base_url; ?>Usuarios/salir">Cerrar Sesion</a></li>
                 </ul>
             </li>
         </ul>
     </nav>
     <div id="layoutSidenav">
         <div id="layoutSidenav_nav">
             <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                 <div class="sb-sidenav-menu">
                     <div class="nav">

                         </a>

                         <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                             data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                             <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>

                             <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                         </a>
                         <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                             data-bs-parent="#sidenavAccordion">
    
                         </div>                         
                           <a class="nav-link" href="<?php echo base_url; ?>Usuarios"> 
                                   <div class="sb-nav-link-icon"><i class="fas fa-user mr-6"></i></div> Usuarios
                                </a>   


                         <a class="nav-link" href="<?php echo base_url; ?>Rutas">
                             <div class="sb-nav-link-icon"><i class="fas fa-cogs"></i></div>
                             Rutas
                         </a>
                     </div>

                 </div>

             </nav>

         </div>

         <div id="layoutSidenav_content">
             <main>
                 <div class="container-fluid mt-2">