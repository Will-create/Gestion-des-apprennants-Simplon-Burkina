
var glob=document.getElementsByClassName("fils");

  cachertout();
  affiche(glob[0]);

function cachertout(){
	for(var i=0;i<glob.length;i++){
		glob[i].style.display="none";
	}
}

var searchbar=document.getElementById("search");
function affiche(elem){
  elem.style="animation: ani1 1s ease-out";
  elem.style.display="flex";
}

function afficher(quoi){
	cachertout();
	if(quoi=="list" || quoi=="tableau" || quoi=="tab" || quoi=="liste"){
glob[0].style="animation: ani1 1s ease-out";
        affiche(glob[0]);

	}else if (quoi=="formulaire" || quoi=="formulair" || quoi=="form" || quoi=="forme") {
        glob[1].style="animation: ani6 2s ease-out";
affiche(glob[1]);
searchbar.disabled="true";
	}else if (quoi=="details" || quoi=="detailles" || quoi=="detailles" || quoi=="detaill") {
		glob[2].style="animation: ani1 1s ease-out";
affiche(glob[2]);
searchbar.disabled="true";
	}else{

		var MsgErreur="Argument incorrecte\n '"+quoi+"' n'est pas un argument valid";
		alert(MsgErreur);
	}
}

var button=document.getElementById('sendTuteurs');
    
	button.onclick=function(event){
	    var confirmation=confirm("Voulez vous envoyer les données?");
	    console.log(confirmation);
	    if (confirmation) {
	    	alert('Données envoyées avec Succès');
	    }else{
	    	event.preventDefault();
	    	alert('Veuillez Verifier et réenvoyez');
	    	
	    }

	}
	function versFormtTuteur(){
		window.location.assign('formtuteur.php');

	}
	function versFormApprenant(){
		window.location.assign('formApprenant.php');

	}