<x-layout pageTitle="Vicarious">
    <main>
        <section
            class="max-w-4xl mx-auto px-6 py-6 grid grid-cols-1 gap-8 md:gap-1"
        >
            <article class="prose max-w-none">
                <ul>
                    @foreach ($hotels as $hotel)
                    <li>
                        <a
                            href="/hotel/{{$hotel->url_hash}}"
                            >{{$hotel->hotel_name}}</a
                        >
                    </li>
                    @endforeach
                </ul>
            </article>
        </section>
    </main>
</x-layout>
