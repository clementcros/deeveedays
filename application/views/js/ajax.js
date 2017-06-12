


$(document).on('click', '.jour', function (event) {
    event.preventDefault();
    $.ajax({
        url: $(this).attr("href"),
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            console.log(data);
            var zone_titre = $("#div_result").children("h3");
            var date = data.date;
            $(zone_titre).text(date.jour + " " + date.num_jour + " " + date.mois + " " + date.annee);
            reservation(data.reservation);
        },
        error: function (data) {
            console.log(data.toString());
        }
    });
});

function reservation(reservations) {

    for (var key in reservations) {
        var heureDebut = reservations[key].debut;
        var heureFin = reservations[key].fin;
        var h_d = heureDebut.substring(0, heureDebut.indexOf("."));
        var m_d = heureDebut.substring(heureDebut.indexOf(".") + 1);
        var h_f = heureFin.substring(0, heureFin.indexOf("."));
        var m_f = heureFin.substring(heureFin.indexOf(".") + 1);
        var minD = parseInt(m_d);
        var minF = parseInt(m_f);
        var heurD = parseInt(h_d);
        var heurF = parseInt(h_f);
        var flag = true;

        for (var i = heurD; i <= heurF; i++) {

            var tds = $('#' + i).children('td'); //heure pile concatenation de chaine
            // le flag définit le premier passage et donc le départ du créneau de reservation
            if (flag === true) {
                // s'il s'agit d'une demi heure le point de départ sera fixé à la demi heure
                if (minD === 30) {
                    affichNextLigne();
                    // sinon on lance le background à l'heure pile
                } else {
                    affichage(tds, reservations[key].machine);
                    // si mon index est inférieur à l'heure de fin je remplis la demi-heure qui suit
                    if (i < heurF) {
                        affichNextLigne();
                    }
                }
                flag = false;
                // suite de ma fonction après le premier passage
            } else {
                // je colorise à l'heure pile
                affichage(tds, reservations[key].machine);
                // si mon index est inférieur à l'heure de fin je colorise la demi-heure qui suit 
                if (i < heurF) {
                    affichNextLigne();
                }
            }
            // si mes minutes de fin sont à la demi heure je colorise mon dernier créneau à la demi-heure
            if (minF === 30) {
                affichNextLigne();
            }
// pb à régler, si erreur heure début = heure fin une demi heure se colorise en réservation qd même
        }

        function affichNextLigne() {
            tds = $('#' + i).next().children('td'); // et demi
            affichage(tds, reservations[key].machine);
        }


        function affichage(cellule, classe) {
            var indexTD = classe.substring(classe.indexOf("m") + 1);
            $(cellule[indexTD]).addClass(classe);
        }

    }

}

// Checkbox Machines
function CocheTout(ref, name) {
	var form = ref;
 
	while (form.parentNode && form.nodeName.toLowerCase() != 'form'){ 
		form = form.parentNode; 
	}
 
	var elements = form.getElementsByTagName('input');
 
	for (var i = 0; i < elements.length; i++) {
		if (elements[i].type == 'checkbox' && elements[i].name == name) {
			elements[i].checked = ref.checked;
		}
	}
}