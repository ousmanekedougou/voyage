@extends('errors::illustrated-layout')

@section('title', __('Interdit')) {{--Forbidden--}}
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Interdit'))
