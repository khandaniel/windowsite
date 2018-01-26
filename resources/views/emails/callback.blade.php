<div style="padding:100px;background-color: #ff5126;">
    <div style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.42857; color: #333333; text-align: center; padding: 20px;">
        <div class="wrapper"
             style="background-color: white; -webkit-border-radius: 15px; -moz-border-radius: 15px; border-radius: 15px;">
            <div class="title" style="background-color: #ff512655; text-align: left; display: inline-list-item; ">
                <div class="logo"
                     style="padding: 15px; min-width: 52px; min-height: 52px; display: inline-block;">
                    <img src="https://okna.ga/images/logo.png">
                </div>
                <h3 style="font-size: 24px; font-weight: 500; line-height: 1.1; color: inherit; display: inline;">Новый
                    запрос
                    на обратную связь</h3>
            </div>
            <div class="content" style="padding: 20px; align-content: center;">
                <table>
                    <tr><td style="text-align: right;">Имя: </td><td style="text-align: left;">{{$callback->name}}</td></tr>
                    <tr><td style="text-align: right;">Номер телефона: </td><td style="text-align: left;">{{$callback->phone_number}}</td></tr>
                    <tr><td style="text-align: right;">Почта: </td><td style="text-align: left;"><a href="mailto:{{$callback->email}}">{{$callback->email}}</a></td></tr>
                    <tr><td style="text-align: right;">Сообщение: </td><td style="text-align: left;">{{$callback->message}}</td></tr>
                    <tr><td style="text-align: right;">Предпочтение: </td><td style="text-align: left;">{{$callback->textorcall}}</td></tr>
                    <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                    <tr><td style="text-align: right;">Заявка обработана?</td><td style="text-align: left;"><a href="https://{{ $_SERVER['SERVER_NAME'] }}/callback/processed/{{ $callback->id }}">Да!</a></td></tr>
                </table>
            </div>
        </div>
    </div>
</div>