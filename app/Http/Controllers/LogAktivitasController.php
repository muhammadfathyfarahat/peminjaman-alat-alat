<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogAktivitasController extends Controller
{
    public function store($user_id, $aktivitas)
    {
        return LogAktivitas::create([
            'user_id' => $user_id,
            'aktivitas' => $aktivitas,
            'waktu' => now()
        ]);
    }
}