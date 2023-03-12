<html>

<head>
    <title>People/Delete
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
削除して宜しいですか？
    @endsection

    @section('content')
        <form action="/person/del" method="post">
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
                    <th>mail: </th>
                    <td>{{ $form->mail }}</td>
                </tr>
                <tr>
                    <th>age: </th>
                    <td>{{ $form->age }}</td>
                </tr>

            </table>
            
            <input type="submit" value="削除する">
        </form>
        <a href="/person/delindex"><button>選択しなおす</button></a>


    @endsection

    @section('footer')
        copyright 2023 kumagoroh.
    @endsection
</body>

</html>
