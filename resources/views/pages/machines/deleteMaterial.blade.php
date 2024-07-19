

@extends('layouts.delete')



@section('designation')
      {{$machine->designation}}
@endsection

@section('route')
       {{route('destroy_machine', $machine->id)}}
@endsection

@section('liste')
       {{route('liste_machine')}}
@endsection

