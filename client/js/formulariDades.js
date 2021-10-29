
    /* Fer focus al camp nom al carregar la pàgina web */
    window.onload = function(){
    document.getElementById("nom").focus();
}

    /* Array amb els missatages d'error de validació  */
    const err = ["Introdueix nom", "Introdueix un telèfon", "Telèfon no numeric", "Número de telèfon incorrecte (9 dígits)", "Introdueix un email", "Email incorrecte (@inspedrables.cat)" ];

    /* Mostrar missatges d'error */
    document.getElementById("submit").addEventListener("click", function(e){
    var n, text="", error = 0;

    if(errorNom()){ text += ("<b>"+err[0]+"!</b></br>"); error = 1;}

    n = errorTel();
    if(n){ text += ("<b>"+err[n]+"!</b></br>"); error = 1; }

    n = errorEmail();
    if(n){ text += ("<b>"+err[n]+"!</b>"); error = 1;}

    if(error){
    e.preventDefault(); //preveu/bloqueja la funció predeterminada del form, submit
    Swal.fire({
    icon: 'error',
    title: 'ERROR...',
    html: text
});
}
});

    /* Funcions comprovació Nom, Telefon & Email */
    function errorNom(){
    return (document.getElementById("nom").value === "") ? true : false;
}

    function errorTel(){
    let tlf = document.getElementById("tlf").value, n;
    if(tlf == ""){ n = 1; }
    else if(!(/^[0-9]+$/.test(tlf))){ n = 2; }
    else if (tlf.length != 9){ n = 3; }
    else{ n = 0; }
    return n;
}

    function errorEmail() {
    let correu = document.getElementById("correu").value, n;
    if(correu == ""){ n = 4; }
    else if(!(/^([a-zA-Z0-9._-]+)@inspedralbes.cat$/.exec(correu))){ n = 5; }
    else{ n = 0; }
    return n;
}

    /* Funció per a tornar a la pàgina anterior (menú.php) */
    document.getElementById("back").addEventListener("click",function (e){
    window.history.back();
});
