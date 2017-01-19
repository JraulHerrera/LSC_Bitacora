
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="/assets/favicon" />
        <title>Inicio de sesión</title>
        <link href="assets/plugins/custombox/css/custombox.css" rel="stylesheet">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <script src="assets/js/modernizr.min.js"></script>
    </head>
    <body>

        <div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page">
            <div class="col-md-12">
               @if(Session::has('message'))
                <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
                  {{Session::get('message')}}
                </div>
                @endif
               @if(Session::has('messageError'))
                    <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
                    {{Session::get('messageError')}}
                    </div>
                @endif
                <div class="card-box p-0">
                    <div class="profile-widget text-center">
                        <div class="bg-custom bg-profile"></div>
                        <img src="assets/images/users/mascota.png" class="thumb-lg img-circle img-thumbnail" alt="img">
                        <h4>BITACORA LSC</h4>
                        <div class="col-md-12text-center"> 
                                {!!Form::open(['route'=>'bitacora.store','method','POST'])!!}
                                    <div class="form-group">
                                        <div class="col-md-12">
                                        <input type="password" name = "usuario" class="form-control form-white" id="pwd" placeholder="Ingresa tu Contraseña" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group text-right m-t-40">
                                        <div class="col-md-12">
                                            <p></p>
                                            <a href="#custom-modal" data-animation="contentscale" data-plugin="custommodal" data-overlayspeed="100" data-overlaycolor="#36404a">Registrarme</a>
                                            <p></p>
                                        </div>
                                    </div>
                                    <div class="form-group text-center m-t-40">
                                        <div class="col-md-12">
                                            {!!Form::submit('Iniciar sesion',['class'=>'btn btn-default btn-block text-uppercase  waves-light'])!!}
                                        </div>
                                    </div>
                                {!!Form::close()!!}  
                        </div>
                        <div class="clearfix"></div>
                        <h4>&nbsp;</h4>      
                    </div>
                </div>
            </div>                              
        </div>
     
            <!-- Modal -->
            <div id="custom-modal" class="modal-demo">
                <button type="button" class="close" onclick="Custombox.close();">
                    <span>&times;</span><span class="sr-only">Close</span>
                </button>
                <h4 class="custom-modal-title">TIPO DE USUARIO</h4>
                {!!Form::open(['route'=>'tipo.store','method'=>'POST'])!!}
                <div class="custom-modal-text">
                    <div class="row text-center">
                    <h4 class="m-t-0 header-title">Elige el tipo de usuario correcto, proporciona datos verdaderos</h4>
                    <P></P>
                        <div class="col-md-12">
                            <div class="radio radio-info radio-inline">
                                <input type="radio" id="inlineRadio1" value="alumno" name="radioInline" checked="">
                                <label for="inlineRadio1"> Alumno</label>
                            </div>   
                            <div class="radio radio-inline">
                                <input type="radio" id="inlineRadio2" value="docente" name="radioInline">
                                <label for="inlineRadio2"> Profesor </label>
                            </div>  
                        </div>
                    </div>
                    <p>&nbsp;</p>
                     {!!Form::submit('REGISTRARTE',['class'=>'btn btn-primary waves-light'])!!}
                </div>
                {!!Form::close()!!}  
            </div>
        <script>
            var resizefunc = [];
            document.oncontextmenu = function(){return false;} 
        </script>
        
       <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>


        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

        <!-- Modal-Effect -->
        <script src="assets/plugins/custombox/js/custombox.min.js"></script>
        <script src="assets/plugins/custombox/js/legacy.min.js"></script>
	      
	</body>
</html>