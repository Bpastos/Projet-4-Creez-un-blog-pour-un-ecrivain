<?php
	namespace SRC\model;

	use SRC\model\manager\AdminManager;
	 
	class Admin extends ModelPersonAbstract{
		protected $id;
		protected $pseudo;
		protected $email;
		protected $pass;

		//fonction constructeur avec un tableau en paramètre
		public function __construct(array $data = null){
			$this->hydrate($data);
			$this->manager = new AdminManager;
		}
	}
?>
