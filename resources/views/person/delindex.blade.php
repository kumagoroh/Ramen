<html>

<head>
    <title>People/Delete</title>
</head>

<body>
    @extends('layouts.helloapp')

    @section('title', 'Person.Delete')

    @section('menubar')
        <a href="/person"><button>ホーム</button></a>
        <a href="/person/find"><button>ID検索</button></a>
        <a href="/person/add"><button>新規登録</button></a>
        <a href="/person/editindex"><button>編集</button></a><br>
        @parent
        削除対象を選択して確認してください

    @endsection

    @section('content')
        <form action="/person/delindex" method="post">
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
            <input type="submit" value="確認する">
        </form>
    @endsection

    @section('footer')
        copyright 2023 kumagoroh.
    @endsection
</body>

</html>
