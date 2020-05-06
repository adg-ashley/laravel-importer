<?php

namespace Adg\Importer\Http;
use Adg\Importer\Eloquent\User;

class ImporterController
{
    public function greet(User $user)
    {
        return 'Hi ' . $user->id . '! How are you doing today?';
    }
}