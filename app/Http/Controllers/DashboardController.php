<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Issue;

class DashboardController extends Controller
{
    use Traits;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$issues = Issue::get(); 
        $issues = Issue::with('medium', 'inserate.client', 'inserate.format')->get();
        //dd($issues);
        //
        //get total Flaeche
        //$issues->toBase();
        //
        //
        
        $issues = $issues->each(function ($issue, $key) {
              $totalFlaeche = 0;
              $totalNetto = 0;
              //$allNetto = 0;
              foreach ($issue->inserate as $inserat) {
                  $totalNetto += $inserat->netto;
                  foreach ($inserat->format as $format) {
                      $totalFlaeche += $format->flaeche;
                  }
              }
        $issue->sollumsatzRaw = $issue->sollumsatz;
        $issue->sollumsatz = $this->moneyFormat($issue->sollumsatz);
        $issue->totalNettoRaw = $totalNetto;
        $issue->totalNetto = $this->moneyFormat($totalNetto);
        
        //$allNetto += $totalNetto;
        //$issue->allNetto = $this->moneyFormat($allNetto);

        $issue->totalFlaeche = $totalFlaeche;
});
        //dd($issues);
        /*foreach ($issues as $issue) {
            //$issues->push(['totalFlaeche' => 'hols']);
            //$totalFlaeche = 0;
            foreach ($issue->inserate as $inserat) {
                foreach ($inserat->format as $format) {
                    $totalFlaeche += $format->flaeche;
                }
            }
            //$issues->get($key)->inserate->merge(array('totalFlaeche' => $totalFlaeche));
        }*/
        
        return view('dashboard', compact('issues'));
    }
}
