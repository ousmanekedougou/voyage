@extends('errors::illustrated-layout')

@section('title', __('Erreur du serveur')) {{--Server Error--}}
@section('code', '500')
@section('message', __('Erreur du serveur'))
