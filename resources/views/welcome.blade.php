<x-guest-layout for="web" :page="__('Welcome')">
    <section class="hero" id="home">
        <div class="hero-content">
            <h1>Welcome to {{ company()->name }}</h1>
            <p>Connect, organize, and manage your family life all in one place. Simple. Secure. Professional.</p>
            <div>
                <button class="btn-primary-custom">Get Started</button>
                <button class="btn-secondary-custom">Learn More</button>
            </div>
        </div>
    </section>
</x-guest-layout>
