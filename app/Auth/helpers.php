<?php

if (! function_exists('account')) {
    /**
     * @return \App\Accounts\Account
     */
    function account()
    {
        return auth()->account();
    }
}

if (! function_exists('team')) {
    /**
     * @return \App\Teams\Team
     */
    function team()
    {
        return auth()->team();
    }
}

if (! function_exists('user')) {
    /**
     * @return \App\Users\User
     */
    function user()
    {
        return auth()->user();
    }
}
