<html>

<head>
    <title>Books/Edit</title>
</head>

<body>
    @extends('layouts.booksapp')

    @section('title', 'Books.Edit')

    @section('menubar')
        <a href="/books"><button>ホーム</button></a>
        <a href="/books/find"><button>ID検索</button></a>
        <a href="/books/add"><button>新規登録</button></a>
        <a href="/books/delindex/"><button>削除</button></a>
        @parent
        内容を修正してください


    @endsection

    @section('content')
        @if (count($errors) > 0)
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>mail
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="/books/edit" method="post">
            <table>
                @csrf
                <input type="hidden" name="id" value="{{ $form->id }}">
                <tr>
                    <th>name: </th>
                    <td><input type="text" size="50" name="name" value="{{ $form->name }}"></td>
                </tr>
                <tr>
                    <th>volume: </th>
                    <td><input type="text" size="10" name="volume" value="{{ $form->volume }}"></td>
                </tr>
                <tr>
                    <th>comment: </th>
                    <td><input type="text" size="50" name="comment" value="{{ $form->comment }}"></td>
                </tr>

            </table>
            <input type="submit" value="修正する">
        </form>
        <a href="/books"><button>戻る</button></a>
    @endsection

    @section('footer')
        copyright 2023 kumagoroh.
    @endsection
</body>

</html>
