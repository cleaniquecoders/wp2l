@extends('layouts.app')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="float-right">{{ $posts->links() }}</div>
                @card()
                    @slot('card_body')
                        @component('components.table')
                            @slot('tbody')
                                @foreach($posts as $post)
                                    <tr>
                                        <td>
                                            <a href="#">{{ $post->title }}</a>
                                        </td>
                                        <td>
                                            {{ $post->created_at->format('d-M-Y') }}
                                        </td>
                                    </tr>
                                @endforeach
                            @endslot
                        @endcomponent
                    @endslot
                @endcard
                <div class="float-right">{{ $posts->links() }}</div>
            </div>
        </div>
    </div><!-- /.container -->
@endsection
