<?php

namespace App\Services;

class ValidatorService
{
    private $passwordError = null;

    public function getPasswordError()
    {
        return $this->passwordError;
    }

    public function validateString($value, $min, $max)
    {
        if (preg_match('/^[a-zA-Z0-9ñÑáÁéÉíÍóÓúÚ\s,.]{' . $min . ',' . $max . '}$/', $value)) {
            return true;
        }
        return false;
    }

    public function validateEmail($value)
    {
        if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    public function validatePassword($value)
    {
        if (strlen($value) < 6) {
            $this->passwordError = 'Clave menor a 6 caracteres';
            return false;
        } elseif (strlen($value) > 50) {
            $this->passwordError = 'Clave mayor a 50 caracteres';
            return false;
        } elseif (!preg_match('/[0-9]/', $value)) {
            $this->passwordError = 'La clave debe contener al menos un dígito';
            return false;
        } elseif (!preg_match('/[a-zñáéíóú]/', $value)) {
            $this->passwordError = 'La clave debe contener al menos una letra minúscula';
            return false;
        } elseif (!preg_match('/[A-ZÑÁÉÍÓÚ]/', $value)) {
            $this->passwordError = 'La clave debe contener al menos una letra mayúscula';
            return false;
        } elseif (!preg_match('/[\-\*\?\!\@\#\$\(\)\.,]/', $value)) {
            $this->passwordError = 'La clave debe contener al menos un caracter especial';
            return false;
        }
        return true;
    }

    public function validateNaturalNumber($value)
    {
        return filter_var($value, FILTER_VALIDATE_INT, ["options" => ["min_range" => 1]]) !== false;
    }
}
