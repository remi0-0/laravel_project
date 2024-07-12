@extends('layouts.default')
@section('title', 'やる事リスト')

@section('content')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="text-align:center;">
        完了した作業
    </h2>

    <div class="my-10 lg:w-2/3 w-full mx-auto overflow-auto">
      <form class="mb-8 flex" method="get" action="{{ route('plans.complete') }}">
            <input class="border-2 w-3/6 mx-10" type="text" name="search" placeholder="検索">
            <button class="flex mx-auto text-white bg-blue-500 border-0 py-2 px-8 mx-3 focus:outline-none hover:bg-blue-700 rounded text-lg">検索</button>
      </form>

    <table class="table-auto w-full text-left whitespace-no-wrap">
        <thead>
          <tr>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">やる事</th>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">登録日</th>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">🔙</th>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">🗑️</th>
          </tr>
        </thead>

         <tbody>
            @foreach($plans as $plan)
          <tr>
            <td class="border-t-2 border-gray-200 px-4 py-3">{{ $plan->todo }}</td>
            <td class="border-t-2 border-gray-200 px-4 py-3">{{ $plan->created_at->format('Y/m/d') }}</td>
            <td class="border-t-2 border-gray-200 px-4 py-3"><a href="{{ route('plans.restore', ['id' => $plan->id]) }}">戻す</a></td>
            <td class="border-t-2 border-gray-200 px-4 py-3"><a href="{{ route('plans.delete', ['id' => $plan->id]) }}">削除</a></td>
          </tr>
          @endforeach
        </tbody>
    </table>
</div>
{{ $plans->links() }}
<div class="m-3 text-right">
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mx-5 rounded-full">
        <a href="{{ route('plans.index') }}">戻る</a>
      </button>
</div>
@endsection