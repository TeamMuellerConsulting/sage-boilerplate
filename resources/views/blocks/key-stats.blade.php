@php
    $classes = array_filter([
        $block['className'] ?? '',
        isset($block['align']) ? 'align' . $block['align'] : '',
        isset($block['backgroundColor']) ? 'has-background has-' . $block['backgroundColor'] . '-background-color' : '',
        isset($block['textColor']) ? 'has-text-color has-' . $block['textColor'] . '-color' : '',
    ]);

    $classes = implode(' ', $classes);
@endphp


<section class="{{ $classes }}">
    <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-6">
        @if ($title = get_field('key_stats_title'))
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold  lg:text-5xl">
                {{ $title }}
            </h2>
        @endif

        @if ($desc = get_field('key_stats_description'))
            <div class=" sm:text-lg sm:px-8 lg:px-32 xl:px-64">
                {!! $desc !!}
            </div>
        @endif

        @if ($stats = get_field('stats'))
            <dl class="grid grid-cols-2 gap-8 mx-auto mt-8 max-w-screen-md lg:mt-14 sm:grid-cols-3">
                @foreach ($stats as $stat)
                    <div class="flex flex-col justify-center items-center">
                        <dt class="mb-2 text-4xl font-extrabold">{{ $stat['value'] }}</dt>
                        <dd class="text-xl font-normal">{{ $stat['label'] }}</dd>
                    </div>
                @endforeach
            </dl>
        @endif
    </div>
</section>
