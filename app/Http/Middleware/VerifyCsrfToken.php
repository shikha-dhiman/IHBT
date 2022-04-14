<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = ['owner/login', 'owner/employees/delete', 'members/select-members', 'owner/employee/family/delete','receptionist_user/employee/delete', 'receptionist_user/family/delete', 'owner/receptionist/delete', 'receptionist_user/employee/family/delete', 'owner/doctor/delete'
        //
    ];
}
