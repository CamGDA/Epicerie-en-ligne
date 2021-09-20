 <?php
 
class connexionDB {

    private $host    = 'localhost';   
    private $name    = 'projet_php_epicerie';   
    private $user    = 'root';      
    private $pass    = '';     
    private $connexion;

    function __construct($host = null, $name = null, $user = null, $pass = null){

        if ($host != null) {
            $this->host = $host;
            $this->name = $name;
            $this->user = $user;
            $this->pass = $pass;
        }

        try {
            $this->connexion = new PDO(
                'mysql:host=' . $this->host . ';dbname=' . $this->name,
                $this->user,
                $this->pass,
                array(
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
                )
            );
        } catch (PDOException $e) {
            echo 'Erreur : Impossible de se connecter  à la BDD !';
            die();
        }
    }

    public function query($sql, $data = []){

        $req = $this->connexion->prepare($sql);
        $req->execute($data);
        return $req;
    }

    public function insert($sql, $data = []){
        $req = $this->connexion->prepare($sql);
        $req->execute($data);
    }

    public function update($sql, $id, $data = []){
        $data['id'] = $id;
        $req = $this->connexion->prepare($sql);
        $req->execute($data);
    }

    public function removeCartProduct($idProduit, $idUtilisateur){
        $sql = "DELETE FROM panier
                WHERE idProduit = :idProduit AND idUtilisateur = :idUtilisateur";

        $data['idProduit'] = $idProduit;
        $data['idUtilisateur'] = $idUtilisateur;
        $req = $this->connexion->prepare($sql);
        $req->execute($data);
    }

    public function addCartProduct($idProduit, $idUtilisateur) {
        $query = "INSERT INTO panier (idProduit, idUtilisateur) 
                VALUES (:idProduit, :idUtilisateur)";

        $this->insert($query, 
        [
            'idProduit' => $idProduit, 
            'idUtilisateur' => $idUtilisateur,
        ]
        );
    }

    public function addUser($data) {
        $hashed_password = password_hash($data['password'], PASSWORD_DEFAULT);

        $query = "INSERT INTO utilisateur (login, pass, email, adresseLivraison, telephone) 
                    VALUES (:login, :hashed_password, :email, :address, :phone)";

        $this->insert($query, 
            [
                'login' => $data['login'], 
                'hashed_password' => $hashed_password,
                'email' => $data['email'], 
                'address' => $data['address'],
                'phone' => $data['phone'],
            ]
        );
    }

    public function getUser ($login, $email) {
        $query = "SELECT * 
                FROM utilisateur 
                WHERE login = :login OR email = :email";

        $req = $this->query($query,
            [
                'login' => $login,
                'email' => $email
            ]
        );
                
       return $req->fetch();
    }

    public function getAllProduct () {
        $query = "SELECT * 
        FROM produit ";

        $req = $this->query($query);
          
        return $req->fetchAll();
    }

    public function getProductById ($productId) {
      $query = "SELECT * 
      FROM produit
      WHERE id = $productId ";

      $req = $this->query($query);
          
      return $req->fetch();
    }

    public function getTotalPriceHT($idUtilisateur) {
        $query = "SELECT SUM(prix) AS totalHT
              FROM panier
              INNER JOIN produit ON panier.idProduit = produit.id
              WHERE panier.idUtilisateur = $idUtilisateur";

        $req = $this->query($query);
            
        return $req->fetch();
    }

    public function getTotalPriceTTC($idUtilisateur) {
        $totalTTC = $this->getTotalPriceHT($idUtilisateur);
        return $totalTTC['totalHT'] * 1.20;
    }

    public function getAddress($idUtilisateur) {
        $query="SELECT adresseLivraison
                FROM utilisateur
                WHERE id = $idUtilisateur";

        $req = $this->query($query);
                    
        return $req->fetch();
    }
}


$DB = new connexionDB();

?>