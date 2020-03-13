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