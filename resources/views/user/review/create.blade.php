<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Review') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container p-4">
                    <form action="{{ route('store_review', $book_id) }}" method="POST">
                        @csrf
                        <div class="p-3">
                            <label for="review">Review</label>
                            <textarea class="form-control" name="review" id="review" required @class(['border-red-500' => $errors->has('review')])>{{ old('review') }}</textarea>
                            @error('review')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                  </div>
                            @enderror
                        </div>

                        <div class="p-3">
                            <label for="rating">Rating</label>

                            <select class="form-control" name="rating" id="rating" required>
                                <option value="">Select a Rating</option>
                                @for ($i = 1; $i <= 5; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                        <input type="hidden" name="book_id" value="{{ $book_id }}">

                        <div class="pt-3">
                            <button type="submit" class="btn btn-success">Add Review</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
