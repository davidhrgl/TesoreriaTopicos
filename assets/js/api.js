function getdata() {
    //Estos son los datos que se mandaran al servidor
    var objJSON = {
        funcname: "getEmpleados",
        filters: {
         "from":"1",
         "to": "3CV1"
        }
    };
    datos = objJSON;
    $.ajax({
        url: "controller.php",
        type: "POST",
        data: JSON.stringify(datos),
    }).done(function (respuesta) {
        $("#datatable-empleados").DataTable().destroy();
        $('#tbody_empleados').empty();
        var report = "";
        $.each(respuesta.data, function (index, value) {
            report += '<tr>';
            $.each(value,function (index,value2) {
                if (value2[0] == null){
                    report += '<td></td>';
                }else{
                    report += '<td>' + value2[0] + '</td>';
                }
                
            });
            report += '</tr>';
        });

        $('#tbody_empleados').append(report);
        $('#datatable-empleados').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
}

//Obtiene los saldos

function getSalds() {
    //Estos son los datos que se mandaran al servidor
    var objJSON = {
        funcname: "getSaldos",
        filters: {
            "from": "1",
            "to": "3CV1"
        }
    };
    datos = objJSON;
    $.ajax({
        url: "controller.php",
        type: "POST",
        data: JSON.stringify(datos),
    }).done(function (respuesta) {
        $("#datatable-saldos").DataTable().destroy();
        $('#tbody_saldos').empty();
        var report = "";
        $.each(respuesta.data, function (index, value) {
            report += '<tr>';
            $.each(value, function (index, value2) {
                if (value2[0] == null) {
                    report += '<td></td>';
                } else {
                    report += '<td>' + value2[0] + '</td>';
                }

            });
            report += '</tr>';
        });

        $('#tbody_saldos').append(report);
        $('#datatable-saldos').DataTable({
            "searching": false,
            "paging": false,
            "info": false,
            "ordering": false,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
}



function getCamb() {
    //Estos son los datos que se mandaran al servidor
    var objJSON = {
        funcname: "getCambios",
        filters: {
            "from": "1",
            "to": "3CV1"
        }
    };
    datos = objJSON;
    $.ajax({
        url: "controller.php",
        type: "POST",
        data: JSON.stringify(datos),
    }).done(function (respuesta) {
        $("#datatable-cambios").DataTable().destroy();
        $('#tbody_cambios').empty();
        var report = "";
        $.each(respuesta.data, function (index, value) {
            report += '<tr>';
            $.each(value, function (index, value2) {
                if (value2["Compra"] == null) {
                    report += '<td></td>';
                } else {
                    report += '<td>' + value2["Compra"] + '</td>';
                }
                if (value2["Venta"] == null) {
                    report += '<td></td>';
                } else {
                    report += '<td>' + value2["Venta"] + '</td>';
                }

            });
            report += '</tr>';
        });

        $('#tbody_cambios').append(report);
        $('#datatable-cambios').DataTable({
            "searching": false,
            "paging": false,
            "info": false,
            "ordering": false,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
}
















$("#btnaddCamion").click(function () {
    var objJSON = {
        funcname: "save_vehicle",
        data: {
            "tip_vehicle": $("#tipo").val(),
            "marca": $("#marca").val(),
            "submarca": $("#submarca").val(),
            "modelo": $("#modelo").val(),
            "kilome": $("#kilome").val(),
            "placa": $("#placa").val(),
            "num_econom": $("#num_econom").val(),
            "num_poli": $("#num_poli").val(),
            "num_cont": $("#num_cont").val(),
            "contenedor": $('input:radio[name=contenedor]:checked').val(),
            "capacidad": $("#capacidad").val(),
            "descripcion": $("#descripcion").val(),
            "status": $('input:radio[name=status_vehicle]:checked').val()
        }
    };
    datos = objJSON;
    $.ajax({
        url: "modelo/add_empleado.php",
        type: "POST",
        data: JSON.stringify(datos),
        //dataType: "json"
    }).done(function (respuesta) {
        $.each(respuesta.result, function (index, value) { 
            if (value == "ok") {
                $("#close_modal").click();
                $("#add_camion")[0].reset();
                alertify.success('Se agrego correctamente el registro');
                getdata();
            } else{
                $("#close_modal").click();
                alertify.error('No se pudo agregar correctamente');
            }
        });
    });
});


function deleterow(id){
    alertify.confirm("Desea Eliminar este Registro",
        function () {
            var objJSON = {
                funcname: "delete_vehicle",
                data: {
                    "idvehicle": id
                }
            };
            datos = objJSON;
            $.ajax({
                url: "modelo/controler_delete.php",
                type: "POST",
                data: JSON.stringify(datos),
            }).done(function (respuesta) {
                $.each(respuesta.result, function (index, value) {
                    if (value == "ok") {
                        alertify.success('Se Elimino Correctamente el Registro');
                        getdata();
                    } else {
                        alertify.error('No se pudo eliminar correctamente');
                    }
                });
            });
        },
        function () {
        });
}