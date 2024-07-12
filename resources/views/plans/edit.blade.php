@extends('layouts.default')
@section('title', 'やる事リスト')

@section('content')
    <div class="todo_layout">
        <div class="m-10 text-3xl font-bold text-center title">😁修正する😁<br>
        </div>
    </div>

    <div class="my-10 lg:w-2/3 w-full mx-auto overflow-auto">
    <table class="table-auto w-full text-left whitespace-no-wrap">
        
        <thead>
          <tr>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">やる事</th>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">登録日</th>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">✏️</th>
          </tr>
        </thead>

         <tbody>
          <form method="post" action="{{ route('plans.update', ['id'=>$plans->id]) }}">
            @csrf
          <tr>
            <td class="border-t-2 border-gray-200 px-4 py-3"><input class="border-2 w-full" type="text" id="todo" name="todo" value="{{ $plans->todo }}"/></td>
            <td class="border-t-2 border-gray-200 px-4 py-3">{{ $plans->created_at->format('Y/m/d') }}</td>
            <td class="border-t-2 border-gray-200 px-4 py-3"><button>更新</button></td>
          </tr>
        </form>
        </tbody>
    </table>
</div>
<div class="m-10 text-right">
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
        <a href="{{ route('plans.index') }}">戻る</a>
      </button>
</div>
@endsection