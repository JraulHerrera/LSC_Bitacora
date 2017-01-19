<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" type="image/png" href="/assets/favicon" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bitacora</title>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        {!!Html::style('assets/plugins/datatables/jquery.dataTables.min.css')!!}
        <link rel="stylesheet" type="text/css" href="">

        {!!Html::style('assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css')!!}
        {!!Html::style('assets/plugins/switchery/css/switchery.min.css')!!}
        {!!Html::style('assets/plugins/multiselect/css/multi-select.css')!!}
        {!!Html::style('assets/plugins/select2/select2.min.css')!!}
        {!!Html::style('assets/plugins/bootstrap-select/css/bootstrap-select.min.css')!!}
        {!!Html::style('assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css')!!}
       

        <!--Morris Chart CSS -->
       
          {!!Html::style('assets/plugins/c3/c3.min.css')!!}
          {!!Html::style('assets/plugins/datatables/buttons.bootstrap.min.css')!!}
          {!!Html::style('assets/plugins/datatables/fixedHeader.bootstrap.min.css')!!}
          {!!Html::style('assets/plugins/datatables/responsive.bootstrap.min.css')!!}
          {!!Html::style('assets/plugins/datatables/scroller.bootstrap.min.css')!!}

         {!!Html::style('assets/css/normalize.css')!!}
        {!!Html::style('assets/css/bootstrap.min.css')!!}
        {!!Html::style('assets/css/core.css')!!}
        {!!Html::style('assets/css/components.css')!!}
        {!!Html::style('assets/css/icons.css')!!}
        {!!Html::style('assets/css/pages.css')!!}
        {!!Html::style('assets/css/responsive.css')!!}
        {!!Html::style('assets/css/custom.css')!!}

        {!!Html::script('assets/js/modernizr.min.js')!!}
        
        {!!Html::script('http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js')!!}
       
                
    </head>
<body class="fixed-left widescreen">
    <!-- Begin Page -->
    <div id="wrapper">
        
        <div class="topbar">
            <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a  class="logo"><i class="icon-magnet icon-c-logo"></i><span>Bitacora lsc</span></a>
                        
                    </div>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <ul class="nav navbar-nav navbar-right pull-right">
                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="../../assets/images/sistemas.jpg" alt="user-img" class="img-circle"> </a>
                                    <ul class="dropdown-menu">
                                        <li>{!!link_to('/info', '&nbsp;Información',array('class'=>'ti-power-off  md-info')) !!}
                                        </li>
                                       
                                        @if(Auth::user()->tipo=='admin')
                                        <li>
                                          {!!link_to('/actividades', '&nbsp;Actividades',array('class'=>'fa fa-list-alt')) !!}  
                                        </li>
                                        <li>
                                          {!!link_to('/perfil-admin', '&nbsp;Perfil',array('class'=>'fa fa-user')) !!}  
                                        </li>
                                        @endif
                                         <li>{!!link_to('/logout', '&nbsp;Cerrar Sesion',array('class'=>'ti-power-off m-r-5')) !!}
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div><!-- TOP BAR END -->
             @yield('content')