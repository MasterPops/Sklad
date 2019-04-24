@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <form method="POST" action="/save">
                <table class="table">
                    <thead>
                        @if(isset($editUnit))
                            {{ csrf_field() }}
                            <label>Редактирование</label>
                            <tr>
                                <input type="hidden" name="id" value="{{$editUnit->id}}">
                                <input type="hidden" name="user" value="{{$editUnit->user}}">
                                <th scope="col">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Наименование" name="name" value="{{$editUnit->name}}">
                                        <small class="form-text text-muted">Наименование позиции</small>
                                    </div>
                                </th>
                                <th scope="col">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Количество" name="count" value="{{$editUnit->count}}">
                                        <small class="form-text text-muted">Количество едениц позиции</small>
                                    </div>
                                </th>
                                <th scope="col">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Цена" name="price" value="{{$editUnit->price}}">
                                        <small class="form-text text-muted">Цена еденицы данной позиции</small>
                                    </div>
                                </th>
                                <th scope="col">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success">Сохранить</button>
                                        <small class="form-text text-muted">&nbsp;</small>
                                    </div>   
                                </th>    
                                <th scope="col">
                                    <div class="form-group">
                                        <a role="button" class="btn btn-secondary" href="/home">Отмена</a>
                                        <small class="form-text text-muted">&nbsp;</small>
                                    </div>
                                </th>               
                            </tr>
                        @endif
                    </thead>
                </table>
            </form>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Наименование</th>
                        <th scope="col">Количество</th>
                        <th scope="col">Цена</th>
                        <th scope="col">Добавлено</th>
                        <th scope="col">Обновлено</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($units as $unit)
                        <tr>
                            <td>{{$unit->name}}</td>
                            <td>{{$unit->count}}</td>
                            <td>{{$unit->price}}</td>
                            <td>{{$unit->created_at}}</td>
                            <td>{{$unit->updated_at}}</td>
                            <td><a role="button" class="btn btn-primary" href="/edit/{{$unit->id}}">Редактировать</a></td>
                            <td><a role="button" class="close" data-toggle="tooltip" data-html="true" title="Удалить запись" href="/delete/{{$unit->id}}">&times;</button ></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>   
        </div>
        <div class="col-md-3">
            <form method="POST" action="/home">
                {{ csrf_field() }}
                <label>Добавить на склад</label>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Наименование" name="name">
                    <small class="form-text text-muted">Введите наименование позиции</small>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Количество" name="count">
                    <small class="form-text text-muted">Введите количество едениц данной позиции</small>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Цена" name="price">
                    <small class="form-text text-muted">Введите цену еденицы данной позиции</small>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Добавить</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
