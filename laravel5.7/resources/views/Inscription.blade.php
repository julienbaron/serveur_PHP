<!DOCTYPE >
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="stylesheet" href="assets/inscription.css"/>
        <link rel="stylesheet" href="assets/vendors/font-awesome.css"/>	
        <title>Inscription</title>
        <style>
        html
{
	background: url(https://images.pexels.com/photos/1574650/pexels-photo-1574650.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260) no-repeat center center fixed;
	-webkit-background-size: cover;
	-moz-background-size:cover;
	-o-background-size:cover;
	background-size: cover;

}

body{
	margin: 0;
}

.container{
	width:400px;
	height: 500px;
	text-align: center;
	background-color:rgba(0, 0, 0, 0.7);
	border-radius: 4px;
	margin: 0 auto;
	margin-top: 150px;
	padding-top: 3px;
	padding-left:15px;

}

.titre{
	text-align: left;
	font-family: verdana;
	color: white;
	position: relative;
	text-decoration: none;

}

.titre:hover{
	color: white;
}

.titre:before {
  content: "";
  position: absolute;
  text-align: center;
  width: 150px;
  height: 5px;
  bottom: 0;
  background-color: #fff;
  visibility: hidden;
  -webkit-transform: scaleX(0);
  transform: scaleX(0);
  -webkit-transition: all 0.3s ease-in-out 0s;
  transition: all 0.3s ease-in-out 0s;
}

.titre:hover:before {
  visibility: visible;
  -webkit-transform: scaleX(1);
  transform: scaleX(1);
}



.centre{
	height: 45px;
	width: 300px;
	font-size: 18px;
	margin-bottom: 20px;
	background-color: #fff;
	padding-left: 20px;
	border-radius: 150px;

}

input[type="text"], input[type="password"], input[type="email"]
{
	height: 45px;
	width: 300px;
	font-size: 18px;
	margin-bottom: 20px;
	background-color: #fff;
	padding-left: 20px;
	border-radius: 150px;

}

form-input:before{
	background: url(assets/images/man.png);
	content:"\f007";
	position: absolute;
	font-family: verdana;
	font-size: 30px;
	color: #985986;
	padding-top: 5px;
	

}

.btn-sign{
	padding: 15px 30px;
	color: #fff;
	background-color: #D3D3D3;
	border-radius: 150px;
	border: none;
	font-family: verdana;
	border-bottom: 4px solid #DCDCDC

}

a{
	text-decoration: none;
	color: rgba(168, 168,168,0.8);
	font-family: verdana;
	margin-bottom:10px;
	font-size: 20px;

}

.btn-sign:hover{
	padding: 15px 30px;
	color: #fff;
	background-color: #ffb938;
	border-radius: 150px;
	border: none;
	border-bottom: 4px solid #FFC252;


}

a:hover{
	color: rgba(255, 255, 255, 1);
	font-weight: bold;
}

.alert{
	color:red;
	font-family: verdana;
}
    </style>
    </head>
    <body>
    <main>
    	<div class="container">
    		<h2 class="titre">Inscription</h2>
    		
    		@if(count($errors)>0)
    				@foreach($errors->all() as $error)
    				<p class="alert aler-danger">{{$error}}</p>
    				@endforeach
    		@endif
    		<form action="{{ route('Inscription') }}" method="POST">
    			{{ csrf_field() }}
    			<div class="form-input">
    				<input type="text" name="nom" placeholder="Nom" required="true">
    			</div>
    			<div class="form-input">
    				<input type="text" name="prénom" placeholder="Prénom" required="true">
    			</div>
    			<div>
    				<input type="email" name="mail" placeholder="Mail" required="true">
    			</div>
    			<div>
    				<input type="password" name="password" placeholder="Password" required="true">
    			</div>
    			<div>
    				<input type="text" name="centre" placeholder="Centre" required="true">
    			</div>
    				<input type="submit" name="submit" value="Inscription" class="btn-sign">	
    		</form>
    	</div>  	
    </main>   
    </body>
</html>