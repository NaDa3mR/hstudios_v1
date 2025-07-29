<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Blog') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your blog's title and content.") }}
        </p>
    </header>

    <form method="post" action="{{ route('blog.update', $blog->id) }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="title" :value="__('Title')" />
            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title', $blog->title)" required />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="content" :value="__('Content')" />
            <textarea id="content" name="content" class="mt-1 block w-full" rows="5">{{ old('content', $blog->content) }}</textarea>
            <x-input-error :messages="$errors->get('content')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'blog-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
