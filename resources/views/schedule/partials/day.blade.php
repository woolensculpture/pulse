<li class="block">
    <div class="block_time">{{ $show->timespan() }}</div>
	<div class="show_details">
    	<img src="{{ secure_asset('img/shows/' . $show->showPicture()) }}" alt="WITR" />
        <p>
            <span>{{ $show->show() }} WITH {{ $show->dj() }}</span><br>
			{{ $show->showDescription() }}
        </p>
		<img src="{{ secure_asset('img/shows/' . $show->djPicture()) }}" />
    </div>
</li>