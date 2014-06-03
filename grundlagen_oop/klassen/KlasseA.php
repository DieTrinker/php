<?php
class KlasseA {
	
	//	einige Eigenschaften mit unterschiedlichen Sichbarkeitsmodifikatoren
	public $a;
	
	protected $b;
	
	private $c;
	
	//	einige Methoden mit unterschiedlichen Sichbarkeitsmodifikatoren
	public function fktA() {
		
		$this->a = 10;		//	Zugriff auf die Instanvariable $a
	}
	
	protected function fktB() {
		
		$this->b = 20;		//	Zugriff auf die Instanvariable $b
	}
	
	private function fktC() {
		
		$this->c = 30;		//	Zugriff auf die Instanvariable $c
	}
}