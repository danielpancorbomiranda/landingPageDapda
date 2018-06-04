<?php
session_start();
if (!isset($_SESSION["emailSolicitanteSesion"]))
{
    echo "<script> alert ('Vista no accesible, necesita rellenar el formulario antes. Por favor, indiquenos sus datos.') </script>";
    redirect ('promocion', 'location');
} 
else 
{
?>
    <div id="principal" class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 top"> <!--top-->
            <h2><strong><?php echo $_SESSION["nombreSolicitanteSesion"] ?></strong>, gracias por hacernos llegar dicha solicitud. Nos pondremos en contacto con la mayor brevedad posible.</h2>
            <h3>Solicitud recibida el <?php echo date('d / m / Y') ?> perteneciente al email << <strong><?php echo $_SESSION["emailSolicitanteSesion"] ?></strong> >>.</h3>
        </div>
    </div>
    <div class="centro">
        <a class="btn btn-danger" href="<?php echo site_url ('promocion')?>">Cerrar y volver</a>
    </div>
<?php
}
?>