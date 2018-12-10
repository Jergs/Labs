<?php

	class Controller_user extends Controller{

		public $model;

		function __construct(){
			$this->model = new Model_user();
			$this->storage = "";
		}

		function action_alert(){
			echo "done";
		}


		function action_get_page(){
			$this->storage = $this->model->get_page();
			echo($this->storage);
		}

		function action_get_user_page(){
			$this->id = $_POST['id'];
			$this->storage = $this->model->get_user_page($this->id);
			echo($this->storage);
		}

		function action_login(){
			$this->login=$_POST['login'];
			$this->password=$_POST['password'];
			$this->storage = $this->model->log_in($this->login,$this->password);
			echo($this->storage);
		}
	}



?>