<?php
	namespace model;

	class AuthAdmin extends AuthAbstract
	{
		//function constructeur
		public function __construct(){
			parent::__construct();
			$this->person = new Admin;
			$this->personId = 'adminId';
		}

		public function login($pseudo, $pass){
			$user = new User;
			$person = $this->person->readByPseudo($pseudo);
			$userAdmin = $user->readByPseudo($pseudo);
			$passAdmin = password_verify($pass, $person->getPass());
			$passUser = password_verify($pass, $userAdmin->getPass());
			if(!is_null($person) && $passAdmin === true){
				$_SESSION[$this->personId] = $person->getId();
				if (!is_null($userAdmin) && $passUser === true) {
					$_SESSION['userId'] = $userAdmin->getId();
				}
				return true;
			}
		} 
	}
