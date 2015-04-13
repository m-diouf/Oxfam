<?php
require_once(realpath(dirname(__FILE__)) . '/../classes/Manageur/ManageurBD.php');
$manageur=ManageurUtilisateur::getInstance();//gerer tous rapport objet/base de donneeq
  // ---------------------------- gestion de la securité -------------------------
    session_start();

  if (!isset($_SESSION['user'])){
  	//regarde pour l instant on en fait fie d etre co
    //header('Location:  connexion.php');
  }
    if (isset($_SESSION['user'])){
	 $user =  unserialize($_SESSION['user']);
	   if (($user->getProfil())!='administrateur')
     		header("Location: ..");
  }
// --------------------------------------------------------------------------------
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>OxFam| Connexion</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="description" content="" />
		<meta name="copyright" content="" />
		<link rel="stylesheet" type="text/css" href="../assets/css/style.css" media="all" />
		<link rel="stylesheet" type="text/css" href="../assets/style.css" media="all" />
		<script type="text/javascript" src="../assets/js/jquery.js"></script>
		<script type="text/javascript" src="../assets/js/js.js"></script>
		<script type="text/javascript" src="../assets/js/tab.js"></script>
		 <!-- Bootstrap Core CSS -->
    	<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    	<!-- Bootstrap Core JavaScript -->
    <script src="../assets/js/bootstrap.min.js"></script>
		
<script>
var emailsUtilisateursChecked=new Array();
//fonction appele a c chak fois k il y a un check ou uncheck pour prendre
//l email des utilisateurt checked
function eventCheck(email){
	i=0;
	//on cherche l email dans le tableau
	while(i<emailsUtilisateursChecked.length){
		if(emailsUtilisateursChecked[i]==email){//si on le trouve on l enleve et on kitte
			//regarde remove l email
			return ;
		}

		i++;
	}
	
	//puisk l email ne s y trouve pas on l ajoute
	emailsUtilisateursChecked.push(email);
	//alert(emailsUtilisateursChecked);
}
function modifyUser(email) {
		if(emailsUtilisateursChecked.length>1 || emailsUtilisateursChecked.length<1){
			alert("veillez  cocher un et un seul  utilisateur pour la modification");
			return;
		}
		email=emailsUtilisateursChecked[0];
		 
	  if (window.XMLHttpRequest) {
	    // code for IE7+, Firefox, Chrome, Opera, Safari
	    xmlhttp=new XMLHttpRequest();
	  } else { // code for IE6, IE5
	    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  xmlhttp.onreadystatechange=function() {
	    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
	      document.getElementById("modifUser").innerHTML=xmlhttp.responseText;
	    }
	  }
	 xmlhttp.open("GET","addUtilisateur.php?modifier=1&&email="+email,true);
	  xmlhttp.send();
	}
	function addUser(email) {
		email="darcia@yahoo.fr";
		 
	  if (window.XMLHttpRequest) {
	    // code for IE7+, Firefox, Chrome, Opera, Safari
	    xmlhttp=new XMLHttpRequest();
	  } else { // code for IE6, IE5
	    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  xmlhttp.onreadystatechange=function() {
	    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
	      document.getElementById("modifUser").innerHTML=xmlhttp.responseText;
	    }
	  }
	 xmlhttp.open("GET","addUtilisateur.php?ajouter=1&email="+email,true);
	  xmlhttp.send();
	}
	function deleteUser(id) {
		 
	  if (window.XMLHttpRequest) {
		    // code for IE7+, Firefox, Chrome, Opera, Safari
		    xmlhttp=new XMLHttpRequest();
		  } else { // code for IE6, IE5
		    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  xmlhttp.onreadystatechange=function() {
		    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
		      document.getElementById("deleteUser").innerHTML=xmlhttp.responseText;
		    }
		  }
		 xmlhttp.open("GET","../php/ajax/deleteuser.php?rechercher=1&&id="+id,true);
		 xmlhttp.send();
	}
	
	function confirmDelete(id) {
		 
	  if (window.XMLHttpRequest) {
		    // code for IE7+, Firefox, Chrome, Opera, Safari
		    xmlhttp=new XMLHttpRequest();
		  } else { // code for IE6, IE5
		    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  xmlhttp.onreadystatechange=function() {
		    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
		      document.getElementById("deleteUser").innerHTML=xmlhttp.responseText;
		    }
		  }
		 xmlhttp.open("GET","../php/ajax/deleteuser.php?suppr=1&&id="+id,true);
		 xmlhttp.send();
	}
	


 	function controle(){
 		mdp = document.getElementById("mdp").value;
 		vmdp = document.getElementById("vmdp").value;
 		if ( mdp!=""){
 			if ( mdp.length>=5){
	 				document.getElementById("saveUserBtn").disabled=false;
		 			document.getElementById("notification").className="alert-info alert-dismissable";
		 			document.getElementById("notification").innerHTML="Le mot de passe est OK. ";
		 			if (mdp==vmdp){
				 			document.getElementById("saveUserBtn").disabled=false;
				 			document.getElementById("notification").className="alert-info alert-dismissable";
				 			document.getElementById("notification").innerHTML="Les mots de passe correspondent maintenant. ";
				 		}else{
				 			document.getElementById("saveUserBtn").disabled=true;
				 			document.getElementById("notification").className="alert-danger alert-dismissable";
				 			document.getElementById("notification").innerHTML="Les mots de passe ne correspondent pas ! VÃ©rifiez encore.";
				 		}
		 		}else{
		 			document.getElementById("saveUserBtn").disabled=true;
		 			document.getElementById("notification").className="alert-danger alert-dismissable";
		 			document.getElementById("notification").innerHTML="Le mot de passe est trop court. Il doit Ãªtre supÃ©rieur ou Ã©gal Ã  5 caractÃ¨res";
 			}
	 	}
 	}
 </script>	
	</head>
	<body style="padding-left: 60px; padding-right: 60px;">
		<div class="width80">
			<div class="col_12">
				<img class="col_2" src="../assets/img/logo.png" />
				<p class="col_2">
					OXFAM
				</p>
				<img class="col_2" src="../assets/img/logo.png" />
				<div class="col_4">
					<span class="col_12">Bienvenue à </span><span class="col_12"><span class="col_6">Prenom </span><span class="col_6">NOM </span></span><span class="col_12">Nom du projet / Pays</span>
					<span class="col_12">
						<select>
							<option value="">-- Choix langue --</option>
							<option value="">Français</option>
							<option value="">Anglais</option>
						</select> </span>
				</div>
				<div class="col_2">
					<a href="deconnexion.php">
					<button class="small vert pill fright  icon-signout" type="submit">
						Quitter
					</button>
					</a>
				</div>
			</div>
			<ul class="breadcrumbs col_6">
				<li>
					<a href="">Home</a>
				</li>
				<li>
					<a href="">Module</a>
				</li>
				<li>
					<a href="">Sous Module</a>
				</li>
			</ul>
			<p class="col_6 fright txtalignright">
				jj/mm/yy hh:mm
			</p>
			<img class="col_12 sparatorh2" src="../assets/img/separateur.png" />
			<div class="col_6">
				<span class="col_6 icon-dashboard fsize45"></span>
				<div class="col_6">
					<br />
					<span>Gestion Utilisateurs</span>
				</div>
			</div>
			<div class="col_6">
			<a href="#" title="ajouter"  onclick="addUser('');" type="button" class="btn btn-success btn-circle" data-toggle="modal" data-target="#modifyUser"><i class="fa fa-edit"></i></a>
			<a href="#" title="Modifier"  onclick="modifyUser('');" type="button" class="btn btn-success btn-circle" data-toggle="modal" data-target="#modifyUser"><i class="fa fa-edit"></i></a>
			<a href="#" title="Supprimer"  onclick="modifyUser(this.id);" type="button" class="btn btn-success btn-circle" data-toggle="modal" data-target="#modifyUser"><i class="fa fa-edit"></i></a>
			
			</div>
			<div class="col_4 fright txtalignright">
				<div class="notice error">
					<i class="icon-remove-sign icon-large"></i>Alerte Opération / Dépassement <a href="#close"class="icon-remove"></a>
				</div>
			</div>
			<div class="col_12 bar">
				<a href="#" onclick="masquerTab('bq1',document.getElementById('opbq1').value,'opbq1');"> <span class="col_1 icon-arrow-down fsize30 sourismain"></span></a>
				<table class="sortable striped col_11 " cellpadding="0" cellspacing="0">
					<caption>
						<h6 class="bloc100  blue_menu"> Liste des Groupes d 'utilisateurs</h6>
					</caption>
					<thead>
						<tr class="alt first last ">
							<th>
							<input type="checkbox" />
							</th>
							<th width="20%">Prenom </th>
							<th width="20%">Nom </th>
							<th width="30%">Email </th>
							<th width="20%">Profil </th>
							<th width="20%"> Structure </th>
							<th width="20%"> Groupe </th>

							<th></th>
						</tr>
					</thead>
					<tbody id="bq1">
						<?php 
                                       
                         $lesutilisateurs=$manageur->getListUtilisateur();
		
						//echo var_dump($lesutilisateurs);
						foreach ($lesutilisateurs as $user){
						?>	
						<tr class="" >
						<td>
						<input name="iduser" value="<?php echo $user->getEmail();?>"  type="checkbox" onchange="eventCheck(this.value)" />
						</td>
                        <td><?php  echo $user->getPrenom() ?>	</td>
                        <td><?php  echo $user->getNom() ?>	</td>
                        <td><?php  echo $user->getEmail() ?>	</td>
                        <td><?php  echo $user->getProfil() ?>	</td>
                        <td><?php  echo $user->getStructure() ?>	</td>
                        <td><?php  echo $user->getGroupeUtilisateur() ?>	</td>
                        </tr>
											 
						<?php 
						}	

                        ?>
					</tbody>
					<tfoot>
						<tr class="">
							<td></td>
							<td></td>
							<td class="bordure"> Total utilisateur <?php echo $manageur->countUtilisateur(array())?> </td>
							<td class="bordure"> Bloques  1</td>
							<td class="bordure"> actifs 1 </td>
							<td></td>
						</tr>
					</tfoot>
				</table>
				<br />
				<img class="col_12" src="../assets/img/separateur.png" height="4" />
				<br />
				
				<input type="hidden" name="opbq1" id="opbq1" value="mask" />
				<input type="hidden" name="opbq2" id="opbq2" value="mask" />
				<div class="col_12 ">
					<div class="col_4 ">
						<p class="col_6">
							<span class="icon-download fsize45"></span>
							<br />
							<span>Générer Etat</span>
						</p>
						<p class="col_6">
							<span class="icon-print fsize45"></span>
							<br />
							<span>Imprimer Opération </span>
						</p>
					</div>
				</div>
			</div>
		</div>
<footer>
		<hr />
		<div class="frontoffstat_piedpage">
		Infos OXFAM / Phone / Adresse / etc. 
		</div>
		<hr / class="ligne_rouge">
</footer>
	</body>
<!-- MODAL POUR LA MODIFICATION D'UN UTILISATEUR -->
    <div class="modal fade" id="modifyUser" tabindex="-1" role="dialog" aria-labelledby="modifyUser" aria-hidden="true">
      <div class="modal-dialog modal-lg" id='modifUser'>
        
	                            <!-- Le formulaire a  ajouter ici avec les recnseignements sur l'utilisateur, avec AJAX -->
					             
					             
                        
                        <!-- /.panel-body -->
                    </div>
 </div>
</html>
