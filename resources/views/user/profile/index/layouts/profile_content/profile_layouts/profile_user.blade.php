<div class="col-12 d-f ai-c jc-c fd-c mt-3">
    <div class="d-f fd-c jc-c ai-c">
        <div class="mb-2">
            {{ ($user->name != null) ? $user->name .' '.$user->surname : $user->email }}
        </div>
        <div class="mb-2">
            {{ $user->email }}
        </div>
    </div>
    <div class="remove-data mb-2 d-f jc-c w-1p">
        <button type="button" class="btn-form btn-profile cl-w" data-open="remove-profile" data-close="profile-user">Редактировать</button>
    </div>
    <div class="remove-password d-f jc-c w-1p">
        <button type="button" class="btn-form btn-profile cl-w" data-open="remove-password" data-close="profile-user">Изменить пароль</button>
    </div>
</div>
