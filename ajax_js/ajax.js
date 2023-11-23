
function orszagok() {
  $.post(
      "models/ajax_model.php",
      {"op" : "orszag"},
      function(data) {
          $("<option>").val("0").text("Válasszon ...").appendTo("#orszagselect");
          var lista = data.lista;
          for(i=0; i<lista.length; i++)
          $("<option>").val(lista[i].id).text(lista[i].nev).appendTo("#orszagselect");
   },
   "json" 
   );
  };
  function varosok() {
      $("#szallodaselect").html("");
      $("#intezmenyselect").html("");
      $(".adat").html("");
      var orszagid = $("#orszagselect").val();
   if (orszagid != 0) { // "Válasszon… => 0"
   $.post(
   "models/ajax_model.php",
   {"op" : "varos", "id" : orszagid},
   function(data) {
      $("#szallodaselect").html('<option value="0">Válasszon ...</option>');
      var lista = data.lista;
     
      for(i=0; i<lista.length; i++)
      $("#szallodaselect").append('<option value="'+lista[i].id+'">'+lista[i].nev+'</option>');
      },
      "json" 
      );
      }
     }
     function intezmenyek() {
      $("#intezmenyselect").html("");
      $(".adat").html("");
      var varosid = $("#szallodaselect").val();
   if (varosid != 0) { // "Válasszon… => 0"
   $.post(
   "models/ajax_model.php",
   {"op" : "intezmeny", "id" : varosid},
   function(data) {
      $("#intezmenyselect").html('<option value="0">Válasszon ...</option>');
      var lista = data.lista;
      for(i=0; i<lista.length; i++)
      $("#intezmenyselect").append('<option value="'+lista[i].id+'">'+lista[i].nev+'</option>');
      },
      "json" 
      );
      }
     }
     function intezmeny() {
      $(".adat").html("");   
      var intezmenyid = $("#intezmenyselect").val();
   if (intezmenyid != 0) { // "Válasszon… => 0"
   $.post(
   "models/ajax_model.php",
   {"op" : "info", "id" : intezmenyid},
   function(data) {
      $("#nev").text(data.nev);
      $("#cim").text(data.cim);
      $("#tel").text(data.tel);
      $("#mail").text(data.email);
      $("#pdfid").text(data.id);
      },
      "json" 
      );
      }
     }
     $(document).ready(function() {
      orszagok();
      $("#orszagselect").change(varosok);
      $("#szallodaselect").change(intezmenyek);
      $("#intezmenyselect").change(intezmeny);   
      $(".adat").hover(function() {
          $(this).css({"color" : "white", "background-color" : "black"});
          }, function() {
          $(this).css({"color" : "black", "background-color" : "white"});
          });
         });
         