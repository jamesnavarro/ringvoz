<?php header('Access-Control-Allow-Origin: *'); ?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Prueba RingVoz</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/font-awesome/css/font-awesome.min.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/form-elements.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

        
        <link rel="shortcut icon" href="{{ asset('assets/ico/favicon.png') }}">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('assets/ico/apple-touch-icon-144-precomposed.png') }}">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('assets/ico/apple-touch-icon-114-precomposed.png') }}">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('assets/ico/apple-touch-icon-72-precomposed.png') }}">
        <link rel="apple-touch-icon-precomposed" href="{{ asset('assets/ico/apple-touch-icon-57-precomposed.png') }}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="{{ asset('js/detail.js?v=1.1') }}"></script>

    </head>

    <body>

        <div class="top-content">
            <div class="container">
                
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2 text">
                        <h1>RINGVOZ</h1>
                        
                    </div> 
                </div>
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 form-box">
                    	<div  class="f1">

                    		
                             
                    	
                    		
                    		<div class="card">
                                <div class="card-header">
                                Congratulations yours account has been recharged
                                </div>
                                <div class="card-body text-left">
                                   
                                    <p class="card-text" style="background-color: #eae5e5;padding:12px">
                                            <strong>Recharge amount: $</strong> {{$pagos->pago_monto}} <br>
                                            <strong>Tax: $</strong> {{ ($pagos->pago_monto*0.07) }} <br>
                                            <strong>Total: $</strong> {{ number_format(($pagos->pago_monto*0.07)+$pagos->pago_monto,'2','.',',') }}
                                    </p>
                                
                                </div>
                                <div class="card-footer text-muted text-left">
                                    My credit cards
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                    <div class="card-body">
                                        <table class="table">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Number</th>
                                                    <th>Type</th>
                                                    <th>Number</th>
                                                    <th>Operation</th>
                                                </tr>
                                                <tbody id="mostrar">
                                                     @foreach($tarjetas as $tarjeta)
                                                
                                                         <tr>
                                                             <td>{{$tarjeta->tarjeta_id}}</td>
                                                             <td>{{$tarjeta->tarjeta_holder}}</td>
                                                             <td>xxxx xxxx xxxx {{substr_replace($tarjeta->tarjeta_number,'',0,12)}}</td>
                                                             <td><button class="btn btn-danger" onclick="borrar({{$tarjeta->tarjeta_id}},{{$pagos->pago_id}})">Delete</button></td>
                                                         </tr>
                                                     @endforeach                 
                                                </tbody>
                                            </thead>
                                        </table>
                                    </div>
                                    <div class="f1-buttons">
                                
                                    <a href="/recarga" class="btn btn-next">Recharge Here</a> 
                                </div>
                                    </div>
                                </div>
                                
                                </div>

                    	
                        </div>
                    </div>
                </div>
                    
            </div>
        </div>


        <!-- Javascript -->
        <script src="{{ asset('assets/js/jquery-1.11.1.min.js') }}"></script>
        <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.backstretch.min.js') }}"></script>
        <script src="{{ asset('assets/js/retina-1.1.0.min.js') }}"></script>
        <script src="{{ asset('assets/js/scripts.js') }}"></script>
        <script type="text/javascript" src="https://momentjs.com/downloads/moment.min.js"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->
        <div class="backstretch" style="left: 0px; top: 0px; overflow: hidden; margin: 0px; padding: 0px; height: 795px; width: 1283px; z-index: -999999; position: fixed;"><img src="{{ asset('assets/img/backgrounds/1.jpg') }}" style="position: absolute; margin: 0px; padding: 0px; border: none; width: 1283px; height: 855.333px; max-height: none; max-width: none; z-index: -999999; left: 0px; top: -30.1667px;"></div>
    </body>

</html>