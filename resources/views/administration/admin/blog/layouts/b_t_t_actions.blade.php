@if($btheme->show_on == 1)
    <a class="text-danger mr-2 btheme-toggle" rel="nofollow" data-url="{{ asset(app()->getLocale().'/admin/blog/themes?action=unpublic&theme_id='.$btheme->id) }}" title="Вывести из публикации тему новостей"><i class="fa fa-power-off fa-2x"></i></a>
@else
    <a class="text-success mr-2 btheme-toggle" rel="nofollow" data-url="{{ asset(app()->getLocale().'/admin/blog/themes?action=public&theme_id='.$btheme->id) }}" title="Опубликовать тему новостей"><i class="fa fa-power-off fa-2x"></i></a>
@endif

<a class="text-warning" href="{{ asset(app()->getLocale().'/admin/blog/themes/'.$btheme->id.'/edit') }}" title="Редактировать тему"><i class="fa fa-edit fa-2x"></i></a>