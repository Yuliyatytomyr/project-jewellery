@if($slider->show_on == 1)
    <a class="text-danger mr-2 f-slider-toggle" rel="nofollow" data-url="{{ asset(app()->getLocale().'/admin/settings/content/home/f-sliders/'.$slider->id.'?action=off') }}" title="Вывести из публикации слайд"><i class="fa fa-power-off fa-2x"></i></a>
@else
    <a class="text-success mr-2 f-slider-toggle" rel="nofollow" data-url="{{ asset(app()->getLocale().'/admin/settings/content/home/f-sliders/'.$slider->id.'?action=on') }}" title="Опубликовать слайд"><i class="fa fa-power-off fa-2x"></i></a>
@endif

<a class="text-warning" href="{{ asset(app()->getLocale().'/admin/settings/content/home/f-sliders/'.$slider->id.'/edit') }}" title="Редактировать слайд"><i class="fa fa-edit fa-2x"></i></a>