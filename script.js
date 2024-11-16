document.addEventListener('DOMContentLoaded', () => {
    // Parallax effect for hero section
    window.addEventListener('scroll', () => {
        const parallax = document.querySelector('.parallax');
        let scrollPosition = window.pageYOffset;
        parallax.style.backgroundPositionY = scrollPosition * 0.7 + 'px';
    });

    // Game hover sound effect (optional)
    const gameCards = document.querySelectorAll('.game-card');
    gameCards.forEach(card => {
        card.addEventListener('mouseenter', () => {
            card.classList.add('animate-bounce');
        });
        card.addEventListener('mouseleave', () => {
            card.classList.remove('animate-bounce');
        });
    });
});


// Snowflake creation
function createSnowflake() {
    const snowflake = document.createElement('div');
    snowflake.classList.add('snowflake');
    snowflake.innerHTML = '❄️'; // Snowflake character
    snowflake.style.left = Math.random() * window.innerWidth + 'px';
    snowflake.style.animationDuration = Math.random() * 3 + 2 + 's';
    
    document.body.appendChild(snowflake);
    
    setTimeout(() => {
        snowflake.remove();
    }, 5000);
}

setInterval(createSnowflake, 200); // Create a new snowflake every 200ms


// gallery

document.addEventListener('DOMContentLoaded', function() {
    const galleryImages = document.querySelectorAll('.gallery-image');
    const imagePopup = document.getElementById('imagePopup');
    const popupImage = document.getElementById('popupImage');

    galleryImages.forEach(img => {
        img.addEventListener('click', function() {
            popupImage.src = this.src;
            imagePopup.classList.add('show');
        });
    });

    imagePopup.addEventListener('click', function() {
        this.classList.remove('show');
    });
});


// game

document.addEventListener('DOMContentLoaded', function() {
    const snakeGamePopup = document.getElementById('snakeGamePopup');
    const closeGameButton = document.getElementById('closeGameButton');
    const startGameButton = document.getElementById('startGameButton');
    const canvas = document.getElementById('gameCanvas');
    const ctx = canvas.getContext('2d');
    const scoreDisplay = document.getElementById('scoreDisplay');

    let snake, food, dx, dy, score, gameInterval;

    function initGame() {
        snake = [{x: 150, y: 150}];
        food = generateFood();
        dx = 10;
        dy = 0;
        score = 0;
        scoreDisplay.textContent = "Score: 0";
    }

    function generateFood() {
        return {
            x: Math.floor(Math.random() * 30) * 10,
            y: Math.floor(Math.random() * 30) * 10
        };
    }

    function drawGame() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);

        // Draw snake
        ctx.fillStyle = 'green';
        snake.forEach(segment => {
            ctx.fillRect(segment.x, segment.y, 10, 10);
        });

        // Draw food
        ctx.fillStyle = 'red';
        ctx.fillRect(food.x, food.y, 10, 10);

        // Move snake
        const head = {x: snake[0].x + dx, y: snake[0].y + dy};
        snake.unshift(head);

        // Check if snake ate food
        if (head.x === food.x && head.y === food.y) {
            score++;
            scoreDisplay.textContent = `Score: ${score}`;
            food = generateFood();
        } else {
            snake.pop();
        }

        // Check for game over
        if (head.x < 0 || head.x >= canvas.width || head.y < 0 || head.y >= canvas.height || snake.slice(1).some(segment => segment.x === head.x && segment.y === head.y)) {
            clearInterval(gameInterval);
            alert(`Game Over! Your score: ${score}`);
            initGame();
        }
    }

    function changeDirection(e) {
        const LEFT_KEY = 37;
        const RIGHT_KEY = 39;
        const UP_KEY = 38;
        const DOWN_KEY = 40;

        const keyPressed = e.keyCode;

        if (keyPressed === LEFT_KEY && dx !== 10) {
            dx = -10;
            dy = 0;
        }
        if (keyPressed === UP_KEY && dy !== 10) {
            dx = 0;
            dy = -10;
        }
        if (keyPressed === RIGHT_KEY && dx !== -10) {
            dx = 10;
            dy = 0;
        }
        if (keyPressed === DOWN_KEY && dy !== -10) {
            dx = 0;
            dy = 10;
        }

        // Prevent default behavior for arrow keys
        if ([LEFT_KEY, UP_KEY, RIGHT_KEY, DOWN_KEY].includes(keyPressed)) {
            e.preventDefault();
        }
    }

    function startGame() {
        initGame();
        gameInterval = setInterval(drawGame, 100);
        document.addEventListener('keydown', changeDirection);
        startGameButton.disabled = true;
    }

    function stopGame() {
        clearInterval(gameInterval);
        document.removeEventListener('keydown', changeDirection);
        startGameButton.disabled = false;
    }

    closeGameButton.addEventListener('click', function() {
        snakeGamePopup.style.display = 'none';
        stopGame();
    });

    startGameButton.addEventListener('click', startGame);

    // Show popup when page loads
    snakeGamePopup.style.display = 'flex';
});


