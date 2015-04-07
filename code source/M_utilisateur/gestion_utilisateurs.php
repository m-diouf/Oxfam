<?php
require_once(realpath(dirname(__FILE__)) . '/../classes/Manageur/ManageurBD.php');
$manageur=ManageurUtilisateur::getInstance();//gerer tous rapport objet/base de donneeq
  // ---------------------------- gestion de la sécurité -------------------------
    session_start();

  if (!isset($_SESSION['user'])){
  	//regarde pour l instant on en fait fie d etre co
    //header('Location:  connexion.php');
  }
    if (isset($_SESSION['user'])){
	 $user =  unserialize($_SESSION['user']);
	   if (($user->getProfil())!='administrateur')
     		header("Location: ../".$user->getProfil());
  }
// --------------------------------------------------------------------------------
?>
<!DOCTYPE html>
<html lang="fr">

<head>

	<div class="frontoffstat_entete">
	<table width="100%" border="0">
	  <tr>
	    <td class="logo_oxfam"><img src="../assets/images/logo.png"></td>
	    <td>OXFAM REPORT Project_Office</td>
	    <td><img src="../assets/images/logo.png" height="" width="" class="logo_projet"></td>
	    <td>Bienvenue a <br>
			Prenom NOM <br>
			Nom du Projet / Pays <br>
	        <select>
	   			<option selected value="">Choix langue</option>
	   			<option value="fr">Francais</option>
	   			<option value="ang">Anglais</option>
			</select></td>
	    <td><img src="../assets/images/quitter.png"></td>
	  </tr>
	</table>
	
	<hr / class="ligne_rouge"> 
	</div>
	<hr />
 

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../assets/css/plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">


    <!-- Morris Charts CSS -->
    <link href="../css/plugins/morris.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

<script>

	function modifyUser(email) {
		 
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
	 xmlhttp.open("GET","../php/ajax/modifuser.php?rechercher=1&&email="+email,true);
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
	
	function updateUser() {
		nom = document.getElementById("nom").value;
		params="&&nom="+nom; 
		prenom = document.getElementById("prenom").value;
		params+="&&prenom="+prenom;
		profil = document.getElementById("profil").value;
		params+="&&profil="+profil;
		email = document.getElementById("email").value;
		params+="&&email="+email;
		mdp = document.getElementById("mdp").value;
		params+="&&mdp="+mdp;
		id = document.getElementById("id").value;
		params+="&&id="+id;
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
		
		xmlhttp.open("GET","../php/ajax/modifuser.php?modif=1&&"+params,true);
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
				 			document.getElementById("notification").innerHTML="Les mots de passe ne correspondent pas ! Vérifiez encore.";
				 		}
		 		}else{
		 			document.getElementById("saveUserBtn").disabled=true;
		 			document.getElementById("notification").className="alert-danger alert-dismissable";
		 			document.getElementById("notification").innerHTML="Le mot de passe est trop court. Il doit être supérieur ou égal à 5 caractères";
 			}
	 	}
 	}
 </script>
  <script type="text/javascript">

        function BlockUser(id) {
             
          if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp=new XMLHttpRequest();
              } else { // code for IE6, IE5
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
          }
          xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                  document.getElementById("BlockUser").innerHTML=xmlhttp.responseText;
                }
              }
             xmlhttp.open("GET","../php/ajax/Blockuser.php?rechercher=1&&id="+id,true);
             xmlhttp.send();
        }
        function confirmBlock(id) {
                 
              if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp=new XMLHttpRequest();
                  } else { // code for IE6, IE5
                    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
              }
              xmlhttp.onreadystatechange=function() {
                    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                      document.getElementById("BlockUser").innerHTML=xmlhttp.responseText;
                    }
                  }
                 xmlhttp.open("GET","../php/ajax/Blockuser.php?block=1&&id="+id,true);
                 xmlhttp.send();
            }
    function ActiveUser(id) {
             
          if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp=new XMLHttpRequest();
              } else { // code for IE6, IE5
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
          }
          xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                  document.getElementById("ActiveUser").innerHTML=xmlhttp.responseText;
                }
              }
             xmlhttp.open("GET","../php/ajax/Activeuser.php?rechercher=1&&id="+id,true);
             xmlhttp.send();
        }
        function confirmActive(id) {
                 
              if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp=new XMLHttpRequest();
                  } else { // code for IE6, IE5
                    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
              }
              xmlhttp.onreadystatechange=function() {
                    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                      document.getElementById("ActiveUser").innerHTML=xmlhttp.responseText;
                    }
                  }
                 xmlhttp.open("GET","../php/ajax/Activeuser.php?block=1&&id="+id,true);
                 xmlhttp.send();
            }
    </script>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index.php">Plateforme  de Gestion de Métadonnées - Projet MODEV</a>
            </div>
            <!-- /.navbar-header -->

            <!--  Top Links -->
            
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Liste de tous les utilisateurs</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
            <div class="panel panel-primary">
                        <div class="panel-heading">
                            <font color="cyan">  <i class="fa fa-users	"></i> </font>Liste des utilisateurs
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-users">
                                    <thead>
                                        <tr>
                                            <th>Prenoms</th>
                                            <th>Noms</th>
                                            <th>Emails </th>
                                            <th>Profils </th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                                                   
                                       <?php 
                                       
                                       $lesutilisateurs=$manageur->getListUtilisateur();//-1 car les indices commence a 0 en sql
		
											 echo var_dump($lesutilisateurs);
											foreach ($lesutilisateurs as $user){
											 ?>	
											  <tr class="<?php  switch ($user->getProfil() ) {
												  case 'administrateur':echo 'info';
													  
													  break;
												  case 'chercheur':echo 'success';
													  
													  break;
												  case 'gestionnaire':echo 'danger';
													  
													  break;
												 
											  }     ?>
											  ">
                                            <td><?php  echo $user->getPrenom() ?>	</td>
                                            <td><?php  echo $user->getNom() ?>	</td>
                                            <td><?php  echo $user->getEmail() ?>	</td>
                                            <td><?php  echo $user->getProfil() ?>	</td>
                                            <td align="center">
                                            		<a href="#" title="Modifier" id="<?php  echo $user->getEmail()?>" onclick="modifyUser(this.id);" type="button" class="btn btn-success btn-circle" data-toggle="modal" data-target="#modifyUser"><i class="fa fa-edit"></i></a>
                                            		&nbsp; &nbsp;
                                            		<a href="#"  title="Supprimer" id="<?php  echo $user->getId()?>" onclick="deleteUser(this.id);" type="button"  class="btn btn-danger btn-circle" data-toggle="modal" data-target="#largeModal"><i class="fa fa-times"></i></a>
                                                    &nbsp; &nbsp;
                                                    <!-- activage et blokage -->
                                                    <?php if ($user->getEtat()=='bloque') {?>
                                                    <a href="#"  title="Activer" id="<?php  echo $user->getId()?>" onclick="ActiveUser(this.id);" type="button"  class="btn btn-default btn-circle" data-toggle="modal" data-target="#largeModal2"><i class="glyphicon glyphicon-chevron-up"></i></a>
                                                    <?php } ?>
                                                    
                                                    <?php if ($user->getEtat()=='active') {?>
                                                    <a href="#"  title="Bloquer" id="<?php  echo $user->getId()?>" onclick="BlockUser(this.id);" type="button"  class="btn btn-info btn-circle" data-toggle="modal" data-target="#largeModal3"><i class="glyphicon glyphicon-chevron-down"></i></a>
                                                    <?php } ?>

                                            </td>
                                        </tr>
											 
											 <?php 
											}	

                                       ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            <div align="center" class="well"> 
                            		<a href="adduser.php">Créer un nouveau  utilisateur</a> 
                            </div>
                            
                        </div>
                        <!-- /.panel-body -->
            </div>
            		<br />
                    <br />
            		
        </div>
        <!-- /#page-wrapper -->

	    </div>
	    <!-- /#wrapper -->
	    
	    <!-- MODAL POUR LA SUPPRESSION D'UTILISATEUR  -->
		    <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="deleteUser" aria-hidden="true">
		      <div class="modal-dialog modal-lg" >
		        <div class="modal-content" id='deleteUser'>
		          
		  
		  
		  		  
		        </div>
		      </div>
		    </div>
	    
	     <!-- MODAL POUR LA MODIFICATION D'UN UTILISATEUR -->
	    <div class="modal fade" id="modifyUser" tabindex="-1" role="dialog" aria-labelledby="modifyUser" aria-hidden="true">
	      <div class="modal-dialog modal-lg" id='modifUser'>
	        
		                            <!-- Le formulaire à ajouter ici avec les recnseignements sur l'utilisateur, avec AJAX -->
							             
							             
		                        
		                        <!-- /.panel-body -->
		                    </div>
		        </div>
	          
	    
             <!-- MODAL POUR LA BLOCKAGE D'UTILISATEUR  -->
            <div class="modal fade" id="largeModal3" tabindex="-1" role="dialog" aria-labelledby="BlockUser" aria-hidden="true">
              <div class="modal-dialog modal-lg" >
                <div class="modal-content" id='BlockUser'>
                  
          
          
                  
                </div>
              </div>
            </div>

     <!-- MODAL POUR L ACTIVAGE D'UTILISATEUR  -->
            <div class="modal fade" id="largeModal2" tabindex="-1" role="dialog" aria-labelledby="ActiveUser" aria-hidden="true">
              <div class="modal-dialog modal-lg" >
                <div class="modal-content" id='ActiveUser'>
                  
          
          
                  
                </div>
              </div>
            </div>
        <br />
        <br />

	<!-- FOOTER -->
 <footer>
	<hr />
	<div class="frontoffstat_piedpage">
	Infos OXFAM / Phone / Adresse / etc. 
	</div>
	<hr / class="ligne_rouge">
</footer>
      
      
    <!-- jQuery Version 1.11.0 -->
    <script src="../js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../assets/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="../assets/js/plugins/dataTables/dataTables.bootstrap.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../js/sb-admin-2.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../js/plugins/metisMenu/metisMenu.min.js"></script>
    
	<!-- Metis Menu Plugin JavaScript -->
    <script src="../js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-users').dataTable({	
        language: {
        processing:     "Traitement en cours...",
        search:         "Rechercher&nbsp;:",
        lengthMenu:    "Afficher _MENU_ &eacute;l&eacute;ments",
        info:           "Affichage de l'&eacute;l&eacute;ment _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
        infoEmpty:      "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
        infoFiltered:   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
        infoPostFix:    "",
        loadingRecords: "Chargement en cours...",
        zeroRecords:    "Aucun &eacute;l&eacute;ment &agrave; afficher",
        emptyTable:     "Aucune donnée disponible dans le tableau",
        paginate: {
            first:      "Premier",
            previous:   "Pr&eacute;c&eacute;dent",
            next:       "Suivant",
            last:       "Dernier"
        },
        aria: {
            sortAscending:  ": activer pour trier la colonne par ordre croissant",
            sortDescending: ": activer pour trier la colonne par ordre décroissant"
        }
    },
    });
    
    });
    </script>

</body>

</html>
