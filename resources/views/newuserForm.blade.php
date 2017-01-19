<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="">

        <title>Nuevo Usuario</title>

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css" />
        <script src="assets/js/modernizr.min.js"></script>
        
    </head>
    <body>
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4 class="m-t-0 header-title"><b>Registro Nuevo Usuario</b></h4>
                                           {!!Form::open(['route'=>'alumno.store','method'=>'POST'])!!}
                                            <div class="col-md-11 text-right">
                                            {!!Form::submit('REGISTRARTE',['class'=>'btn btn-primary waves-light'])!!}
                                                  <a href="/" class="btn btn-danger"><span class="ti-back-left"></span></a>
                                                  <p></p>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="panel panel-success panel-border">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">Datos personales</h3>
                                                    </div>
                                                    <input type="hidden" name="id" value="0">
                                                    <div class="panel-body">
                                                         <div class="form-group">
                                                            <label >Matricula</label> <span class="text-danger"> No se podra cambiar Contraseña</span>
                                                            <input type="text" name="matricula" class="form-control" placeholder="Ingrese su Matricula" required="required">
                                                        </div>
                                                       <div class="form-group">
                                                            <label >Nombre</label>
                                                            <input type="text" name="nombre" class="form-control" placeholder="Ingrese su nombre(s)" required="required">
                                                        </div>
                                                        <div class="form-group">
                                                            <label >Apellidos</label>
                                                            <input type="text" name="apellidos" class="form-control" placeholder="Ingrese sus apellidos" required="required">
                                                        </div>
                                                    </div>
                                                </div>
                                             </div>
                                                <div class="col-md-6">
                                                    <div class="panel panel-purple panel-border">
                                                        <div class="panel-heading">
                                                            <h3 class="panel-title">Datos Academicos</h3>
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="form-group">
                                                                <label >Carrera</label>
                                                                <select class="form-control select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true" name="carrera">
                                                                    <option value="LIC. SISTEMAS COMPUTACIONALES">LIC. SISTEMAS COMPUTACIONALES</option>
                                                                    <option value="ING. DESSARROLLO DE SOFTWARE">ING. DESSARROLLO DE SOFTWARE</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label >Semestre</label>
                                                                  <select class="form-control select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true" name="semestre" required="required">
                                                                  <option value="1">1</option>
                                                                  <option value="2">2</option>
                                                                  <option value="3">3</option>
                                                                  <option value="4">4</option>
                                                                  <option value="5">5</option>
                                                                  <option value="6">6</option>
                                                                  <option value="7">7</option>
                                                                  <option value="8">8</option>
                                                                  <option value="9">9</option>
                                                                    
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label >Grupo</label>
                                                                 <select required="required" class="form-control select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true" name="grupo">
                                                                  <option value="A">A</option>
                                                                  <option value="B">B</option>
                                                                  <option value="C">C</option>
                                                                  <option value="D">D</option>
                                                                  <option value="E">E</option>        
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            {!!Form::close()!!}  
                                        </div>
                                    </div>
                        </div>
                    </div>
                </div>
            </div> <!-- container -->
        </div> <!-- content -->
	</body>
</html>