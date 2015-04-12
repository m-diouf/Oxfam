<?php
/**
* 
*/
class ConnectionBDD
{
    private $user = 'hr';
    private $mdp = 'passer';
    private $host = 'localhost/XE';
    private $conn = 'conn';

    function __construct($user, $mdp, $host)
    {
        # code...
        $this->$user = $user ;
        $this->$mdp = $mdp;
        $this->$host = $host;
        /*$this->$conn = oci_pconnect($this->$user,
                                $this->$mdp,
                                $this->$host);
        */
    }

    //connection
    public function connect(){
        $this->$conn = oci_pconnect($this->$user,
                                $this->$mdp,
                                $this->$host);
        if (!$conn) {
            $e = oci_error();
            trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
        }
        else echo "connection effectue avec succes !!!";

        return $this->$conn ;
    }
    public function getConn(){
        return $this->$conn;
    }

    public function setConn($user, $mdp, $host){
        $this->$user = $user ;
        $this->$mdp = $mdp ;
        $this->$host = $host;
        $this->$conn = oci_pconnect($user, $mdp, $host);
    }

    //listes des tables
    public function listeTab(){

    }

    //executer un script select 
    public function script_select($select){
        $stid = oci_parse($this->$conn, $select);
        oci_execute($stid);
        return $stid ;
    }


    //liste des lignes retournee
    public function lignes_select($select){
        $stid = script_select($select);
        $tab ;
        while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
            # code...
            $i = 0;
            foreach ($row as $item ) {
                # code...
                if ($item !==null)
                    $tab = htmlentities($item);
            }
        }
        return $tab;
    }
}
?>