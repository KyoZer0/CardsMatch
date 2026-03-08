@extends('layouts.app')

@section('title', 'Cards Match – Play Cards Match Online Free')
@section('meta_description', 'Play Cards Match, a free online triple match puzzle game. Tap tiles, match 3 identical cards, and clear the board in a cozy, relaxing browser experience. No download needed.')

@section('hero')
    <div class="game-iframe-wrapper">
        <iframe src="{{ asset('game/index.html') }}" title="Cards Match Game Board" frameborder="0" scrolling="no"></iframe>
    </div>
@endsection

@section('content')
    <section class="rebrand-content">
        <h1 class="rebrand-title">Welcome to Cards Match – Your Free Tile Matching Puzzle Game</h1>
        <p class="rebrand-desc">
            Experience the new cozy way to play a matching puzzle online. Cards Match delivers a satisfying, colorful, and fun triple-match experience directly in your browser. 
            No downloads required. Just tap the tiles, make matches, and clear the board!
        </p>
        
        <div class="rebrand-grid">
            <div class="rebrand-card">
                <div class="card-icon">🎴</div>
                <h3>Endless Cards Match Levels</h3>
                <p>Unlock custom tile packs including Animals, Nature, Food and more. Every level is uniquely stacked to offer a fun new puzzle.</p>
            </div>
            
            <div class="rebrand-card">
                <div class="card-icon">⏱️</div>
                <h3>Play Cards Match at Your Own Pace</h3>
                <p>There are no harsh countdown timers rushing you. Relax to the soothing sounds and enjoy the satisfying snap of every completed match.</p>
            </div>
            
            <div class="rebrand-card">
                <div class="card-icon">✨</div>
                <h3>Earn Coins & Rewards</h3>
                <p>Nail perfect completions in under the par move limits to score 3 stars, earn coins, and unlock tougher 'Master' difficulty boards.</p>
            </div>
        </div>
    </section>

    <!-- NEW SECTION: How to Play -->
    <section class="rebrand-how-to">
        <h2 class="rebrand-section-heading">How to Play</h2>
        <div class="how-to-steps">
            <div class="step-card">
                <div class="step-number">1</div>
                <h4>Observe</h4>
                <p>Study the layered cards and identify matches before tapping.</p>
            </div>
            <div class="step-card">
                <div class="step-number">2</div>
                <h4>Tap & Collect</h4>
                <p>Tap available cards to move them to your collection bar. Only unblocked cards can be collected.</p>
            </div>
            <div class="step-card">
                <div class="step-number">3</div>
                <h4>Match 3</h4>
                <p>Collect 3 identical cards to trigger a match and clear space. Clear the entire board to win!</p>
            </div>
        </div>
    </section>

    <!-- NEW SECTION: More Puzzle Games -->
    <section class="rebrand-games">
        <h2 class="rebrand-section-heading">More Puzzle Games</h2>
        <div class="games-grid">
            
            <div class="game-reco-card">
                <div class="game-reco-icon" style="background: var(--accent-cyan);">🧩</div>
                <h3 class="game-reco-title">Jigsolitaire.online</h3>
                <p class="game-reco-desc">A similar relaxing jigsaw experience but designed for a deeper challenge. Tackle larger grids, more complex cuts, and put your spatial reasoning to the ultimate test.</p>
                <a href="https://jigsolitaire.online" target="_blank" class="game-reco-btn" style="background: var(--accent-cyan); box-shadow: inset 0 -4px 0 var(--accent-cyan-dark);">Play Jigsolitaire</a>
            </div>

            <div class="game-reco-card">
                <div class="game-reco-icon" style="background: var(--accent-yellow);">✨</div>
                <h3 class="game-reco-title">Jigmerge.com</h3>
                <p class="game-reco-desc">Looking for a different feeling? Merge puzzle pieces in a whole new dimension. Combine fragments to discover gorgeous, endless picture puzzles in this satisfying spin-off.</p>
                <a href="https://jigmerge.com" target="_blank" class="game-reco-btn" style="background: var(--accent-yellow); box-shadow: inset 0 -4px 0 var(--accent-yellow-dark);">Play Jigmerge</a>
            </div>

            <div class="game-reco-card">
                <div class="game-reco-icon" style="background: var(--accent-green);">📝</div>
                <h3 class="game-reco-title">Fillwords</h3>
                <p class="game-reco-desc">Take a break from pictures and sharpen your mind with words! A relaxing but tricky crossword-style game where you fit words into a grid to reveal hidden messages.</p>
                <a href="#" target="_blank" class="game-reco-btn" style="background: var(--accent-green); box-shadow: inset 0 -4px 0 var(--accent-green-dark);">Play Fillwords</a>
            </div>

        </div>
    </section>
@endsection

