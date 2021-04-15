<?php require_once 'views/layout/head.php'?>
<title>Cabeza Hogar</title>
<?php require_once 'views/layout/menu.php'?>
<body id="body">
<div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
    <div class="wrapper wrapper--w680">
        <div class="card card-1">
            <div class="card-heading"></div>
            <div class="card-body">
                <h2 class="title">Cabeza Hogar</h2>
                <form method="POST" id="registroCabeza" action="<?=base_url?>CabezaHogar/save">
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <input class="input--style-1" type="text" placeholder="Nombre" required name="nombre">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <input class="input--style-1" type="text" placeholder="Apellido" required name="apellido">
                            </div>
                        </div>
                    </div>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <input class="input--style-1 js-datepicker" type="text" placeholder="Fecha Nacimiento" required name="fechaNacimiento">
                                <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <div class="rs-select2 js-select-simple select--no-search">
                                    <select name="genero" required>
                                        <option disabled="disabled" selected="selected">Genero</option>
                                        <option value="1">Masculino</option>
                                        <option value="2">Femenino</option>
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="input-group">
                        <input class="input--style-1" type="text" required placeholder="Direccion" name="direccion">
                    </div>
                    <div class="input-group">
                        <input class="input--style-1" type="email" required placeholder="Email" name="email">
                    </div>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <input class="input--style-1" type="number" required placeholder="DNI" name="dni">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <input class="input--style-1" type="number" required min="1" max="5" placeholder="Cantidad Hijos" name="hijo">
                            </div>
                        </div>
                    </div>
                    <div class="p-t-20">
                        <button class="btn btn--radius btn--green" type="submit">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require_once 'views/layout/footer.php'?>

