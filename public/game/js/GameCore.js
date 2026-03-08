import { Tile } from './Tile.js';

export class GameCore {
    constructor() {
        this.boardArea = document.getElementById('board-area');
        this.selectionBar = document.getElementById('selection-bar');
        this.modalOverlay = document.getElementById('modal-overlay');
        this.modalTitle = document.getElementById('modal-title');
        this.modalMessage = document.getElementById('modal-message');
        this.modalBtn = document.getElementById('modal-action-btn');
        this.levelDisplay = document.getElementById('level-display');
        this.scoreDisplay = document.getElementById('score-display');
        
        this.startScreen = document.getElementById('start-screen');
        this.btnPlay = document.getElementById('btn-play');
        
        this.tiles = [];        
        this.selectedTiles = [];
        
        this.level = 1;
        this.score = 0;
        
        // Expanded Icon Pool for massive variety and rarity
        this.masterIconPool = [
            '🍎', '🍌', '🍇', '🍉', '🍓', '🍒', '🍋', '🍍', '🥥', '🥝',
            '🍔', '🍟', '🍕', '🌭', '🍩', '🍪', '🍫', '🍬', '🍭', '🧁',
            '🐶', '🐱', '🐭', '🐹', '🐰', '🦊', '🐻', '🐼', '🐨', '🐯',
            '⚽', '🏀', '🏈', '⚾', '🎾', '🏐', '🏉', '🎱', '🏓', '🏸',
            '🚗', '🚕', '🚙', '🚌', '🚎', '🏎️', '🚓', '🚑', '🚒', '🚐',
            '⌚', '📱', '💻', '⌨️', '🖥️', '🖨️', '🖱️', '🔋', '🕹️', '💡'
        ];
        
        this.modalBtn.addEventListener('click', () => this.handleModalAction());
        this.btnPlay.addEventListener('click', () => this.startGame());
        
        window.addEventListener('resize', () => this.centerBoard());
    }

    init() {
        // Show start screen initially
        this.boardArea.classList.add('hidden');
        this.startScreen.classList.remove('hidden');
    }

    startGame() {
        this.startScreen.classList.add('hidden');
        this.boardArea.classList.remove('hidden');
        this.score = 0;
        this.level = 1;
        this.updateScore(0);
        this.startLevel();
    }

    startLevel() {
        this.boardArea.innerHTML = '';
        this.boardInner = document.createElement('div');
        this.boardInner.className = 'board-inner';
        this.boardInner.style.position = 'absolute';
        this.boardInner.style.top = '0';
        this.boardInner.style.left = '0';
        this.boardInner.style.width = '100%';
        this.boardInner.style.height = '100%';
        this.boardInner.style.transition = 'transform 0.4s cubic-bezier(0.25, 1, 0.5, 1)';
        this.boardInner.style.transformOrigin = 'center';
        this.boardArea.appendChild(this.boardInner);

        this.tiles = [];
        this.selectedTiles = [];
        this.hideModal();
        this.levelDisplay.textContent = this.level;
        
        const slots = this.selectionBar.querySelectorAll('.tile');
        slots.forEach(t => t.remove());

        this.generateLevelData();
        this.calculateBlockages();
        
        this.tiles.forEach(tile => tile.createDOM(this.boardInner, (t) => this.handleTileClick(t)));
        this.centerBoard();
    }

    updateScore(points) {
        this.score += points;
        this.scoreDisplay.textContent = this.score;
    }

    generateLevelData() {
        let idCounter = 0;
        
        // Scaling difficulty
        // Level 1: 1 icon type, 2 triplets (6 tiles) -> Very Easy
        // Add 1 new icon type per level. Increase triplets naturally.
        const typesCount = Math.min(this.masterIconPool.length, this.level);
        const numTriplets = typesCount + Math.floor(this.level * 1.5); 
        
        // Pick exactly `typesCount` unique icons for this level
        const currentIcons = [...this.masterIconPool].sort(() => 0.5 - Math.random()).slice(0, typesCount);

        let pool = [];
        for (let i = 0; i < numTriplets; i++) {
            // Keep distributing triplets among available types evenly-ish
            const icon = currentIcons[i % currentIcons.length];
            pool.push(icon, icon, icon);
        }
        
        pool.sort(() => Math.random() - 0.5);

        // Keep grid tight, but bounded safely within the 800px iframe width.
        // 800px / 60px tile = ~13 cols. We'll limit to 11 to give safe padding margins on the edges.
        const maxCols = 11;
        const maxRows = 10;
        const cols = Math.min(maxCols, 3 + Math.floor(numTriplets / 3));
        const rows = Math.min(maxRows, 3 + Math.floor(numTriplets / 3));

        pool.forEach(type => {
            // Half-steps allow tiles to securely overlap while peeking their edges out
            const randomX = Math.floor(Math.random() * (cols * 2)) / 2;
            const randomY = Math.floor(Math.random() * (rows * 2)) / 2;
            
            let highestZ = 0;
            this.tiles.forEach(t => {
                // If centers are roughly closer than 0.8, they overlap enough to count as blocking
                if (Math.abs(t.x - randomX) <= 0.8 && Math.abs(t.y - randomY) <= 0.8) {
                    highestZ = Math.max(highestZ, t.z + 1);
                }
            });

            this.tiles.push(new Tile(idCounter++, type, randomX, randomY, highestZ));
        });
    }

    // ... (keep the rest of the file exactly the same from calculateBlockages onwards, except win/loss updates)

    calculateBlockages() {
        this.tiles.forEach(t => t.blockedBy = []);

        for (let i = 0; i < this.tiles.length; i++) {
            const t1 = this.tiles[i];
            for (let j = 0; j < this.tiles.length; j++) {
                const t2 = this.tiles[j];
                if (t2.z > t1.z) {
                    const dx = t1.x - t2.x;
                    const dy = t1.y - t2.y;
                    const distanceSq = (dx * dx) + (dy * dy);
                    if (distanceSq < 0.8) {
                        t1.blockedBy.push(t2);
                    }
                }
            }
        }
        
        this.tiles.forEach(t => t.updateAppearance());
    }

    centerBoard() {
        if (this.tiles.length === 0) return;
        
        let minX = Infinity, maxX = -Infinity;
        let minY = Infinity, maxY = -Infinity;

        this.tiles.forEach(t => {
            if (t.state === 'board') {
                minX = Math.min(minX, t.x);
                maxX = Math.max(maxX, t.x);
                minY = Math.min(minY, t.y);
                maxY = Math.max(maxY, t.y);
            }
        });

        if (minX === Infinity) return;

        const logicalWidth = ((maxX - minX) + 1) * 60;
        const logicalHeight = ((maxY - minY) + 1) * 60;
        
        const boardWidth = this.boardArea.offsetWidth;
        const boardHeight = this.boardArea.offsetHeight;
        
        // Calculate max scale based on how deep the layers go to keep them from clipping out.
        // Assuming every Z level shifts elements up by 10px.
        const maxZ = this.tiles.reduce((max, t) => t.state === 'board' ? Math.max(max, t.z) : max, 0);
        const extraVerticalSpace = maxZ * 10;
        
        const totalHeightNeeded = logicalHeight + extraVerticalSpace;
        
        const scaleX = (boardWidth - 20) / logicalWidth; // 20px padding minimum
        const scaleY = (boardHeight - 20) / totalHeightNeeded;
        
        // Default scale is 1, but we zoom out if bounds exceed the container area
        let targetScale = Math.min(1, scaleX, scaleY);
        
        if (this.boardInner) {
            this.boardInner.style.transform = `scale(${targetScale})`;
        }
        
        // Since we scale the container, offsets need not to be scaled manually.
        const offsetX = (boardWidth / targetScale - logicalWidth) / 2 - (minX * 60);
        const offsetY = ((boardHeight / targetScale - totalHeightNeeded) / 2) + extraVerticalSpace - (minY * 60);

        this.tiles.forEach(t => {
            if (t.state === 'board') {
                const leftPos = (t.x * 60) + offsetX;
                const topPos = (t.y * 60) + offsetY;
                
                // Stack offset to account for the physical 6px bottom edge in our CSS
                t.element.style.left = `${leftPos}px`;
                t.element.style.top = `${topPos - (t.z * 10)}px`;
            }
        });
    }

    handleTileClick(tile) {
        if (this.selectedTiles.length >= 7 || tile.state !== 'board') return;

        tile.state = 'moving';
        this.selectedTiles.push(tile);
        
        const rect = tile.element.getBoundingClientRect();
        const boardRect = this.boardArea.getBoundingClientRect();

        this.boardArea.appendChild(tile.element);
        
        tile.element.style.transition = 'none';
        tile.element.style.left = `${rect.left - boardRect.left}px`;
        tile.element.style.top = `${rect.top - boardRect.top}px`;
        tile.element.offsetHeight; // force reflow
        tile.element.style.transition = 'transform 0.1s ease, box-shadow 0.1s ease, filter 0.2s ease, top 0.3s ease, left 0.3s ease';

        this.tiles.forEach(t => {
            const index = t.blockedBy.indexOf(tile);
            if (index > -1) {
                t.blockedBy.splice(index, 1);
                t.updateAppearance();
            }
        });

        this.sortSelectionBar();
        this.renderSelectionBar();
        this.centerBoard(); // Recalculate zoom bounding box
        
        setTimeout(() => this.checkForMatch(), 300);
    }

    sortSelectionBar() {
        this.selectedTiles.sort((a, b) => a.type.localeCompare(b.type));
    }

    renderSelectionBar() {
        const slots = this.selectionBar.querySelectorAll('.slot');
        const boardRect = this.boardArea.getBoundingClientRect();
        
        this.selectedTiles.forEach((t, i) => {
            if (i < 7) {
                const targetSlotRect = slots[i].getBoundingClientRect();
                const finalLeft = targetSlotRect.left - boardRect.left;
                const finalTop = targetSlotRect.top - boardRect.top;

                t.element.style.zIndex = 100 + i;
                t.element.style.left = `${finalLeft}px`;
                t.element.style.top = `${finalTop}px`;
            }
        });
    }

    checkForMatch() {
        let matchIndex = -1;
        
        for (let i = 0; i <= this.selectedTiles.length - 3; i++) {
            if (this.selectedTiles[i].type === this.selectedTiles[i+1].type && 
                this.selectedTiles[i].type === this.selectedTiles[i+2].type) {
                matchIndex = i;
                break;
            }
        }

        if (matchIndex !== -1) {
            const matchedTiles = this.selectedTiles.splice(matchIndex, 3);
            this.updateScore(30); // 30 points per match
            
            this.playMatchSfx();
            
            matchedTiles.forEach(t => {
                t.state = 'matched';
                t.element.classList.add('removing');
                // Create particles
                this.createParticles(t.element);
                setTimeout(() => t.element.remove(), 300);
            });

            setTimeout(() => {
                this.renderSelectionBar();
            }, 150);
        }

        setTimeout(() => this.checkGameState(), 400);
    }

    checkGameState() {
        const tilesOnBoard = this.tiles.filter(t => t.state === 'board').length;
        
        if (tilesOnBoard === 0 && this.selectedTiles.length === 0) {
            this.showWinModal();
        } else if (this.selectedTiles.length === 7) {
            this.showLoseModal();
        }
    }

    showWinModal() {
        this.modalTitle.textContent = "Level Clear!";
        this.modalTitle.style.color = "#4CAF50";
        this.modalMessage.textContent = `You scored ${this.score} points! Ready for the next challenge?`;
        this.modalBtn.textContent = "Next Level";
        this.modalBtn.dataset.action = "next";
        this.modalOverlay.classList.remove('hidden');
    }

    showLoseModal() {
        this.modalTitle.textContent = "Game Over";
        this.modalTitle.style.color = "#F44336";
        this.modalMessage.textContent = `Your board filled up! Final Score: ${this.score}`;
        this.modalBtn.textContent = "Try Again";
        this.modalBtn.dataset.action = "restart";
        this.modalOverlay.classList.remove('hidden');
    }

    hideModal() {
        this.modalOverlay.classList.add('hidden');
    }

    handleModalAction() {
        if (this.modalBtn.dataset.action === "next") {
            this.level++;
            this.startLevel();
        } else {
            // Restart game entirely
            this.startGame();
        }
    }
    
    // VFX & SFX Support Methods
    createParticles(targetElement) {
        const rect = targetElement.getBoundingClientRect();
        const center = {
            x: rect.left + rect.width / 2,
            y: rect.top + rect.height / 2
        };

        for (let i = 0; i < 10; i++) {
            const particle = document.createElement('div');
            particle.className = 'particle';
            // Random properties for explosion direction
            const angle = Math.random() * Math.PI * 2;
            const velocity = 20 + Math.random() * 30; // 20 to 50px speed 
            const tx = Math.cos(angle) * velocity;
            const ty = Math.sin(angle) * velocity;

            particle.style.setProperty('--tx', `${tx}px`);
            particle.style.setProperty('--ty', `${ty}px`);
            particle.style.left = `${center.x}px`;
            particle.style.top = `${center.y}px`;
            
            // Random colors based on main tile color palette
            const colors = ['#FF7A59', '#FFFFFF', '#D3AD81', '#A8704A'];
            particle.style.background = colors[Math.floor(Math.random() * colors.length)];
            
            document.body.appendChild(particle);

            setTimeout(() => {
                particle.remove();
            }, 600);
        }
    }
    
    playMatchSfx() {
        // Implement simple synthetic beep or hook audio elements here.
        // For now, if no actual audio files exist, we can use a small AudioContext pop.
        try {
            const AudioContext = window.AudioContext || window.webkitAudioContext;
            if(!AudioContext) return;
            const ctx = new AudioContext();
            const osc = ctx.createOscillator();
            const gain = ctx.createGain();
            
            osc.connect(gain);
            gain.connect(ctx.destination);
            
            osc.type = 'sine';
            osc.frequency.setValueAtTime(800, ctx.currentTime);
            osc.frequency.exponentialRampToValueAtTime(1200, ctx.currentTime + 0.1);
            
            gain.gain.setValueAtTime(0.1, ctx.currentTime);
            gain.gain.exponentialRampToValueAtTime(0.01, ctx.currentTime + 0.1);
            
            osc.start();
            osc.stop(ctx.currentTime + 0.1);
        } catch (e) {
            console.log('Audio disabled or unsupported.', e);
        }
    }
}
