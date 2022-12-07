@extends('errors::illustrated-layout')

@section('title', __('Trop de demandes')) {{--Too Many Requests--}}
@section('code', '429')
@section('message', __('Trop de demandes'))
