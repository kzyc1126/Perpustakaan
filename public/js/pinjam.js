
window.onload = function(){
    $("select").on('click',function(){
        var select =  $('#pinjamList option:selected');
        var id = select.val();
        var title = select.data('title')
        var synopsis = select.data('synopsis');
        if(id != undefined && title != undefined && synopsis != undefined){
         insertNewRow(id,title,synopsis);
         select.remove();
        }
        
     })
     $('#pinjamTable').on('click', 'button', function(e){
        var id = $(this).val()
        var tr= $(this).closest('tr')
        var title = tr.find("td:eq(0)").text() 
        var synopsis = tr.find("td:eq(1)").text()
        deleteRow(id,title,synopsis)
        $(this).closest('tr').remove()
     })
    
    }

function insertNewRow(id,title,synopsis){
    var table = $('#pinjamTableBody');
    table.append($('<tr>')
                .append($('<td>')
                .attr('class','text-center align-middle')
                .append(title)
                .append($('<input>')
                .attr('type','text')
                .attr('name','book_id[]')
                .attr('class',' form-control-plaintext text-center product_id ')
                .attr('value',id)
                .attr('readonly',true)
                .attr('hidden',true)
                    )
                )
                 .append($('</td>'))
                
                 .append($('<td>')
                    .append(synopsis)
                    .attr('class','align-middle text-center')
                 )
                 .append($('</td>'))
              
                 
                 .append($('<td>')
                    .append($('<button>')
                        .attr('class','btn btn-danger')
                        .attr('type','button')
                        .attr('value',id)
                        .append($('<i>')
                            .attr('class','fas fa-times')
                        )
                        .append($('</i>'))
                    )
                    .attr('class','text-center')
                 )
                 .append($('</td>'))
                 

    )
    
}

function deleteRow(id,title,synopsis){
   var select = $("#pinjamList")
   select.append(
       $("<option>")
       .attr('value',id)
       .attr('data-title',title)
       .attr('data-synopsis',synopsis)
       .append(title)
       .append("</option>")
   )
}
