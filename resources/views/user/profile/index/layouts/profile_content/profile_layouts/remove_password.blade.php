<div class="col-12 col-sm-8 col-md-10 d-f ai-c jc-s">
    <form class="prof-check d-f fd-c" method="post" action="{{ asset(app()->getLocale().'/customer/profile') }}" id="profile-pas-edit-form" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="action" value="password">
        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Новый пароль">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password_confirmation" placeholder="Подтвердить">
        </div>

        <div class="t-c mt-4 mb-4 d-f jc-c">
            <button type="button" class="cl-w btn-profile" id="profile-pas-edit-submit" form="profile-pas-edit-form">Сохранить</button>
        </div>

        <div class="t-c d-f jc-c">
            <button type="button" class="btn-form btn-profile cl-w" data-close="remove-password" data-open="profile-user">Отменить</button>
        </div>
    </form>
</div>