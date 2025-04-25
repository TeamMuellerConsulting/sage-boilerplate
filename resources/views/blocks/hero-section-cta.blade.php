<section class="overflow-hidden relative bg-white dark:bg-gray-900 align{{ $block['align'] ?? '' }}">
  <div class="relative gap-8 py-8 px-4 mx-auto max-w-screen-xl lg:py-16 xl:grid xl:grid-cols-12">
    <div class="col-span-8">
      <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
        {{ get_field('headline') }}
      </h1>
      <p class="mb-6 text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">
        {{ get_field('description') }}
      </p>

      <div class="gap-16 items-start sm:flex">
        @foreach ([1, 2] as $i)
          @php
            $icon = get_field("box_{$i}")['icon_' . $i] ?? 'fa-star';
            $title = get_field("box_{$i}")['title_' . $i];
            $text = get_field("box_{$i}")['text_' . $i];
            $link = get_field("box_{$i}")['button_' . $i . '_link'];
            $label = get_field("box_{$i}")['button_' . $i . '_text'];
          @endphp

          <div class="text-gray-500 dark:text-gray-400 mb-8 sm:mb-0">
            <i class="{{ $icon }} w-7 h-7 mb-3 text-gray-900 dark:text-primary-300"></i>
            <h2 class="mb-3 text-xl font-semibold text-gray-900 dark:text-white">{{ $title }}</h2>
            <p class="mb-4">{{ $text }}</p>
            @if ($link && $label)
              <a href="{{ $link }}"
                 class="text-white bg-primary hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg px-5 py-2.5 text-center inline-flex items-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                {{ $label }}
                <i class="fa-regular fa-arrow-right ml-2 -mr-1 w-5 h-5"></i>
              </a>
            @endif
          </div>
        @endforeach
      </div>
    </div>

    @php($image = get_field('image'))
    @if ($image)
      <div class="hidden absolute top-0 right-0 w-1/3 h-full xl:block">
        <img class="object-cover w-full h-full"
             src="{{ is_array($image) ? $image['url'] : $image }}"
             alt="{{ is_array($image) ? $image['alt'] : 'Hero image' }}">
      </div>
    @endif
  </div>
</section>
