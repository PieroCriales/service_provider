@extends('adminlte::page')

@section('title', 'Preguntas Frecuentes')

@section('content_header')
    <h1 class="m-0 text-dark">Preguntas Frecuentes</h1>
@stop

@section('content')

<div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
        <i class="fas fa-user-check"></i> Creando Servicio
        </button>
        
      </h2>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        <p class="font-weight-bold">¿CÓMO CREO UN SERVICIO?</p>
        <p>Para poder crear un servicio necesitas estar registrado.Cuando tengas una cuenta en nuestra plataforma puedes dirigirte a la seccion de SERVICIOS y seleccionar
        la opción añadir servicio ; aquí puedes añadir todas las caracteristicas de tu servicio desde lo que ofreces hasta el precio y detalles de este.</p>
        <img align="center"  width="1116" height="516" src="https://i.imgur.com/YEPzK4l.png"/>
        <p class="font-weight-bold">¿CÓMO EDITO EL PRECIO DE MI SERVICIO?</p>
        <p>Si en algun momento deseas cambiar alguna caracteristica del servicio puedes ir a tu perfil y en la parte posteriror derecha tienes las opciones de
        editar/ver/eliminar servicio.</p>
        <img align="center"  width="1116" height="516" src="https://i.imgur.com/GZlABtZ.jpg"/>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        <i class="fas fa-concierge-bell"></i> Adquiriendo servicio
        </button>
      </h2>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
      <p class="font-weight-bold">¿CÓMO ADQUIERO UN SERVICIO?</p>
      <p>Si deseas adquirir un servicio puedes ir al icono de buscar e ingresar el servicio que deseas adquirir , ahi podras ver
       el perfil del ofertante asi como las tarifas y caracteristicas.En esta misma página esta la opcion de ADQUIRIR SERVICIO 
       que seleccionandola añades el servicio a tu perfil</p>
       <img align="center"  width="1116" height="516" src="https://i.imgur.com/fEkIENu.jpg"/>
      <!--SEC-->
      <p class="font-weight-bold">¿CÓMO REALIZO EL PAGO DE UN SERVICIO?</p>
      <p>Para poder realizar el pago de un servicio ya adquirido debes seleccionar la opción PAGAR y actualmente tenemos el medio de pago Paypal donde puedes
      ingresar los datos de tarjeta.</p>
      <img align="center"  width="1116" height="516" src="https://i.imgur.com/AbWryKv.jpg"/>
      <!--SEC-->
      <p class="font-weight-bold" >¿PUEDO CANCELAR UN SERVICIO QUE AÑADÍ?</p>
      <p>Si tenemos la opcion de que puedas comunicarte con el ofertante del servicio.Aquí puedes coordinar alguna cancelacion o cambio de fecha programada para el 
      servicio que adquiriste.</p>
      
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        <i class="fas fa-user-cog"></i> Configuración de la cuenta
        </button>
      </h2>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body"> 
      <p class="font-weight-bold">¿CÓMO CONFIGURO MI PERFIL?</p>
      <p>Para que puedas editar tu perfil debes trasladarte a la barra de tareas de la parte izquierda de tu pantalla y hacer clic en perfil, una vez ubicado
      en tu perfil deberás de hacer clic en "Configuración", aquí podrás editar: Nombre, Apellido, Dirección, Teléfono y Profesión.
      Al terminar de editar tus datos puedes hacer clic en "Editar" para guardar los cambios.</p>
      <img align="center"  width="1116" height="516" src="https://i.imgur.com/0DPxsBA.jpg"/>
      <p class="font-weight-bold">¿CÓMO PUEDO REVISAR EL HISTORIAL DE MI PERFIL?</p>
      <p>Para revisar el historial de tu cuenta debes trasladarte a la barra de tareas de la parte izquierda de tu pantalla y sleccionar perfil, una vez 
      ubicado en tu perfil deberás hacer clic en "Historial" y revisar si tienes algún e-mail o comentario dentro de tu cuenta.</p>
      <img align="center"  width="1116" height="516" src="https://i.imgur.com/PC1UkUi.jpg"/>
      <p class="font-weight-bold">¿CÓMO PUEDO RECUPERAR MI CONTRASEÑA?</p>
      <p>Para que puedas recuperar tu constraseña en caso lo hayas olvidado, deberás ir a la página de "Login", una vez ahí deberas hacer clic en "Olvidé
      mi contraseña" y se te redireccionará a una página en la cual deberás escribir tu correo electrónico con el que te registraste en 
      nuestra plataforma y recibirás un email para la recuepración de tu contraseña.</p>
      <img align="center"  width="516" height="516" src="https://i.imgur.com/fYrgenr.jpg"/>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingFour">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
        <i class="fas fa-shipping-fast"></i> Sobre Service Provider
        </button>
      </h2>
    </div>
    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
      <div class="card-body">
      <p class="font-weight-bold">¿QUIENES SOMOS?</p>
      <p>Nosotros somos Service Provider y buscamos ofrecerte una plataforma virtual en la que puedas ofrecer y comprar servicios de manera gratuita y
      fácil de manejar.</p>
      <p class="font-weight-bold">¿ES GRATUITA LA PLATAFORMA WEB?</p>
      <p>Claro que sí, somos una plataforma totalmente gratuita, podras ofrecer tu servicio sin comisión alguna.</p>
      </div>
    </div>
  </div>
</div>
          
@stop