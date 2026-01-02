<?php

use App\Models\Company;

function company($request = null): Company
{
    if (! $request) {
        $request = request();
    }

    return $request->attributes->get('company');
}
