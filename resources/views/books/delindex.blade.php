<html>

<head>
    <title>Books/Delete</title>
</head>

<body>
    @extends('layouts.booksapp')

    @section('title', 'books.Delete')

    @section('menubar')
        <a href="/books"><button>ホーム</button></a>
        <a href="/books/find"><button>ID検索</button></a>
        <a href="/books/add"><button>新規登録</button></a>
        <a href="/books/editindex"><button>編集</button></a><br>
        @parent
        削除対象を選択して確認してください

    @endsection

    @section('content')
        <form action="/books/delindex" method="post">
            @csrf
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>volume</th>
                    <th>comment</th>
                    <th>Select</th>
                </tr>
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->volume }}</td>
                        <td>{{ $item->comment }}</td>
                        <td>
                            <input type="radio" name="id" value="{{ $item->id }}"
                                @if ($item->id == old('id')) checked @endif>
                        </td>
                    </tr>
                @endforeach
            </table>
            <input type="submit" value="確認する">
        </form>
         <a href="/books"><button>戻る</button></a>
    @endsection

    @section('footer')
        copyright 2023 kumagoroh.
    @endsection
</body>

</html>
