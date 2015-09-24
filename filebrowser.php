<?php
	require_once('interface.php');

	class FileBrowser implements __FileBrowser {
        var $rootPath;
        var $currentPath;
        var $extensionFilter;

        function __construct($rootPath, $currentPath = null, array $extensionFilter = array()){
            $this->rootPath = $rootPath;
            if($currentPath){
                $this->currentPath = $currentPath;
            }else{
                $this->currentPath =  $this->rootPath;
            }
            $this->extensionFilter = $extensionFilter;
        }

        function SetRootPath($rootPath){
            $this->rootPath = $rootPath;
        }
        function SetCurrentPath($currentPath){
                $this->currentPath = $currentPath;
        }
        function SetExtensionFilter(array $extensionFilter){
            $this->extensionFilter = $extensionFilter;
        }

        /**
         * Get files using currently-defined object properties
         * @return array Array of files within the current directory
         */
        function Get()
        {
            $csv_extensions = implode(",", $this->extensionFilter);
            $dirs = array();
            $files = array();
            $alldirs = glob("$this->currentPath/*", GLOB_ONLYDIR);
            foreach($alldirs as $key=>$dir){
                $dirs[$key]['name'] = basename($dir);
                $dirs[$key]['path'] = $dir;
            }
            $allfiles = glob("$this->currentPath/*.{{$csv_extensions}}", GLOB_BRACE);
            foreach($allfiles as $key=>$file){
                $files[$key]['name'] = basename($file);
                $files[$key]['path'] = $file;
            }
            $contents['files'] = $files;
            $contents['dirs'] = $dirs;

            return $contents;
        }

        function Up(){
            if($this->currentPath == $this->rootPath){
                return;
            }else{
                echo $this->currentPath = dirname($this->currentPath);
            }
        }


    }