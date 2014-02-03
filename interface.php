<?php
	interface __FileBrowser {
		/**
		 * Construct
		 *
		 * @param string $rootPath Directory path to list files
		 * @param string $currentPath Current directory path to list files - will default to $rootPath if null
		 * @param array  $extensionFilter Array of file extensions to filter - will not apply a filter if empty
		 */
		function __construct($rootPath, $currentPath = null, array $extensionFilter = array());

		/**
		 * Set private root path
		 */
		function SetRootPath($rootPath);

		/**
		 * Set private current path
		 */
		function SetCurrentPath($currentPath);

		/**
		 * Set private extension filter
		 */
		function SetExtensionFilter(array $extensionFilter);

		/**
		 * Get files using currently-defined object properties
		 * @return array Array of files within the current directory
		 */
		function Get();
	}