@php
    $bg = get_field('bg_color');
    $title = get_field('title');
    $description = get_field('description');
    $team = get_field('team');
@endphp


<section class="bg-{{ $bg }} {{ $block['className'] ?? '' }} align{{ $block['align'] ?? '' }} dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-6">
        <div class="mx-auto mb-8 lg:mb-16 max-w-screen-sm md:mb-24">
            @if ($title)
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">{{ $title }}</h2>
            @endif
            @if ($description)
                <div class="font-light text-gray-500 sm:text-xl dark:text-gray-400">
                    {!! $description !!}
                </div>
            @endif
        </div>

        @if (is_array($team) && count($team))
            <div class="grid gap-16 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                @foreach ($team as $member)
                    <div class="text-center text-gray-500">
                        <img class="mx-auto mb-4 w-40 h-40 rounded-lg object-cover object-center"
                             src="{{ $member['image'] }}"
                             alt="{{ $member['name'] }} Avatar">
                        <h5 class="mb-1 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $member['name'] }}
                        </h5>
                        <span>{{ $member['role'] }}</span>

                        @if (!empty($member['socials']))
                            <div class="flex justify-center mt-4 space-x-4">
                                @foreach ($member['socials'] as $social)
                                    <a href="{{ $social['url'] }}"
                                       class="{{ $social['color_class'] ?? 'text-gray-900' }} hover:text-gray-900 dark:hover:text-white"
                                       target="_blank" rel="noopener noreferrer">
                                        <i class="{{ $social['icon_class'] }} w-6 h-6"></i>
                                    </a>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>
