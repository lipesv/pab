<?php

// Includes
include_once 'Util/UploadException.php';

// Uploader class for uploading files
class Uploader {
	
	// Fields
	private $filename;
	private $fileData;
	private $destination;
	private $errorMessage;
	private $errorCode;
	
	private $mimeTypes = array (
			'image/x-jg' => 'art',
			'image/bmp' => 'bm',
			'image/bmp' => 'bmp',
			'image/x-windows-bmp' => 'bmp',
			'image/vnd.dwg' => 'dwg',
			'image/x-dwg' => 'dwg',
			'image/vnd.dwg' => 'dxf',
			'image/x-dwg' => 'dxf',
			'image/fif' => 'fif',
			'image/florian' => 'flo',
			'image/vnd.fpx' => 'fpx',
			'image/vnd.net-fpx' => 'fpx',
			'image/g3fax' => 'g3',
			'image/gif' => 'gif',
			'image/x-icon' => 'ico',
			'image/ief' => 'ief',
			'image/ief' => 'iefs',
			'image/jpeg' => 'jfif',
			'image/pjpeg' => 'jfif',
			'image/jpeg' => 'jfif-tbnl',
			'image/jpeg' => 'jpe',
			'image/pjpeg' => 'jpe',
			'image/jpeg' => 'jpeg',
			'image/pjpeg' => 'jpeg',
			'image/jpeg' => 'jpg',
			'image/pjpeg' => 'jpg',
			'image/x-jps' => 'jps',
			'image/jutvision' => 'jut',
			'image/vasa' => 'mcf',
			'image/naplps' => 'nap',
			'image/naplps' => 'naplps',
			'image/x-niff' => 'nif',
			'image/x-niff' => 'niff',
			'image/x-portable-bitmap' => 'pbm',
			'image/x-pict' => 'pct',
			'image/x-pcx' => 'pcx',
			'image/x-portable-graymap' => 'pgm',
			'image/x-portable-greymap' => 'pgm',
			'image/pict' => 'pic',
			'image/pict' => 'pict',
			'image/x-xpixmap' => 'pm',
			'image/png' => 'png',
			'image/x-portable-anymap' => 'pnm',
			'image/x-portable-pixmap' => 'ppm',
			'image/x-quicktime' => 'qif',
			'image/x-quicktime' => 'qti',
			'image/x-quicktime' => 'qtif',
			'image/cmu-raster' => 'ras',
			'image/x-cmu-raster' => 'ras',
			'image/cmu-raster' => 'rast',
			'image/vnd.rn-realflash' => 'rf',
			'image/x-rgb' => 'rgb',
			'image/vnd.rn-realpix' => 'rp',
			'image/vnd.dwg' => 'svf',
			'image/x-dwg' => 'svf',
			'image/tiff' => 'tif',
			'image/x-tiff' => 'tif',
			'image/tiff' => 'tiff',
			'image/x-tiff' => 'tiff',
			'image/florian' => 'turbot',
			'image/vnd.wap.wbmp' => 'wbmp',
			'image/x-xbitmap' => 'xbm',
			'image/x-xbm' => 'xbm',
			'image/xbm' => 'xbm',
			'image/vnd.xiff' => 'xif',
			'image/x-xpixmap' => 'xpm',
			'image/xpm' => 'xpm',
			'image/png' => 'x-png',
			'image/x-xwd' => 'xwd',
			'image/x-xwindowdump' => 'xwd' 
	);
	
	private $allowedImageExtensions = array (
			'jpg',
			'jpeg' 
	);
	
	// Constructor
	public function __construct($key) {
		$this->filename = $_FILES [$key] ['name'];
		$this->fileData = $_FILES [$key] ['tmp_name'];
		$this->errorCode = $_FILES [$key] ['error'];
	}
	
	// SaveIn Method
	public function saveIn($folder) {
		$this->destination = $folder;
	}
	
	// readyToUpload Method
	private function readyToUpload() {
		
		$folderIsWriteAble = is_writable ( $this->destination );
		
		if ($folderIsWriteAble === false) {
			
			$this->errorMessage = "Error: destination folder is ";
			$this->errorMessage .= "not writable, change permissions";
			
			$canUpload = false;
			
		} elseif ($this->errorCode > 0) {
			throw new UploadException ( $this->errorCode );
			$canUpload = false;
		} else {
			
			$ext = strtolower ( substr ( strrchr ( $this->filename, "." ), 1 ) );
			$file_info = getimagesize ( $this->fileData );
			
			// Not an Image?
			if (empty ( $file_info )) {
				$this->errorMessage = "The uploaded file doesn't seem to be an image.";
				$canUpload = false;
			} else {
				
				$extension = null;
				
				// An Image?
				$file_mime = $file_info ['mime'];
				
				if ($ext == 'jpg' || $ext == 'jpeg') {
					$extension = $ext;
				}
				
				if ($this->mimeTypes [$file_mime] == 'jpg' || $this->mimeTypes [$file_mime] == 'jpeg') {
					$extension = $this->mimeTypes [$file_mime];
				}
				
				if (! $extension) {
					if (! in_array ( $ext, $this->allowedImageExtensions)) {
						
						$exts = implode ( ', ', $this->allowedImageExtensions );
						$this->errorMessage = "You must upload a file with one of the following extensions: " . $exts;
						
						$canUpload = false;
					}
				} else {
					$this->filename = substr ( $this->filename, 0, - strlen ( $extension ) ) . $extension;
					$canUpload = true;
				}
			}
		}
		
		return $canUpload;
	}
	
	// save Method
	public function save() {
		if ($this->readyToUpload ()) {
			move_uploaded_file ( $this->fileData, "$this->destination/$this->filename" );
		} else {
			$exc = new Exception ( $this->errorMessage );
			throw $exc;
		}
	}
}