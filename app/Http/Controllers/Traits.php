<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Medium;
use App\Issue;
use App\Format;

trait Traits
{
    public function listFormats($id)
    {
        $issue = Issue::findOrFail($id);
        $formats = $issue->formats;
        //$formats = [0=>'-- Auswahl --'] + $issue->formats->toArray();
        return $formats;
    }
}
