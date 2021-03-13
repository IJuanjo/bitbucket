<?php

class Card
{
    public $cardBingo = [
        'B' => [],
        'I' => [],
        'N' => [],
        'G' => [],
        'O' => []
    ];

    private function setCard($card)
    {
        $this->cardBingo = $card;
    }


    private function generateRow($min, $max, $letter)
    {
        $number = $this->generateNumber();
        if ($number >= $min && $number <= $max && !in_array($number, $this->cardBingo[$letter])) {
            $this->cardBingo[$letter][] = $number;
        }
        if (count($this->cardBingo[$letter]) >= 5) {
            return false;
        }
        $this->generateRow($max, $min, $letter);
    }

    private function generateNumber()
    {
        $number = rand(1, 75);
        return $number;
    }
    public function generateCard()
    {
        $this->generateRow(1, 15, 'B');
        $this->generateRow(16, 30, 'I');
        $this->generateRow(31, 45, 'N');
        $this->generateRow(46, 60, 'G');
        $this->generateRow(61, 75, 'O');
        $this->cardBingo['N'][2] = '';
        $areglo = $this->cardBingo;
        $this->setCard([
            'B' => [],
            'I' => [],
            'N' => [],
            'G' => [],
            'O' => []
        ]);
        return $areglo;
    }

    public function drawCard($col1, $col2, $col3, $col4, $col5)
    {
        $table="<table><tr>" ;
        foreach ($col1 as $key => $value) {
            $table.="<td>".$value."</td>"; 
        };
        $table.="</tr><tr>";
        foreach ($col2 as $key => $value) {
            $table.="<td>".$value."</td>"; 
        };
        $table.="</tr><tr>";
        foreach ($col3 as $key => $value) {
            $table.="<td>".$value."</td>"; 
        };
        $table.="</tr><tr>";
        foreach ($col4 as $key => $value) {
            $table.="<td>".$value."</td>"; 
        };
        $table.="</tr><tr>";
        foreach ($col5 as $key => $value) {
            $table.="<td>".$value."</td>"; 
        };
       $table.="</tr></table>"; 

        return $table;
    }
}
$card = new Card();
$card1 = $card->generateCard();

$outHTML=$card->drawCard($card1['B'], $card1['I'], $card1['N'], $card1['G'], $card1['O']);
print_r($outHTML);