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
      <div class="box-top">
        <p class="box-title">Todo List</p>
        <div class="box-top-right">
          @if (Auth::check())
            <p>「{{$user->name}}」でログイン中</p>
          @endif
          @if(Auth::check())
            <form action="{{ route('logout') }}" method="post">
              @csrf
              <input type="submit" value="ログアウト" class="logout-button">
            </form>
          @endif
        </div>
      </div>
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
            <option></option>
              @foreach($tag as $tags)
              <option value="{{$tags->id}}">{{$tags->tag_title}}</option>
              @endforeach
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
            @isset($todos)
              <tr>
              <td>{{ $todos->created_at }}</td>
              <form action="/{{ $todos->id }}" method="post">
                @csrf
                @method("put")
                <td><input type="text" name="title" class="update-title" value="{{$todos->title}}">
                </td>
                <td>
                  <select name="tag_title">
                    @foreach($tag as $tags)
                    @if("{{$todos->tag_id }}" == "{{$tags->id}}")
                    <option  value="{{$tags->id}}" selected >{{$tags->tag_title}}</option>
                    @else
                    <option  value="{{$tags->id}}" >{{$tags->tag_title}}</option>
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
              <form action="/{{ $todos->id }}" method="post" class="delete" >
                @csrf
                @method('delete')
                <td>
                  <input type="submit"  value="削除" class="delete-button">
                </td>
              </form>
            </tr>
          @else
            
          @endisset
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
