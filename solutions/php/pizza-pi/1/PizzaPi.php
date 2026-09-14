<?php

class PizzaPi
{
    public function calculateDoughRequirement(int $pizzas, int $persons)
    {
        $grams = $pizzas * (($persons * 20) + 200);
        return $grams;
    }

    public function calculateSauceRequirement(int $pizzas, int $volume)
    {
        $can_of_source = 0.0;
        $can_of_source = ($pizzas * 125) / $volume;
        return round($can_of_source);
    }

    public function calculateCheeseCubeCoverage(int $cheese_dimension, float $thickness, int $diameter)
    {    
        $count = 0.0;
        $count = pow($cheese_dimension, 3) / ($thickness * 3.14 * $diameter);
        return (int) $count;
    }

    public function calculateLeftOverSlices(int $pizzas, int $people)
    {
        $totalPieces = $pizzas * 8;
        $remainPieces = $totalPieces % $people;
        return $remainPieces;
    }
}
