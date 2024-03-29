<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/tabla.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/tabla.css') }}" rel="stylesheet">
    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   
</head>

<body>
    <div class="container">
        @include('layouts.barra')
        <legend>Fecha de Cobertura</legend>
        <hr>
        <form action="/covidrci/public/certificado" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-sm-9">
                <table class="table table-stripped">
                    <tbody>
                        <tr>

                            <td><label for="nombre">Fecha Inicio Cobertura</label><input type="date" id="datefield"
                                    name="fecha_inicio" class="form-control" min='1899-01-01' max='2000-13-13'
                                    required>
                            </td>
                            <td><label for="nombre">Fecha Finalizacion Cobertura</label><input type="date"
                                    id="finalizacion" min='1899-01-01' max='2000-13-13' name="fecha_final"
                                    class="form-control" required>
                            </td>
                            <script>
                                var today = new Date();
                                var dd = today.getDate();
                                var mm = today.getMonth() + 1; //January is 0!
                                var yyyy = today.getFullYear();
                                if (dd < 10) {
                                    dd = '0' + dd
                                }
                                if (mm < 10) {
                                    mm = '0' + mm
                                }

                                today = yyyy + '-' + mm + '-' + dd;
                                document.getElementById("datefield").setAttribute("min", today);
                                document.getElementById("finalizacion").setAttribute("min", today);
                            </script>


                        </tr>
                    </tbody>
                </table>
            </div>
            <legend>Datos del Asegurado</legend>
            <hr>
            <div class="col-sm-9">
                <table class="table table-stripped">
                    <tbody>
                        <style>
                            .tableAsegurado {
                                width: 33%;
                            }

                        </style>
                        <tr>
                            <td class="tableAsegurado"><label for="nombre">Nombre y Apellido</label></td>
                            <td><input type="text" name="tomador_nombre" class="form-control" required></td>
                        </tr>
                        <tr>
                            <td class="tableAsegurado"><label for="nombre">Apellido</label></td>
                            <td><input type="text" name="tomador_apellido" class="form-control" required></td>
                        </tr>
                        <tr>
                            <td><label for="nombre">RUT</label></td>
                            <td><input type="text" name="tomador_rut" placeholder="1122334455" maxlength="25"
                                    class="form-control" required>
                                <span class="badge badge-light text-secondary">Usar números sin puntos. Usar el guión
                                    para
                                    RUT.</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="tableAsegurado"><label for="nombre">Fecha de Naciemiento</label></td>
                            <td><input type="date" name="tomador_fecha_nacimiento" class="form-control" required></td>
                        </tr>
                        <tr>
                            <td><label for="nombre">Domicilio</label></td>
                            <td><input type="text" name="tomador_domicilio" class="form-control" required></td>
                        </tr>
                        <tr>
                            <td><label for="nombre">Localidad:</label></td>
                            <td><input type="text" name="tomador_localidad" class="form-control" required></td>
                        </tr>
                        <tr>
                            <td><label for="nombre">Pais:</label></td>
                            <td><input type="text" name="tomador_pais" class="form-control">
                                <span class="badge badge-light text-secondary">Indicar el país del pasaporte. Chile si
                                    es
                                    RUT.</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-1 pt-3" style="width:4rem;">
                                <label for="altura">Altura:</label>

                            </td>
                            <td class="p-1 pt-3" style="width:4rem;">
                                <input type="number" name="asegurado_altura" min="0" max="3" step=".01"
                                    class="form-control">
                                <span class="badge badge-light text-secondary">Separar con punto</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-1 pt-3" style="width:4rem;">
                                <label for="peso">Peso:</label>
                            </td>
                            <td class="p-1 pt-3" style="width:4rem;">
                                <input type="number" min="0" max="200" name="asegurado_peso" class="form-control">

                            </td>
                        </tr>
                        {{-- <tr>
                    <td class="p-1 pt-3">
                        <label for="archivo">PCR:</label>
                    </td>
                    <td class="p-1 pt-3" style="width:4rem;">
                        <input type="file" name="asegurado_pcr" class="form-control">
                    </td>
                </tr> --}}
                        <tr style="    border: white;">
                            <td class="p-1 pt-3" style="width:4rem;">

                            </td>
                            <td class="p-1 pt-3" style="width:4rem;">

                            </td>
                        </tr>
                        <tr class="border-none">
                            <td class="p-1">¿Toma medicamentos de manera habitual?:</td>
                            <td class="p-1 text-left"><input type="checkbox" name="asegurado_medicamentos[]"
                                    value="si"> Si
                                | <input type="checkbox" name="asegurado_medicamentos[]" value="no" checked> No</td>
                        </tr>
                        <tr>
                            <td><label for="nombre">¿Cuales?:</label></td>
                            <td class="p-1"><input type="text" class="form-control"
                                    name="asegurado_medicamento_detalle">
                            </td>
                        </tr>
                        <tr>
                            <td class="p-1">¿Actualmente está cursando sintomas asociados al COVID-19?:</td>
                            <td class="p-1 text-left"><input type="checkbox" name="asegurado_sintomas[]" value="si"> Si
                                |
                                <input type="checkbox" name="asegurado_sintomas[]" value="no" checked> No
                            </td>
                        <tr>

                            <td><label for="nombre">Especifique:</label></td>
                            <td class="p-1"><input type="text" class="form-control"
                                    name="asegurado_sintomas_detalle"></td>
                        </tr>
                        <tr>
                            <td class="p-1">¿Estuvo expuesto en los úlitmos 10 días a situaciones de mayor
                                riesgo
                                que
                                puedan derivar en contagio de COVID-19?:</td>
                            <td class="p-1 text-left"><input type="checkbox" name="asegurado_ultimosDias[]" value="si">
                                Si
                                | <input type="checkbox" name="asegurado_ultimosDias[]" value="no" checked> No</td>
                        </tr>
                        <tr>
                            <td><label for="nombre">Especifique:</label></td>
                            <td class="p-1"><input type="text" class="form-control"
                                    name="asegurado_ultimosDias_detalle">
                            </td>
                        </tr>
                        <tr>
                            <td class="p-1">¿Estuvo en contacto estrecho con alguna persona COVID-19 Positivo
                                en
                                los
                                ultimos 15 dias?:</td>
                            <td class="p-1 text-left"><input type="checkbox" name="asegurado_contactoEstrecho[]"
                                    value="si"> Si | <input type="checkbox" name="asegurado_contactoEstrecho[]"
                                    value="no" checked> No</td>
                        </tr>
                        <tr>
                            <td><label for="nombre">Especifique:</label></td>
                            <td class="p-1"><input type="text" class="form-control"
                                    name="asegurado_contactoEstrecho_detalle"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <br>
            <legend>Acompañantes: <button type="button" id="button" class="btn btn-success pt-1 pb-1"
                    style="margin-left:3rem;">Agregar
                    Acompañante</button></legend>
            <hr>

            <div class="tablaCargar"></div>

            <div class="row mt-4">
                <div class="col-sm-5 mx-auto text-center">
                    <button class="btn btn-primary btn-lg">Emitir Certificado</button>
                </div>
            </div>
        </form>


    </div>
    <script>
        var counterVal = 0;

        function updateDisplay(val) {


            var click = val;

            var fila = '<div class="tabla mt-3">' +

                '<table>' +

                '<tr><td>&nbsp;</td>' +

                '<td class="p-1 pt-3" style="width:14%;" ><label for="nombre"> Nombre:</label><input type="text" class="form-control" name="nombre[]" required><span class="badge badge-light text-secondary"> </span></td>' +

                '<td class="p-1 pt-3" style="width:14%;"><label for="rut">Apellido:</label><input type="text" name="apellido[]" class="form-control"required ><span class="badge badge-light text-secondary"> </span></td>' +
                '<td class="p-1 pt-3" style="width:14%;"><label for="rut">Fecha de Nacimiento:</label><input type="date" name="fecha_nacimiento[]" class="form-control"required ><span class="badge badge-light text-secondary"> </span></td>' +


                '<td class="p-1 pt-3" style="width:14%;"><label for="rut">RUT:</label><input type="text" name="rut[]" class="form-control"required ><span class="badge badge-light text-secondary"> </span></td>' +

                '<td class="p-1 pt-3" style="width:14%;"><label for="altura">Altura:</label><input type="number" min="0" max="3" step=".01" name="altura[]" class="form-control"><span class="badge badge-light text-secondary">Separar con punto</span></td>' +

                '<td class="p-1 pt-3" style="width:14%;"><label for="peso">Peso:</label><input type="number" min="0" max="200" name="peso[]" class="form-control"><span class="badge badge-light text-secondary"> </span></td>' +

                '<td class="p-1 pt-3 text-center" style="width:14%;"><button onclick="remove(this)" type="button" class="btn btn-danger">Eliminar</button></td>' +

                '</tr>' +

                '<tr><td>&nbsp;</td>' +
                '<td class="p-1">¿Toma medicamentos de manera habitual?:</td>' +
                '<td class="p-1 text-center"><select class="form-control mx-auto text-center" style="width:4rem;" name="medicamentos[]" id=""><option value="no">NO</option><option value="si">SI</option></select></td>' +
                '<td class="text-center"><label for="nombre">¿Cuales?:</label></td>' +
                '<td class="p-1" colspan="2"><input type="text" class="form-control" name="medicamento_detalle[]"></td>' +
                '</tr>' +
                '<tr><td>&nbsp;</td>' +
                '<td class="p-1">¿Actualmente está cursando sintomas asociados al COVID-19?:</td>' +
                '<td class="p-1 text-center"><select class="form-control mx-auto text-center" style="width:4rem;" name="sintomas[]" id=""><option value="no">NO</option><option value="si">SI</option></select></td>' +
                '<td class="text-center"><label for="nombre">Especifique:</label></td>' +
                '<td class="p-1" colspan="2"><input type="text" class="form-control" name="sintomas_detalle[]"></td>' +
                '</tr>' +
                '<tr><td>&nbsp;</td>' +
                '<td class="p-1">¿Estuvo expuesto en los úlitmos 10 días a situaciones de mayor riesgo que puedan derivar en contagio de COVID-19?:</td>' +
                '<td class="p-1 text-center"><select class="form-control mx-auto text-center" style="width:4rem;" name="ultimosDias[]" id=""><option value="no">NO</option><option value="si">SI</option></select></td>' +
                '<td class="text-center"><label for="nombre">Especifique:</label></td>' +
                '<td class="p-1" colspan="2"><input type="text" class="form-control" name="ultimosDias_detalle[]"></td>' +
                '</tr>' +
                '<tr><td style="border-bottom: #d6cece;border-style: solid;border-width: 2px;border-top: none;border-left: none;border-right: none;">&nbsp;</td>' +
                '<td class="p-1" style="border-bottom: #d6cece;border-style: solid;border-width: 2px;border-top: none;border-left: none;border-right: none;">¿Estuvo en contacto estrecho con alguna persona COVID-19 Positivo en los ultimos 15 dias?:</td>' +
                '<td class="p-1 text-center" style="border-bottom: #d6cece;border-style: solid;border-width: 2px;border-top: none;border-left: none;border-right: none;"><select class="form-control mx-auto text-center" style="width:4rem;" name="contactoEstrecho[]" id=""><option value="no">NO</option><option value="si">SI</option></select></td>' +
                '<td style="border-bottom: #d6cece;border-style: solid;border-width: 2px;border-top: none;border-left: none;border-right: none;" class="text-center"><label for="nombre">Especifique:</label></td>' +
                '<td class="p-1" style="border-bottom: #d6cece;border-style: solid;border-width: 2px;border-top: none;border-left: none;border-right: none;" colspan="2"><input type="text" class="form-control" name="contactoEstrecho_detalle[]"></td>' +
                '</tr>' +
                '<hr>' +
                '</table>' +
                '</div>';

            //añado fila a la tabla

            $('.tablaCargar').append(fila);
        };

        $('#button').click(function() {

            updateDisplay(++counterVal);

        });

        function remove(item) {

            $(item).closest('div').remove()
        };

        $("input:checkbox").on('click', function() {

            var $box = $(this);
            if ($box.is(":checked")) {

                var group = "input:checkbox[name='" + $box.attr("name") + "']";

                $(group).prop("checked", false);
                $box.prop("checked", true);

            } else {

                $box.prop("checked", false);
            };
        });
    </script>
    {{-- Script Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
</body>

</html>
