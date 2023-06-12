<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\ResetsUserPasswords;

class ResetUserPassword implements ResetsUserPasswords
{
    use PasswordValidationRules;

    /**
     * Validate and reset the user's forgotten password.
     *
     * @param  array<string, string>  $input
     */
    public function reset(User $user, array $input): void
    {
        Validator::make($input, [
            'password' => $this->passwordRules(),
        ])->validate(); # Ejecuta las reglas del validador contra sus datos.

        # Rellene el modelo con una matriz de atributos. Asignación de masas de fuerza.
        $user->forceFill([ # forzar relleno
            'password' => Hash::make($input['password']),
        ])->save();
    }
}
