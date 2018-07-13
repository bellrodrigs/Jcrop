<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/jquery.Jcrop.css" type="text/css" />
  <title>corta</title>
  <script type="text/javascript" src="js/jquery.js"></script>
  <script src="js/jquery.Jcrop.min.js"></script>
  <script type="text/javascript">
    
    var x='';
    var y='';
    var w='';
    var h='';

    function showCoords(c){

      //alert(c.x+' '+c.y+' '+c.w+' '+c.h);
      x=c.x;
      y=c.y;
      w=c.w;
      h=c.h;
    };

    jQuery(function($){
      $('#target').Jcrop({
        onSelect: showCoords,
        bgColor: 'black',
        bgOpacity: .4,
        aspectRatio: 1
      });
    });

    function enviar() {
      if (parseInt(w)){
      $.ajax({
        url:'cortaControlador.php',
        type:'POST',
        data:'x='+x+'&y='+y+'&w='+w+'&h='+h,
        success: function(rpt){
         alert("Imagem recortada com sucesso");
        }
      });
    }else{
      alert("A imagem precisa ser selecionada");
    }
    }
  </script>

</head>
<body>
  <h1>Corta imagem Jcrop</h1>
  <div id="destino">
    <img src="imagem/500.jpeg" id="target" />
    <input type="button" value="Cortar" onclick="enviar();">
    <input type="file" name="">
  </div>

</body>
</html>