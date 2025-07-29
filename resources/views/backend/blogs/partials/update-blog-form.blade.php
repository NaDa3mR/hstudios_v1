<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Blog') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Update your blog\'s information below.') }}
        </p>
    </header>

    <form method="post" action="{{ route('blog.update', $blog->id) }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        {{-- Blog Title --}}
        <div>
            <x-input-label for="title" :value="__('Blog Title')" />
            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
                :value="old('title', $blog->title)" required autofocus autocomplete="off" />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>
        {{-- Blog Sub_title --}}
        <div>
            <x-input-label for="title" :value="__('Blog Sub_title')" />
            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
                :value="old('title', $blog->title)" required autofocus autocomplete="off" />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>
        {{-- Blog Title --}}
        <div>
            <x-input-label for="title" :value="__('Blog Title')" />
            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
                :value="old('title', $blog->title)" required autofocus autocomplete="off" />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>
        {{-- Blog Title --}}
        <div>
            <x-input-label for="title" :value="__('Blog Title')" />
            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
                :value="old('title', $blog->title)" required autofocus autocomplete="off" />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>
        {{-- Blog Title --}}
        <div>
            <x-input-label for="title" :value="__('Blog Title')" />
            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
                :value="old('title', $blog->title)" required autofocus autocomplete="off" />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>

        {{-- Blog Description --}}
        <div>
            <x-input-label for="description" :value="__('Description')" />
            <textarea id="description" name="description" rows="4"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200">
                {{ old('description', $blog->description) }}
            </textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

        {{-- Any Other Blog Fields --}}
        {{-- Add more fields here like 'category', 'tags', etc. --}}

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'blog-updated')
                <p x-data="{ show: true }" x-show="show" x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>
    </form>
</section>


<!-- <section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Blog') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Ensure your blog is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('blog.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="update_password_current_password" :value="__('Current Password')" />
            <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password" :value="__('New Password')" />
            <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'password-updated')
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
</section> -->
