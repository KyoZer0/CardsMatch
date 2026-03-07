@extends('layouts.app')

@section('title', 'Cards Match - Play Cards Match Online Free')
@section('meta_description', 'Play Cards Match, a cozy triple-match tile game. Clear the board by matching tiles before your selection bar fills up. No download needed.')

@section('hero')
    <div class="game-iframe-wrapper" style="position: relative; width: 100%; max-width: 800px; margin: 0 auto; aspect-ratio: 9/16; max-height: 80vh;">
        <iframe src="{{ asset('game/index.html') }}" title="Cards Match Game Board" frameborder="0" scrolling="no" style="position: absolute; top:0; left:0; width: 100%; height: 100%; border-radius: 24px; box-shadow: 0 10px 30px rgba(0,0,0,0.15); background: #EBE3D5;"></iframe>
    </div>
@endsection

