
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

//Comment out the following line to stop the snowflakes
// setInterval(createSnowflake, 200); // Create a new snowflake every 200ms


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