<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ToDo App</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
  <header class="max-w-2xl mx-auto my-8 p-4">
    <nav class="flex justify-end space-x-4">
      <a href="{{ route('todo.index') }}" class="text-blue-500 hover:text-blue-700">TOPへ</a>
      <span>/</span>
      <a href="{{ route('todo.create') }}" class="text-blue-500 hover:text-blue-700">新規作成</a>
      <span>/</span>
      <form action="{{ route('logout')}}" method="post">
      @csrf
        <button type="submit" class="text-blue-500 hover:text-blue-700">ログアウト</button>
      </form>
    </nav>
    <h1 class="text-4xl text-gray-700 font-bold text-center mt-4">@yield('title')</h1>
  </header>
  <main class="max-w-2xl mx-auto p-8 bg-white rounded-lg shadow">
    @yield('content')
  </main>
</body>
</html>
