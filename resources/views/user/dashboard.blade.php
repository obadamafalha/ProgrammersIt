<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Book List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container p-4">
                    <div class="mb-3">
                        <form action="{{ route('dashboard') }}">
                            <div class="input-group mb-3 p-3">
                                <input type="text" class="form-control" placeholder="Search" name="search">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>


                    @isset($books['items'])
                        <div class="row row-cols-3 row-gap-3">
                            @foreach ($books['items'] as $book)
                                <div class="col">
                                    <div class="card" style="height: 350px; width: 100%;">
                                        <div class="row row-cols-2 align-items-start">
                                            
                                            <div class="col-sm-7">
                                                @isset($book['volumeInfo']['imageLinks']['smallThumbnail'])
                                                    <img src="{{ $book['volumeInfo']['imageLinks']['smallThumbnail'] }}"
                                                        alt="{{ $book['volumeInfo']['title'] }}" width="50%" height="50%">
                                                @endisset
                                            </div>
                                            <div class="col-sm-5">
                                                <h5>
                                                    <x-star-rating :rating="averageRatingForBook($book['id'])" />
                                                </h5>
                                                <p>
                                                    out of {{ CountOfReviewsForBook($book['id']) }}
                                                    {{ Str::plural('review', CountOfReviewsForBook($book['id'])) }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="card-body">

                                            <h5 class="card-title">{{ $book['volumeInfo']['title'] }}</h5>
                                            <div class="book-rating">
                                            </div>
                                            @isset($book['volumeInfo']['authors'])
                                                <p class="card-text">Author: {{ $book['volumeInfo']['authors'][0] }}
                                                </p>
                                            @endisset
                                            <!-- Add more details as needed -->
                                            <a href="{{ route('detail', ['book_id' => $book['id']]) }}"
                                                class="btn btn-primary">Details</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endisset
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
