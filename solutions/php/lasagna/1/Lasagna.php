<?php

class Lasagna
{
    public function expectedCookTime()
    {
        // Implement the expectedCookTime method
        $time = 40;
        return $time;
    }

    public function remainingCookTime($elapsed_minutes)
    {
        // Implement the remainingCookTime method
        $expectedTime = $this->expectedCookTime();
        $remainingTime = $expectedTime - $elapsed_minutes;
        return $remainingTime;
    }

    public function totalPreparationTime($layers_to_prep)
    {
        // Implement the totalPreparationTime method
        $totalTime = 2 * $layers_to_prep;
        return $totalTime;
    }

    public function totalElapsedTime($layers_to_prep, $elapsed_minutes)
    {
        // Implement the totalElapsedTime method
        $totalTime = $layers_to_prep * 2 + $elapsed_minutes;
        return $totalTime;
    }

    public function alarm()
    {
        // Implement the alarm method
        return "Ding!";
    }
}
