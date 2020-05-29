require('selectize')
$(function(){
    car_quality = $('#car-quality').selectize();
    car_quality[0].selectize.clear();
    select = $('#car').selectize({
        create: true
    });
    selectize = select[0].selectize;
    selectize.setValue("none");

    let id = $("#car-model").data("id");
    new Promise((resolve, reject) => {
        $.get("/cars/"+id, function(data, status){
            resolve(data);
        });
    }).then((data) => {
        $('#car-quality').change(function(){
            selectize.clear();
            selectize.clearOptions();
            let quality = $('#car-quality').val();
            data.forEach(element => {
                if (element.status === quality){
                    console.log(element.number_plate + " - " + element.status);
                    selectize.addOption({value: element.number_plate, text: element.number_plate});
                    selectize.addItem(element.number_plate);
                }
            });
        });
    }).catch((e) => {
        console.log(e);
    });
    
    $('[type="date"]').prop('min', function(){
        var d = new Date(),
            month = '' + (d.getMonth() + 1),
            day = '' + d.getDate(),
            year = d.getFullYear();

        if (month.length < 2) 
            month = '0' + month;
        if (day.length < 2) 
            day = '0' + day;
        return [year, month, day].join('-');
    }); 
});