var obiecte = [
{id_produs: 1, id_categ: 1, imagine: "img/meniu/capucino.jpg", denumire: "Capucino", descriere: "Cantitatea potrivită de lapte pentru a obţine spuma de lapte este 120 ml. De combina espresso puternic cu spumă cremoasă de lapte, iar numele se leagă chiar de culoarea sa distinctivă, asemănătoare cu cea a straielor purtate de călugării din Ordinul Fraţilor Capucini.", servire: "Produsul este disponibil si in varianta de livrare TO GO.", pret: "24 lei"},
{id_produs: 2, id_categ: 1, imagine: "img/meniu/bicerin.jpg",  denumire: "Bicerin",  descriere: "O creație de Conte Cavour, este o băutură aristocratică din Torino. Adăugați praf de cacao cu o cantitate  mică de apă fierbinte și se amestecă într-o masă cremoasă. Adăugați cafea. Se presara scorțișoară pe partea de sus și apoi se adaugă încet crema de lapte.", servire: "Produsul se poate comanda doar la barista.", pret: "23 lei"},
{id_produs: 3, id_categ: 1, imagine: "img/meniu/machiato.jpg", denumire: "Machiato", descriere: "Macchiato este preparat intr-un pahar mic in care se toarna spuma de lapte, se scurge o doza de espresso prin centrul spumei. Espresso macchiato, este o bautura ce contine cafea si o cantitate mica de lapte. „Macchiato” inseamna „marcat” sau „patat”.", servire: "Produsul este disponibil si in varianta de livrare TO GO.", pret: "18 lei"},

];

var i = 0;

var cfront = '<div class="single-menu-product mb-30"><div class="menu-product-img"> <img src="{poza}" /> </div><div class="menu-product-content"><div class="menu-title-price"><div class="menu-title"><h4>{denumire}</h4></div> <div class="menu-price"><span>Pret: {pret}</span></div></div> <p><strong>Descriere:</strong> {descriere}</p></div></div>';

var cback = '<div class="single-menu-product mb-30"><div class="menu-product-content"><div class="menu-title-price"><div class="menu-title"><h4>{denumire}</h4></div></div>';
cback += '<p><strong>Servire:</strong> {servire}</p></div>';


var sirh6 = ' {nrprodus} / 3';

afisez(); 

function afisez() {
    //  preiau obiectul avand class="flip-card-front"
    var front = document.querySelector(".flip-card-front");

    // Inlocuiesc in card-front {titluen} si {pozafront}
    var frontH = cfront.replace("{denumire}", obiecte[i].denumire)
                       .replace("{descriere}", obiecte[i].descriere)
                       .replace("{pret}", obiecte[i].pret)
                       .replace("{poza}", obiecte[i].imagine);
    front.innerHTML = frontH;

    //  preiau obiectul avand class="flip-card-back"
    var back = document.querySelector(".flip-card-back");

    // Inlocuiesc in card-back {titluro} si {pozafront}
    var backH = cback.replace("{denumire}", obiecte[i].denumire)
                       .replace("{servire}", obiecte[i].servire);
                     
    back.innerHTML = backH;

    //  preiau elementul <h6>
    var elh6 = document.querySelector("h6");
    // Inlocuiesc in sirh6 {nrcard}
    var elh6a = sirh6.replace("{nrprodus}", i+1);
    elh6.innerHTML = elh6a;
}

//  Actiuni declansate de butoane
var next = document.querySelector("#urmatorul");
next.onclick = function(){
  obiecte[i].id_categ= 1;
  i++;
  if(i < obiecte.length) {
    	//console.log("Afisez!");
    	afisez();
    } else {
    	i--;
    };
};

