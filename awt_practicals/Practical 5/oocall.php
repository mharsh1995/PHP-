<?php
	function __autoload ($class_name) {
		$name = $class_name.".php";
		if (file_exists ($name))
			include $name;
		else
			echo 'Class not found';
	}
		$pc = new Computer();								//this will call __construct
		$pc->setbill("123");								//abstract method called, which must be implemented by child
		echo "Bill no: ".$pc->getbill()."<br />";			//simple public method call
		$pc->serialno = "4568";								//implemented by __set function
		echo "Serial No.: ".$pc->serialno."<br />";			//implemented by __get function
		$pc->choosetype();									//implemented by interface
		$pc->choosecolor();									//implemented by interface	
		$pc->setconfig('Dell','i7','1TB','8GB','80000');	//simple public method call
		print_r($pc->config);								//print array
		echo "<Br />";
		unset($pc);											//this will call __destruct
?>
