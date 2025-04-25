<section class="{{ $block['className'] ?? '' }} align{{ $block['align'] ?? '' }}">
    <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-6">
        @if ($title = get_field('key_stats_title'))
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-white lg:text-5xl dark:text-white">
                {{ $title }}
            </h2>
        @endif

        @if ($desc = get_field('key_stats_description'))
            <div class="font-light text-gray-200 sm:text-lg sm:px-8 lg:px-32 xl:px-64 dark:text-gray-400">
                {!! $desc !!}
            </div>
        @endif

        @if ($stats = get_field('stats'))
            <dl class="grid grid-cols-2 gap-8 mx-auto mt-8 max-w-screen-md text-white lg:mt-14 sm:grid-cols-3 dark:text-white">
                @foreach ($stats as $stat)
                    <div class="flex flex-col justify-center items-center">
                        <dt class="mb-2 text-4xl font-extrabold">{{ $stat['value'] }}</dt>
                        <dd class="text-xl font-normal text-gray-200 dark:text-gray-400">{{ $stat['label'] }}</dd>
                    </div>
                @endforeach
            </dl>
        @endif
    </div>
</section>
