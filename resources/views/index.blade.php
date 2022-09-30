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
        <form action="{{ route('findpage') }}" method="get">
          @csrf
          <input type="submit" value="タスク検索" class="find-button">
        </form>
      @if ($errors->any())
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
      </ul>
      @endif
      <div class="todo">
        <form action="/create" method="post">
          @csrf
          <input type="text" name="title" class="create-todo">
            <select name="tag_title">
              @foreach($tag as $tags)
              <option value="{{$tags->id}}">{{$tags->tag_title}}</option>
              @endforeach
            </select>
          <input type="submit" value="追加" class="create-button">
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
                    @foreach($tag as $tags)
                    @if("{{$todo->tag_id }}" == "{{$tags->id}}")
                    <option  value="{{$tags->id}}" selected >{{$tags->tag_title}}</option>
                    @else
                    <option  value="{{tags->id}}" >{{$tags->tag_title}}</option>
                    @endif
                    @endforeach
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
    </div>
  </div>
</body>
</html>
