<html>

<head>
    <title>Books/Find</title>
</head>

<body>
@extends('layouts.booksapp')

@section('title', 'Books.find')

@section('menubar')
   
    <a href="/books"><button>ホーム</button></a>
    <a href="/books/add"><button>新規登録</button></a>
    <a href="/books/editindex"><button>編集</button></a>
    <a href="/books/delindex"><button>削除</button></a>
     @parent
    情報が必要なIDを入力してください
@endsection

@section('content')
    <form action="/books/find" method="post">
        @csrf
        <input type="text" name="input" value="{{ $input }}">
        <input type="submit" value="検索">

    </form>
    @if (isset($item))
        <table>
            <tr>
                <th>Data</th>
            </tr>
            <tr>
                <td>{{ $item->getData() }}</td>
            </tr>
        </table>
    @endif
@endsection

@section('footer')
    copyright 2023 kumagoroh.
@endsection
</body>

</html>