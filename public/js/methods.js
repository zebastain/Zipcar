function deleteElement(id, type){
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


function deleteAccount(id){
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