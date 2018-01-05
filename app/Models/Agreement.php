<?php

namespace CONTR\Models;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;

class Agreement extends Model implements TableInterface
{
    protected $fillable = [
        'title',
        'enrolment',
        'date_agreement',
        'total_hours',
        'price',
        'description_services',
        'event_schedule',
        'customer_id',
        'payment_terms'
    ];

    protected $dates = [
        'date_agreement'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function removeFormatting( $strNumber )
    {

        $strNumber = trim( str_replace( "R$", null, $strNumber ) );

        $vetComma = explode( ",", $strNumber );
        if ( count( $vetComma ) == 1 )
        {
            $accents = array(".");
            $result = str_replace( $accents, "", $strNumber );
            return $result;
        }
        else if ( count( $vetComma ) != 2 )
        {
            return $strNumber;
        }

        $strNumber = $vetComma[0];
        $strDecimal = mb_substr( $vetComma[1], 0, 2 );

        $accents = array(".");
        $result = str_replace( $accents, "", $strNumber );
        $result = $result . "." . $strDecimal;

        return $result;

    }

    public function writtenAmount( $bolShowCoin = true, $bolWordFemale = false )
    {

        $price = $this->removeFormatting( $this->price );

        $singular = null;
        $plural = null;

        if ( $bolShowCoin )
        {
            $singular = array("centavo", "real", "mil", "milhão", "bilhão", "trilhão", "quatrilhão");
            $plural = array("centavos", "reais", "mil", "milhões", "bilhões", "trilhões","quatrilhões");
        }
        else
        {
            $singular = array("", "", "mil", "milhão", "bilhão", "trilhão", "quatrilhão");
            $plural = array("", "", "mil", "milhões", "bilhões", "trilhões","quatrilhões");
        }

        $c = array("", "cem", "duzentos", "trezentos", "quatrocentos","quinhentos", "seiscentos", "setecentos", "oitocentos", "novecentos");
        $d = array("", "dez", "vinte", "trinta", "quarenta", "cinquenta","sessenta", "setenta", "oitenta", "noventa");
        $d10 = array("dez", "onze", "doze", "treze", "quatorze", "quinze","dezesseis", "dezesete", "dezoito", "dezenove");
        $u = array("", "um", "dois", "três", "quatro", "cinco", "seis","sete", "oito", "nove");


        if ( $bolWordFemale )
        {

            if ($price == 1)
            {
                $u = array("", "uma", "duas", "três", "quatro", "cinco", "seis","sete", "oito", "nove");
            }
            else
            {
                $u = array("", "um", "duas", "três", "quatro", "cinco", "seis","sete", "oito", "nove");
            }


            $c = array("", "cem", "duzentas", "trezentas", "quatrocentas","quinhentas", "seiscentas", "setecentas", "oitocentas", "novecentas");


        }


        $z = 0;

        $price = number_format( $price, 2, ".", "." );
        $intire = explode( ".", $price );

        for ( $i = 0; $i < count( $intire ); $i++ )
        {
            for ( $ii = mb_strlen( $intire[$i] ); $ii < 3; $ii++ )
            {
                $intire[$i] = "0" . $intire[$i];
            }
        }

        $rt = null;
        $fim = count( $intire ) - ($intire[count( $intire ) - 1] > 0 ? 1 : 2);
        for ( $i = 0; $i < count( $intire ); $i++ )
        {
            $price = $intire[$i];
            $rc = (($price > 100) && ($price < 200)) ? "cento" : $c[$price[0]];
            $rd = ($price[1] < 2) ? "" : $d[$price[1]];
            $ru = ($price > 0) ? (($price[1] == 1) ? $d10[$price[2]] : $u[$price[2]]) : "";

            $r = $rc . (($rc && ($rd || $ru)) ? " e " : "") . $rd . (($rd && $ru) ? " e " : "") . $ru;
            $t = count( $intire ) - 1 - $i;
            $r .= $r ? " " . ($price > 1 ? $plural[$t] : $singular[$t]) : "";
            if ( $price == "000")
                $z++;
            elseif ( $z > 0 )
                $z--;

            if ( ($t == 1) && ($z > 0) && ($intire[0] > 0) )
                $r .= ( ($z > 1) ? " de " : "") . $plural[$t];

            if ( $r )
                $rt = $rt . ((($i > 0) && ($i <= $fim) && ($intire[0] > 0) && ($z < 1)) ? ( ($i < $fim) ? ", " : " e ") : " ") . $r;
        }

        $rt = mb_substr( $rt, 1 );

        return($rt ? trim( $rt ) : "zero");

    }

    public function getTableHeaders()
    {
        return [
            'Título',
            'Código',
            'Data do contrato'
        ];
    }

    public function getValueForHeader($header)
    {
        switch ($header) {
            case 'Título':
                return $this->title;
            case 'Código':
                return $this->enrolment;
            case 'Data do contrato':
                return $this->date_agreement;
        }
    }
}
