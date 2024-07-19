




@extends('layouts.show')

@section('title', 'Casque')





@section('designation')
{{ $casques->designation}}
@endsection

@section('num_serie')
{{ $casques->num_serie}}
@endsection

@section('date')
{{ $casques->date_achat}}
@endsection

@section('status')
{{ $casques->status}}
@endsection

@section('user')
{{ $casques->user}}
@endsection

@section('etiquette')
{{ $casques->etiquette}}
@endsection

@section('remarque')
{{ $casques->remarque}}
@endsection

@section('service')
{{ $casques->service}}
@endsection

@section('route1')
{{ route('liste_casques') }}
@endsection

@section('route2')
{{ route('edit_casque', $casques->id) }}
@endsection
