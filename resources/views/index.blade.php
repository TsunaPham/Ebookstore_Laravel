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
    <div class="container mt-4" style='min-height:500px'>
        <h3 style='border-bottom:2px solid #636b6f' id='books-header'>All books</h3>
        <div class='d-flex align-items-center mt-4'>
            <span style='width:200px'><i class="fas fa-filter"></i> Filter by:</span>
            <div class="dropdown mr-4">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    Category
                </button>
                <div class="dropdown-menu mt-2" id='filter-by-cate'>
                    <a class="dropdown-item" href="javascript:void(0)">KHXH</a>
                    <a class="dropdown-item" href="javascript:void(0)">NN</a>
                    <a class="dropdown-item" href="javascript:void(0)">TH</a>
                    <a class="dropdown-item" href="javascript:void(0)">KT</a>
                    <a class="dropdown-item" href="javascript:void(0)">VHNN</a>
                    <a class="dropdown-item" href="javascript:void(0)">KHTN</a>
                    <a class="dropdown-item" href="javascript:void(0)">LS</a>
                    <a class="dropdown-item" href="javascript:void(0)">SH</a>
                </div>
            </div>
            <div class="dropdown mr-4">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    Author
                </button>
                <div class="dropdown-menu mt-2" id='filter-by-author'>
                    <a class="dropdown-item" href="javascript:void(0)">J. K. Rowling</a>
                    <a class="dropdown-item" href="javascript:void(0)">Nguyễn Nhật Ánh</a>
                    <a class="dropdown-item" href="javascript:void(0)">The Windy</a>
                    <a class="dropdown-item" href="javascript:void(0)">Stephen Hawking</a>
                    <a class="dropdown-item" href="javascript:void(0)">Sanjiv Verma</a>
                </div>
            </div>
            <div class="dropdown mr-4">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    Publish year
                </button>
                <div class="dropdown-menu mt-2" id='filter-by-publish-year'>
                    <a class="dropdown-item" href="javascript:void(0)">2020</a>
                    <a class="dropdown-item" href="javascript:void(0)">2019</a>
                    <a class="dropdown-item" href="javascript:void(0)">2018</a>
                    <a class="dropdown-item" href="javascript:void(0)">2017</a>
                    <a class="dropdown-item" href="javascript:void(0)">2016</a>
                    <a class="dropdown-item" href="javascript:void(0)">2015</a>
                </div>
            </div>
            <div class="dropdown mr-4">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    Authors by cate
                </button>
                <div class="dropdown-menu mt-2" id='filter-author-by-cate'>
                    <a class="dropdown-item" href="javascript:void(0)">KHXH</a>
                    <a class="dropdown-item" href="javascript:void(0)">NN</a>
                    <a class="dropdown-item" href="javascript:void(0)">TH</a>
                    <a class="dropdown-item" href="javascript:void(0)">KT</a>
                    <a class="dropdown-item" href="javascript:void(0)">VHNN</a>
                    <a class="dropdown-item" href="javascript:void(0)">KHTN</a>
                    <a class="dropdown-item" href="javascript:void(0)">LS</a>
                    <a class="dropdown-item" href="javascript:void(0)">SH</a>
                </div>
            </div>
            <div class='w-100'>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search books" id='keyword'>
                    <div class="input-group-append">
                        <span class="input-group-text" id='search-bar' style='cursor: pointer'>
                            <i class="fas fa-search"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div id='list-books'>
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
                                    <a href="javascript:void(0)" class="btn btn-danger add-to-cart"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
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
                                    <a href="javascript:void(0)" class="btn btn-danger add-to-cart"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <div class='float-right mt-5 pagination'>
            {{ $books->links() }}
        </div>
    </div>
@endsection
@push('scripts')
<script>
$(document).ready(function() {
    function renderFilterResult(data){
        let e = `<h4 class='mt-4'>Found ${data.length} result.</h4>`;
        if(data.length==1){
            e += `<div class="row mt-5">
                    <div class="col-sm-6">
                        <div class="card shadow">
                            <div class="card-body">
                                <img class="card-img-top" src="${data[0].IMAGE}" alt="Harry Potter" height='700' width='400'>
                                <h5 class="card-title mt-3"><strong>${data[0].TITLE}</strong></h5>
                                <p class="card-text">Publisher: ${data[0].PUBLISHER_NAME}</p>
                                <p class="card-text">Description: test</p>
                                <p class="card-text">Price: <strong>${data[0].PRICE}</strong> VND</p>
                                <a href="#" class="btn btn-danger"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>`;
        }
        else{
            $.each(data, function(key, val){
                if(key%2==0)
                    e += `<div class="row mt-5">
                            <div class="col-sm-6">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <img class="card-img-top" src="${val.IMAGE}" alt="Harry Potter" height='700' width='400'>
                                        <h5 class="card-title mt-3"><strong>${val.TITLE}</strong></h5>
                                        <p class="card-text">Publisher: ${val.PUBLISHER_NAME}</p>
                                        <p class="card-text">Description: test</p>
                                        <p class="card-text">Price: <strong>${val.PRICE}</strong> VND</p>
                                        <a href="#" class="btn btn-danger"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                                    </div>
                                </div>
                            </div>`;
                else
                    e += `<div class="col-sm-6">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <img class="card-img-top" src="${val.IMAGE}" alt="Harry Potter" height='700' width='400'>
                                        <h5 class="card-title mt-3"><strong>${val.TITLE}</strong></h5>
                                        <p class="card-text">Publisher: ${val.PUBLISHER_NAME}</p>
                                        <p class="card-text">Description: test</p>
                                        <p class="card-text">Price: <strong>${val.PRICE}</strong> VND</p>
                                        <a href="#" class="btn btn-danger"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>`;
            });
        }
        $('.pagination').remove();
        return e;
    }

    $('#filter-by-cate a').click(function(){
        const bfield = $(this).text();
        $.ajax({
            url: "{{ route('getAllByCategory') }}",
            method: "GET",
            data: {
                bfield
            },
            dataType: "json",
            success: function(data) {
                $('#list-books').html(renderFilterResult(data));
            }
        });
    });

    $('#filter-by-author a').click(function(){
        const aname = $(this).text();
        $.ajax({
            url: "{{ route('getAllByAuthor') }}",
            method: "GET",
            data: {
                aname
            },
            dataType: "json",
            success: function(data) {
                $('#list-books').html(renderFilterResult(data));
            }
        });
    });

    $('#filter-by-publish-year a').click(function(){
        const pyear = $(this).text();
        $.ajax({
            url: "{{ route('getAllByPublishYear') }}",
            method: "GET",
            data: {
                pyear
            },
            dataType: "json",
            success: function(data) {
                $('#list-books').html(renderFilterResult(data));
            }
        });
    });

    $('#filter-author-by-cate a').click(function(){
        const bfield = $(this).text();
        $.ajax({
            url: "{{ route('getAllAuthorByCate') }}",
            method: "GET",
            data: {
                bfield
            },
            dataType: "json",
            success: function(data) {
                $('.pagination').remove();
                let e = `<h4 class='mt-4'>Found ${data.length} author.</h4>`;
                e += `<table class='table table-hover mt-2 table-bordered'>
                            <thead>
                                <tr>
                                    <td>Author</td>
                                    <td>Book title</td>
                                    <td>Publisher name</td>
                                </tr>
                            </thead><tbody>`;
                $.each(data, function(key, val){
                    e += `<tr>
                            <td>${val.ANAME}</td>
                            <td>${val.TITLE}</td>
                            <td>${val.PUBLISHER_NAME}</td>
                        </tr>`;
                });
                $('#list-books').html(e + '</tbody></table>');
            }
        });
    });

    $('#search-bar').click(function(){
        const keyword = $('#keyword').val();;
        $.ajax({
            url: "{{ route('getAllByKey') }}",
            method: "GET",
            data: {
                keyword
            },
            dataType: "json",
            success: function(data) {
                $('#list-books').html(renderFilterResult(data));
            }
        });
    });

    $('.shop-now').click(function(){
        $('#books-header')[0].scrollIntoView({
            behavior: "smooth",
            block: "start"
        });
    });

    $('.add-to-cart').click(function(){
        let isLogin = 0;
        @if(session()->has('cid'))
            isLogin = 1;
        @endif
        if(!isLogin)
            $('#login-form').modal('show');
        else{
            toastr.success('Add success!');
            $('#lblCartCount').text(parseInt($('#lblCartCount').text()) + 1);
        }
    });
});
</script>
@endpush
