<?php

class Model {

	protected $cat1 = "";
	protected $cat2 = "";
	protected $cat3 = "";
	protected $title = "";
	protected $abv = 0;
	protected $rating = 0;
	protected $notes = "";

	function connect() {
		$dbconn = pg_connect("dbname=wines user=postgres") or die("Error: Database connection failed");
		return $dbconn;
	}

	function add() {
		$db = $this->connect();

//XXX: prevents add...
//		$this->escape($db);
		$query = "INSERT INTO wines (cat1, cat2, cat3, title, rating, notes)
						VALUES ('"
							.$this->cat1."','"
							.$this->cat2."','"
							.$this->cat3."','"
							.$this->title."','"
							.$this->rating."','"
							.$this->notes."');";
echo $query;
		$response = pg_query($db, $query);
echo pg_last_error();

		return $response;
	}

	function escape($db) {
		$this->cat1 = pg_escape_literal($db, $this->cat1);
		$this->cat2 = pg_escape_literal($db, $this->cat2);
		$this->cat3 = pg_escape_literal($db, $this->cat3);
		$this->title = pg_escape_literal($db, $this->title);
//		$this->abv = pg_escape_literal($db, $this->abv);
		$this->rating = pg_escape_literal($db, $this->rating);
		$this->notes = pg_escape_literal($db, $this->notes);
	}

	function listReviews() {
		$db = $this->connect();
		$reviews = pg_fetch_all(pg_query($db, "SELECT
													w.id,
													cat1.cat AS c1,
													cat2.cat AS c2,
													cat3.cat AS c3,
													title,
													abv,
													rating,
													notes 
												FROM wines AS w
												JOIN cat1 on w.cat1 = cat1.id
												JOIN cat2 on w.cat2 = cat2.id
												JOIN cat3 on w.cat3 = cat3.id
										;"));
		return $reviews;
	}

	function getCat1List() {
		$db = $this->connect();
		$cat1List = pg_fetch_all(pg_query($db, "SELECT * FROM cat1;"));		
		return $cat1List;
	}

	function getCat2List() {
		$db = $this->connect();
		$cat2List = pg_fetch_all(pg_query($db, "SELECT * FROM cat2;"));		
		return $cat2List;
	}

	function getCat3List() {
		$db = $this->connect();
		$cat3List = pg_fetch_all(pg_query($db, "SELECT * FROM cat3;"));		
		return $cat3List;
	}

	function setCat1($cat1) {
		$this->cat1 = $cat1;
	}

	function setCat2($cat2) {
		$this->cat2 = $cat2;
	}

	function setCat3($cat3) {
		$this->cat3 = $cat3;
	}

	function setTitle($title) {
		$this->title = $title;
	}

	function setABV($abv) {
		$this->abv = $abv;
	}

	function setRating($rating) {
		$this->rating = $rating;
	}

	function setNotes($notes) {
		$this->notes = $notes;
	}
}

?>
