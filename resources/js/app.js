/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');

$(function(){
    $('select').selectize();
});

window.deleteElement = function (id, type) {
    if (confirm("Are you sure?")){
        row = $("#"+ type + "-" + id);
        $.ajax({
            url: "/" + type+"/"+id,
            method: "DELETE",
            headers: {'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')},
            success: function(result){
                row.remove();
            },
            error: function(xhr){
                console.log(type+"/"+id);
                console.log("Something went wrong: " + xhr.responseText);
            }
        });
    }
}

window.deleteAccount = function(id){
    if (confirm("Are you sure you want to delete your account? :(")){
        $.ajax({
            url: "account/"+id,
            method: "DELETE",
            headers: {'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')},
            success: function(result){
                if(result==1){
                    alert("Cuenta eliminada correctamente");
                }else{
                    alert("No puede realizar esta operación mientras tenga préstamos o multas pendientes.");
                }
            },
            error: function(xhr){
                console.log("Something went wrong: " + xhr.responseText);
            }
        });
    }
}