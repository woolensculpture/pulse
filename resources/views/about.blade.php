@extends('layouts.master')

@section('content')
<div id="about_wrap" class="border general_wrap">
    <div class="about_section">
        <p class="large_header about_header" style="text-decoration:underline">The Station</p>
            <p style="font-family:Tahoma">WITR 89.7 is a collaborative radio station run by students with a love of music 
				and a desire to foster a community that shares in this passion. WITR is the 
				authoritative source of new and undiscovered music, providing the public with a 
				unique media experience and serving as a public face of the Rochester Institute of Technology. 
				WITR is fueled by passion. Our students pride themselves on being a
				progressive and evolving station that constantly pushes the boundaries of 
				music and extends its potential as an organization.
            </p>
    </div>
	
    <div class="about_section" id="about_center">
        <p class="large_header about_header" style="text-decoration:underline">The Music</p>
        <p style="font-family:Tahoma"> WITR strives to be the best student-run and operated radio station in the
			country. Our DJs are exceptional at what they do, seeking out talented, 
			emerging artists and providing listeners with a unique listening experience 
			across all genres. WITR is your source for new and upcoming music.
        </p>
    </div>
    <div class="about_section">
        <p class="large_header about_header" style="text-decoration:underline">Community &amp; Culture</p>
        	<p style="font-family:Tahoma">WITR is a family of hard-working and diverse students. It breeds leaders with 
				strong character who seek to meaningfully impact the world around them. 
				Unified by their love of the station, our members form deep bonds and create 
				a mutually supportive environment of self-expression and personal growth.
			</p>
    </div>
    <div style="clear:both" ></div>
    <div style="text-align:center"> <a href="{{ secure_asset('eeoWITR.pdf') }}"> WITR is an Equal Employment Opportunity organization </a> </div>
</div>
@stop
