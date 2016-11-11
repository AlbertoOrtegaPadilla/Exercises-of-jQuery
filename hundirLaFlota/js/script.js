$(document).ready(function() {
    //Se crean las variables globales
    var tablero = [];
    var fila = ['A','B','C','D','E'];
    var aciertos = 0;
    var fallos = 0;
    var columna = 1;
    var aguaYBarcos = 0;
    var barco=5;
    //recargamos la pagina para reiniciar el juego
    $('#botonComenzar').click(function() {
            // Recargo la página
            location.reload();
    });
    //Se llama a la funcion crear barcos para comenzar la partida.
    crearBarcos();
    //Funcion para crear barcos
    function crearBarcos(){
      //al empezar partida desaparece y aparece el div
      $("#tablero").fadeOut(1000,function(){
          $("#tablero").fadeIn(1000);
      });
        //Se asignan las casillas de agua
        for(var i = 0;i < 25;i++){
          tablero[i] = "agua";
       }
        //Se asignan los barcos, sin que unos pisen a otros.
        do{
            var posicion = Math.floor(Math.random() * 25);
            if(tablero[posicion] == "agua") {
                tablero[posicion] = "barco";
                barco--;
            }
        } while(barco > 0);
        //se añade la clase agua o barco a los td
        for (var i = 0; i < 25; i++) {
          $("#"+i).addClass(tablero[aguaYBarcos]);
          aguaYBarcos++;
          $("#"+i).on("click",function(){
              compruebaCasilla(this);
          });
        }
    }
    /*$("#"+i).removeclass("agua");*/
    //Funcion para comprobar si la casilla es barco o agua
    function compruebaCasilla(casilla) {
        $(casilla).animate({opacity:'1'},1000);
        if($(casilla).hasClass("barco")){
            aciertos++;
            $("#aciertos").html("Aciertos: " + aciertos);
        } else {
            fallos++;
            $("#fallos").html("Fallos: " + fallos);
        }
        if(aciertos == 5){
            $("#tablero").find("p").html("WIN!!!").css("display","block");
        }
        if(fallos == 20){
            $("#tablero").find("p").html("GAME OVER!!!").css("display","block");
        }
    }
    //Funcion del boton siguiente.
    $('#botonBarcos').on('click', function(){
        $(".barco").each(function(){
            if($(this).css('opacity') == 0){
                $(this).animate({opacity:'1'},500,function(){
                    $(this).animate({opacity:'0'},200);
                });
            }
        });
    });
});
