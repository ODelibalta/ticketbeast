<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title> 
    </head>
    <body>
        <h1>{{ $concert->title }} </h1>
        <h2>{{ $concert->subtitle }} </h2>
        <p>{{ $concert->date->format('F j, Y') }}</p>
        <p>Doors at {{ $concert->date->format('g:ia') }}</p>
        <p>{{ number_format($concert->ticket_price / 100, 2) }}</p>
        <p>{{ $concert->venue }}</p>
        <p>{{ $concert->venue_address }}</p>
        <p>{{ $concert->city }}, {{ $concert->state }} {{ $concert->zip }}</p>
        <p>{{ $concert->additional_information }}</p>
    </body>
</html>