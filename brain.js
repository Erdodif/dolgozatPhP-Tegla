function kiirat(darab = document){
    for (let elem of darab.children)
    {
        if(elem.childElementCount > 0){
            kiirat(elem);
        }
        if(elem.id !=='')
        {
            console.log(elem.id);
        }
    }
}
function init(){
    kiirat();
    window.addEventListener("resize",() => {
        validal("a"); 
        validal("b");
    });
    let oldal_a = document.getElementById("bevitel_a");
    oldal_a.addEventListener("input", ()=>validal("a"));
    let oldal_b = document.getElementById("bevitel_b");
    oldal_b.addEventListener("input", ()=>validal("b"));
}
function validal(oldal){
    let id = "oldal_"+oldal+"_hiba";
    let tartalom = document.getElementById("bevitel_"+oldal).value;
    let hibaSzoveg = "";
    if (tartalom === ""){
        hibaSzoveg += "A mező nem maradhat üres!";
    }
    else if (isNaN(tartalom)){
        hibaSzoveg += "Az oldal hosszának számnak kell lennie!";
    }
    else if (tartalom <= 0){
        hibaSzoveg += "Az oldal hossza 0-t meg kell haladja!";
    } else if (oldal == "a" && tartalom > document.documentElement.clientWidth){
        hibaSzoveg += "Az oldal meghaladja az ablak szélességét!";
    } else if (oldal =="b" && tartalom > document.documentElement.clientHeight){
        hibaSzoveg += "Az oldal meghaladja az ablak magasságát!";
    }
    document.getElementById(id).textContent = hibaSzoveg;
}
document.documentElement.addEventListener("DOMContentLoaded",init());