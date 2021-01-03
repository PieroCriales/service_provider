<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Snippet - BBBootstrap</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <link href='https://use.fontawesome.com/releases/v5.8.1/css/all.css' rel='stylesheet'>

    <style>
        body {
            background-color: #eee
        }

        .container {
            height: 100vh
        }

        .card {
            border: none
        }

        .form-control {
            border-bottom: 2px solid #eee !important;
            border: none;
            font-weight: 600
        }

        .form-control:focus {
            color: #495057;
            background-color: #fff;
            border-color: #8bbafe;
            outline: 0;
            box-shadow: none;
            border-radius: 0px;
            border-bottom: 2px solid blue !important
        }

        .inputbox {
            position: relative;
            margin-bottom: 20px;
            width: 100%
        }

        .inputbox span {
            position: absolute;
            top: 7px;
            left: 11px;
            transition: 0.5s
        }

        .inputbox i {
            position: absolute;
            top: 13px;
            right: 8px;
            transition: 0.5s;
            color: #3F51B5
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0
        }

        .inputbox input:focus~span {
            transform: translateX(-0px) translateY(-15px);
            font-size: 12px
        }

        .inputbox input:valid~span {
            transform: translateX(-0px) translateY(-15px);
            font-size: 12px
        }

        .card-blue {
            background-color: #492bc4
        }

        .hightlight {
            background-color: #5737d9;
            padding: 10px;
            border-radius: 10px;
            margin-top: 15px;
            font-size: 14px
        }

        .yellow {
            color: #fdcc49
        }

        .decoration {
            text-decoration: none;
            font-size: 14px
        }

        .btn-success {
            color: #fff;
            background-color: #492bc4;
            border-color: #492bc4
        }

        .btn-success:hover {
            color: #fff;
            background-color: #492bc4;
            border-color: #492bc4
        }

        .decoration:hover {
            text-decoration: none;
            color: #fdcc49
        }

    </style>
    <script type='text/javascript' src=''></script>
    <script type='text/javascript'
        src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js'></script>
    <script type='text/javascript'></script>
</head>

<body oncontextmenu='return false' class='snippet-body'>
    <div class="container mt-5 px-5">
        <div class="mb-4">
            <h2>Confirma tu servicio a adquirir y pago</h2> <span>Realice el pago, luego podrá disfrutar de todas las funciones y beneficios.</span>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card p-3">
                    <h6 class="text-uppercase">Detalles de pago</h6>
                    <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-3">
                        <li class="nav-item"> <a data-toggle="pill" href="#credit-card" class="nav-link active "> <i
                                    class="fas fa-credit-card mr-2"></i> Tarjeta de Crédito </a> </li>
                        <li class="nav-item"> <a data-toggle="pill" href="#paypal" class="nav-link "> <i
                                    class="fab fa-paypal mr-2"></i> Paypal </a> </li>
                        <li class="nav-item"> <a data-toggle="pill" href="#net-banking" class="nav-link "> <i
                                    class="fas fa-mobile-alt mr-2"></i> Net Banking </a> </li>
                    </ul>
                    <div class="tab-content">
                        <div id="credit-card" class="tab-pane fade show active pt-3">
                            <div class="inputbox mt-3"> <input type="text" name="name" class="form-control"
                                    required="required">
                                <span>Nombre en la tarjeta</span> </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="inputbox mt-3 mr-2"> <input type="text" name="name" class="form-control"
                                            required="required"> <i class="fa fa-credit-card"></i> <span>Numero de tarjeta</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex flex-row">
                                        <div class="inputbox mt-3 mr-2"> <input type="text" name="name"
                                                class="form-control" required="required"> <span>Expira</span> </div>
                                        <div class="inputbox mt-3 mr-2"> <input type="text" name="name"
                                                class="form-control" required="required"> <span>CVV</span> </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 mb-4">
                                <h6 class="text-uppercase">Dirección de Envio</h6>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="inputbox mt-3 mr-2"> <input type="text" name="name"
                                                class="form-control" required="required"> <span>Direccion de la calle</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="inputbox mt-3 mr-2"> <input type="text" name="name"
                                                class="form-control" required="required"> <span>Ciudad</span> </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <div class="inputbox mt-3 mr-2"> <input type="text" name="name"
                                                class="form-control" required="required"> <span>Provincia</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="inputbox mt-3 mr-2"> <input type="text" name="name"
                                                class="form-control" required="required"> <span>Codigo ZIP</span> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="paypal" class="tab-pane fade pt-3">
                            <h6 class="pb-2">Select your paypal account type</h6>
                            <div class="form-group "> <label class="radio-inline"> <input type="radio" name="optradio"
                                        checked> Domestic </label> <label class="radio-inline"> <input type="radio"
                                        name="optradio" class="ml-5">International </label></div>
                            <p> <button type="button" class="btn btn-primary "><i class="fab fa-paypal mr-2"></i> Log
                                    into my Paypal</button> </p>
                            <p class="text-muted"> Note: After clicking on the button, you will be directed to a secure
                                gateway for payment. After completing the payment process, you will be redirected back
                                to the website to view details of your order. </p>
                        </div>
                        <div id="net-banking" class="tab-pane fade pt-3">
                        <div class="form-group "> <label for="Select Your Bank">
                                <h6>Select your Bank</h6>
                            </label> <select class="form-control" id="ccmonth">
                                <option value="" selected disabled>--Selecciona tu banco--</option>
                                <option>BBVA</option>
                                <option>Interbank</option>
                                <option>Scotiabank</option>
                            </select> </div>
                        <div class="form-group">
                            <p> <button type="button" class="btn btn-primary "><i class="fas fa-mobile-alt mr-2"></i> Proceed Pyment</button> </p>
                        </div>
                        <p class="text-muted">Note: After clicking on the button, you will be directed to a secure gateway for payment. After completing the payment process, you will be redirected back to the website to view details of your order. </p>
                    </div>
                    </div>
                </div>
                <div class="mt-4 mb-4 d-flex justify-content-between"> <span>Previous step</span> <button
                        class="btn btn-success px-3">Pay $840</button> </div>
            </div>
            <div class="col-md-4">
                <div class="card card-blue p-3 text-white mb-3"> <span>You have to pay</span>
                    <div class="d-flex flex-row align-items-end mb-3">
                        <h1 class="mb-0 yellow">$549</h1> <span>.99</span>
                    </div> <span>Enjoy all the features and perk after you complete the payment</span> <a href="#"
                        class="yellow decoration">Know all the features</a>
                    <div class="hightlight"> <span>100% Guaranteed support and update for the next 5 years.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
