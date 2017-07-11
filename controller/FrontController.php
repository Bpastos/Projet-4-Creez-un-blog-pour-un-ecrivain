<?php 
	namespace controller;

	use model\http\Request;
	use model\http\Response;
	use model\AuthUser;
	use app\App;

	class FrontController extends BaseController{
		protected $interface;
		protected $authUser;

		public function __construct(Request $request, Response $response, App $app){
			parent::__construct($request, $response, $app);
			$this->interface = 'front';
			$this->authUser = new AuthUser;		
		}

		public function checkLogged(){
			if (!$this->authUser->logged()) {
				$path = '?controller=home&action=index';
				$url = $this->app->getUrl($path);
				$this->response->redirectUrl($url);
			}
		}

		protected function redirectInIndex($message){
			$path ='?controller=home&action=index&message=' . $message;
			$url = $this->app->getUrl($path);
			$this->response->redirectUrl($url);
		}

	}

?>
