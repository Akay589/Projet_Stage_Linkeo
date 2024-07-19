
@extends('layouts.edit')

@section('materiel', $casques)


@section('route')
      {{route('update', $casques->id)}}
@endsection
