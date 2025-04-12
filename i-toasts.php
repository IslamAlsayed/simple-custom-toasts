<?php

if (!function_exists('addIToast')) {
    function addIToast($type, $message)
    {
        $iToasts = session()->get('i-toasts', []);
        $iToasts[] = [$type => $message];
        session()->flash('i-toasts', $iToasts);
    }
}