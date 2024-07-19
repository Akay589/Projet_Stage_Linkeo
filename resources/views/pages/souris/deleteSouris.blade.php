
@extends('layouts.delete')



@section('designation')
      {{$machine->designation}}
@endsection

@section('route')
       {{route('destroy', $machine->id)}}
@endsection

@section('liste')
       {{route('liste_machine')}}
@endsection

