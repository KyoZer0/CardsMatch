@extends('layouts.app')

@section('title', 'Cards Match - Play Cards Match Online Free')
@section('meta_description', 'Play Cards Match, a cozy triple-match tile game. Clear the board by matching tiles before your selection bar fills up. No download needed.')

@section('hero')
    <div class="game-iframe-wrapper">
        <iframe src="{{ asset('game/index.html') }}" title="Cards Match Game Board" frameborder="0" scrolling="no"></iframe>
    </div>
@endsection

