<html>

<head>
    <title>Books/Add</title>
</head>

<body>
@extends('layouts.booksapp')

@section('title', 'Books.Add')

@section('menubar')
    
    <a href="/books"><button>ホーム</button></a>
    <a href="/books/find"><button>ID検索</button></a>
    <a href="/books/editindex"><button>編集</button></a>
    <a href="/books/delindex"><button>削除</button></a>
    @parent
    必要事項を入力して登録してください
@endsection

@section('content')
    @if (count($errors) > 0)
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/books/add" method="post">
        <table>
            @csrf
            <tr>
                <th>name: </th>
                <td><input type="text" size="50" name="name" value="{{ old('name') }}"></td>
            </tr>
            <tr>
                <th>volume: </th>
                <td><input type="number" size="10" name="volume" value="{{ old('volume') }}"></td>
            </tr>
            <tr>
                <th>comment: </th>
                <td><input type="text" size="50" name="comment" value="{{ old('comment') }}"></td>
            </tr>
            <tr>
                <th></th>
                <td><input type="submit" value="登録"></td>
            </tr>
        </table>
    </form>
@endsection

@section('footer')
    copyright 2023 kumagoroh.
@endsection
</body>

</html>