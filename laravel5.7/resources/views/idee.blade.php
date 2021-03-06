@extends('layout')

@section('content')
<!-- Consition premettant d'afficher la page qu'a des utilisateurs connectés-->
@if(Session::has('connexion'))
		<p > <p>
@else 
        <?php 
          header('Location: /');
          exit();
        ?>
@endif
  <section class="mbr-section form1 cid-rfRVRaDa1Q" id="form1-c">
    <div class="titrepage">
                <h1>Boite à idées</h1>
                <h2>Proposez nous des idées d'évènements</h2>
    </div>
	
    <!-- Formulaire de proposition d'une idée -->
	<div id = "formulaire">
   		<p>
		   <label for="titreidee">Titre de votre idée :</label>
       	   <input type="text" name="titreidee" id="titreidee" />
       
       <br />
       		<label for="descriptionidee">Description de votre idée:</label>
       		<textarea name="descriptionidee" id="descriptionidee"></textarea>
		   </p>
		   <p id="soumettre"> <button type="submit" onclick = "soumettreIdee()">Soumettre l'idée!</button> </p>
    </div>

</section>

<!-- Section où les idées sont affichées -->
<section id = "sectionIdee">
    <div class="container-fluid border border-warning rounded mb-0">
        <h3>Lorem ipsum dolor sit amet</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse vehicula vehicula sapien, in accumsan ipsum gravida a. Integer scelerisque, felis sed ultricies lobortis, justo quam aliquet est, id pretium ante odio eu orci. In sit amet mauris et risus suscipit vehicula vel a justo. Sed velit tellus, faucibus in magna ac, faucibus posuere enim. Mauris nec tortor neque. Mauris non nulla urna. Maecenas ut risus ac odio tincidunt imperdiet pharetra quis nunc. Nunc in laoreet libero. Fusce lobortis dolor sit amet ultricies sodales. Quisque laoreet massa a urna aliquet laoreet. Proin sed aliquet neque, sed ultrices massa. Vivamus aliquam lacinia eros in condimentum. Sed lobortis molestie tellus eu euismod. Fusce dignissim blandit felis, id finibus mi sollicitudin eu. Aenean venenatis nulla quis finibus faucibus. Duis in risus et justo maximus laoreet et ut enim.</p>
        <div class="jaime">    
        <span class="input-group-btn"><button type="submit">J'aime!</button></span>
        </div>
    </div>

</section>

<!-- Requete GET : Get l'ensemble des idées -->
<script>

// Requete envoyé au serveur
var getJSON = function(url) {
	return new Promise(function (data,err){
		var xhr = new XMLHttpRequest();
		xhr.open('GET', url, true);
		xhr.responseType = 'json';
		console.log(xhr);
		xhr.onload = function() {
			var status = xhr.status;
			if (status === 200) {
				data(xhr.response);
			} 
			else {
				err(status, xhr.response);
			}
		}
		xhr.send();
	});
};

// Affichage des idées
var blockIdee = "";
const getIdee = function(idee){
    var taille = idee.length - 1;
    for(var i = taille; i >=0; i--) {
        blockIdee = blockIdee + "<div class='container-fluid border border-warning rounded mb-0'> <h3>" + idee[i].titre_idee + "</h3> <p>" + idee[i].description_idee + "</p> <div class='jaime'> <span class='input-group-btn'><button type='submit' id='" + idee[i].id_idee + "' onclick='aimeIdee(this.id)'>J'aime!</button></span></div> </div>";
        document.getElementById("sectionIdee").innerHTML = blockIdee;
    }
};

getJSON('http://localhost:3000/idee/').then(getIdee);

</script>

<!-- Requète POST : Soumettre une idée-->
<script>

function soumettreIdee(){

    var token = "{{Session::get('token')}}";
    console.log(token);

    // Création du json à envoyer
    var ideePost = JSON.stringify({
        "titre_idee":$("#titreidee").val(),
        "description_idee":$("#descriptionidee").val(),
        "id_users": "{{Session::get('id')}}"
    });
    
    // Envoie de la requête POST 
    $.ajax({
        type: "POST",
        url: "http://localhost:3000/idee/",
        headers: {
            'authorization': 'siteBDE ' + token
        },
        data: ideePost,
        success: function(response, status){
            window.location.reload(true);
        },
        error: function(response, status, err) {
            alert(response.responseJSON.error);
        },
        contentType : "application/json"
    });
 }
 </script>

<!-- Requete POST : Aimer une idée -->
<script>
        
    function aimeIdee(id) {
        
        var token = "{{Session::get('token')}}";

        // Création du json à envoyer
        var aimePost = JSON.stringify({
            "id_idee": id,
            "id_users": "{{Session::get('id')}}"
        });

        // Envoie de la requête POST
        $.ajax({
            type: "POST",
            url: "http://localhost:3000/aime/",
            data: aimePost,
            headers: {
                'authorization': 'siteBDE ' + token
            },
            success: function(){
                alert("Vous avez aimé l'idée " + id);
                location.reload(true);
            },
            error: function(response, status, err) {
                alert(response.responseJSON.error);
            },
            contentType : "application/json"
        });
    }       
 </script>
@endsection