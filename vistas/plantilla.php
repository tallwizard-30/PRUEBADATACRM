<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="vistas/css/plantilla.css">
<link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="vistas/js/data.js"></script>
    <title>Prueba</title>
</head>

<body>
<div class="contenedor">
<input type="submit"  class="ov-btn-grow-box" onclick="mostrar()" id="mostrar" value="CLICKEAME">
<input type="submit"  class="ov-btn-grow-box " onclick="ocultar()" id="ocultar" value="OCULTAR" style="display: none;">
    <div style="display:none;" id="table">

    <table id="myTable" class="display" cellspacing="0" width="100%" >
<thead>
<tr>
<th></th>
<th>Numero de Contacto</th>
<th>Primer Nombre</th>
<th>Fecha de creacion</th>
</tr>
</thead>

</table>
    </div>

</div>





</body>
</html>