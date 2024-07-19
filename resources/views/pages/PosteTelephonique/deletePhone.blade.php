
@extends('layouts.delete')



@section('designation')
      {{$phones->designation}}
@endsection

@section('route')
       {{route('destroy_phone', $phones->id)}}
@endsection

@section('liste')
       {{route('liste_phones')}}
@endsection

