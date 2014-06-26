<?php
interface Beobachter{
    
    // über die Methode werden die Beobachter infomiert,
    // dass sich im beobachteten Subjekt etwas verändert (getan) hat
    public function update(Beobachtbar $observable);
}