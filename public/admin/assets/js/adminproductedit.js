function Barisbaru() {
    
    var Nomor   = $("#tableLoop tbody tr").length + 1;
    var Baris   = '<tr>';
        Baris  += '<td class="text-center">' + Nomor + '</td>';
        Baris  += '<td>';
        Baris  += '<select class="form-control" name="duration_id[]" id="duration_id'+Nomor+'" required>';
        Baris  += '</td>';
        Baris  += '<td>';
        Baris  += '<input type="number" name="price[]" class="form-control price-input" id="price'+Nomor+'" required>'; 
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
    output.push('<option value="">Pillh Duration</option>');
    $.getJSON("/admin/select-duration", function (data) {
        
        $.each(data, function (key, value) { 
             output.push('<option value="'+value.id+'">'+ value.duration_name +'</option>');
        });

        $('#duration_id' + Nomor ).html(output.join(''));
        

        $('#duration_id' + Nomor).on('change',function () {
            var selected = $(this).data('id');
            console.log(selected);
        });
    });
}

   
