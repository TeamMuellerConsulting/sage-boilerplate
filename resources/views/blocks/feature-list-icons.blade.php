@php
    $classes = array_filter([
        $block['className'] ?? '',
        isset($block['align']) ? 'align' . $block['align'] : '',
        isset($block['backgroundColor']) ? 'has-background has-' . $block['backgroundColor'] . '-background-color' : '',
        isset($block['textColor']) ? 'has-text-color has-' . $block['textColor'] . '-color' : '',
    ]);

    $classes = implode(' ', $classes);
@endphp

<section class="align{{ $block['align'] ?? '' }}">
    <div class="container max-w-screen-xl mx-auto px-4 py-8 sm:py-16 lg:grid xl:grid-cols-3 lg:gap-8 xl:gap-24">
        <div class="mb-8 lg:mb-0">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">
                {{ get_field('section_title') }}
            </h2>
            <div class="mb-4 text-gray-500 sm:text-xl dark:text-gray-400">
                {!! get_field('section_description') !!}
            </div>
            @if (get_field('button_url') && get_field('button_text'))
                <a href="{{ esc_url(get_field('button_url')) }}"
                    class="inline-flex items-center text-lg font-medium text-primary-600 hover:text-primary-800 dark:text-primary-500 dark:hover:text-primary-700">
                    {{ get_field('button_text') }}
                    <i class="fa-regular fa-arrow-right ml-2"></i>
                </a>
            @endif
        </div>

        <div class="col-span-2 space-y-8 md:grid md:grid-cols-2 md:gap-12 md:space-y-0">
            @php($features = get_field('features'))
            @if (is_array($features) && count($features))
                <div class="col-span-2 space-y-8 md:grid md:grid-cols-2 md:gap-12 md:space-y-0">
                    @foreach ($features as $feature)
                        <div>
                            <div
                                class="flex items-center mb-4 w-10 h-10 rounded-full bg-primary-100 lg:h-12 lg:w-12 dark:bg-primary-900">
                                <i
                                    class="{{ $feature['icon'] }} text-primary-600 lg:text-xl dark:text-primary-300 w-7 h-7"></i>
                            </div>
                            <h3 class="mb-2 text-xl font-semibold dark:text-white">{{ $feature['title'] }}</h3>
                            <p class="text-gray-500 dark:text-gray-400">{{ $feature['description'] }}</p>
                            @if ($feature['feature_button_link'] && $feature['feature_button_text'])
                                <a href="{{ esc_url($feature['feature_button_link']) }}"
                                    class="mt-4 inline-flex items-center text-sm font-medium text-primary-600 hover:text-primary-800 dark:text-primary-500 dark:hover:text-primary-700">
                                    {{ $feature['feature_button_text'] }}
                                    <i class="fa-regular fa-arrow-right ml-2"></i>
                                </a>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</section>
