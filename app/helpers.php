<?php

/**
 * Flashes a message to the alert status, with a default level of 'info'
 * @param  string $message
 * @param  string $level   can be 'info', 'success', 'warning'
 */
function flash($message, $level = 'info')
{
    session()->flash('flash_message', $message);
    session()->flash('flash_message_level', $level);
}

/**
 * Generate a random string with a specified number of characters
 * @param  string $no_of_chars no of characters in random string
 * @return string              a random string
 */
function generate_random_str($no_of_chars) {
   return substr(md5(microtime()),rand(0,26),$no_of_chars);
}

/**
 * Checks if the authenticated user can perform an ability via the Gate facade
 * @param  string $ability  ability (e.g. show, update, destroy)
 * @param  \Illuminate\Database\Eloquent\Model $model
 */
function auth_check($ability, $model, $request = null) {
    if (Gate::denies($ability, $model)) {
        if ($request && $request->ajax()) {
            return response()->json(['response' => 'Unauthorized access'], 401);
        } else {
            abort(401);
        }
    }
}
