
    <!-- FUNCIÓ AL DONAR-LI CLICK A SOBRE DE LES IMATGES -->
    document.getElementById("area1").addEventListener("click", function(){
    window.location.href = "./ConsultarComandes.php";
});
    document.getElementById("area2").addEventListener("click", function(){
    window.location.href = "./ModificarMenu.php";
});
    <!-- FUNCIÓ DEL BOTÓ BACK -->
    document.getElementById("back").addEventListener("click", function(e){
    window.history.go(-1);
});
