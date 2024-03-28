<?php

// 1 Ricreare la funzione vista a lezione per sommare un numero variabile di numeri (con lo spread operator) con queste variazioni:

// sfruttare il foreach come visto a lezione
// function theSum(...$nums)
// {
//     $sum = 0;
//     foreach($nums as $num)
//     {
//         $sum+=$num;
//     }
//     return $sum;
// }
// echo theSum(1,2,3,4,5,6,7,8,9);
// echo "\n";
// // sfruttare il ciclo for
// function theSum2(...$nums)
// {
//     $sum = 0;
//     for($i = 0; $i < count($nums); $i++)
//     {
//         $sum+=$nums[$i];
//     }
//     return $sum;
// }
// echo theSum2(1,2,3,4,5,6,7,8,9);
// echo "\n";
// // provare con la funzione built-in array_reduce
// function theSum3(...$nums)
// {
//    return array_reduce($nums, function($carry, $item){return $carry += $item;});
// }
// echo theSum3(1,2,3,4,5,6,7,8,9);
// echo "\n";

// 2 Replicare il codice visto a lezione

// extra 1 - permettere all'utente di inserire la password più volte se la stringa non è accettata (TIP: usare il do while)

// extra 1.b - permettere per un massimo di 5 volte di reinserire la password in caso di errore

// extra 2 - stampare quale regola l'utente non sta rispettando
$count = 0;
do
{
    $count++;   
    $password = readline("Tentativo $count/5   Inserisci una password con almeno 8 caratteri, un carattere maiuscolo, un numero, un carattere tra ! @ # %: ");
    
    $validPassword = function($str)
    {
        
        $length = function($str)
        {
            if(strlen($str)>=8)
            {
                return strlen($str)>=8;
            }else
            {
                
                return false;
            };
        };

        $capital = function($str)
        {
            for($i=0; $i<strlen($str); $i++)
            {
                if(ctype_upper($str[$i]))
                {
                    return ctype_upper($str[$i]);
                };
            };
            
            return false;
        };

        $number = function($str)
        {
            for($i=0; $i<strlen($str); $i++)
            {
                if(is_numeric($str[$i]))
                {
                    return is_numeric($str[$i]);
                };
            }; 
            
            return false;
        };

        $specials = ["!", "@", "#", "%" ];
        $special = function($str, $arr)
        {
            for($i=0; $i<strlen($str); $i++)
            {
                if(in_array($str[$i], $arr))
                {
                    return true;
                };
            };
            
            return false;
        };
        
        $lunghezza = $length($str);
        $maiuscola = $capital($str);
        $numero = $number($str);
        $speciale = $special($str, $specials);

        if(!$lunghezza)
        {
            echo "La password deve essere lunga almeno 8 caratteri!\n";
        };
        if(!$maiuscola)
        {
            echo "Inserisci un carattere maiuscolo!\n";
        };
        if(!$numero)
        {
            echo "Inserisci un numero!\n";
        };
        if(!$speciale)
        {
            echo "Inserisci un simbolo speciale!\n";
        }

        return $lunghezza && $maiuscola && $numero && $speciale;
    };
    

} while (!$validPassword($password) && $count<5);


?>