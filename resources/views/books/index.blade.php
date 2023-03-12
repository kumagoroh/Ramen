<html>

<head>
    <title>Books/Index</title>
</head>

<body>
@extends('layouts.booksapp')

@section('title', 'Books.index')

@section('menubar')
   
        <a href="/books/add"><button >新規登録</button></a>
        <a href="/books/find"><button>ID検索</button></a>
        <a href="/books/editindex"><button>編集</button></a>
        <a href="/books/delindex"><button>削除</button></a>
@parent
    現在のBooks一覧です
@endsection

@section('content')
   <table>
   <tr><th>ID</th><th>Name</th><th>Volume</th><th>Comment</th></tr>
   @foreach ($items as $item)
       <tr>
           <td>{{$item->id}}</td>
           <td>{{$item->name}}</td>
           <td>{{$item->volume}}</td>
           <td>{{$item->comment}}</td>
       </tr>
   @endforeach
   </table>
@endsection

@section('footer')
copyright 2023 kumagoroh.
@endsection



</body>

</html>
