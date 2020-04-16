function cancelOrder(id){
    if (confirm("Are you sure you want to cancel this order?")){
        row = $("#order-" + id);
        $.ajax({
            url: "order/"+id+"/delete",
            method: "DELETE",
            headers: {'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')},
            success: function(result){
                row.remove();
            },
            error: function(xhr){
                console.log("Something went wrong: " + xhr.responseText);
            }
        });
    }
}

function deleteAccount(id){
    if (confirm("Are you sure you want to delete your account? :(")){
        $.ajax({
            url: "account/"+id+"/delete",
            method: "DELETE",
            headers: {'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')},
            success: function(result){
                if(result==1){
                    alert("cuenta eliminada correctamente");
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