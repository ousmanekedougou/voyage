@extends('errors::illustrated-layout')

@section('title', __('Accés non autorisé')) {{--Unauthorized--}}
@section('code', '401')
@section('message', __('Accés non autorisé'))
