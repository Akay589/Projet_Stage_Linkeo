


@extends('layouts.liste')



@section('materiel', $casques)

@section('route1')
       {{ route('voir_casques', $casque->id) }}
@endsection

@section('route2')
       {{ route('edit_casque', $casque->id) }}
@endsection

@section('route3')
        {{ route('delete', $casque->id) }}
@endsection

@section('route4')
        {{ route('generate', $casque->id) }}
@endsection

@section('route5')
         {{ route('liste') }}
@endsection



