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
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">

        
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="js/index.js?v=2.3"></script>

    </head>

    <body>

        <div class="top-content">
            <div class="container">
                
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2 text">
                        <h1>Recarga tu Cuenta</h1>
                        
                    </div> 
                </div>
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 form-box">
                  
                        <form action="{{ route('recarga.store') }}" id="frmCrear" class="f1">

                    		<h3>Prueba RingVoz</h3>
                    
                    		<div class="f1-steps">
                    			<div class="f1-progress">
                    			    <div class="f1-progress-line" data-now-value="16.66" data-number-of-steps="3" style="width: 16.66%;"></div>
                    			</div>
                                    <div class="f1-step active" id="step1">
                    				<div class="f1-step-icon"><i class="fa fa-globe"></i></div>
                    				<p>Step 1</p>
                    			</div>
                    			<div class="f1-step" id="step2">
                    				<div class="f1-step-icon"><i class="fa fa-credit-card"></i></div>
                    				<p>Step 2</p>
                    			</div>
                    		    
                    		</div>
                    		
                                <fieldset id="paso1">
                    		    <h4>Please seleCted the country ant the recharge amount</h4>
                    			<div class="form-group">
                    			    <label class="sr-only" for="f1-first-name">First name</label>
                                    <select name="pais" id="pais" class="f1-first-name form-control" onclick="selected()">
                                        <option value="">Seleted the country</option>
                                        @foreach($country as $pais)
                                            <option value="{{ $pais['sISOCode'] }}" >{{ $pais['sName'] }}</option>                                
                                        @endforeach
                                        
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-last-name">Last name</label>
                                    <select name="monto" id="monto" class="f1-first-last-name form-control" onclick="selected()">
                                        <option value="">Seleted the amount</option>
                                        @for($i = 10 ; $i <= 90; $i++)
                                            <option value="{{$i}}">${{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                                <h4>Recharge amount $<span id="mount">0</span> 
                                    <br> Local Denomitation: <span id="denomination"></span> </h4>
                                <div class="f1-buttons">
                                    <button type="button" class="btn btn-primary" id="pasar" onclick="paises()">Next</button>
                                </div>
                            </fieldset>

                                <fieldset id="paso2">
                           
                                <h4>Pease enter your credit card information</h4>
                                <div class="form-group">
                                <input type="hidden" name="realmonto" id="realmonto"  class="form-control" >
                                    <input type="text" name="cardname" id="name_on_card"   placeholder="Card Holder Name" class="form-control" >
                                </div>
                                <div class="form-group">
                                   
                                    <input type="text" name="cardnumber" id="card_number"  maxlength="16" placeholder="Card Number" class="form-control" >
                                </div>
                                <div class="form-group">
                                    
                                    <input type="text" name="expiration" id="expiry_month" maxlength="2" placeholder="Expiration month" class="form-control " >
                                </div>
                                <div class="form-group">
                                    <input type="text" name="expiry_year" id="expiry_year" maxlength="4" placeholder="Expiration year" class="form-control" >
                                </div>
                                <div class="form-group">
                                   
                                    <input type="text" name="cvv" id="cvv"  maxlength="3" placeholder="CVV" class="form-control" >
                                </div>
                                <div class="form-group">
                                  
                                    
                                    <input type="text" name="address" id="address" placeholder="Address" class="form-control" >
                                </div>
                                <div class="form-group">
                                    
                                    <input type="text" name="Zip" id="Zip" placeholder="Zip" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-repeat-password">Expiration date</label>
                                    
                                    <select name="country" id="country" class="f1-first-name form-control">
                                        <option value="">Seleted the country</option>
                                        @foreach($country as $pais)
                                            <option value="{{ $pais['sISOCode'] }}">{{ $pais['sName'] }}</option>                                
                                        @endforeach
                                        
                                    </select>
                                </div>
                                <div class="f1-buttons">
                                    <button type="button" class="btn btn-previous">Previous</button>
                                    <button type="button" class="btn btn-primary" onclick="cardFormValidate();">Recharge</button>
                                </div>
                           
                            </fieldset>
                    	
                    	</form>
                    </div>
                </div>
                    
            </div>
        </div>


        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/retina-1.1.0.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        <script type="text/javascript" src="https://momentjs.com/downloads/moment.min.js"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>