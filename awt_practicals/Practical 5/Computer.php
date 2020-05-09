<?php  
	/**
	* PHP
	* Practical 5
	* Object Oriented Concepts using PHP
	*/

	interface style{
		function choosetype();
		function choosecolor();

	}
	class ComputerStyle implements style{
		public $type = "Home User";
		public $color = "Black";
		public function choosetype(){
			echo "type :".$this->type."<br />";
		}

		public function choosecolor(){
			echo "Color :".$this->color."<br />";
		}
	}

	abstract class Computerno extends ComputerStyle{
			protected $billno;
			abstract public function setbill($s);

	}
	class Computer extends Computerno
	{	
		public $config = array('serialno' =>'','company' =>'' ,'processor' =>'' ,'hdd' =>'' ,'ram' =>'' ,'price' =>''  );
		
		public function setconfig($c,$p,$h,$r,$p){
			if(isset($this->billno)){
				$this->config['company']=$c;
				$this->config['processor']=$p;
				$this->config['hdd']=$h;
				$this->config['ram']=$r;
				$this->config['price']=$p;
			}else{
				echo "Generate Bill No. first </br>";
			}

		}

		function __construct(){
			# code...
			echo '__constuct : "'.__CLASS__.'" class is initialized<br /> ';
		}

		function __destruct(){
			echo '__destruct : "', __CLASS__, '" class is destroyed.<br />';
		}
		public function setbill($s){
			
				$this->billno = $s;

		}
		public function __set($i,$v){
			if(isset($this->billno)){
				$this->config[$i]=$v;
			}else{
				echo "Generate Bill No. first </br>";
			}
		}
		public function __get($serial){
			
			return $this->config['serialno'];
		}
		public function getbill(){
			return $this->billno;
		}

	}

?>