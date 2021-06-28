<form action="<?php echo getUrl("costos", "compras", "postInsert"); ?>" id="solicompras" enctype="multipart/form-data" method="post">

    <div class="row">
        <div class="col-sm-12">
            <div class="x_title">
                <h2>Compras</h2>

                <div class="clearfix"></div>
            </div>
            <br>
            <div class="container x_panel">
                <br>
                <div class="item form-group">
                    <label class="col-form-label col-md-2 col-sm-2 label-align">
                        <h6> fecha:</h6> <span ></span>
                    </label>
                    <div class="col-md-3 col-sm-6 ">
                        <input id="birthday" class="date-picker form-control" name="Soc_fecha" placeholder="dd-mm-aaa"
                            type="text"  type="text" onfocus="this.type='date'"
                            onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'"
                            onmouseout="timeFunctionLong(this)">
                        <script>
                        function timeFunctionLong(input) {
                            setTimeout(function() {
                                input.type = 'text';
                            }, 60000);
                        }
                        </script>
                    </div>
                    <label class="col-form-label col-md-4 col-sm-2 label-align">
                        <h6> Regional:</h6>
                    </label>
                    <div class="col-md-3 col-sm-7 ">
                    <select name="Reg_id" class="form-control" id="selectRegio"
                        data-url="<?php echo getUrl("Costos", "Compras", "selectCompras", false, "ajax") ?>" >
                        <option value="0">Seleccione...</option>
                        <?php
                            foreach ($Regionales as $regio) {
                            ?>
                        <option value='<?= $regio['Reg_id'] ?>'><?= $regio['Reg_descripcion'] ?></option>;

                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-2 col-sm-2 label-align">
                    <h6>Área:</h6>
                </label>
                <div class="col-md-3 col-sm-7 ">
                    <input class="form-control" name="Soc_area" id="Soc_area" type="text" size="15"
                        maxlength="30">
                </div>
                <label class="col-form-label col-md-4 col-sm-2 label-align">
                    <h6> Centro:</h6>
                </label>
                <div class="col-md-3 col-sm-6 ">
                    <select name="Cen_id" type="hidden" id="selectCentro" class="form-control" requiere="">
                        <option value="">Seleccione...</option>
                    </select>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-2 col-sm-2 label-align">
                    <h6>Coordinador de área:</h6>
                </label>
                <div class="col-md-3 col-sm-7 ">
                    <input class="date-picker form-control" id="Soc_nom_je" name="Soc_nom_je" ="" type="text" size="15"
                        maxlength="30">
                </div>
                <label class="col-form-label col-md-4 col-sm-2 label-align">
                <h6>Nombre de servidor publico:</h6>
                </label>
                <div class="col-md-3 col-sm-7 ">
                 <input class="date-picker form-control" name="Soc_servidorp" id="Soc_servidorp"  type="text"
                        size="15" maxlength="30">
                </div>
            </div>
            <div class="item form-group">
            <label class="col-form-label col-mb-3 col-sm-2 label-align">
                <h6>No.Documento:</h6>
                </label>
                <div class="col-md-3 col-sm-7 ">
                <input class="date-picker form-control" name="Soc_DNI_jefeOficina" id="Soc_DNI_jefeOficina"  type="number"
                        size="15" maxlength="30">
                 
                </div>
                <label class="col-form-label col-md-4 col-sm-2 label-align">
                    <h6>No.Documento:</h6>
                </label>
                <div class="col-md-3 col-sm-7 ">
                    <input class="date-picker form-control" name="Soc_DNI_servidorPublico" id="Soc_DNI_servidorPublico"
                        type="number" size="10" maxlength="20">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-mb-3 col-sm-2 label-align">
                    <h6>Ficha de caracterización:</h6> 
                </label>
                <div class="col-md-3 col-sm-4 ">
                    <input class="date-picker form-control" name="Soc_ficha" id="Soc_ficha" type="number" size="15"
                        maxlength="30">
                </div>
            </div>
            <br>
            <div class="container mt-8">
                <div class="form-row ml-6 w-75 m-auto" name="com_NoItem" id="com_NoItem">
                    <div class="form-group col-md-12 ml-5" id="contenedor">
                        <div class=" col-md-12 row ml-5 ">
                            <div class="form-control col-2" style="background-color:#17A481; color:#fff;">Descripcion
                                bien</div>
                            <div class="form-control col-2" style="background-color:#17A481; color:#fff;">U. Medida
                            </div>
                            <div class="form-control col-2" style="background-color:#17A481; color:#fff;">Cantidad</div>
                            <div class="form-control col-2" style="background-color:#17A481; color:#fff;">Observaciones
                            </div>

                            <div class="col-2" name="com_NoItem" id="com_Noitem"></div>
                        </div>
                        <div class=" form col-12 row ml-5" id="clon">
                            <select name="Pba_id[]" id="Pba_id" class="form-control col-2" >
                                <option value="0">Seleccione...</option>
                                <?php
                                foreach ($productoBase as $pro) {
                                ?>
                                <option value='<?= $pro['Pba_id'] ?>'><?= $pro['Pba_descripcion'] ?></option>;
                                <?php
                                }
                                ?>
                            </select>
                            <select name="Med_id[]" id="Med_id" class="form-control col-2" >
                                <option value="0">Seleccione...</option>
                                <?php
                                foreach ($Medidas as $med) {
                                ?>
                                <option value='<?= $med['Med_id'] ?>'><?= $med['Med_descripcion'] ?></option>;
                                <?php
                                }
                                ?>
                            </select>
                            <input type="number" id="com_Cantidad" name="com_Cantidad[]" class="form-control col-2  validar ">
                            <textarea id="com_Observaciones" name="com_Observaciones[]"
                                class="form-control col-2 validar producto" rows="1" cols="50"
                                placeholder="Observacion..."></textarea>
                        </div>

                    </div>
                </div>
            </div>
<div id="contentAlertCompras">
</div>



            <div class="ln_solid"></div>
            <div class="col-md-6 col-sm-6 offset-md-5">
                <a href="<?php echo getUrl("costos", "compras", "consult"); ?>"><button type='button'
                        class="btn btn-primary">Cancelar</button></a>
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>

        </div>
    </div>
    </div>
    </div>

    </div>

</form>