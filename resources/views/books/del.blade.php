<html>

<head>
    <title>Books/Delete
</head>

<body>
    @extends('layouts.booksapp')

    @section('title', 'Books.Delete')

    @section('menubar')
    
        <a href="/books"><button>ホーム</button></a>
        <a href="/books/find"><button>ID検索</button></a>
        <a href="/books/add"><button>新規登録</button></a>
        <a href="/books/editindex"><button>編集</button></a><br>
@parent
削除して宜しいですか？
    @endsection

    @section('content')
        <form action="/books/del" method="post">
            <table>
                @csrf
                <input type="hidden" name="id" value="{{ $form->id }}">
                <tr>
                    <th>ID: </th>
                    <td>{{ $form->id }}</td>
                </tr>
                <tr>
                    <th>name: </th>
                    <td>{{ $form->name }}</td>
                </tr>
                <tr>
                    <th>volume: </th>
                    <td>{{ $form->volume }}</td>
                </tr>
                <tr>
                    <th>comment: </th>
                    <td>{{ $form->comment }}</td>
                </tr>

            </table>
            
            <input type="submit" value="削除する">
        </form>
        <a href="/books/delindex"><button>選択しなおす</button></a>


    @endsection

    @section('footer')
        copyright 2023 kumagoroh.
    @endsection
</body>

</html>
