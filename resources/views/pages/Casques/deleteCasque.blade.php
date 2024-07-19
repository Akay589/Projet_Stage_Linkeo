

@extends('layouts.delete')



@section('designation')
      {{$casques->designation}}
@endsection

@section('route')
      {{route('destroy_casque', $casques->id)}}
@endsection

@section('liste')
      {{route('liste_casques')}}
@endsection

