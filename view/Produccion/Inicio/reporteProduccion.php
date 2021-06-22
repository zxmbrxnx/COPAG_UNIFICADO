<div class="container">
    <div class="page-title">
        <div class="title_left">
            <h3>Reportes de Produccion</h3>
        </div>
    </div>
    <div class="x_content">
        <form action="<?php echo getUrl("Produccion", "Reporte", "postExcel", false, "ajax"); ?>" method="POST">
            <div class="x_panel">
                <div class="form-group row">
                    <div class="col-md-6">
                        <label class="col-form-label col-md-3 col-sm-3">Fecha de inicio <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 ">
                            <input class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                            <script>
                                function timeFunctionLong(input) {
                                    setTimeout(function() {
                                        input.type = 'text';
                                    }, 60000);
                                }
                            </script>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label class="col-form-label col-md-3 col-sm-3">Fecha fin <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 ">
                            <input class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                            <script>
                                function timeFunctionLong(input) {
                                    setTimeout(function() {
                                        input.type = 'text';
                                    }, 60000);
                                }
                            </script>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6">
                        <label class="control-label col-md-3 col-sm-3 " for="">Tipo de cliente<span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 ">
                            <select name="Odp_tipoempresa" id="tipoCliente" class="form-control">
                                <option value="">Elegir</option>
                                <!-----Tipo de cliente------>
                                <?php
                                foreach ($tipocliente as $res) {
                                ?>
                                    <option value='<?= $res['Tempr_id'] ?>'> <?= $res['Tempr_descripcion'] ?></option>

                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label class="control-label col-md-3 col-sm-3 " for="">Tipo de producto<span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 ">
                            <select name="Odp_tipoempresa" id="tipoCliente" class="form-control">
                                <option value="">Elegir</option>
                                <!-----Tipo de cliente------>
                                <?php
                                foreach ($productos as $res) {
                                ?>
                                    <option value='<?= $res['Pba_id'] ?>'> <?= $res['Pba_descripcion'] ?></option>

                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <input type="submit" value="Generar Reporte" class="btn btn-success">
                
            </div>
        </form>
    </div>
</div>