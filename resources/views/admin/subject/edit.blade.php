@extends('layouts.user')
@section('content')
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="product-payment-inner-st">
        <div class="product-tab-list tab-pane fade active in" id="description">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="review-content-section">
                            <form id="add-department" action="/subject/{{$subject->id}}" method="POST" class="add-department" novalidate="novalidate">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                  <div class="form-group">
                                      <label>@lang('home.name_ar')</label>
                                      <input name="name_ar" type="text" class="form-control" placeholder="@lang('home.name_ar')" value="{{$subject->name_ar}}">
                                  </div>
                                  <div class="form-group">
                                    <label>@lang('home.name_en')</label>
                                     <input name="name_en" type="text" class="form-control" placeholder="@lang('home.name_en')" value="{{$subject->name_en}}">
                                 </div>
                                 <div class="form-group">
                                        <label>@lang('home.group')</label>
                                        <select name="group_id" class="form-control">
                                            @php
                                            $studentclasses=App\studentclass::all();
                                            $name=__('home.nametr');
                                            @endphp
                                            @foreach ($studentclasses as $studentclass)
                                              <option value="{{$studentclass->id}}"@if($studentclass->id==$subject->studentclass_id){{'selected'}} @endif >{{$studentclass->$name}}</option>
                                            @endforeach
                                        </select>
                                     </div>
                                     <div class="form-group">
                                            <label>@lang('home.teacher')</label>
                                            <select name="user_id" class="form-control">
                                                @php
                                                    $users=App\User::all();
                                                    $name=__('home.nametr');
                                                @endphp
                                                @foreach ($users as $user)
                                                  <option value="{{$user->id}}" @if($user->id==$subject->user_id){{'selected'}} @endif >{{$user->name}}</option>
                                                @endforeach
                                            </select>
                                         </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="payment-adress">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light">@lang('home.save')</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
