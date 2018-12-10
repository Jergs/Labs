<?php

	class Controller_db extends Controller{

		public $model;

		function __construct(){
			$this->model = new Model_db();
			$this->storage = "";
		}

		function action_delete(){
			$this->id = $_POST['id'];
			$this->model->delete($this->id);
		}


		function action_change_user(){
			$this->id = $_POST['id'];
			$this->storage = $this->model->change_user($this->id);
			echo($this->storage);
		}


		function action_add_user(){
			$this->login = $_POST['login'];
			$this->password = $_POST['password'];
			$this->name = $_POST['name'];
			$this->secondname = $_POST['secondname'];
			$this->role = $_POST['role'];
			if(isset($_FILES['uploadfile']['name'])&&($_FILES['uploadfile']['name'])!=''){
				$this->photo = $_FILES['uploadfile']['name'];
				$this->tmp_photo = $_FILES['uploadfile']['tmp_name'];
			}
			$this->storage = $this->model->add($this->login,$this->password, $this->name, $this->secondname, $this->role, $this->photo, $this->tmp_photo);
			echo($this->storage);
		}

	}
?>