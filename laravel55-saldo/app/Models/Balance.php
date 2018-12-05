<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    public $timestamps = false;

    public function deposit(float $value) : Array
    {
        //dd($this->amount);
        $this->amount += number_format($value, 2,'.','');
        $deposit = $this->save();
        if($deposit)
            return [
                'succes' => true,
                'message' => 'Sucesso ao recarregar.'
            ];

        return [
            'succes' => false,
            'message' => 'Falha ao recarregar.'
        ];
    }
}
