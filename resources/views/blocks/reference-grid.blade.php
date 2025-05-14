@php
  $references = get_posts([
      'post_type' => 'reference',
      'posts_per_page' => -1,
      'post_status' => 'publish',
  ]);

  $terms_by_id = [];
  foreach (wp_get_object_terms(wp_list_pluck($references, 'ID'), 'reference_category') as $term) {
    $terms_by_id[$term->term_id] = $term;
  }
@endphp

<section class="{{ $block['className'] ?? '' }} align{{ $block['align'] ?? '' }}">
    <div class="max-w-screen-xl mx-auto px-4 py-16">
        {{-- Filter-Buttons --}}
        <div class="mb-8 text-center space-x-4">
            <button data-filter="all" class="px-4 py-2 bg-gray-200 rounded">Alle</button>
            @foreach (array_values($terms_by_id) as $term)
                <button data-filter=".cat-{{ $term->slug }}" class="px-4 py-2 bg-gray-200 rounded">
                    {{ $term->name }}
                </button>
            @endforeach
        </div>

        {{-- Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8" data-mixitup-container>
            @foreach ($references as $ref)
                @php
                    $title = esc_html($ref->post_title);
                    $permalink = esc_url(get_permalink($ref->ID));
                    $image_id = get_post_thumbnail_id($ref->ID);
                    $image_src = $image_id ? wp_get_attachment_image_url($image_id, 'large') : null;
                    $ref_terms = wp_get_object_terms($ref->ID, 'reference_category');
                    $term_classes = collect($ref_terms)->map(fn($t) => 'cat-' . $t->slug)->implode(' ');
                @endphp

                <div class="mix {{ $term_classes }} bg-white border rounded shadow-sm overflow-hidden group hover:shadow-lg transition">
                    @if ($image_src)
                        <a href="{{ $permalink }}">
                            <img src="{{ $image_src }}" alt="{{ $title }}" class="w-full h-64 object-cover" />
                        </a>
                    @endif
                    <div class="p-4">
                        <h3 class="text-lg font-semibold mb-2">
                            <a href="{{ $permalink }}" class="text-gray-900 hover:text-primary-600 transition">
                                {{ $title }}
                            </a>
                        </h3>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
