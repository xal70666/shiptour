<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
    </script>
    <script>
      function getMsg(){
        $.ajax({
          type:'POST',
          url:'/getmsg',
          // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',\
          data: { _token: '{{csrf_token()}}' },
          success:function(data) {
            $("#msg").html(data.msg);
          }
        })
        .done(function() {
          console.log("successs");
        })
        .die(function(){
          console.log("gagal");
        });

      }
    </script>
  </head>
  <body>

    <div class="" id="msg">
      This Msg using Ajax
      {{Form::button('Replace Message',['onClick'=>'getMsg()'])}}
    </div>

  </body>
</html>
