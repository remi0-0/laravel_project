@extends('layouts.default')
@section('title', 'やる事リスト')

@section('content')
    <div class="m-2 text-right">
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
        <a href="{{ route('plans.complete') }}">完了ページに行く</a>
      </button>
    </div>

    <div class="todo_layout">
        <form method="post" action="{{ route('plans.store') }}">
             @csrf
        <div class="m-10 text-3xl font-bold text-center title" style="padding-top:3%;">リスト<br>
            <input type="text" id="todo" name="todo" class="w-6/12 m-3 bg-white-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            <button class="flex mx-auto text-white bg-blue-500 border-0 py-2 px-8 focus:outline-none hover:bg-blue-700 rounded text-lg">作業追加</button>

            <!-- 内容入力なしでボタンを押すと出るメッセージです-->
            @if (session('flash_message'))
              <div class="flash_message text-sm text-sky-500">
                {{ session('flash_message') }}
              </div>
            @endif
        </div>
    </form>
    </div>

    <div class="my-10 lg:w-2/3 w-full mx-auto overflow-auto">
    <table class="table-auto w-full text-left whitespace-no-wrap">
        
        <thead>
          <tr>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 ">やる事</th>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">登録日</th>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">🙆‍♀️</th>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">✏️</th>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">🗑️</th>
          </tr>
        </thead>

         <tbody>
            @foreach($plans as $plan)
          <tr>
            <td class="border-t-2 border-gray-200 px-4 py-3">{{ $plan->todo }}</td>
            <td class="border-t-2 border-gray-200 px-4 py-3">{{ $plan->created_at->format('Y/m/d') }}</td>
            <td class="border-t-2 border-gray-200 px-4 py-3"><a href="{{ route('plans.finish', ['id' => $plan->id]) }}">完了</a></td>
            <td class="border-t-2 border-gray-200 px-4 py-3"><a href="{{ route('plans.edit', ['id' => $plan->id]) }}">修正</a></td>
            <td class="border-t-2 border-gray-200 px-4 py-3"><a href="{{ route('plans.delete', ['id' => $plan->id]) }}">削除</a></td>
          </tr>
          @endforeach
        </tbody>
    </table>
</div>
@endsection