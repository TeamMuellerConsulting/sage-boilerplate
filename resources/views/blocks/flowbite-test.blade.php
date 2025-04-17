<div class="p-6 bg-white rounded-lg shadow-md dark:bg-gray-800 {{ $block['className'] ?? '' }}">
    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
        {{ get_field('headline') }}
    </h2>
    {{-- ✅ Hier wird Gutenberg es erlauben, andere Blöcke zu nesten! --}}
    <div class="mt-6">
        {!! $block['innerBlocksContent'] ?? '' !!}
        <InnerBlocks/>
    </div>
</div>

