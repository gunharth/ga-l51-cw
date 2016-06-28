
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Rechnung</title>
<style type="text/css">

@page {
	margin: 1cm 2cm;
}
body {
  font-family: sans-serif;
}

h1 { margin: 0; padding: 0;}

.small { font-size: 8pt; }
.medium { font-size: 10pt; line-height: 17pt; }
.large { font-size: 24pt; }
.center { text-align: center; }

table { width: 100%; }
table.content { line-height: 15pt; }
td { vertical-align: top; padding: 2px 0 2px 0;}
td.middle { vertical-align: middle; }
td.right { text-align: right; }
td.short { width: 16%; }
td.left { width: 30%; }
td.grey { color: #333;  }

hr {
  border-bottom: 0.1pt solid #000; 
  margin: 2px 0 0 0;
  padding: 0;

}

#header,
#footer {
  position: fixed;
  left: 0;
	right: 0;
}

#header {
  top: 0;
}

#footer {
  bottom: 30pt;
  border-top: 0.1pt solid #aaa;
  padding-top: 3px;
}

#header table,
#footer table {
	width: 100%;
	border-collapse: collapse;
	border: none;
}

#header td,
#footer td {
  padding: 0;
	width: 50%;
}

.page-break {
    page-break-after: always;
}

</style>
  
</head>
<body>
@foreach ($inserate as $inserat)
<div id="header">
  <table>
	<tr>
		<td class="left"></td>
		<td class="center">{!! Html::image('img/awg_logo.png') !!}</td>
		<td class="left center small grey middle">
			Linke Wienzeile 12/20 <br>
			1060 Wien <br>
			www.avg-verlag.at <br>
			<br>
			Anzeigenverwaltung: <br>
			XYZ <br>
			01 524 70 86 436
		</td>
	</tr>
</table>
</div>

<div id="footer">
  <table>
	<tr>
		<td class="center small grey">
			AWG Verlag GmbH, Linke Wienzeile 12/20, 1060 Wien <br />
			FN 388310 W HG Wien, UID ATU 67568438, Volksbank Wien AG: BLZ 43000 KONTO: 43701971012 <br />
			BIC/SWIFT-CODE: VBWIATW1, IBAN AT824300043701971012
		</td>
	</tr>
</table>
</div>



<p>&nbsp;</p>
<p>&nbsp;</p>


<table>
	<tr>
		<td>
			<p>

<b>{{ $inserat->client->firma }}</b> <br />
{!! !empty($inserat->client_text) ? $inserat->client_text . '<br>'  : '' !!}
{{ $inserat->client->ansprache }} <br>
{{ $inserat->client->strasse }} <br />
{{ $inserat->client->plz }} {{ $inserat->client->ort }} 

</p>
		</td>
	</tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table>
	<tr>
		<td class="large">
			@if($inserat->art == 'GS')
			Gutschrift
			@else
			Rechnung
			@endif
			 Nr.: {{ $inserat->invoice->id }}
		</td>
		<td class="left">
			Datum: <?php echo date('d.m.y');?><br />
			Kundennr.: {{ $inserat->client->id }} <br />
			UID: {{ $inserat->client->vat_country }} {{ $inserat->client->vat_number }} <br />
		</td>
	</tr>
</table>

<table class="content">
	<tr>
		<td class="short">Betrifft:</td>
		<td>
			Insertion
			<br />
			{!! !empty($inserat->sujet) ? $inserat->sujet . '<br>'  : '' !!}
			{!! !empty($inserat->auftragsnummer) ? $inserat->auftragsnummer . '<br>'  : '' !!}
		</td>
	</tr>
</table>

<table>
	<tr>
		<td class="short">Werbeträger:</td>
		<td>
			 {{ $inserat->format->get(0)->issue->medium->title }} -  {{ $inserat->format->get(0)->issue->name }}, ET: {{ $inserat->format->get(0)->issue->erscheinungstermin }}
		</td>
	</tr>
</table>

<table>
	<tr>
		<td class="short">Format: </td>
		<td>
			@for ($i = 0; $i < count($inserat->format); $i++)
            {{ $inserat->format[$i]->name }}
            @if ($inserat->format[$i]->pivot->pr == 1) PR @endif
            @if ($i < count($inserat->format)-1) + @endif
          @endfor
		</td>
	</tr>
</table>
<p>&nbsp;</p>
<table>
	<tr><td>Preis</td><td class="left right">{{ $inserat->prettyPreis }} €</td></tr>
	<tr><td>Rabatt {{ $inserat->wert_rabatt_proz }} %</td><td class="right">{{ $inserat->prettyWert_rabatt }} €<br /><hr /></td></tr>
	<tr><td>Brutto</td><td class="right">{{ $inserat->prettyPreis2 }} €</td></tr>
	<tr><td>Provision {{ $inserat->wert_provision_proz }} %</td><td class="right">{{ $inserat->prettyWert_provision }} €<br /><hr /></td></tr>
	<tr><td>Netto</td><td class="right">{{ $inserat->prettyNetto }} €</td></tr>
	<tr><td>Werbeabgabe (5%)</td><td class="right">{{ $inserat->prettyWert_werbeabgabe }} €<br /><hr /></td></tr>
	<tr><td>Zwischensumme</td><td class="right">{{ $inserat->prettyPreis4 }} €</td></tr>
	<tr><td>20% Umsatzsteuer</td><td class="right">{{ $inserat->prettyUst }} €<br /><hr /></td></tr>
	<tr><td>Endsumme</td><td class="right">{{ $inserat->prettyBrutto }} €<br /><hr /><hr /></td></tr>
</table>
<p>&nbsp;</p>
@if($inserat->art == 'GG')
Unbares Gegengeschäft
@endif


<table>
	<tr>
		<td class="medium">
			<br />
			Bankverbindung: Volksbank Wien AT82 4300 0437 0197 1012, BIC VBWIATW1 <br />
			Zahlung: Zahlbar sofort nach Erhalt ohne Skonto <br />
			Verzugszinsen: 12% p.a. Gerichtsstand und Erfüllungsort Wien
		</td>
	</tr>
</table><div class="page-break"></div> @endforeach