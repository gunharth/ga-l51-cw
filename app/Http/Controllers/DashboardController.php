<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Issue;
use App\Medium;
use Carbon\Carbon;

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
        $issues = Issue::with('medium', 'inserate.client', 'inserate.format')->orderBy('erscheinungstermin', 'asc')->get();

        $issues = $issues->each(function ($issue, $key) {
          $totalFlaeche = 0;
          $totalNetto = 0;
          $pkNetto = 0;
              //$allNetto = 0;
          foreach ($issue->inserate as $inserat) {
            if($inserat->art != 'PK') {
              $totalNetto += $inserat->netto;
              foreach ($inserat->format as $format) {
                  $totalFlaeche += $format->flaeche;
              }
            } else {
              $pkNetto += $inserat->netto;
            }
          }
          $issue->sollumsatzRaw = $issue->sollumsatz;
          $issue->sollumsatz = $this->moneyFormat($issue->sollumsatz);
          $issue->totalNettoRaw = $totalNetto;
          $issue->totalNetto = $this->moneyFormat($totalNetto);

          $issue->pkRaw = $issue->getIssueProductionCostsRaw();
          $issue->pk = $issue->getIssueProductionCosts();
          $issue->totalPkNettoRaw = $pkNetto;
          $issue->totalPkNetto = $this->moneyFormat($pkNetto);

        
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

    public function timeline()
    {
        return view('timeline');
    }

    public function calendar()
    {
        return view('calendar');
    }

    public function getMediumJson()
    {
      $mediums = Medium::orderBy('title', 'ASC')->get();
      return $mediums;
    }

    public function getEventsJson() {
        //$events = CalendarEvent::wherePublic(1)->get();
      $events = Issue::with('medium', 'inserate.client', 'inserate.format')->orderBy('erscheinungstermin', 'asc')->get();
        //dd($events);
        $eventsJson = array();
        foreach ($events as $event) {
            $eventsJson[] = array(
                //'id' => $event->id,
                'title' => 'RS ' . $event->name,
                'resourceId' => $event->medium_id,
                //'url' => URL::to('events/event/' . date("Y/m/d/", strtotime($event->start_date)) . $event->slug),
                'start' => Carbon::parse($event->getAttributes()['redaktionsschluss'])->toAtomString(),
                'end' => Carbon::parse($event->getAttributes()['erscheinungstermin'])->addDay()->toAtomString(),
            );
            /*$eventsJson[] = array(
                //'id' => $event->id,
                'title' => 'ET ' . $event->name,
                //'url' => URL::to('events/event/' . date("Y/m/d/", strtotime($event->start_date)) . $event->slug),
                'start' => Carbon::parse($event->getAttributes()['erscheinungstermin'])->toAtomString(),
            );*/
        }
        return json_encode($eventsJson);
    }


    public function getCalendarEventsJson() {
        //$events = CalendarEvent::wherePublic(1)->get();
      $events = Issue::with('medium', 'inserate.client', 'inserate.format')->orderBy('erscheinungstermin', 'asc')->get();
        //dd($events);
        $eventsJson = array();
        foreach ($events as $event) {
           $eventsJson[] = array(
                //'id' => $event->id,
                'title' => 'RS ' . $event->name,
                'color' => $event->medium->eventColor,
                //'url' => URL::to('events/event/' . date("Y/m/d/", strtotime($event->start_date)) . $event->slug),
                'start' => Carbon::parse($event->getAttributes()['redaktionsschluss'])->toAtomString(),
                'end' => Carbon::parse($event->getAttributes()['erscheinungstermin'])->addDay()->toAtomString(),
            );
            /*$eventsJson[] = array(
                //'id' => $event->id,
                'title' => 'RS ' . $event->name,
                'color' => $event->medium->eventColor,
                //'url' => URL::to('events/event/' . date("Y/m/d/", strtotime($event->start_date)) . $event->slug),
                'start' => Carbon::parse($event->getAttributes()['redaktionsschluss'])->toAtomString(),
            );
            $eventsJson[] = array(
                //'id' => $event->id,
                'title' => 'ET ' . $event->name,
                'color' => $event->medium->eventColor,
                //'url' => URL::to('events/event/' . date("Y/m/d/", strtotime($event->start_date)) . $event->slug),
                'start' => Carbon::parse($event->getAttributes()['erscheinungstermin'])->toAtomString(),
            );*/
        }
        return json_encode($eventsJson);
    }

}
