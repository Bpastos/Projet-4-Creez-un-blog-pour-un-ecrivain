<?php
	namespace SRC\model;

	class AuthUser extends AuthAbstract
	{
		//function constructeur
		public function __construct(){
			parent::__construct();
			$this->person = new User;
			$this->personId = 'userId';
		}
	}
