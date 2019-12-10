@extends('layouts.user')
@section('content')
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="product-status-wrap drp-lst">
        <h4>@lang('home.sub_groups')</h4>
        <div class="add-product">
            <a href="/studentclass/create">@lang('home.addsub_group')</a>
        </div>
        <div class="asset-inner">
            <table>
                <tbody>
                <tr>
                    <th></th>
                    <th>@lang('home.name_ar')</th>
                    <th>@lang('home.name_en')</th>
                    <th>@lang('home.group')</th>
                    <th>Setting</th>
                </tr>
                @php
                $studentclasss=App\studentclass::all();
                $name=__('home.nametr');
                @endphp
                @foreach($studentclasss as $k => $studentclass)
                <tr>
                    <td>{{$k+1}}</td>
                    <td>{{$studentclass->name_ar}}</td>
                    <td>{{$studentclass->name_en}}</td>
                    <td>{{$studentclass->group->$name}}</td>
                    <td>
                        <a data-toggle="tooltip" title="" href="/studentclass/{{$studentclass->id}}/edit" class="pd-setting-ed" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        <a data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Trash" onclick="event.preventDefault();document.getElementById('delete').submit();"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                           <form id="delete" action="{{ route('studentclass.destroy',['id'=>$studentclass->id]) }}" method="POST" style="display: none;">
                               @csrf
                               @method('DELETE')
                           </form>
                    </td>
                </tr>
                 @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>
@endsection
