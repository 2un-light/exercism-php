<?php

class HighSchoolSweetheart
{
    public function firstLetter(string $name): string
    {
        $name = trim($name);
        return $name[0];
        throw new \BadFunctionCallException("Implement the function");
    }

    public function initial(string $name): string
    {
        $firstLetter = $this->firstLetter($name);
        return strtoupper($firstLetter) . ".";
        
        throw new \BadFunctionCallException("Implement the function");
    }

    public function initials(string $name): string
    {
        $parts = explode(' ', $name);
        $result = "";
        foreach($parts as $part) {
            $initial = $this->initial($part);
            $result .= $initial . " ";
        }
        return rtrim($result);
        
        throw new \BadFunctionCallException("Implement the function");
    }

    public function pair(string $sweetheart_a, string $sweetheart_b): string
    {
        $name_a = $this->initials($sweetheart_a);
        $name_b = $this->initials($sweetheart_b);

    return <<<HEART
     ******       ******
   **      **   **      **
 **         ** **         **
**            *            **
**                         **
**     {$name_a}  +  {$name_b}     **
 **                       **
   **                   **
     **               **
       **           **
         **       **
           **   **
             ***
              *
HEART;
                
        throw new \BadFunctionCallException("Implement the function");
    }
}
