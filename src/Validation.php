<?php

namespace Ozoriotsn\ViaCep;

use Exception;

class Validation
{


    /**
     * Validates a given CEP (postal code) by removing non-numeric characters and checking its length.
     *
     * @param mixed $cep The CEP to be validated.
     * @throws Exception If the CEP is invalid.
     * @return string The validated CEP.
     */
    public static function validateCep($cep)
    {
        // Remove non-numeric characters from the CEP
        $formattedCep = preg_replace("/[^0-9]/", "", $cep);

        // Check if the formatted CEP has a valid length
        if (!preg_match('/^[0-9]{8}?$/', $formattedCep)) {
            throw new Exception("Invalid  cep address");
        }

        return $formattedCep;
    }


    /**
     * Validates the given type.
     *
     * @param string $type The type to be validated.
     * @throws Exception If the type is invalid.
     * @return string The validated type.
     */

    public static function validateType($type)
    {
        $validTypes = ['json', 'xml'];
    
        if (!in_array($type, $validTypes)) {
            throw new Exception("Invalid type");
        }
        return $type;
    }

}
