var quantite = [];
var noms = [];
$(document).ready(function(){
    $.ajax({
        url: "http://localhost/PHP_PROJECT?controller=Article&action=articleSeuilMin",
        dataType : 'json',
        method: "POST",
        success: function(data) {
            $.each(data, function(key, item) {
              noms.push(item.libelle) ;
              quantite.push(parseInt(item.quantite)) ;
           });

           $('#container').highcharts( {
               chart: {
                   type: 'line'
               },
               title: {
                   text: 'Articles Exceeding The Minimum Threshold'
               },
               xAxis: {
                   categories: noms
               },
               yAxis: {
                   title: {
                       text: 'Quantity'
                   }
               },
               series: [{
                    name: 'Articles in Stock',
                   color: '#F58700',
                   data: quantite
               }],
           });

        }
    });
});
