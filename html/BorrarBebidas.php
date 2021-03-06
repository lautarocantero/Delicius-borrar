<?php 
    include '../html/header.php';

    if(count($_GET) > 0){
       $idbebida = $_GET['bebida'];
       $bebida = new Bebidas();
       $bebida->BorrarBebidas($idbebida);
    }

?>
<div class="contenedor-formulario-eliminar">
    <div class="eliminar-formulario">
        <div class="eliminar-imagen">
            <div class="eliminar-overlay">
                <h3 class="eliminar-subtitulo">¿Qué Deseas Eliminar?</h3>
            </div>

                <form action="" method="GET" class="formulario eliminar-comida-formulario">
                    <div class="imagen-comida" id="imagen-comida"> <!--imagen-->
                    </div>
                    <label for="nombre">nombre</label>
                    <select name="bebida" id="bebida">
                                <option disabled="disabled" selected>--Seleccionar--</option>
                        <?php foreach($this->bebidas as $beb): ?>
                                <option value="<?=$beb['idbebida']?>"><?=$beb['nombre']?></option>
                        <?php endforeach; ?>
                    </select>
                    <input type="submit" value="Eliminar" class="formulario-submit">
                </form>
                
        </div>
    </div>
</div>  

<?php
    include '../html/footer.php';
?>