<?php

class Cpf
{
    private string $value;

    public function __construct(string $value)
    {
        $value = filter_var($value, FILTER_VALIDATE_REGEXP, [
            'options' => [
                'regexp' => '/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}\-[0-9]{2}$/'
            ]
        ]);

        if ($value === false) {
            echo "Cpf inválido";
            exit();
        }

        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
