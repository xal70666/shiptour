$(document).ready(function(){

    var host = window.location.href;

   $("#from").change(function() {
     alert('masuk normal');

            $.getJSON(host + "/getTo/" + $("#from option:selected").val(), function(data) {
             //console.log(data);
                var temp = [];
                //CONVERT INTO ARRAY
                $.each(data, function(key, value) {
                    temp.push({v:value, k: key});
                });
                //SORT THE ARRAY
                temp.sort(function(a,b){
                   if(a.v > b.v){ return 1}
                    if(a.v < b.v){ return -1}
                      return 0;
                });
                //APPEND INTO SELECT BOX
                $('#to').empty();
                $.each(temp, function(key, obj) {
                    $('#to').append('<option value="' + obj.k +'">' + obj.v + '</option>');
                });
            });

        });

  $("#from_avail").change(function() {
    alert('masuk avail');
           $.getJSON(host + "/getTo/" + $("#from_avail option:selected").val(), function(data) {
            //console.log(data);
               var temp = [];
               //CONVERT INTO ARRAY
               $.each(data, function(key, value) {
                   temp.push({v:value, k: key});
               });
               //SORT THE ARRAY
               temp.sort(function(a,b){
                  if(a.v > b.v){ return 1}
                   if(a.v < b.v){ return -1}
                     return 0;
               });
               //APPEND INTO SELECT BOX
               $('#to_avail').empty();
               $.each(temp, function(key, obj) {
                   $('#to_avail').append('<option value="' + obj.k +'">' + obj.v + '</option>');
               });
           });

       });


});//end of document ready
