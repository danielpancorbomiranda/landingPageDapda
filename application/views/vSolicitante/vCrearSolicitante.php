<?php 
// $preferenciaPasada="Mediodia";
$EmailSolicitanteV=""; 
$NombreSolicitanteV="";
$ApellidosSolicitanteV="";
$TelefonoSolicitanteV="";
$TipoDeVehiculoV="";
$VehiculoV="";
$PreferenciaDeLlamadaV=""; 

$error=FALSE;
if (count($_POST)!=0)
{
    // RECOJO DATOS FORM
    $EmailSolicitanteV=$_POST["EmailSolicitante"]; 
    $NombreSolicitanteV=$_POST["NombreSolicitante"];
    $ApellidosSolicitanteV=$_POST["ApellidosSolicitante"];
    $TipoDeVehiculoV=$_POST["TipoDeVehiculo"];
    $TelefonoSolicitanteV=$_POST["TelefonoSolicitante"];
    $VehiculoV=$_POST["Vehiculo"];
    $PreferenciaDeLlamadaV=$_POST["PreferenciaDeLlamada"];

    // VALIDACIONES QUE HE CREIDO PERTINENTES, importante la de la clave primaria (EMAIL) con una expresion regular
    $formatoEmail=preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $EmailSolicitanteV); // EXRPRESION REGULAR PARA EMAIL
    if ($formatoEmail!=1)
    {
        $mensajeEmail=" Email no válido, ej: danipanda84@gmail.com";
        $error=TRUE;
    }

    if ( ($NombreSolicitanteV=="" || strlen($NombreSolicitanteV)>30)  )
    {
        $mensaje30=" De 1 a 30 caracteres en nombre.";
        $error=TRUE;
    }    

    if ( ($ApellidosSolicitanteV=="" || strlen($ApellidosSolicitanteV)>50)  )
    {
        $mensaje50=" De 1 a 50 caracteres en apellidos.";
        $error=TRUE;
    }  

    $formatoTelefono=preg_match('/^((\+?34([ \t|\-])?)?[9|6|7]((\d{1}([ \t|\-])?[0-9]{3})|(\d{2}([ \t|\-])?[0-9]{2}))([ \t|\-])?[0-9]{2}([ \t|\-])?[0-9]{2})$/', $TelefonoSolicitanteV); // EXRPRESION REGULAR PARA EMAIL
    // $formatoTelefono=preg_match('/^[9|6|7][0-9]{8}$/', $TelefonoSolicitanteV); // EXRPRESION REGULAR PARA EMAIL
    if ($formatoTelefono!=1)
    {
        $mensajeTelefono=" Teléfono no válido, ej: 650801568.";
        $error=TRUE;
    }

    // Si todo correcto, es decir, error no es false
    if(!$error)
    {
        $this->mSolicitante->fCrearSolicitante();    
    }
}
?>
<div id="principal" class="row">
    <form class="" action='' method='POST'>
        <div class="<?php echo isset($mensaje30) ? 'has-error' : 'has-success' ?> col-xs-12 col-sm-6 col-md-6 col-lg-6 margen" >
            <div class="col-xs-6 col-sm-5 col-md-5 col-lg-5">
                <label class="control-label" for="NombreSolicitante">Nombre (*): </label> <!--for busca el primer id-->
            </div>
            <div class="col-xs-6 col-sm-7 col-md-7 col-lg-7">
                <input placeholder="Nombre" maxLength="30" class="form-control" class="<?php echo isset($mensaje30) ? 'inputError' : '' ?>" type="text" name="NombreSolicitante" id="NombreSolicitante" value='<?php echo $NombreSolicitanteV ?>' />
            </div>   
        </div>

        <div class="<?php echo isset($mensaje50) ? 'has-error' : 'has-success' ?> col-xs-12 col-sm-6 col-md-6 col-lg-6 margen" >
			<div class="col-xs-6 col-sm-5 col-md-5 col-lg-5">
				<label class="control-label" for="ApellidosSolicitante">Apellidos (*): </label> <!--for busca el primer id-->
			</div>
			<div class="col-xs-6 col-sm-7 col-md-7 col-lg-7">
                <input placeholder="Apellidos" maxLength="50" class="form-control" class="<?php echo isset($mensaje50) ? 'inputError' : '' ?>" type="text" name="ApellidosSolicitante" id="ApellidosSolicitante" value='<?php echo $ApellidosSolicitanteV ?>' />
            </div>   
        </div> 

        <div class="<?php echo isset($mensajeTelefono) ? 'has-error' : 'has-success' ?> col-xs-12 col-sm-6 col-md-6 col-lg-6 margen" >
			<div class="col-xs-6 col-sm-5 col-md-5 col-lg-5">
				<label class="control-label" for="TelefonoSolicitante">Teléfono: </label> <!--for busca el primer id-->
			</div>
			<div class="col-xs-6 col-sm-7 col-md-7 col-lg-7">
				<input placeholder="Teléfono" maxLength=9 class="form-control" class="<?php echo isset($TelefonoSolicitanteV) ? 'inputError' : '' ?>" type="tel" name="TelefonoSolicitante" id="TelefonoSolicitante" value='<?php echo $TelefonoSolicitanteV ?>' />
			</div>   
        </div> 

        <div class="<?php echo isset($mensajeEmail) ? 'has-error' : 'has-success' ?> col-xs-12 col-sm-6 col-md-6 col-lg-6 margen" >
            <div class="col-xs-6 col-sm-5 col-md-5 col-lg-5">
                <label class="control-label" for="EmailSolicitante">Email (*): </label> <!--for busca el primer id-->
            </div>
            <div class="col-xs-6 col-sm-7 col-md-7 col-lg-7">
                <input placeholder="Email" maxLength=30 class="form-control" class="<?php echo isset($mensajeEmail) ? 'inputError' : '' ?>" type="text" name="EmailSolicitante" id="EmailSolicitante" value='<?php echo $EmailSolicitanteV ?>' />
            </div>    
        </div> 

        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 margen">
            <div class="col-xs-6 col-sm-5 col-md-5 col-lg-5">
                <label class="control-label" for="TipoDeVehiculo">Tipo de vehículo (*): </label>
            </div>
            <div class="col-xs-6 col-sm-7 col-md-7 col-lg-7">
                <select class='form-control nuevocolorgris TipoDeVehiculo' name="TipoDeVehiculo">
                    <?php 
                    foreach ($tipos as $tipo)
                    {
                        ?>
                            <option <?php if ($error){echo ($TipoDeVehiculoV==$tipo['TipoDeVehiculo'])? "selected":"" ;} ?> value="<?php echo $tipo['TipoDeVehiculo'] ?>"><?php echo $tipo['TipoDeVehiculo'] ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 margen">
            <div class="col-xs-6 col-sm-5 col-md-5 col-lg-5">
                <label class="control-label" for="Vehiculo">Vehículo (*): </label>
            </div>
            <div class="col-xs-6 col-sm-7 col-md-7 col-lg-7">
                <select class='form-control nuevocolorgris vehiculo' name="Vehiculo">
                    <?php
                        // if ($error)
                        // {
                        //     echo "<option selected value='".$VehiculoV."'>".$VehiculoV."</option>";
                        // }
                        // else
                        // {
                    ?>
                        <option selected value="Corsa">Corsa</option>
                        <option value="Astra">Astra</option>
                    <?php
                        // }
                    ?>
                </select>
            </div>
        </div>            
        
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 margen">
            <div class="col-xs-6 col-sm-5 col-md-5 col-lg-5">
                <label class="control-label" for="PreferenciaDeLlamada">Preferencia de llamada (*): </label>
            </div>
            <div class="col-xs-6 col-sm-7 col-md-7 col-lg-7">
                <select <?php echo isset($preferenciaPasada) ? "disabled":"" ; ?> class='form-control nuevocolorgris' name="PreferenciaDeLlamada">
                    <?php
                        if (!isset($preferenciaPasada))
                        {
                            ?>
                            <option selected value="Mañana">Mañana</option>
                            <option value="Tarde">Tarde</option>
                            <option value="Noche">Noche</option>
                            <?php
                        }
                        else 
                        {
                            echo "<option selected value=".$preferenciaPasada.">".$preferenciaPasada."</option>";
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <span style="cursor:pointer" title="Campos obligatorios." class="glyphicon glyphicon-info-sign"> Los campos con * son obligatorios. No olvide rellenarlos.</span>        
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <input class="enviar" type="submit" value="Enviar"/>
        </div>
    </form>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 centro" id="cajaErrores">
        <?php echo isset($mensajeEmail) ? "<p class='pError'>$mensajeEmail</p>":""; ?>
        <?php echo isset($mensaje30) ? "<p class='pError'>$mensaje30</p>":""; ?>
        <?php echo isset($mensaje50) ? "<p class='pError'>$mensaje50</p>":""; ?>
        <?php echo isset($mensajeTelefono) ? "<p class='pError'>$mensajeTelefono</p>":""; ?>
    </div>  
</div>