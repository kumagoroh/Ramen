<html>

<head>
    <title>People/Edit</title>
</head>

<body>
    @extends('layouts.helloapp')

    @section('title', 'Person.Edit')

    @section('menubar')
        <a href="/person"><button>ホーム</button></a>
        <a href="/person/find"><button>ID検索</button></a>
        <a href="/person/add"><button>新規登録</button></a>
        <a href="/person/delindex"><button>削除</button></a><br>
        @parent
        編集対象を選択してください

    @endsection

    @section('content')
        <form action="/person/editindex" method="post">
            @csrf
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Mail</th>
                    <th>Age</th>
                    <th>Select</th>
                </tr>
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->mail }}</td>
                        <td>{{ $item->age }}</td>
                        <td>
                            <input type="radio" name="id" value="{{ $item->id }}"
                                @if ($item->id == old('id')) checked @endif>
                        </td>
                    </tr>
                @endforeach
            </table>
            <input type="submit" value="修正する">
        </form>
        <a href="/person"><button>戻る</button></a>
    @endsection

    @section('footer')
        copyright 2023 kumagoroh.
    @endsection
</body>

</html>
