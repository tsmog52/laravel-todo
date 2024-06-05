@extends('layouts.default')

@section('title', 'ToDoの個別表示')

@section('content')
  <main class="max-w-2xl mx-auto p-4 bg-white rounded-lg shadow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between">
        <h1 class="text-lg  text-gray-700 font-semibold">{{ $todo->title }}</h1>
        <p>{{$todo->status->name}}</p>
      </div>
      <hr class="w-full">
      @if($todo->body)
        <p class="mt-2 text-center text-gray-600 py-4 whitespace-pre-line">{{$todo->body}}</p>
      @endif
      <div class="text-sm pt-2 font-semibold flex justify-between">
        <div class="flex  space-x-2">
          <form action="{{ route('todo.edit', $todo) }}" method="get">
            <button type="submit" class="bg-blue-500 text-white rounded px-3 py-1 text-sm hover:bg-blue-600 transition-colors duration-200">編集</button>
          </form>
          <form  method="post" action="{{ route('todo.destroy', $todo) }}" onSubmit="return confirm('本当に削除しますか？');">
            @csrf
            @method('delete')
            <button type="submit" class="bg-red-500 text-white rounded px-3 py-1 text-sm hover:bg-red-600 transition-colors duration-200">削除</button>
          </form>
        </div>
        <p>{{$todo->updated_at->format('Y-m-d') }}</p>
      </div>
    </div>
  </div>
</main>
@endsection
