
<?php
    
    // Connexion au service XE (i.e. la base de données) sur la machine "localhost"
     $conn = oci_pconnect('darcia', 'passer', 'localhost/XE');
    
    
    if (!$conn) {
    
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }
    
    $stid = oci_parse($conn, 'SELECT nom FROM utilisateurs');
    oci_execute($stid);
    
    echo "<table border='1'>\n";
    while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
        echo "<tr>\n";
        foreach ($row as $item) {
            echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "") . "</td>\n";
        }
        echo "</tr>\n";
    }
    echo "</table>\n";
    
?>

<?php
    require(dirname(__FILE__)."/../M_Utilisateur/Utilisateur.php");
    class ManageurUtilisateur{
        /**
         * Instance de la classe ManageurBD:singleton
         *
         * @var ManageurBD
         * @access private
         * @static
         */
        private static $instance = null;
        /**
        *  Instance de la classe PDO
        *
        * @var PDO
        * @access private
        */
        private $PDOInstance = null;
    
        /**
        * Constante: nom d'utilisateur de la bdd
        *
        * @var string
        */
        const DEFAULT_ORACLE_USER = 'darcia';
        /**
        * Constante: hÃ´te de la bdd
        *
        * @var string
        */
        const DEFAULT_ORACLE_SERVICE = 'localhost/XE';
        /**
        * Constante: hÃ´te de la bdd
        *
        * @var string
        */
        const DEFAULT_ORACLE_PASS = 'passer';
        /**
        * Constante: nom de la bdd
        *
        * @var string
        */
        const DEFAULT_ORACLE_NS = 'darcia';//bon bon oxfam lors de l integration
        /**
        * Constructeur private:singleton
        *
        * @param void
        * @return void
        * @see PDO::__construct()
        * @access private
        */
        private function __construct(){
            try{
                $this->PDOInstance  = new PDO("oci:dbname=".'localhost/XE','darcia','passer',array( PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));
    
            }catch(PDOException $e){
                echo ($e->getMessage());
            }
    
         }
        /**
        * Cree et retourne l'objet ManageurBD : Singleton
        *
        * @access public
        * @static
        * @param void
        * @return ManageurBD $instance
        */
        public static function getInstance(){
            if(is_null(self::$instance)){
            self::$instance = new ManageurUtilisateur();
            }
            return self::$instance;
        }
        public function getPDO(){
            $this->PDOInstance  = new PDO("oci:dbname=".'localhost/XE','darcia','passer',array( PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));
            return $this->PDOInstance ;
    
        }
        /*methodes de manipulation des utilisateurs */
    
         public function addUtilisateur(Utilisateur $uti){
            $q = $this->getPDO()->prepare('INSERT INTO utilisateurs SET password = :password, nom = :nom, prenom = :prenom,  email = :email, profil = :profil');
            $q->bindValue(':nom', $uti->getNom());
            $q->bindValue(':prenom', $uti->getPrenom()); 
            $q->bindValue(':email', $uti->getEmail());
            $q->bindValue(':profil', $uti->getProfil());
            $q->bindValue(':password', $uti->getPassword());
            $q->execute();
            //on infor l objet de son id dans la base
            $uti->hydrate(array(
                    'id' => $this->getPDO()->lastInsertId()
            ));
        }
         public function countUtilisateur($options){
            $utilisateurs = array();
            $q = $this->getPDO()->prepare('SELECT COUNT(*)  FROM utilisateurs ');
            $q->execute();
            return $q->fetchColumn();
    
        }
        public function deleteUtilisateur(Utilisateur $uti){
            $this->getPDO()->exec('DELETE FROM utilisateurs WHERE id = '.$uti->geId());
        }
        //regarde
        public function deleteUtilisateurByEmail($id){
    
    
        }
        public function existUtilisateur($info){//pertinance
            if (is_int($info)) // si l argument est un int On veut voir si tel utilisateur ayant pour id $info existe.
            {
                return (bool) $this->getPDO()->query('SELECT COUNT(*) FROM utilisateurs WHERE id = '.$info)->fetchColumn();
            }
    
            // Sinon, c'est qu'on veut vérifier en utilisant l email  .
    
            $q = $this->getPDO()->prepare('SELECT COUNT(*) FROM utilisateurs WHERE email = :email');
            $q->execute(array(':email' => $info));
            $r=(bool) $q->fetchColumn();
            $q->closeCursor();
            return $r;
        }
        ///recoit en parametre soit l id soit l' email et retour l utilisateur correspondant
        public function getUtilisateur($info){
            $uti=array();
            if (is_int($info)){//si c est l id
              $q = $this->getPDO()->query('SELECT * FROM utilisateurs WHERE id = '.$info);
              $uti = $q->fetch(PDO::FETCH_ASSOC);
            }
            else{//a partir d l email
              $q = $this->getPDO()->prepare('SELECT email,password,nom,prenom FROM utilisateurs WHERE email = :email');
              $q->execute(array(':email' => $info));
    
              $uti = $q->fetch(PDO::FETCH_ASSOC);
            }
            $q->closeCursor();
            if($uti==null) return null;
             return new Utilisateur($uti);
    
        }
    
    //revoi un tableau d utilisateur
         public function getListUtilisateur(){
            //echo var_dump( $options);
            $utilisateurs = array();
            $q = $this->getPDO()->prepare('SELECT nom,prenom,email,profil FROM utilisateurs ');
            $q->execute();
            $tas=$q->fetchAll(PDO::FETCH_ASSOC);
            //$rows = $q->fetchAll(PDO::FETCH_CLASS, 'ArrayObject');
             foreach ( $tas  as $donnees){
    
             $utilisateurs[] = new Utilisateur($donnees); 
            }
            $q->closeCursor();
            unset($q);unset($tas);		
            return $utilisateurs;
      }
        public function update(Utilisateur $uti){
            $q = $this->getPDO()->prepare('UPDATE utilisateurs SET nom = :nom, prenom = :prenom, adresse = :adresse, telephone = :telephone,  email = :email,profil = :profil, password = :password WHERE id = :id');
            $q->bindValue(':id', $uti->getId(), PDO::PARAM_INT);
            $q->bindValue(':nom', $uti->getNom(), PDO::PARAM_INT);
            $q->bindValue(':prenom', $uti->getPrenom(), PDO::PARAM_INT);
            $q->bindValue(':adresse', $uti->getAdresse(), PDO::PARAM_INT);
            $q->bindValue(':email', $uti->getEmail(), PDO::PARAM_INT);
            $q->bindValue(':profil', $uti->getProfil(), PDO::PARAM_INT);
            $q->bindValue(':password', $uti->getPassword(), PDO::PARAM_INT);
            $q->execute();
            $q->closeCursor();
        }
    
        public function getListUtilisateurNew(){
    
      }
         public function countUtilisateurNew(){
    
        }
    
    }//fin class ManageurDb
    
    //c
?>