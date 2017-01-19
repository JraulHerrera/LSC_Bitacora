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
                                            {!!Form::open(['route'=>'docente.store','method'=>'POST'])!!}
                                            <div class="col-md-11 text-right">
                                            {!!Form::submit('REGISTRARTE',['class'=>'btn btn-primary'])!!}
                                                 <a href="/" class="btn btn-danger"><span class="ti-back-left"></span></a>
                                                  <p></p>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="panel panel-success panel-border">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">Datos personales</h3>
                                                    </div>
                                                    <input type="hidden" name="id" value="0">
                                                    <div class="panel-body">
                                                         <div class="form-group">
                                                            <label >N° de plaza</label>
                                                            <input type="text" name="plaza" class="form-control" placeholder="Ingrese numero de plaza" required="required">
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