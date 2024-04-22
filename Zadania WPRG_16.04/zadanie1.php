<?php
    $a = 3;
    $b = 5;

    function pierwsza($d)
    {
        if ($d == 1) 
        {
            return false;
        }

        if ($d == 2) 
        {
            return true;
        }

        for ($i = 2; $i < $d; $i++)
        {
            if ($d%$i==0)
            return false;
        }
        
        return true;

    }

    if ($a < $b) 
    {
        for ($i = $a; $i <= $b; $i++)
        {
            if (pierwsza($i))
            {
                echo $i,", ";
            }
            
        }
    }
    else
    {
        for ($i = $b; $i < $a; $i++)
        {
            if (pierwsza($i))
            {
                echo $i,", ";
            }
        }
    }