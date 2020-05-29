$ (function() {
    $('select').selectize();
    $(document).on('click', '.btn-edit', function(){
        var id = $(this).data('id');
        var name = $(this).data('name');
        var brand = $(this).data('brand');
        var description = $(this).data('description');
        var image = $(this).data('image');
        var year = $(this).data('year');
        var type = $(this).data('type');
        
        $("#modal-edit-body #id").val(id);
        $("#modal-edit-body #edit-name").val(name);
        $("#modal-edit-body #edit-brand").val(brand);
        $("#modal-edit-body #edit-year").val(year);
        $("#modal-edit-body #edit-description").val(description);
        a = $("#modal-edit-body #edit-type option")
            .filter((i,e) => $(e).val() == type)
            .prop("selected", true);
    });
});