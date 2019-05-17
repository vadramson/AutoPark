function deactivate_Carmodel(idModel)
{
    
    swal({
        title: "Are you sure?",
        text: "you want to deactivate this car mode!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, please!",
        cancelButtonText: "No, don't!",
        closeOnConfirm: false,
        closeOnCancel: false
    },
            function (isConfirm) {
                if (isConfirm) {
//                    -----
                   $.ajax
                ({
                    type: 'post',
                    url: 'Model/php_ajax.php',
                    data: {
                        deactivate_carModel: 'deactivate_carModel',
                        idModel: idModel
                    },
                    success: function (response) {    
                        swal("Deactivated!", "The car model has been Deactivated!.", "success");
                        setTimeout(function () {
                            window.location.href = "indexAdmin.php?page=Q2FybW9kZWxzX1YvY2FyTW9kZWw=";
                        }, 100);
                        console.log(idModel);
                    },
                    error:function(response){
                        alert("Error " + response);
                    }
                });
//                    -----                    
                } else {
                    swal("Cancelled", "Operation aborted", "error");
                }
            });

}


function activate_Carmodel(idModel)
{
    swal({
        title: "Are you sure?",
        text: "you want to activate this car mode!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, please!",
        cancelButtonText: "No, don't!",
        closeOnConfirm: false,
        closeOnCancel: false
    },
            function (isConfirm) {
                if (isConfirm) {
//                    -----
                    $.ajax
                ({
                    type: 'post',
                    url: 'Model/php_ajax.php',
                    data: {
                        activate_Carmodel: 'activate_Carmodel',
                        idModel: idModel
                    },
                    success: function (response) {
                        swal("Activated!", "The car model has been Activated!.", "success");
                        setTimeout(function () {
                            window.location.href = "indexAdmin.php?page=Q2FybW9kZWxzX1YvY2FyTW9kZWw=";
                        }, 100);
                        console.log(idModel);
                    },
                    error:function(response){
                        swal("Unknown error!", "Try Again", "error");
                    }
                });
//                    -----                    
                } else {
                    swal("Cancelled", "Operation aborted", "error");
                }
            });

}

function deactivate_Driver(idDriver)
{
    
    swal({
        title: "Are you sure?",
        text: "you want to deactivate this Driver!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, please!",
        cancelButtonText: "No, don't!",
        closeOnConfirm: false,
        closeOnCancel: false
    },
            function (isConfirm) {
                if (isConfirm) {
//                    -----
                   $.ajax
                ({
                    type: 'post',
                    url: 'Model/php_ajax.php',
                    data: {
                        deactivate_Driver: 'deactivate_Driver',
                        idDriver: idDriver
                    },
                    success: function (response) {    
                        swal("Deactivated!", "Driver Deactivated!.", "success");
                        setTimeout(function () {
                            window.location.href = "indexAdmin.php?page=RHJpdmVycy9Ecml2ZXJz";
                        }, 100);
                        console.log(idDriver);
                    },
                    error:function(response){
                        alert("Error " + response);
                    }
                });
//                    -----                    
                } else {
                    swal("Cancelled", "Operation aborted", "error");
                }
            });

}


function activate_Driver(idDriver)
{
    swal({
        title: "Are you sure?",
        text: "you want to activate this Driver!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, please!",
        cancelButtonText: "No, don't!",
        closeOnConfirm: false,
        closeOnCancel: false
    },
            function (isConfirm) {
                if (isConfirm) {
//                    -----
                    $.ajax
                ({
                    type: 'post',
                    url: 'Model/php_ajax.php',
                    data: {
                        activate_Driver: 'activate_Driver',
                        idDriver: idDriver
                    },
                    success: function (response) {
                        swal("Activated!", "Driver Activated!.", "success");
                        setTimeout(function () {
                            window.location.href = "indexAdmin.php?page=RHJpdmVycy9Ecml2ZXJz";
                        }, 100);
                    },
                    error:function(response){
                        swal("Unknown error!", "Try Again", "error");
                    }
                });
//                    -----                    
                } else {
                    swal("Cancelled", "Operation aborted", "error");
                }
            });

}


function deactivate_Vehicle(idVehicle)
{
    
    swal({
        title: "Are you sure?",
        text: "you want to deactivate this Vehicle!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, please!",
        cancelButtonText: "No, don't!",
        closeOnConfirm: false,
        closeOnCancel: false
    },
            function (isConfirm) {
                if (isConfirm) {
//                    -----
                   $.ajax
                ({
                    type: 'post',
                    url: 'Model/php_ajax.php',
                    data: {
                        deactivate_Vehicle: 'deactivate_Vehicle',
                        idVehicle: idVehicle
                    },
                    success: function (response) {    
                        swal("Deactivated!", "Vehicle Deactivated!.", "success");
                        setTimeout(function () {
                            window.location.href = "indexAdmin.php?page=dmVoaWNsZXMvdmVoaWNsZQ==";
                        }, 100);
                        console.log(idVehicle);
                    },
                    error:function(response){
                        alert("Error " + response);
                    }
                });
//                    -----                    
                } else {
                    swal("Cancelled", "Operation aborted", "error");
                }
            });

}


function activate_Vehicle(idVehicle)
{
    swal({
        title: "Are you sure?",
        text: "you want to activate this Vehicle!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, please!",
        cancelButtonText: "No, don't!",
        closeOnConfirm: false,
        closeOnCancel: false
    },
            function (isConfirm) {
                if (isConfirm) {
//                    -----
                    $.ajax
                ({
                    type: 'post',
                    url: 'Model/php_ajax.php',
                    data: {
                        activate_Vehicle: 'activate_Vehicle',
                        idVehicle: idVehicle
                    },
                    success: function (response) {
                        swal("Activated!", "Vehicle Activated!.", "success");
                        setTimeout(function () {
                            window.location.href = "indexAdmin.php?page=dmVoaWNsZXMvdmVoaWNsZQ==";
                        }, 100);
                        console.log(idVehicle);
                    },
                    error:function(response){
                        swal("Unknown error!", "Try Again", "error");
                    }
                });
//                    -----                    
                } else {
                    swal("Cancelled", "Operation aborted", "error");
                }
            });

}

function cancel_rental(idRental)
{
    swal({
        title: "Are you sure?",
        text: "you want to Cancel this Rental!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, please!",
        cancelButtonText: "No, don't!",
        closeOnConfirm: false,
        closeOnCancel: false
    },
            function (isConfirm) {
                if (isConfirm) {
//                    -----
                    $.ajax
                ({
                    type: 'post',
                    url: 'Model/php_ajax.php',
                    data: {
                        cancel_rental: 'cancel_rental',
                        idRental: idRental
                    },
                    success: function (response) {
                        swal("Activated!", "Vehicle Activated!.", "success");
                        setTimeout(function () {
                            window.location.href = "indexAdmin.php?page=UmVudGFscy9SZW50YWxz";
                        }, 100);
                        console.log(idRental);
                    },
                    error:function(response){
                        swal("Unknown error!", "Try Again", "error");
                    }
                });
//                    -----                    
                } else {
                    swal("Cancelled", "Operation aborted", "error");
                }
            });

}

function finalise_rental(idRental)
{
    swal({
        title: "Are you sure?",
        text: "you want to Finalize this Rental!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, please!",
        cancelButtonText: "No, don't!",
        closeOnConfirm: false,
        closeOnCancel: false
    },
            function (isConfirm) {
                if (isConfirm) {
//                    -----
                    $.ajax
                ({
                    type: 'post',
                    url: 'Model/php_ajax.php',
                    data: {
                        finalise_rental: 'finalise_rental',
                        idRental: idRental
                    },
                    success: function (response) {
                        swal("Rental!", "Completed!.", "success");
                        setTimeout(function () {
                            window.location.href = "indexAdmin.php?page=UmVudGFscy9SZW50YWxz";
                        }, 100);
                        console.log(idRental);
                    },
                    error:function(response){
                        swal("Unknown error!", "Try Again", "error");
                    }
                });
//                    -----                    
                } else {
                    swal("Cancelled", "Operation aborted", "error");
                }
            });

}
