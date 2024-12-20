<header class="bg-[url('<?php echo esc_url(get_field('hero_image')['url']); ?>')] parallax h-screen bg-cover bg-center relative" aria-label="<?php echo esc_attr(get_field('hero_image')['alt']); ?>" data-aos="fade-in">
    <div class="bg-overlay"></div>
    <div class="hero-text bg-black w-[99vw] py-20 bg-opacity-50">
        
            <h1 class="text-5xl font-bold"><?php echo esc_html(get_field('city')); ?></h1>
            <h1 class="text-5xl font-bold"><?php echo esc_html(get_field('club_name')); ?></h1>
            <p class="text-xl font-semibold mt-5"><?php echo esc_html(get_field('core_narrative')); ?></p>
        
        <div class="mt-6 flex justify-center">
            <a href="#about" class="font-semibold hover:text-orange-500 px-8 py-3 bg-green-600 rounded-lg hover:bg-green-700 transition duration-300">About</a>
            <a href="<?php echo esc_url(get_permalink(get_page_by_path('signup'))); ?>" class="ml-4 font-semibold hover:text-orange-500 px-8 py-3 bg-green-600 rounded-lg hover:bg-green-700 transition duration-300">Sign Up</a>
        </div>
    </div>
</header>