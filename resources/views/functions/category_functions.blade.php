{{-- select category function --}}

@php
function displayCategoriesAsOptions($categories, $prefix = '', $depth = 0) {
    $options = [];

    foreach ($categories as $category) {
        $categoryName = str_repeat('—', $depth) . ' ' . $category->name;
        $options[$category->id] = [
            'name' => $categoryName,
            'depth' => $depth,
        ];

        // Check if the category has child categories
        if ($category->childrenRecursive->isNotEmpty()) {
            // Recursively call the function with child categories and increased depth
            $options += displayCategoriesAsOptions($category->childrenRecursive, '—' . $prefix, $depth + 1);
        }
    }

    return $options;
}
@endphp
