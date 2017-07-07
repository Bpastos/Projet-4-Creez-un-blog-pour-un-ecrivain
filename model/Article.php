<?php
	namespace model;

	use model\manager\ArticleManager;
	 
	class Article extends ModelAbstract{
		protected $id;
		protected $title;
		protected $content;
		protected $adminId;
		protected $dateArticle;

		public function __construct(array $data = null){
			//la fonction constructeur lance la fct hydrate qui assigne les valeurs de datas à chaque attribut de l'objet
			$this->hydrate($data);
			$this->manager = new ArticleManager;
		}

		//fonction getters
		public function getTitle(){
			return $this->title;
		}

		public function getContent(){
			return $this->content;
		}

		public function getAdminId(){
			return $this->adminId;
		}

		public function getDateArticle(){
			return $this->dateArticle;
		}

		//fonction setters
		public function setTitle($title){
			if (is_string($title) && strlen($title) <= 70) {
				$this->title = $title;
			}
			return $this;
			
		}

		public function setContent($content){
			$content = htmlspecialchars_decode($content);
			if (is_string($content)) {
				$this->content = $content;
			}
			return $this;
			
		}

		public function setAdminId($adminId){
			$adminId = (int)$adminId;
			if ($adminId > 0) {
				$this->adminId = $adminId;
			}
			return $this;
		}

		public function setDateArticle($dateArticle){
			$this->dateArticle = $dateArticle;
			return $this;
		}


	}


?>
