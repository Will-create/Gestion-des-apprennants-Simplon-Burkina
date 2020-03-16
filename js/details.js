
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