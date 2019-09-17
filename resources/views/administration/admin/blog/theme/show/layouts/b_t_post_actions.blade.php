@if($btpost->show_on == 1)
    <a class="text-danger mr-2 btpost-toggle" rel="nofollow" data-url="{{ asset(app()->getLocale().'/admin/blog/posts?action=unpublic&btpost_id='.$btpost->id) }}" title="Вывести из публикации новость"><i class="fa fa-power-off fa-2x"></i></a>
@else
    <a class="text-success mr-2 btpost-toggle" rel="nofollow" data-url="{{ asset(app()->getLocale().'/admin/blog/posts?action=public&btpost_id='.$btpost->id) }}" title="Опубликовать новость"><i class="fa fa-power-off fa-2x"></i></a>
@endif

<a class="text-warning" href="{{ asset(app()->getLocale().'/admin/blog/posts/'.$btpost->id.'/edit') }}" title="Редактировать новость"><i class="fa fa-edit fa-2x"></i></a>