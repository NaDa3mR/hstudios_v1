<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Delete Blog') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Once your blog is deleted, all of its data will be permanently removed.') }}
        </p>
    </header>

    <form method="post" action="{{ route('blog.destroy', $blog->id) }}">
        @csrf
        @method('delete')

        <x-danger-button
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-blog-deletion')"
        >{{ __('Delete Blog') }}</x-danger-button>

        <x-modal name="confirm-blog-deletion" focusable>
            <form method="post" action="{{ route('blog.destroy', $blog->id) }}" class="p-6">
                @csrf
                @method('delete')

                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Are you sure you want to delete this blog?') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600">
                    {{ __('This action cannot be undone.') }}
                </p>

                <div class="mt-6 flex justify-end">
                    <x-secondary-button x-on:click="$dispatch('close')">
                        {{ __('Cancel') }}
                    </x-secondary-button>

                    <x-danger-button class="ml-3">
                        {{ __('Delete') }}
                    </x-danger-button>
                </div>
            </form>
        </x-modal>
    </form>
</section>
