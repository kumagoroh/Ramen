<html>

<head>
    <title>People/Add</title>
</head>

<body>
@extends('layouts.helloapp')

@section('title', 'Person.Add')

@section('menubar')
    
    <a href="/person"><button>ホーム</button></a>
    <a href="/person/find"><button>ID検索</button></a>
    <a href="/person/editindex"><button>編集</button></a>
    <a href="/person/delindex"><button>削除</button></a>
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
    <form action="/person/add" method="post">
        <table>
            @csrf
            <tr>
                <th>name: </th>
                <td><input type="text" name="name" value="{{ old('name') }}"></td>
            </tr>
            <tr>
                <th>mail: </th>
                <td><input type="text" name="mail" value="{{ old('mail') }}"></td>
            </tr>
            <tr>
                <th>age: </th>
                <td><input type="number" name="age" value="{{ old('age') }}"></td>
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