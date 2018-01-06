<?php

function checkPermission($permissions)
{
    $userAccess = getMyPermission(auth()->user()->tipo);
    foreach ($permissions as $key => $value) {
        if ($value == $userAccess) {
            return true;
        }
    }
    return false;
}

function getMyPermission($id)
{
    switch ($id) {
        case 0:
            return 'usuario';
            break;
        case 1:
            return 'admin';
            break;
        default:
            return 'usuario';
            break;
    }
}

