@extends('layouts.main')
@section('content')
    <div id="fh5co-intro" class="fh5co-section">
        <div class="container">
            <div class="row row-bottom-padded-sm">
                <div class="col-md-8 col-md-offset-2 text-center ts-intro">
                    <h1>{{$contact->title}}</h1>
                    <p class="fh5co-lead">{{$contact->excerpt}}</p>
                </div>
            </div>
            <div class="row row-bottom-padded-sm">
                <div class="col-md-6" id="fh5co-content">
                    <script>
                        var visible = 'visibility: visible; max-height:200px;';
                        var hidden = 'visibility:hidden;max-height:0px;color:transparent;';

                        function checkTextOrCall() {
                            if (document.getElementById('number').value !== '' && document.getElementById('email').value !== '') {
                                document.getElementById('textorcall').style = visible;
                            }
                            else {
                                if (document.getElementById('number').value !== '') {
                                    document.getElementById('textorcallCall').checked = "checked";
                                }
                                if (document.getElementById('email').value !== '') {
                                    document.getElementById('textorcallText').checked = "checked";
                                }
                                document.getElementById('textorcall').style = hidden;
                                document.getElementById('warning-alert').style = 'display:none;'
                            }
                        }

                        function ifTextOrCall() {
                            if (document.getElementById('textorcallCall').checked || document.getElementById('textorcallText').checked) {
                                return true;
                            } else {
                                return false;
                            }
                        }

                        function submitIfChecked() {
                            if (ifTextOrCall()) {
                                document.getElementById('contact-form').submit();
                            }
                            else {
                                document.getElementById('warning-alert').style = 'display:block;';
                            }
                        }
                    </script>
                    <style>
                        #textorcall {
                            -webkit-transition: all .5s ease;
                        }

                        #warning-alert {
                            display: none;
                        }
                    </style>
                    <form id="contact-form" action="/contact" method="post">
                        @if(isset($_REQUEST['success']))
                            <div class="alert alert-success">
                                <strong>Отлично!</strong> В ближайшее время менеджер свяжется с Вами.
                            </div>
                        @endif
                        {{ csrf_field() }}
                        @if(count($errors) > 0)
                            <div id="messageErrors" class="alert alert-danger">
                                <strong>Ой!</strong> Тут какие-то проблемы.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="name">Имя*</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Мать Драконов?"
                                   onchange="checkTextOrCall()">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email"
                                   placeholder="Хотите, чтобы мы написали?" onchange="checkTextOrCall()">
                        </div>
                        <div class="form-group">
                            <label for="number">Номер телефона:</label>
                            <input type="text" class="form-control" name="number" id="number"
                                   placeholder="Или позвонить?" onchange="checkTextOrCall()">
                        </div>
                        <div class="form-group">
                            <label for="message">Сообщение</label>
                            <textarea name="message" id="message" cols="30" rows="10" class="form-control"
                                      placeholder="" onchange="checkTextOrCall()"></textarea>
                        </div>
                        <div class="form-group" id="textorcall" style="visibility: hidden;max-height: 0px">
                            <p>Что Вы предпочитаете?</p>
                            <p>
                                <label for="textorcallText">
                                    <input type="radio" class="form-check-input" name="textorcall" id="textorcallText"
                                           value="TEXT"/>
                                    Письменное общение
                                </label>
                            </p>
                            <p>
                                <label for="textorcallCall">
                                    <input type="radio" class="form-check-input" name="textorcall" id="textorcallCall"
                                           value="CALL"/>
                                    Общение по телефону
                                </label>
                            </p>
                        </div>
                        <div class="alert alert-warning" id="warning-alert">
                            <strong>Внимание:</strong> убедитесь, что Вы заполнили все необходимые поля!
                        </div>
                        <div class="form-group">
                            <input id="submitButton" type="button" class="btn btn-primary" value="Свяжитесь со мной" onclick="submitIfChecked()">
                        </div>
                    </form>
                </div>
                <div class="col-md-4 col-md-push-1 col-sm-12 col-sm-push-0" id="fh5co-sidebar">
                    <div class="fh5co-contact-info">
                        {!!$contact->body!!}
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection