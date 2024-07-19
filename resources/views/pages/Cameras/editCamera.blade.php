

@extends('layouts.edit')


@section('route')
      {{route('update', $casques->id)}}
@endsection


@section('designation')
     {{ $casques->designation }}
@endsection

@section('num_serie')
     {{ $casques->num_serie }}
@endsection

@section('date')
     {{ $casques->date_achat }}
@endsection

@section('status')
     {{ $casques->status }}
@endsection

@section('user')
     {{ $casques->user }}
@endsection

@section('etiquette')
     {{ $casques->etiquette }}
@endsection

@section('remarque')
     {{ $casques->remarque }}
@endsection

@section('service')
     {{ $casques->service }}
@endsection
