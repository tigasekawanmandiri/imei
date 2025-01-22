function Barisbaru() {
    
    var Nomor   = $("#tableLoop tbody tr").length + 1;
    var Baris   = '<tr>';
        Baris  += '<td class="text-center">' + Nomor + '</td>';
        Baris  += '<td>';
        Baris  += '<select class="form-control chooseproduct" name="varian_id[]" id="varian_id'+Nomor+'" required>';
        Baris  += '</td>';
        Baris  += '<td>';
        Baris  += '<input type="number" name="qty[]" class="form-control" id="qty'+Nomor+'" placeholder="" min="1" value="1" required>'; 
        Baris  += '</td>';
        Baris  += '<td>';
        Baris  += '<input type="number" name="price[]" class="form-control price-input" id="price'+Nomor+'" readonly>'; 
        Baris  += '</td>';
        Baris  += '<td>';
        Baris  += '<input type="number" name="diskon[]" id="diskon'+Nomor+'" class="form-control">'; 
        Baris  += '</td>';
        Baris  += '<td>';
        Baris  += '<input type="number" name="subtotal[]" id="subtotal'+Nomor+'" class="form-control" readonly>'; 
        Baris  += '</td>';
        Baris  += '<td class="text-center">';
        Baris  += '<a class="btn btn-sm btn-warning" title="Hapus Baris" id="HapusBaris"><i class="fa fa-trash"></i></a> ';
        Baris  += '</td>';
        Baris  += '</tr>';
    $("#tableLoop tbody").append(Baris);
    $("#tableLoop tbody tr").each(function () {
        $(this).find('td:nth-child(2) input').focus();
    });

    FormSelectVarian(Nomor);
}

$(document).ready(function () {
     var A;
     for (A = 1; A <= 1; A++) {
        Barisbaru();
     }
     $('#BarisBaru').click(function (e) { 
        e.preventDefault();
        Barisbaru();
    });
    $("#tableLoop tbody").find('input[type=text]').filter(':visible:first').focus();
});

$(document).on('click','#HapusBaris',function (e) { 
    e.preventDefault();
    var Nomor = 1;
    $(this).parent().parent().remove();
    $('#tableLoop tbody tr').each( function() {
        $(this).find('td:nth-child(1)').html(Nomor);
        Nomor++;
    });
});


function FormSelectVarian(Nomor) {
    var output = [];
    output.push('<option value="">Pillh Produk</option>');
    
    $.getJSON("/admin/select-produk", function (data) {
        $.each(data, function (key, value) { 
             output.push('<option value="'+value.id+'" data-id="'+value.price+'">' + value.sproductname.product_name + ' | ' + value.sdurationname.duration_name + ' | ' + value.price + '</option>');
        });

        $('#varian_id' + Nomor ).html(output.join(''));

        $('#varian_id' + Nomor).on('change',function () {
            var selected = $(this).find(':selected').attr('data-id');

            // Select Harga
            var price = selected;
            $('#price'+Nomor).val(price);

            var subtotal = $('#qty'+Nomor).val() * $('#price'+Nomor).val();
            $('#subtotal'+Nomor).val(subtotal);
            var diskon = $('#diskon'+Nomor).val();
            var total = subtotal - diskon;
            $('#subtotal'+Nomor).val(total);

            $total = 0;
            $("#tableLoop tbody tr").each(function () {
                $total += parseInt($(this).find('td:nth-child(6) input').val());
            });
            $('#total').val($total);
        });
        
        $('#qty'+Nomor).on('change',function () {
            var subtotal = $('#qty'+Nomor).val() * $('#price'+Nomor).val();
            $('#subtotal'+Nomor).val(subtotal);
            var diskon = $('#diskon'+Nomor).val();
            var total = subtotal - diskon;
            $('#subtotal'+Nomor).val(total);

            $total = 0;
            $("#tableLoop tbody tr").each(function () {
                $total += parseInt($(this).find('td:nth-child(6) input').val());
            });
            $('#total').val($total);
        });

        $('#diskon'+Nomor).on('keyup',function () {
            var subtotal = $('#qty'+Nomor).val() * $('#price'+Nomor).val();
            var diskon = $('#diskon'+Nomor).val();
            var total = subtotal - diskon;
            $('#subtotal'+Nomor).val(total);

            $total = 0;
            $("#tableLoop tbody tr").each(function () {
                $total += parseInt($(this).find('td:nth-child(6) input').val());
            });
            $('#total').val($total);
        });


    });
}


   
