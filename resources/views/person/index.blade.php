<html>

<head>
    <title>People/Index</title>
</head>

<body>
@extends('layouts.helloapp')

@section('title', 'Person.index')

@section('menubar')
   
        <a href="/person/add"><button >新規登録</button></a>
        <a href="/person/find"><button>ID検索</button></a>
        <a href="/person/editindex"><button>編集</button></a>
        <a href="/person/delindex"><button>削除</button></a>
@parent
    現在のPeople一覧です
@endsection

@section('content')
   <table>
   <tr><th>ID</th><th>Name</th><th>Mail</th><th>Age</th></tr>
   @foreach ($items as $item)
       <tr>
           <td>{{$item->id}}</td>
           <td>{{$item->name}}</td>
           <td>{{$item->mail}}</td>
           <td>{{$item->age}}</td>
       </tr>
   @endforeach
   </table>
@endsection

@section('footer')
copyright 2023 kumagoroh.
@endsection



</body>

</html>
