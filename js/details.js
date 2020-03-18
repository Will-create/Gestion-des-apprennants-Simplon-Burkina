
	function afficherPhoto(self,idPhoto){
	  
		var photo=document.getElementById(idPhoto);
		var fReader= new FileReader();
		fReader.readAsDataURL(self.files[0]);
		fReader.onloadend =function(e){
		  
		if(e.target.result!=photo.src){
          photo.src=e.target.result;
          console.log(e.target.result);
	  }else{
	    alert("veillez choisir une photo");
	  }
		}
	}
	
        function r(idElm,content){
		document.getElementById(idElm).innerHTML=': '+content; 
	}
	function rf(idElm, content){
		return document.getElementById(idElm).src=content+'.jpg';
	}


    
	function detailApprenant(nom,prenom,date_naiss,genre,_ville,_formation,_etabliss,_nomTut,_prenomTut,_contact,_genreTut,_professionTut,_contactTut,_photo){
	 



        r('nom', nom);
        r('prenom',prenom);
        r('date_naiss',date_naiss)
        r('genre',genre);
        r('ville',_ville);
        r('formation',_formation);
        r('etabliss',_etabliss);
        r('contact',_contact);
        rf('photoApprenant',photoApprenant);
        r('nomtut',_nomTut);
        r('prenomtut',_prenomTut);
        r('genretut',_genreTut);
        r('professiontut',_professionTut);
        r('contacttut',_contactTut);
        rf('photoApprenant',_photo);
		afficher('details');
		console.log(_photo);


		
	}
	
	
	
var css = '@page { size: landscape; }',
    head = document.head || document.getElementsByTagName('head')[0],
    style = document.createElement('style');

style.type = 'text/css';
style.media = 'print';

if (style.styleSheet){
  style.styleSheet.cssText = css;
} else {
  style.appendChild(document.createTextNode(css));
}

head.appendChild(style);


var butonImp=document.getElementById('bouton');
var pagecourante="http://localhost/premiere/Gestion-Simplon/tuteurs.php";
butonImp.onclick=function(e){
    e.preventDefault;
    e.stopPropagation;
    window.print();
}

var inpute = document.getElementById('search');
	searchbar.onkeyup=function() {
  // Declare variables

  
        var filter, tbody, tr, erreurMsg, td,td2, i,nom,prenom;
  
        filter = this.value.toUpperCase();
        tbody= document.getElementById("tbody");
        tr = tbody.getElementsByTagName('tr');
        erreurMsg=document.getElementById('erreurMsg');
        var tout=[];

        for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
        td2 = tr[i].getElementsByTagName("td")[2];
        nom = td.textContent || td.innerText;
        prenom = td2.textContent || td2.innerText;
        if (nom.toUpperCase().indexOf(filter)>-1 || prenom.toUpperCase().indexOf(filter)>-1) {
      tr[i].style.display = "";
      erreurMsg.style.display='none';
      tout.shift(tr[i]);
           }else {
      tr[i].style.display = "none"; 
      
      tout.push(tr[i]);
     if(tout.length==tr.length){
  
    erreurMsg.style.display='block';
      }
    }
   }
}
	