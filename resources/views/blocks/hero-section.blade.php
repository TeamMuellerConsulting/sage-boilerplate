<section class="bg-white dark:bg-gray-800">
    <div class="grid max-w-screen-xxl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
        <div class="mr-auto place-self-center lg:col-span-7">
            <h1
                class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">
                {{ get_field('headline') }}
            </h1>
            <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">
                {{ get_field('description') }}
            </p>

            {{-- Erster Button ist immer sichtbar --}}
            <a href="{{ get_field('button_1_link') }}"
                class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-lg bg-primary hover:bg-primary focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                {{ get_field('button_1_text') }}
            </a>

            {{-- Zweiter Button wird nur angezeigt, wenn ein Text und Link vorhanden sind --}}
            @if (get_field('button_2_text') && get_field('button_2_link'))
                <a href="{{ get_field('button_2_link') }}"
                    class=" items-center justify-center px-5 py-3 text-base font-medium text-center text-gray-900 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                    {{ get_field('button_2_text') }}
                </a>
            @endif
        </div>

        <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
            @php($image = get_field('hero_image'))
            @if ($image)
                <img src="{{ is_array($image) ? $image['url'] : $image }}"
                    alt="{{ is_array($image) ? $image['alt'] : 'Hero Image' }}">
            @endif
        </div>
    </div>
</section>
