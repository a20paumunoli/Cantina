/* Menú matí o tarda */
let d = new Date();
let h, t;
if (d.getHours() < 11) { h = 0; } else if (d.getHours() == 11 && d.getMinutes() <= "30") { h = 0; } else { h = 1; }
(!h) ? document.getElementById("tarda").style.display = "none": document.getElementById("mati").style.display = "none";

/* Añadir & Quitar producto */
const idProductoJSON = 6;
document.getElementById("bot").addEventListener("click", function(e) {
    let idProd;
    if (e.target.classList.contains("añadir")) {
        idProd = e.target.parentElement.childNodes[idProductoJSON].id;
        document.getElementById(idProd).value++;
        actualizar_carrito();
    } else if (e.target.classList.contains("quitar")) {
        idProd = e.target.parentElement.childNodes[idProductoJSON].id;
        if (document.getElementById(idProd).value > 0) { document.getElementById(idProd).value--; }
        actualizar_carrito();
    }
});

/* Actualizar carrito */
function actualizar_carrito() {
    const prodTot = 13;
    let nom = (h) ? "prodtarda-" : "prodmati-";
    let precio, nombre, text = "",
        total = 0,
        i, j;
    for (i = 1; i < prodTot; i++) {
        nombre = document.getElementById(nom + i).previousElementSibling.previousElementSibling.innerHTML;
        precio = parseFloat(document.getElementById(nom + i).previousElementSibling.innerHTML);
        if (document.getElementById(nom + i).value > 0) {
            text += ("<p>" + nombre + " x" + document.getElementById(nom + i).value + "</p></br>");
            for (j = 0; j < document.getElementById(nom + i).value; j++) {
                total += precio;
            }
        }
    }

    document.getElementById("carrito").innerHTML = text;
    document.getElementById("pr").innerHTML = total.toFixed(1);

    /* Afegir el botó de finalitzar compra si s'ha seleccionat un producte i esborrar-ho si no hi ha cap producte seleccionat*/
    t = (parseFloat(document.getElementById("pr").innerHTML) > 0) ? "inline" : "none";
    document.getElementById("submit").style.display = t;
}