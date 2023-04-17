@extends('template')
@section('title', 'Личный кабинет')
@section('content')
    <style>
        .changeBtn{
            color: #0d6efd;
            cursor: pointer;
        }
        .changeBtn:hover{
            color: #006a81;
        }
        .saveBtn{
            color: #13653f;
            cursor: pointer;
        }
        .saveBtn:hover{
            color: #157347;
        }
    </style>
    <div class="row">
        <div class="col-sm-4">
            <img src="{{$user->img}}" alt="" width="100%">
            <form action="/changeUserAvatar" method="post" enctype="multipart/form-data">
                @csrf
                <input type="file" name="userAvatar" class="form-control">
                <input type="submit" class="btn btn-primary">
            </form>
        </div>
        <div class="col-sm-8">
            <p>
                <strong>Имя: </strong>
                <span id="nameSpan">{{$user->name}}</span>
                <span class="changeBtn" onclick="renderInput('nameSpan', this)">[изменить]</span>
                <span class="saveBtn" hidden onclick="saveUserData('nameSpan')">[сохранить]</span>
            </p>
            <p>
                <strong>Фамилия: </strong>
                <span id="lastnameSpan">{{$user->lastname}}</span>
                <span class="changeBtn" onclick="renderInput('lastnameSpan')">[изменить]</span>
                <span class="saveBtn" hidden onclick="saveUserData('lastnameSpan')">[сохранить]</span>
            </p>
            <p>
                <strong>E-mail: </strong> <span>{{$user->email}}</span>
            </p>
            <p>
                <strong>ID: </strong> <span>{{$user->id}}</span>
            </p>
        </div>
    </div>
    <script>
        function renderInput(elementID, btn){
            btn.nextElementSibling.hidden = false;
            btn.hidden = true;
            let span = document.getElementById(elementID);
            let value = span.innerText;
            span.innerHTML = `<input id="${elementID+"_input"}" type="text" value="${value}">`;
        } // ${elementID+"_input"} = lastnameSpan_input или nameSpan_input

        function saveUserData(elementID){
            let input = document.getElementById(elementID+"_input");
            let token = document.querySelector('input[name="_token"]').value
            let formData = new FormData();
            formData.append(elementID, input.value);
            formData.append('_token', token);
            fetch('/updateUserData', {
                method: "post",
                body: formData
            }).then(response=>response.json())
                .then(result=>{
                    if(result.result === "success"){
                        location.reload();
                    }
                })
        }
    </script>
@endsection
