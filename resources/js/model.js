require('selectize')
$(function(){
    var base_price = parseFloat($("#car-model").data('price'));
    var extra_quality = base_price * 0.1;
    var extra_date = 0;
    const id = $("#car-model").data("id");
    
    $("#total-price").text(format(base_price));
    car_quality = $('#car-quality').selectize();
    car_quality[0].selectize.clear();
    select = $('#car').selectize({
        create: true
    });
    selectize = select[0].selectize;
    selectize.setValue("none");
    
    new Promise((resolve, reject) => {
        $.get("/cars/"+id, function(data, status){
            resolve(data);
        });
    }).then((data) => {
        $('#car-quality').change(function(){
            selectize.clear();
            selectize.clearOptions();
            let quality = $('#car-quality').val();
            if (quality == "GOOD") {
                extra_quality = base_price*0.1;
            } else if (quality == "BAD") {
                extra_quality = -base_price*0.1;
            } else {
                extra_quality = 0;
            }
            let price = base_price + extra_date + extra_quality;
            $("#total-price-field").val(price);
            $("#total-price").text(format(price));  
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

    $ ("[type='date']").change(function(){
        console.log("Hey");
        extra_date = 0;
        let end_date_txt = $("#end_date").val();
        let start_date_txt = $("#start_date").val();
        if (start_date_txt != "" && end_date_txt != "") {
            end_date = new Date(end_date_txt);
            start_date = new Date(start_date_txt);
            difference = Math.floor((end_date - start_date) / (1000*60*60*24));
            extra_date = difference * 1000;
        }
        let price = base_price + extra_date + extra_quality;
        $("#total-price-field").val(price);
        $("#total-price").text(format(price));  

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


function format(number) {
    return new Intl.NumberFormat('co-CO', { style: 'currency', currency: 'COP' }).format(number);
}