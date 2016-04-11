<?php
include_once("Model.php");

class Controller {

	public $model;
	
	function __construct() {  
        $this->model = new Model();
    } 

	function invoke() {
		include "wine.php";
	}

	function mode($mode) {
		if($mode == "add") {
			$this->add();
		} else
		if($mode == "view") {
			$this->viewList();
		}
		else die("Error: mode not found");
	}
	
	function add() {
		$cat1List = $this->model->getCat1List();
		$cat2List = $this->model->getCat2List();
		$cat3List = $this->model->getCat3List();
		include "add.php";
	}

	function viewList() {
		$reviews = $this->model->listReviews();
		include "list.php";
	}

	function submit() {
		$this->model->setCat1($_POST["cat1"]);
		$this->model->setCat2($_POST["cat2"]);
		$this->model->setCat3($_POST["cat3"]);
		$this->model->setTitle($_POST["title"]);
		$this->model->setABV($_POST["abv"]);
		$this->model->setRating($_POST["rating"]);
		$this->model->setNotes($_POST["notes"]);
		if($this->model->add()) {
			include "confirm.php";
		} else die("Error: Add failed!");
	}
}

?>
