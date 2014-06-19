<?php
abstract class TableFactory{
    
    // hier werden die abstrakten Methoden deklariert,
    // die später von der Client-Klasse genutzt werden sollen,
    // um Tabellen zu zeichen
    
    abstract public function createTable();
    
    abstract public function createRow();
    
    abstract public function createHeader();
    
    abstract public function createCell($content);
}