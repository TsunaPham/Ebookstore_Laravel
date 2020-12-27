@extends('layouts.app')
@push('styles')
<style>

</style>
@endpush
@section('title', 'eBookStore')
@section('nav')
    @include('layouts.partials.nav')
@endsection
@section('slider')
    @include('layouts.partials.slider')
@endsection
@section('content')
    <div class="container mt-4">
        <h3 style='border-bottom:2px solid #636b6f' id='books-header'>All books</h3>
        @foreach($books as $key => $book)
            @if($key%2==0)
                <div class="row mt-5">
                    <div class="col-sm-6">
                        <div class="card shadow">
                            <div class="card-body">
                                <img class="card-img-top" src="{{$book->IMAGE}}" alt="Harry Potter" height='700' width='400'>
                                <h5 class="card-title mt-3"><strong>{{$book->TITLE}}</strong></h5>
                                <p class="card-text">Publisher: {{$book->PUBLISHER_NAME}}</p>
                                <p class="card-text">Description: test</p>
                                <p class="card-text">Price: <strong>{{$book->PRICE}}</strong> VND</p>
                                <a href="#" class="btn btn-danger"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                            </div>
                        </div>
                    </div>
            @else
                    <div class="col-sm-6">
                        <div class="card shadow">
                            <div class="card-body">
                                <img class="card-img-top" src="{{$book->IMAGE}}" alt="Harry Potter" height='700' width='400'>
                                <h5 class="card-title mt-3"><strong>{{$book->TITLE}}</strong></h5>
                                <p class="card-text">Publisher: {{$book->PUBLISHER_NAME}}</p>
                                <p class="card-text">Description: test</p>
                                <p class="card-text">Price: <strong>{{$book->PRICE}}</strong> VND</p>
                                <a href="#" class="btn btn-danger"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
        <div class='float-right mt-5'>
            {{ $books->links() }}
        </div>
    </div>
@endsection
@push('scripts')
<script>
$(document).ready(function() {

});
</script>
@endpush
