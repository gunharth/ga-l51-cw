
<p>
<b>{{ $client->firma }}</b> 
| <small><b>{{ $client->ansprache }}</b></small><br>
<small>{{ $client->strasse }}, {{ $client->ort }}, {{ $client->plz }} | T: {{ $client->tel }} 
| UID: <span id="vatCountry">{{ $client->vat_country }}</span> {{ $client->vat_number }}</small>
</p>
<div id="isAgent">{{ $client->agent }}</div>


