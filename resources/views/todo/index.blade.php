@extends('layouts.default')

@section('title', 'ToDoリスト')

@section('content')
  <div class="pt-4 px-4 overflow-x-auto">
    <table class="table-auto w-full">
      <thead>
        <tr class="text-xs text-gray-500 text-left">
          <th class="font-medium text-center">ID</th>
          <th class="font-medium text-center">タイトル</th>
          <th class="font-medium">ステータス</th>
          <th class="font-medium">期限</th>
          <th class="font-medium">作成日</th>
        </tr>
      </thead>
      <tbody>
      @foreach ($todos as $todo)
        <tr>
          <td class="text-center px-4 py-3 items-center">{{$todo->id}}</td>
          <td class="text-center px-4 py-3 hover:font-bold"> <a href="{{ route('todo.show', $todo) }}">{{$todo->title}}</a></td>
          <td class="text-center">
            {{$todo->status ? $todo->status->name : 'ステータス未設定' }}
          </td>
          <td class="text-center">{{$todo->due_date}}</td>
          <td class="text-center">{{$todo->updated_at->format('Y-m-d')}}</td>
        </tr>
      @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
