<div class="col-12 col-sm-8 col-md-10 d-f ai-c jc-s">
    <form method="post" action="{{ asset(app()->getLocale().'/customer/profile') }}" class="prof-check d-f fd-c" id="profile-user-edit-form" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="action" value="profile">
        <div class="form-group">
            <input type="text" class="form-control" name="name" value="{{$user->name}}" placeholder="Имя">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="surname" value="{{$user->surname}}" placeholder="Фамилия">
        </div>
        <div class="form-group">
            <input type="email" class="form-control" name="email" value="{{$user->email}}" placeholder="E-mail">
        </div>
        <div class="form-group">
            <input type="tel" class="form-control phone-mask-f" name="phone" value="{{$user->phone}}" placeholder="Номер телефона" data-inputmask-clearmaskonlostfocus="true">
        </div>
        <div class="form-group">
            <input type="text" id="datepicker" class="form-control" name="birth_at" value="{{$user->birth_at}}" readonly autocomplete="off" placeholder="Дата рождения">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="town" value="{{$user->town}}" placeholder="Город">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="discount" value="{{$user->discount}}" placeholder="Дисконт">
        </div>

        <label class="custom-control custom-checkbox ml-3 mt-2">
            <input type="checkbox" class="custom-control-input" name="notify_email" id="notify-email" @if($user->notify_email) checked @endif value="1">
            <label class="control-label cl-g ml-2" for="notify-email">Получать рассылку акционных предложений на почту/смс/viber</label>
        </label>

        {{--<label class="custom-control custom-checkbox ml-3 mt-2">--}}
            {{--<input type="checkbox" class="custom-control-input" id="notify-phone" name="notify_phone" @if($user->notify_phone) checked @endif value="1">--}}
            {{--<label class="control-label cl-g" for="notify-phone">Получать рассылку СМС</label>--}}
        {{--</label>--}}

        <div class="t-c mt-4 mb-4 d-f jc-c">
            <button type="button" class="cl-w btn-profile" id="profile-user-edit-submit" form="profile-user-edit-form">Сохранить</button>
        </div>

        <div class="t-c d-f jc-c">
            <button type="button" class="btn-form btn-profile cl-w" data-close="remove-profile" data-open="profile-user">Отменить</button>
        </div>
    </form>
</div>