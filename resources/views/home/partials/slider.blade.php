<div id="news" class="scrollable">
    <ul class="items">
    	@foreach($slides as $slide)
        <li id="">
        	@if($slide->type() === 'SHOW')
		        <div class="message" style="{{ $slide->textStyle() }}">{{ $slide->displayText() }}</span></div>
		        <div style="position: absolute;">
			        <img class="newsimg border" src="{{ secure_asset('img/slider/' . $slide->image()) }}">
		        </div>
	        @endif
        	@if($slide->type() === 'EVENT')
		    	<div style="position: absolute;">
		    		@if ($show->url !== null)
		    		<a href='{{ $slide->url() }}'>
			    		<img class="newsimg border" src="{{ secure_asset('img/events/' . $slide->image()) }}">
		    		</a> 
		    		@else
			    		<img class="newsimg border" src="{{ secure_asset('img/events/' . $slide->image()) }}">
		    		@endif
		    	</div>
	    	@endif
        </li>
        @endforeach
    </ul>
    <div style="clear:both;"></div>
    <div class="navi">
    	<div href="#first" class="border white"></div>
    	<div href="#second" class="border white"></div>
    	<div href="#third" class="border white"></div>
    	<div href="#fourth" class="border white"></div>
    </div>
</div>