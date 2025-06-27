@props(['categories', 'service' => null])

<div>
    <x-input-label for="title" :value="__('Judul Jasa')" />
    <x-text-input id="title" name="title" type="text" class="block mt-1 w-full" :value="old('title', $service->title ?? '')" required
        autofocus />
    <x-input-error :messages="$errors->get('title')" class="mt-2" />
</div>

<div class="mt-4">
    <x-input-label for="category_id" :value="__('Kategori Jasa')" />
    <select name="category_id" id="category_id" class="block mt-1 w-full rounded-md">
        @foreach ($categories as $category)
            <option value="{{ $category->id }}"
                {{ old('category_id', $service?->category_id) == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
    <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
</div>

<div class="mt-4">
    <x-input-label for="description" :value="__('Deskripsi Jasa')" />
    <textarea id="description" name="description" class="block mt-1 w-full rounded-md" rows="4" required>{{ old('description', $service?->description ?? '') }}</textarea>
    <x-input-error :messages="$errors->get('description')" class="mt-2" />
</div>

<div class="mt-4">
    <x-input-label for="price" :value="__('Harga Jasa (Rp)')" />
    <x-text-input id="price" name="price" type="number" class="block mt-1 w-full" :value="old('price', $service?->price ?? '')" required />
    <x-input-error :messages="$errors->get('price')" class="mt-2" />
</div>
