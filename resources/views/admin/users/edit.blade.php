{{-- Layout and design by WhileD0S <https://vk.com/whiled0s>  --}}
@extends('layouts.shop')

@section('title')
    @lang('content.admin.users.edit.title', ['username' => $user->username])
@endsection

@section('content')
    <div id="content-container">
        <div class="z-depth-1 content-header text-center">
            <h1><i class="fa fa-user fa-lg fa-left-big"></i>@lang('content.admin.users.edit.title', ['username' => $user->getUsername()])</h1>
        </div>

        <form id="admin-users-edit-already-ban" method="post" action="{{ route('admin.users.unblock', ['server' => $currentServer->getId(), 'user' => $user->getId()]) }}" @if(!$isBanned) class="d-none" @endif>
            <div class="alert alert-warning text-center">
                @if($isBanned)
                    {{ build_ban_message($ban->get($user)->getUntil(), $ban->get($user)->getReason()) }}
                @endif
                <span></span>
                {{ csrf_field() }}
                <button class="btn btn-info btn-sm">@lang('content.admin.users.edit.unblock')</button>
            </div>
        </form>

        <form method="post" action="{{ route('admin.users.edit.save', ['server' => $currentServer->getId(), 'edit' => $user->getId()]) }}">
            <div id="s-change-name" class="mt-3">
                <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-12 offset-xs-0">
                    <div class="row">
                        <div class="col-sm-6 offset-sm-3 col-12 text-center">
                            <div class="md-form text-left">
                                <i class="fa fa-user prefix"></i>
                                <input type="text" name="username" id="user-name" class="form-control" value="{{ $user->getUsername() }}">
                                <label for="user-name">@lang('content.admin.users.edit.username')</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="s-settings-cat">
                <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-12 offset-xs-0">
                    <div class="row">
                        <div class="col-sm-6 offset-sm-3 col-12">
                            <div class="plus-category">
                                <div class="md-form text-left">
                                    <i class="fa fa-envelope-o prefix"></i>
                                    <input type="text" name="email" id="user-email" class="form-control" value="{{ $user->getEmail() }}">
                                    <label for="user-email">@lang('content.admin.users.edit.email')</label>
                                </div>
                            </div>
                            <div class="plus-category">
                                <div class="md-form text-left">
                                    <i class="fa fa-money prefix"></i>
                                    <input type="text" name="balance" id="user-balance" class="form-control" value="{{ $user->balance }}">
                                    <label for="user-balance">@lang('content.admin.users.edit.balance')</label>
                                </div>
                            </div>
                            <div class="plus-category">
                                <div class="md-form text-left">
                                    <i class="fa fa-lock prefix"></i>
                                    <input type="password" name="password" id="user-password" class="form-control">
                                    <label for="user-password">@lang('content.admin.users.edit.password')</label>
                                </div>
                            </div>
                            <div class="plus-category">
                                <div class="md-form text-left mb-3">
                                    <input type="checkbox" name="admin" id="user-admin" @if($user->hasAccess('user.admin')) checked="checked" @endif value="1">
                                    <label for="user-admin" class="ckeckbox-label">
                                        <span class='ui'></span>
                                        @lang('content.admin.users.list.table.admin')
                                    </label>
                                </div>
                            </div>

                            <div class="plus-category text-center">
                                <p>
                                    <a class="btn btn-info" data-toggle="collapse" data-target="#collapseOtherUserActions" aria-expanded="false" aria-controls="collapseOtherUserActions">
                                        @lang('content.admin.users.edit.other.title')
                                    </a>
                                </p>
                                <div class="collapse" id="collapseOtherUserActions">
                                    <div class="md-form text-left">
                                        <a href="#" class="btn btn-warning btn-sm btn-block" data-toggle="modal" data-target="#admin-users-edit-show-cart">@lang('content.admin.users.edit.other.in_game_cart')</a>
                                    </div>
                                    <div class="md-form text-left">
                                        <a href="{{ route('admin.users.edit.destroy_sessions', ['server' => $currentServer->getId(), 'user' => $user->getId()]) }}" class="btn danger-color btn-sm btn-block">@lang('content.admin.users.edit.other.sessions')</a>
                                    </div>
                                    @if(($user->getId() !== \Sentinel::getUser()->getId()) and !$isBanned)
                                        <div class="md-form text-left mb-3">
                                            <a id="admin-users-edit-ban-open-modal" class="btn btn-warning btn-sm btn-block" data-toggle="modal" data-target="#admin-users-edit-ban-modal">@lang('content.admin.users.edit.other.block')</a>
                                        </div>
                                    @endif
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-6 offset-sm-3 col-12 save-and-del text-center">
                            {{ csrf_field() }}
                            <button class="btn btn-info"><i class="fa fa-check fa-left"></i>@lang('content.all.save')</button>

                            @if($user->getId() !== \Sentinel::getUser()->getId())
                                <a href="{{ route('admin.users.edit.remove', ['server' => $currentServer->getId(), 'user' => $user->getId()]) }}" class="btn danger-color"><i class="fa fa-user-times fa-left"></i>@lang('content.admin.users.edit.remove')</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@component('components.modal')
    @slot('id')
        admin-users-edit-ban-modal
    @endslot
    @slot('title')
        @lang('content.admin.users.edit.block_modal.title')
    @endslot
    @slot('buttons')
        <button type="button" class="btn btn-warning" id="admin-users-edit-ban" data-url="{{ route('admin.users.block', ['server' => $currentServer->getId(), 'user' => $user->getId()]) }}">@lang('content.admin.users.edit.block_modal.btn')</button>
        <button type="button" class="btn btn-outline-warning" data-dismiss="modal">@lang('content.admin.users.edit.block_modal.cancel')</button>
    @endslot
    <div class="md-form text-left">
        <i class="fa fa-calendar-times-o prefix"  data-toggle="popover" data-placement="right" data-trigger="hover" title="@lang('components.popover.title')" data-content="@lang('content.admin.users.edit.block_modal.duration_popover')"></i>
        <input type="text" id="admin-users-edit-ban-duration" class="form-control" value="0">
        <label for="admin-users-edit-ban-duration" class="ckeckbox-label">@lang('content.admin.users.edit.block_modal.duration')</label>
    </div>
    <div class="md-form text-left">
        <i class="fa fa-pencil prefix"  data-toggle="popover" data-placement="right" data-trigger="hover" title="@lang('components.popover.title')" data-content="@lang('content.admin.users.edit.block_modal.reason_popover')"></i>
        <input type="text" id="admin-users-edit-ban-reason" class="form-control">
        <label for="admin-users-edit-ban-reason" class="ckeckbox-label">@lang('content.admin.users.edit.block_modal.reason')</label>
    </div>
@endcomponent

@component('components.modal')
    @slot('id')
        admin-users-edit-show-cart
    @endslot
    @slot('title')
        @lang('content.admin.users.edit.cart_modal.title')
    @endslot
    @slot('buttons')
        <button type="button" class="btn btn-outline-warning" data-dismiss="modal">@lang('content.admin.users.edit.cart_modal.btn')</button>
    @endslot
    <div class="md-form text-left">
        @if($cart->count())
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>@lang('content.admin.users.edit.cart_modal.table.image')</th>
                        <th>@lang('content.admin.users.edit.cart_modal.table.item')</th>
                        <th>@lang('content.admin.users.edit.cart_modal.table.count')</th>
                        <th>@lang('content.admin.users.edit.cart_modal.table.server')</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cart as $item)
                        <tr>
                            <td><img height="35" width="35" src="{{ \App\Services\Image::getOrDefault("items/" . $item->getRelatedItem()->getImage(), 'empty.png') }}"></td>
                            <td>{{ $item->getRelatedItem()->getName() }}</td>
                            <td>{{ $item->getAmount() }}</td>
                            @foreach($servers as $server)
                                @if($server->getId() === $item->getServerId())
                                    <td>{{ $server->getName() }}</td>
                                @endif
                            @endforeach
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="text-center">
                <h3>@lang('content.admin.users.edit.cart_modal.empty')</h3>
            </div>
        @endif
    </div>
@endcomponent
