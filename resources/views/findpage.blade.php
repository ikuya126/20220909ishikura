<!DOCTYPE html>
<html lang="jp">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <title>todoアプリ</title>
</head>
<body>
  <div class="container">
    <div class="box">
      <p class="box-title">Todo List</p>
      @if (Auth::check())
        <p>{{$user->name}}でログイン中</p>
      @endif
      @if(Auth::check())
        <form action="{{ route('logout') }}" method="post">
          @csrf
          <input type="submit" value="ログアウト" class="logout-button">
        </form>
      @endif
      @if ($errors->any())
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
      </ul>
      @endif
      <div class="todo">
        <form action="/find" method="get">
          @csrf
          <input type="text" name="title" class="create-todo">
            <select name="tag_title">
              <option value="1">家事</option>
              <option value="2">勉強</option>
              <option value="3">運動</option>
              <option value="4">食事</option>
              <option value="5">移動</option>
            </select>
          <input type="submit" value="検索" class="create-button">
        </form>
      </div>
      <table>
        <thead>
          <tr>
            <th>作成日</th>
            <th>タスク名</th>
            <th>タグ</th>
            <th>更新</th>
            <th>削除</th>
          </tr>
        </thead>
        <tbody>
          @foreach($todos as $todo)
            <tr>
              <td>{{ $todo->created_at }}</td>
              <form action="/{{ $todo->id }}" method="post">
                @csrf
                @method("put")
                <td><input type="text" name="title" class="update-title" value="{{$todo->title}}">
                </td>
                <td>
                  <select name="tag_title">
                    @if("{{$todo->tag_id }}" === 1)
                    <option  value="1" selected >家事</option>
                    @else
                    <option  value="1" >家事</option>
                    @endif
                    @if("{{$todo->tag_id }}" === 2)
                    <option  value="2" selected >勉強</option>
                    @else
                    <option  value="2" >勉強</option>
                    @endif
                    @if("{{$todo->tag_id }}" === 3)
                    <option  value="3" selected >運動</option>
                    @else
                    <option  value="3" >運動</option>
                    @endif
                    @if("{{$todo->tag_id }}" === 4)
                    <option  value="4" selected >食事</option>
                    @else
                    <option  value="4" >食事</option>
                    @endif
                    @if("{{$todo->tag_id }}" === 5)
                    <option  value="5" selected >移動</option>
                    @else
                    <option  value="5" >移動</option>
                    @endif
                  </select>
                </td>
                <td>
                  <button type="submit"  class="update-button">
                  更新
                  </button>
                </td>
              </form>
              <form action="/{{ $todo->id }}" method="post" class="delete" >
                @csrf
                @method('delete')
                <td>
                  <input type="submit"  value="削除" class="delete-button">
                </td>
              </form>
            </tr>
          @endforeach
        </tbody>
      </table>
      <form action="/" method="get" >
          @csrf
          <input type="submit"  value="戻る" class="return-button">
      </form>
    </div>
  </div>
</body>
</html>