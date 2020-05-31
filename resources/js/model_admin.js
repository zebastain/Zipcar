require('selectize')
$ (function() {
    $('select').selectize();
    $(document).on('click', '.btn-edit', function(){
        var id = $(this).data('id');
        var name = $(this).data('name');
        var brand = $(this).data('brand');
        var description = $(this).data('description');
        var year = $(this).data('year');
        var type = $(this).data('type');
        var price = $(this).data('price');
        
        $("#modal-edit-body #id").val(id);
        $("#modal-edit-body #edit-name").val(name);
        $("#modal-edit-body #edit-brand").val(brand);
        $("#modal-edit-body #edit-year").val(year);
        $("#modal-edit-body #edit-description").val(description);
        $("#modal-edit-body #edit-price").val(price);
        a = $("#modal-edit-body #edit-type option")
            .filter((i,e) => $(e).val() == type)
            .prop("selected", true);
    });
});