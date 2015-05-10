<?php namespace WITR;

use File;
use Carbon\Carbon;

trait FileUploadTrait
{
	public function uploadFile($attribute, $file)
	{
		$existingFile = $this->getAttribute($attribute);
		if ($existingFile != null && $existingFile != '') 
		{
			File::delete(public_path() . $this->uploadDirectories[$attribute] . $this->attributes[$attribute]);
		}

		$filename = Carbon::now()->timestamp . '-' . $file->getClientOriginalName();
		$file->move(public_path() . $this->uploadDirectories[$attribute], $filename);
		$this->attributes[$attribute] = $filename;
	}
}
