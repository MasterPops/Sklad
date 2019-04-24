@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
             <form method="GET" action="/search">
                <table class="table">
                    <thead>
                        <label>Поиск</label>
                        <tr>
                            <th scope="col">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="ID" name="identify">
                                </div>
                            </th>
                            <th scope="col">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Имя" name="nameAccaunt">
                                </div>
                            </th>
                            <th scope="col">
                                <div class="form-group">
                                    <select class="form-control" name="typeAccaunt">
                                        <option></option>
                                        @foreach ($types as $type)
                                            <option>{{$type->type}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </th>
                            <th scope="col">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Поиск</button>
                                </div>   
                            </th>
                            @if(isset($all))
                                <th scope="col">
                                    <div class="form-group">
                                        <a role="button" class="btn btn-primary" href="/admin">Показать всех</a>
                                    </div>   
                                </th>    
                            @endif
                                       
                        </tr>
                    </thead>
                </table>
            </form>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Имя</th>
                        <th scope="col">E-Mail</th>
                        <th scope="col">Тип</th>
                        <th scope="col">Зарегистрирован</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <form method="POST" action="/changetype">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value="{{$user->id}}">
                                    <select class="form-control" onchange="this.form.submit()" name="type">
                                        <option>{{$user->AccauntType['type']}}</option>
                                        @foreach ($types as $type)
                                            @if($type->type != $user->AccauntType['type'])
                                                <option>{{$type->type}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </form>
                            </td>
                            <td>{{$user->created_at}}</td>
                        </tr>    
                    @endforeach
                </tbody>
            </table> 
        </div>
    </div>
</div>
@endsection
