<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Book Detail') }}
        </h2>
    </x-slot>
    <div class="container">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                    @if (session()->has('success'))
                        <div class="p-3 text-white-emphasis bg-success-subtle border border-success-subtle rounded-3"
                            role="alert">
                            <strong class="font-bold">Success!</strong>
                            <div>
                                {{ session('success') }}
                            </div>
                        </div>
                    @endif
                    <div class="container p-4">

                        <h1>{{ $book['volumeInfo']['title'] }}</h1>

                        <div class="row">
                            <div class="col-md-6">
                                @isset($book['volumeInfo']['imageLinks']['small'])
                                    <img src="{{ $book['volumeInfo']['imageLinks']['small'] }}"
                                        alt="{{ $book['volumeInfo']['title'] }}" class="img-fluid">
                                @endisset
                            </div>
                            <div class="col-md-6">
                                @isset($book['volumeInfo']['authors'][0])
                                    <p><strong>Author:</strong> {{ $book['volumeInfo']['authors'][0] }}</p>
                                @endisset

                                @isset($book['volumeInfo']['publishedDate'])
                                    <p><strong>Published Date:</strong> {{ $book['volumeInfo']['publishedDate'] }}</p>
                                @endisset
                                
                                @isset($book['volumeInfo']['pageCount'])
                                    <p><strong>Page Count:</strong> {{ $book['volumeInfo']['pageCount'] }}</p>
                                @endisset

                                @isset($book['volumeInfo']['description'])
                                    <h3>Description</h3>
                                    <p>{{ $book['volumeInfo']['description'] }}</p>
                                @endisset

                            </div>
                        </div>

                        <hr>

                        <div>
                            <span class="float-md-end">
                                <a class="btn btn-info" href="{{ route('cerate_review', $book['id']) }}"> Add Review</a>
                            </span>
                            <h2>Reviews</h2>

                        </div>

                        @if ($reviews->count() > 0)
                            <div class="row row-gap-3">
                                @foreach ($reviews as $review)
                                    <div class="card">
                                        <div class="card-body ">
                                            <div class="float-md-end">
                                                <x-star-rating :rating="$review->rating" />
                                            </div>
                                            <h5 class="card-title"> {{ $review->user->email }}</h5>
                                            <p class="card-text text-gray-700">Comment: {{ $review->review }}</p>
                                            <div class="float-md-end text-gray-700">
                                                {{ $review->created_at->format('d/m/Y') }}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p>No reviews yet.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
