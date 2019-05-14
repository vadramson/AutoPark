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




