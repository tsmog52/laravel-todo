<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ToDo App</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
  <header class="text-lg font-semibold mb-4 text-center">
    <h1 class="text-4xl pt-4 text-gray-700">ToDoの新規作成</h1>
  </header>
  <main class="max-w-md mx-auto bg-white p-8 rounded shadow text-center">
    <form action="{{ route('todo.store') }}" method="post">
      @csrf
      <div class="mb-2">
        <label for="title" class="block text-gray-700">タイトル</label>
        <input type="text" name="title" class="w-full px-3 py-2 border rounded-md">
        @if($errors->has('title'))
          <p class="text-red-500">{{ $errors->first('title') }}</p>
        @endif
      </div>
      <div class="mb-2">
        <label for="body" class="block text-gray-700">内容</label>
        <textarea type="text" name="body" class="w-full px-3 py-2 border rounded-md"></textarea>
        @if($errors->has('body'))
          <p class="text-red-500">{{ $errors->first('body') }}</p>
        @endif
      </div>
      <div class="mb-2">
        <label for="due_date" class="block text-gray-700">期限</label>
        <input type="date" name="due_date" class="w-full px-3 py-2 border rounded-md">
        @if($errors->has('due_date'))
          <p class="text-red-500">{{ $errors->first('due_date') }}</p>
        @endif
      </div>
      <div class="mb-2">
        <label for="status_id" class="block text-gray-700">ステータス</label>
        <select name="status_id" class="w-full px-3 py-2 border rounded-md">
          @foreach($statuses as $status)
            <option value="{{ $status->id }}">{{ $status->name }}</option>
          @endforeach
        </select>
        @if($errors->has('status_id'))
          <p class="text-red-500">{{ $errors->first('status_id') }}</p>
        @endif
      </div class="flex justify-center">
      <button type="submit" class="bg-blue-500 text-white rounded px-4 py-2">登録</button>
    </form>
  </main>
</body>
</html>
