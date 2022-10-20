<?php

namespace App\Helpers;

class MyFunction
{
    public static function generateLetterNumber($lastNumber = 0, $numberingRule = '<number>/DUMMY/GCLIT/<year>')
    {
        $ruleString = str_split($numberingRule);

        $isOpening = false;
        $lastVariableOrder = 0;
        $variable = [];
        foreach ($ruleString as $char) {
            if ($char == '<') {
                $isOpening = true;
                $variable[$lastVariableOrder] = '';
                continue;
            }

            if ($isOpening) {
                if ($char != '>') {
                    $variable[$lastVariableOrder] .= $char;
                    continue;
                }
                $isOpening = false;
                $lastVariableOrder++;
            }
        }

        foreach ($variable as $var) {
            if ($var == 'number') {
                $numberingRule = str_replace('<' . $var . '>', substr('000' . $lastNumber + 1, -3), $numberingRule);
                continue;
            }

            if ($var == 'year') {
                $numberingRule = str_replace('<' . $var . '>', date('Y'), $numberingRule);
            }
        }

        return $numberingRule;
    }

    public static function generateLetterSlug(String $letterNumber)
    {
        return str_replace('/', '-', $letterNumber);
    }
}
