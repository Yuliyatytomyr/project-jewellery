<div class="col-12 card">
    <div class="card-body">
        <h3 class="card-title">
            @if($user->photo != null)
                <img class="img-md rounded-circle" src="{{ asset($user->photo) }}" alt="Profile image">
            @else
                <i class="fa fa-user-circle fa-3x"></i>
            @endif
            <span class="ml-3">{{ $user->name.' '.$user->surname }}</span>
        </h3>

        <form class="row forms-sample" id="profile-update-form" action="{{ asset(app()->getLocale().'/administration/profile') }}" enctype="multipart/form-data" method="post">
            @csrf
            <div class="col-md-6">

                <div class="form-group">
                    <label for="profile-name">Имя</label>
                    <input type="text" class="form-control" id="profile-name" name="name" placeholder="Имя" value="{{ $user->name }}">
                </div>
                <div class="form-group">
                    <label for="profile-surname">Фамилия</label>
                    <input type="text" class="form-control" id="profile-surname" name="surname" placeholder="Фамилия" value="{{ $user->surname }}">
                </div>
                <div class="profile-town">
                    <label for="profile-email">Адрес</label>
                    <input type="text" class="form-control" id="profile-town" name="town" placeholder="Адрес" value="{{ $user->town }}">
                </div>
                <div class="form-group">
                    <div class="form-radio">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="type" id="profile-sex-m" value="male"
                                   @if($user->type == 'male') checked @endif
                            > Мужской <i class="input-helper"></i></label>
                    </div>
                    <div class="form-radio">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="type" id="profile-sex-f" value="famale"
                                   @if($user->type == 'famale') checked @endif
                            > Женский <i class="input-helper"></i></label>
                    </div>
                </div>

            </div>
            <div class="col-md-6">

                <div class="form-group">
                    <label for="profile-email">Эл. почта</label>
                    <input type="email" class="form-control" id="profile-email" name="email" placeholder="Эл. почт" value="{{ $user->email }}">
                </div>
                <div class="form-group">
                    <label for="profile-phone">Номер моб. телефона</label>
                    <input type="text" class="form-control phone-mask-f" id="profile-phone" name="phone" placeholder="Номер моб. телефона" value="{{ $user->phone }}">
                </div>
                <div class="form-group">
                    <label>Изображение профиля</label>
                    <input type="file" name="photo" id="profile-file" class="file-upload-default"  accept="image/x-png,image/gif,image/jpeg">
                    <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" id="file-upload-info" disabled placeholder="Изображение не выбрано...">
                        <span class="input-group-append">
                            <button class="file-upload-browse btn btn-info" id="file-upload-browse" type="button">Найти</button>
                          </span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="datepicker">Дата рождения</label>
                    <input type="text" class="form-control" id="datepicker" name="birth_at" readonly placeholder="Дата рождения" value="{{ $user->birth_at }}">
                </div>

            </div>
            <button type="button" class="btn btn-success mr-2" id="profile-submit-b" form="profile-update-form">Изменить</button>
        </form>
    </div>
</div>