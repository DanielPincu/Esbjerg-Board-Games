document.addEventListener("DOMContentLoaded", function () {
    AOS.init({
        duration: 1000, // Animation duration in ms
        once: true, // Run animation only once
    });
});


document.addEventListener('DOMContentLoaded', function() {
    setupLoadMore('load-more-highlights', 'event-highlights-container', 'img');
    setupLoadMore('load-more-testimonials', 'testimonials-container', 'testimonial');
});

function setupLoadMore(buttonId, containerId, itemSelector) {
    var loadMoreButton = document.getElementById(buttonId);
    var container = document.getElementById(containerId);
    
    if (!loadMoreButton || !container) {
        console.error('Required elements not found for ' + buttonId);
        return;
    }

    var items = itemSelector === 'img' ? container.getElementsByTagName(itemSelector) : container.getElementsByClassName(itemSelector);
    var visibleCount = 3;

    // Initially hide items beyond the first 3
    for (var i = visibleCount; i < items.length; i++) {
        items[i].style.display = 'none';
    }

    loadMoreButton.addEventListener('click', function() {
        for (var i = visibleCount; i < visibleCount + 3 && i < items.length; i++) {
            items[i].style.display = 'block';
        }
        visibleCount += 3;
        if (visibleCount >= items.length) {
            loadMoreButton.style.display = 'none';
        }
    });

    // If there are 3 or fewer items, hide the button
    if (items.length <= 3) {
        loadMoreButton.style.display = 'none';
    }
}

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