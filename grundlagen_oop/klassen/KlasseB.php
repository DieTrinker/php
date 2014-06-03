<?php
class KlasseB extends KlasseA{
	
	//	alle public und protected elemente der KlasseA können auch
	//	in der KlasseB verwendet werden
	
	public function fktMyA(){
		
		$this->fktA();		//	ok, weil public
		$this->fktB();		//	ok, weil protected
		//$this->fktC();		//	falsch, weil private
	}
	
	public function fktMyB() {
		
		echo $this->a. PHP_EOL;		//	ok, weil public
		echo $this->b. PHP_EOL;		//	ok, weil protected
		//echo $this->c. PHP_EOL;		//	falsch, weil private
	}
}