<?php 
	class User extends ModelAbstract{
		protected $_id;
		protected $_pseudo;
		protected $_email;
		protected $_pass;

		//fonction constructeur
		public function __construct(array $data){
			$this->hydrate($data);
			$this->manager = new ManagerUser;
		}

		//fonction d'hydration
		
		public function hydrate(array $data){
			foreach ($data as $key => $value) {
				$method = 'set' . ucfirst($key);
				if (method_exists($this, $method)) {
					$this->$method($value);
				}
			}
		}

		//fonction chargée de récupérer tous les attributs et de les retourner dans un tableau. Le but étant de ne pas passer les attributs en public
		public function returnData(){
			$data = [];
			foreach ($this as $key => $value) {
				$data[$key] = $value;
			}
			return $data;
		}


		//fonction static qui instancie un managerUser et retourn un objet User correspondant à l'email recherché
		static function loadByEmail($email){
			$manager = new ManagerUser;
			return $manager->loadByEmail($email);
		}

		//fonctions getters
		public function getId(){
			return $this->_id;
		}
		public function getPseudo(){
			return $this->_pseudo;
		}
		public function getEmail(){
			return $this->_email;
		}		
		public function getPass(){
			return $this->_pass;
		}
		//fonctions setters
		public function setId($id){
			$id = (int)$id;
			if ($id > 0) {
				$this->_id = $id;
			}
		}
		public function setPseudo($pseudo){
			if (is_string($pseudo) && (strlen($pseudo) <= 70)) {
				$this->_pseudo = $pseudo;
			}
		}
		//ajout d'une regex pour vérifier la conformité de l'adresse mail
		public function setEmail($email){
			if (preg_match('#^[\w.-]+@[\w.-]+\.[a-z]{2,6}$#i', $email)) {
				$this->_email = $email;
			}
		}
		public function setPass($pass){
			$this->_pass = $pass;
		}
	}
?>
