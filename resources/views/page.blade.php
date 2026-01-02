<x-guest-layout for="web" :page="$page->title">
    <section class="content-section" id="about-page">
        <div class="container py-5">
            {!! $page->content !!}
        </div>
    </section>
</x-guest-layout>
