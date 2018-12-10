<?php

	class Controller_media extends Controller{

		public $model;

		function __construct(){
			$this->model = new Model_media();
			$this->storage = "";
		}

		function action_check_updates(){
			$this->login = $_POST['login'];
			$this->password = $_POST['password'];
			$this->name = $_POST['name'];
			$this->secondname = $_POST['secondname'];
			$this->id = $_POST['id'];
			$this->storage = $this->model->check_updates($this->login,$this->password, $this->name, $this->secondname, $this->id);
			echo($this->storage);
			if(isset($_FILES['uploadfile']['name'])&&($_FILES['uploadfile']['name'])!=''){
				$this->photo = $_FILES['uploadfile']['name'];
				$this->tmp_photo = $_FILES['uploadfile']['tmp_name'];
				$this->type = "photo";
				$this->storage=$this->model->update($this->photo,$this->tmp_photo,$this->id, $this->type);
				echo($this->storage);
			}
			

			if(isset($_FILES['audio']['name'])&&($_FILES['audio']['name'])!=''){
				$this->audio = $_FILES['audio']['name'];
				$this->tmp_audio = $_FILES['audio']['tmp_name'];
				$this->type = "audio";
				$this->storage=$this->model->update($this->audio,$this->tmp_audio,$this->id,$this->type);
				echo($this->storage);	
			}
			
			if(isset($_POST['vidosik'])){
				if(strpos($_POST['vidosik'], 'yout')){
					$this->video = $_POST['vidosik'];
					$this->storage=$this->model->update_youtube($this->video,$this->id);
					echo($this->storage);
				}
			}	
			else{
				if(isset($_FILES['vidosik']['name'])&&($_FILES['vidosik']['name'])!=''){
					$this->video = $_FILES['vidosik']['name'];
					$this->tmp_video = $_FILES['vidosik']['tmp_name'];
					$this->type = "video";
					$this->storage=$this->model->update($this->video,$this->tmp_video,$this->id,$this->type);
					echo($this->storage);	
				}
			}
		}
		
	}
?>