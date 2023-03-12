<html>

<head>
    <title>People/Find</title>
</head>

<body>
@extends('layouts.helloapp')

@section('title', 'Person.find')

@section('menubar')
   
    <a href="/person"><button>ホーム</button></a>
    <a href="/person/add"><button>新規登録</button></a>
    <a href="/person/editindex"><button>編集</button></a>
    <a href="/person/delindex"><button>削除</button></a>
     @parent
    情報が必要なIDを入力してください
@endsection

@section('content')
    <form action="/person/find" method="post">
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