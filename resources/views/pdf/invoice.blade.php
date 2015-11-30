
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>Header and Footer example</title>
<style type="text/css">

@page {
	margin: 2cm;
}

body {
  font-family: sans-serif;
	margin: 0.5cm 0;
	text-align: justify;
}

table { width: 100%; }
td { vertical-align: top; }
td.right { text-align: right; }

hr {
  border-bottom: 0.1pt solid #000; 
}

</style>
  
</head>
<body>

<table>
	<tr>
		<td>{!! Html::image('img/awg_logo.png') !!}</td>
		<td class="right">
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

<table>
	<tr>
		<td>
			<p>
<b>{{ $inserat->client->firma }}</b> <br />
{{ $inserat->client->ansprache }} <br>
{{ $inserat->client->strasse }} <br />
{{ $inserat->client->plz }} {{ $inserat->client->ort }} 

</p>
		</td>
	</tr>
</table>

<table>
	<tr>
		<td>
			<h1>Rechnung Nr.: {{ $inserat->id }}</h1>
		</td>
		<td class="right">
			Datum: <?php echo date('d.m.y');?><br />
			Kundennr.: {{ $inserat->client->id }} <br />
			UID: {{ $inserat->client->vat_country }} {{ $inserat->client->vat_number }} <br />
		</td>
	</tr>
</table>

<table>
	<tr>
		<td>
			Werbeträger: {{ $inserat->format->get(0)->issue->medium->title }} -  {{ $inserat->format->get(0)->issue->name }}
		</td>
	</tr>
</table>

<table>
	<tr>
		<td>
			Format: @for ($i = 0; $i < count($inserat->format); $i++)
            {{ $inserat->format[$i]->name }}
            @if ($inserat->format[$i]->pivot->pr == 1) PR @endif
            @if ($i < count($inserat->format)-1) + @endif
          @endfor
		</td>
	</tr>
</table>

<table>
	<tr><td>Preis</td><td class="right">{{ $inserat->preis }} €</td></tr>
	<tr><td>Rabatt {{ $inserat->wert_rabatt_proz }} %</td><td class="right">{{ $inserat->preis2 }}<br /><hr /></td></tr>
	<tr><td>Brutto</td><td class="right">{{ $inserat->preis2 }}</td></tr>
	<tr><td>Provision {{ $inserat->wert_rabatt_proz }} %</td><td class="right">{{ $inserat->preis2 }}<br /><hr /></td></tr>
	<tr><td>Netto</td><td class="right">{{ $inserat->preis }}</td></tr>
	<tr><td>Werbeabgabe (5%)</td><td class="right">{{ $inserat->preis }}<br /><hr /></td></tr>
	<tr><td>Zwischensumme</td><td class="right">{{ $inserat->preis }}</td></tr>
	<tr><td>20% Umsatzsteuer</td><td class="right">{{ $inserat->preis2 }}<br /><hr /></td></tr>
	<tr><td>Endsumme</td><td class="right">{{ $inserat->preis }}<br /><hr /><hr /></td></tr>
</table>

<table>
	<tr>
		<td>
			Bankverbindung
		</td>
	</tr>
</table>

<table>
	<tr>
		<td>
			Footer
		</td>
	</tr>
</table>

</body>
</html>