<?php

function initLang()
{
$lang=array();

/**
 * lang
 * 
 * Translate the phrases used within the system
 */
$lang["filename"] = "Filename";
$lang["last_modified"] = "Last Modified";
$lang["size"] = "Size";
$lang["index_of"] = "Index of";
$lang["directories"] = "Directories";
$lang["files"] = "File(s)";
$lang["parent_dir"] = "Parent Directory";

return $lang;
}

function initConfig()
{
$configmd=array();
/**
 * Index Config
 * 
 * class_root
 * 
 * Put the location of the class file (syn_class.php)
 * i.e. if its in this directory, make it empty
 * if its in the directory below, put "../"
 * if its in a directory above called "classes", put "classes/"
 * if its in a directory below this one called "classes", put "../classes/"
 * if its in /var/www/classes/ then put that
 */
$configmd["class_root"] = "http://localhost/simplealbum/application/libraries/synDirectory-master";

$configmd["directory"]="C:/wamp/www/simplealbum/application/models/md";

/**
 * lang
 * 
 * Translate the phrases used within the system
 */
$lang["filename"] = "Filename";
$lang["last_modified"] = "Last Modified";
$lang["size"] = "Size";
$lang["index_of"] = "Index of";
$lang["directories"] = "Directories";
$lang["files"] = "File(s)";
$lang["parent_dir"] = "Parent Directory";

/**
 * show_dir
 * 
 * Do you want to show directories that are within the current one ?
 */
$configmd["show_dir"] = true;

/**
 * show_parent_dir
 * 
 * Do you want to show the parent directory link ".." ?
 */
$configmd["show_parent_dir"] = true;

/**
 * show_files
 * 
 * Do you want to show files that are within the current directory?
 */
$configmd["show_files"] = true;

/**
 * show_file_extensions
 * 
 * Do you want to show file extensions?
 */
$configmd["show_file_extensions"] = true;

/**
 * show_icons
 * 
 * Do you want to show the default icons?
 */    
$configmd["show_icons"] = true;

/**
 * show_size
 * 
 * Do you want to show file sizes?
 */
$configmd["show_size"] = true;

/**
 * show_last_modified
 * 
 * Do you want to show file modification date?
 */
$configmd["show_last_modified"] = true;

/**
 * show_only
 * 
 * An array of file extensions that you want only to display
 *
 * Uncomment the lines below to only show mp3 and txt files
 * to show only more types, just add new lines with different extensions
 */

# $configmd["show_only"][] = "mp3";
#$configmd["show_only"][] = "txt";

/**
 * show_header
 * 
 * Do you want to show the directory header?
 * i.e. "Index of /downloads/files/"
 */
$configmd["show_header"] = true;

/**
 * show_dir_statistics
 * 
 * Do you want to show directory statistics? (number of files, total filesize etc)
 */
$configmd["show_dir_statistics"] = true;

/**
 * show_server_info
 * 
 * Do you want to show server info?
 * i.e. "Apache/1.3.33 Server at example.com Port 80"
 * Note, on some servers, this info is empty. So it will not show up.
 */
$configmd["show_server_info"] = true;

return $configmd;
}
/**
 * @name SYN Directory Listing (Simple Yet Nifty)
 * @desc Directory Listing Class
 * 
 *  With this file and the original wd_class.php that came with the package you can make
 *  a nice simple listing of what is in that directory.
 *  
 *  You can also sort by name, filesize and filetype (both ascending and descending)
 *  by clicking on the Topmost icon, "Filename" or "Size"
 *   
 * @author Olafur Waage, olafurw@gmail.com
 * @credits, Icons made by Mark James ( http://www.famfamfam.com/lab/icons/silk/ ) 
 * 
 * Distributed under the terms of the MIT License
 */

/**
 * This includes the class files
 *  
 * You can put the config file in another directory, then you'd only need to point
 * this 1st include to that directory, ie. include("../config.php"); if its in the
 * parent directory or include("class/config.php"); if its in the class directory
 */
 
/**
 * The main class call, this is and the includes above are the only thing needed
 * to display the directory listing.
 */
 
 //echo base_url('application/libraries/synDirectory-master/config.php');
 
 //include_once(base_url('application/libraries/synDirectory-master/config.php'));
 //include_once(base_url('application/libraries/synDirectory-master/syn_class.php'));
 
 /**
 * @name SYN Directory Listing (Simple Yet Nifty)
 * @desc Directory Listing Class
 * 
 *  With this file and the original index.php that came with the package you can make
 *  a nice simple listing of what is in that directory.
 *  
 *  You can also sort by name, filesize and filetype (both ascending and descending)
 *  by clicking on the Topmost icon, "Filename" or "Size"
 *   
 * @author Olafur Waage, olafurw@gmail.com
 * @credits, Icons made by Mark James ( http://www.famfamfam.com/lab/icons/silk/ ) 
 * 
 * Distributed under the terms of the MIT License
 */ 
//class synDirectory
//{	
	/**
	 * Outputs the main directory table, this can be customized if you know php a little.
	 * 
	 * This function needs the array that the function synDir makes if you are going to call it.
	 * Look at index.php for an example on how its done.
	 *
	 * @param array $array
	 * @return HTML table
	 */
//	function __construct()
	function display_md()
	{
		//global $dSize, $fCount, $dCount, $lang, $configmd;
		global $dSize, $fCount, $dCount;
		$configmd=initConfig();
		$lang=initLang();
		
		//$array = $this->synDir();
		$array = synDir();
		
		/**
		 * Prints out the directory name, i.e. "Index of /downloads/sources/"
		 */
		// if(isset($configmd["show_header"]) && $configmd["show_header"] == true)
		// {
			// echo "<b class='synHeader'>".$lang["index_of"]." ".$this->getDirName()."</b><br /><br />";
		// }
			
		/**
		 * This section of code is the first two lines of the table, the header and the "Parent Directory" line.
		 */
		?>
		<table class="synTable">
			<tr class="synTopTr">
				<td class="synTopTd"><a href="?sort=filetype&in=<?php if((isset($_GET["sort"]) && $_GET["sort"] == "filetype" && isset($_GET["in"]) && $_GET["in"] == "asc") || !$_GET){ echo "desc"; }else{ echo "asc"; } ?>"><b>T</b></a></td>
				<td class="synTopTd"><a href="?sort=filename&in=<?php if((isset($_GET["sort"]) && $_GET["sort"] == "filename" && isset($_GET["in"]) && $_GET["in"] == "asc") || !$_GET){ echo "desc"; }else{ echo "asc"; } ?>"><b><?php echo $lang["filename"]; ?></b></a></td>
				<?php
					if(isset($configmd["show_last_modified"]) && $configmd["show_last_modified"] == true)
					{
						?>
							<td class="synTopTd" align="right"><a href="?sort=modified&in=<?php if((isset($_GET["sort"]) && $_GET["sort"] == "modified" && isset($_GET["in"]) && $_GET["in"] == "asc") || !$_GET){ echo "desc"; }else{ echo "asc"; } ?>"><b><?php echo $lang["last_modified"]; ?></b></a></td>
						<?php
					}

					if(isset($configmd["show_size"]) && $configmd["show_size"] == true)
					{
						?>
							<td class="synTopTd" width="10"></td>
							<td class="synTopTd" align="right"><a href="?sort=size&in=<?php if((isset($_GET["sort"]) && $_GET["sort"] == "size" && isset($_GET["in"]) &&  $_GET["in"] == "asc") || !$_GET){ echo "desc"; }else{ echo "asc"; } ?>"><b><?php echo $lang["size"]; ?></b></a></td>
						<?php
					}
				?>
			</tr>
			<?php

			if(isset($configmd["show_parent_dir"]) && $configmd["show_parent_dir"] == true)
			{
				?>
					<!--tr class="synParentTr">
					<td class="synParentTd">
					<?php
						if(isset($configmd["show_icons"]) && $configmd["show_icons"] == true)
						{
							?>
								<img src="<?php echo $configmd["class_root"]; ?>folder_go.png" />
							<?php
						}
					?>
					</td>
					<td class="synParentTd">
					<a href=".."><?php echo $lang["parent_dir"]; ?></a>
					</td>
					<?php
					if(isset($configmd["show_last_modified"]) && $configmd["show_last_modified"] == true)
					{
						?>
							<td class="synParentTd" align="right">
							-
							</td>
						<?php
					}

					if(isset($configmd["show_size"]) && $configmd["show_size"] == true)
					{
						?>
							<td class="synParentTd" width="10"></td>
							<td class="synParentTd" align="right">
							-
							</td>
						<?php
					}
					?>
					</tr-->
				<?php
			}
		  	
		$line = 0;
		
		/**
		 * This section of code loops through all the directories that are found within this one.
		 */
		if(isset($array[0]) && is_array($array[0]) && isset($configmd["show_dir"]) && $configmd["show_dir"] == true)
		{
			foreach($array[0] as $dirData)
			{
				$dirData=$configmd["directory"].DIRECTORY_SEPARATOR.$dirData;
				?>
				<tr class="synFolderTr<?php echo $line % 2?>">
				<td class="synFolderTd">
				<?php
				if(isset($configmd["show_icons"]) && $configmd["show_icons"] == true)
				{
					?>
						<img src="<?php echo $configmd["class_root"]."folder.png"; ?>" />
					<?php
				}
				?>
				</td>
				<td class="synFolderTd">
				<a href="<?php echo $dirData; ?>"><?php echo $dirData; ?></a>
				</td>
				<?php
				if(isset($configmd["show_last_modified"]) && $configmd["show_last_modified"] == true)
				{
					?>
					<td class="synFolderTd" align="right">
						<?php echo date("d-M-Y H:i.s", filemtime($dirData)); ?>
					</td>
					<?php
				}

				if(isset($configmd["show_size"]) && $configmd["show_size"] == true)
				{
					?>
						<td class="synParentTd" width="10"></td>
						<td class="synParentTd" align="right">
						-
						</td>
					<?php
				}
				?>
				</tr>
				<?php

				$line++;

				if(isset($configmd["show_dir_statistics"]) && $configmd["show_dir_statistics"] == true)
				{
					$dCount = $dCount + 1;
				}
			}		  	
		}
		
		if($line % 2 == 1)
		{
			$line = 1;
		}
		
		/**
		 * This section of code loops through all the files that are found within this directory.
		 */
		if(isset($array[1]) && is_array($array[1]) && isset($configmd["show_files"]) && $configmd["show_files"] == true )
		{  
			foreach($array[1] as $fileKey => $fileData)
			{
			$realFileData=$configmd["directory"].DIRECTORY_SEPARATOR.$fileData;
				?>
				<tr class="synFileTr<?php echo $line % 2?>">
				<td class="synFileTd">
				<?php
				if(isset($configmd["show_icons"]) && $configmd["show_icons"] == true)
				{
					?>
						<img src="<?php echo iconImage($realFileData); ?>" />
					<?php
				}
				?>
				</td>
				<td class="synFileTd">
				<a href="<?php echo $realFileData; ?>"><?php echo showFileExtension($fileData); ?></a>
				</td>
				<?php
				if(isset($configmd["show_last_modified"]) && $configmd["show_last_modified"] == true)
				{
					?>
					<td class="synFileTd" align="right">
						<?php echo date("d-M-Y H:i.s", filemtime($realFileData)); ?>
					</td>
					<?php
				}

				if(isset($configmd["show_size"]) && $configmd["show_size"] == true)
				{
					?>
					<td class="synFileTd" width="10"></td>
					<td class="synFileTd" align="right">
						<?php echo fileSizeCalc($realFileData); ?>
					</td>
					<?php
				}
				?>
				</tr>
				<?php

				$line++;

				if(isset($configmd["show_dir_statistics"]) && $configmd["show_dir_statistics"] == true)
				{
					$dSize += filesize($realFileData);
					$fCount = $fCount + 1;
				}
			}
		}
		
		/**
		 * Misc statistics about the directory
		 */
		if(isset($configmd["show_dir_statistics"]) && $configmd["show_dir_statistics"] == true)
		{
			?>
			<tr class="synFooterTr">
			<td class="synFooterTd" colspan="2"><?php echo ($dCount + 0)." ".$lang["directories"].", ".($fCount + 0)." ".$lang["files"]; ?></td>
			<?php
			if(isset($configmd["show_size"]) && $configmd["show_size"] == true)
			{
				?>
					<td class="synFooterTd" colspan="3" align="right"><?php echo ($fCount > 0 ? byteConvert($dSize) : ""); ?></td>
				<?php
			}
			?>
			</tr>
			<?php
		}
		
		echo "</table>";
		
		/**
		 * Prints out misc server info, i.e. "Apache/1.3.33 Server at example.com Port 80"
		 */
		if(isset($configmd["show_server_info"]) && $configmd["show_server_info"] && $_SERVER['SERVER_SIGNATURE'] != "")
		{
			echo '<p class="serverInfo">'.$_SERVER['SERVER_SIGNATURE'].'</p>';
		}
	}
	

	/* ################################################# */
	/**
	 * Only edit the functions below if you are knowledgeable in php
	 */
	/* ################################################# */

	/**
	 * Converts bytes into human readable form
	 *
	 * @param int $bytes
	 * @return parsed string
	 */
	function byteConvert($bytes)
	{
		if($bytes == 0)
		{
			return "0 B";
		}
		
		$s = array('B', 'Kb', 'MB', 'GB', 'TB', 'PB');
		$e = floor(log($bytes) / log(1024));
		
		return sprintf('%.2f '.$s[$e], ($bytes / pow(1024, floor($e))));
	}

	/**
	 * @desc File size calculator and parser
	 * 
	 * @return string, Returns the filesize in a human readable form
	 */ 
	function fileSizeCalc($filename)
	{
		return byteConvert(filesize($filename));
	}

	function getDirName()
	{
		$self = substr(strrchr($_SERVER['SCRIPT_NAME'],'/'), 1);
		$strpos = strrpos($_SERVER['SCRIPT_NAME'], $self);

		$cuttofmark = strlen($_SERVER['SCRIPT_NAME']) - $strpos;
		$cuttofminus = '-'.$cuttofmark;

		return substr($_SERVER['SCRIPT_NAME'], 0, intval($cuttofminus));
	}
	  
	/**
	 * If the config file is set for this, it will
	 * display the filename without the extension. Else it will
	 * display the full name
	 */	 	 	   
	function showFileExtension($filename)
	{
		global $configmd;

		/* modifies the $entry so only the filename appears */
		if(isset($configmd["show_file_extensions"]) && $configmd["show_file_extensions"] == true)
		{
			return $filename;
		}
		else
		{
			return substr($filename, 0, strpos($filename, "."));
		}
	}
	
	/**
	 * Returns if the entry is in the blacklist
	 */
	function isEntryInBlacklist($entry)
	{
		$entry = strtolower($entry);
		
		if($entry == "." || $entry == ".." || $entry == "index.php" || $entry == "config.php" || $entry == "syn_class.php" || 
		   $entry == "syn_style.css" || $entry == "avi.png" || $entry == "control_repeat.png" || $entry == "doc.png" || $entry == "exe.png" || 
		   $entry == "folder.png" || $entry == "folder_go.png" || $entry == "html.png" || $entry == "jpg.png" || 
		   $entry == "mp3.png" || $entry == "page_white.png" || $entry == "pdf.png" || $entry == "php.png" || $entry == "ppt.png" || 
		   $entry == "xls.png" || $entry == "zip.png" || $entry == "syndirectory.txt" || $entry == "txt.png")
		{
			return true;
		}
		
		return false;
	}

	/**
	* @desc Directory Array Generator 
	* 
	* @return array, Based on what is selected with $_GET or if $_GET is selected at all  
	* The array returned includes the files that are in the directory 
	*/ 
	function synDir()
	{
		//global $configmd;
		
		$configmd=initConfig();
		$lang=initLang();
		//$iterator = new DirectoryIterator(getcwd());
		$iterator = new DirectoryIterator($configmd["directory"]);
		
		// Reads the directory and outputs into a simple array what we have in it.
		// Excluding the items in the first if sentance.
		$files = array();
		$dirs = array();
		
		$i = 0;
		
		foreach($iterator as $entry)
		{
			$entryName = $entry->getFilename();
			
			// If the file is not on the blacklist
			//if(!$this->isEntryInBlacklist($entryName))
			if(!isEntryInBlacklist($entryName))
			{
				if($entry->getType() == "dir")
				{
					if(isset($configmd["show_last_modified"]) && $configmd["show_last_modified"] == true && isset($_GET["sort"]) && $_GET["sort"] == "modified")
					{
						$dirs[$entry->getMTime().".0".$i] = $entryName;
					} 
					else
					{
						$dirs[] .= $entryName;
					}
				}
				else
				{
					// If the show only configure is not set, or if it's set and the file extension is in the show only array
					if(!isset($configmd["show_only"]) || 
					   (isset($configmd["show_only"]) && is_array($configmd["show_only"]) && in_array(substr(strrchr($entry, "."), 1), $configmd["show_only"])))
					{
						if(isset($configmd["show_size"]) && $configmd["show_size"] == true && isset($_GET["sort"]) && $_GET["sort"] == "size")
						{
							$entryFilesizeIndex = $entry->getSize().".0".$i;

							if(isset($files[$entryFilesizeIndex]))
							{
								$files[$entryFilesizeIndex] .= $entryName;
							}
							else
							{
								$files[$entryFilesizeIndex] = $entryName;
							}
						}
						elseif(isset($_GET["sort"]) && $_GET["sort"] == "filetype")
						{
							$fileExtension = substr(strrchr($entryName, "."), 1);
							$fileExtension = strtolower($fileExtension);
							
							if(isset($files[$fileExtension.$entryName]))
							{
								$files[$fileExtension.$entryName] .= $entryName;
							}
							else
							{
								$files[$fileExtension.$entryName] = $entryName;
							}
						} 
						elseif(isset($configmd["show_last_modified"]) && $configmd["show_last_modified"] == true && isset($_GET["sort"]) && $_GET["sort"] == "modified") 
						{
							$files[filemtime($entryName).".0".$i] = $entryName;
						}
						else 
						{
							$files[] .= $entryName;
						}
					}
				}
			}
			
			$i++;
		}

		if(isset($dirs) && !is_array($dirs) && isset($files) && !is_array($files))
		{
			return false;
		}

		// Returns an array with filenames and directory names and file sizes
		// Sorted by filename
		if(isset($_GET["sort"]) && $_GET["sort"] == "filename" || !isset($_GET["sort"]))
		{
			if((isset($_GET["in"]) && $_GET["in"] == "asc") || !isset($_GET["sort"]))
			{
				if(is_array($files))
				{
					asort($files, SORT_STRING);
				}
				
				if(isset($dirs) && is_array($dirs))
				{
					asort($dirs, SORT_STRING);
				}
			}

			if(isset($_GET["in"]) && $_GET["in"] == "desc")
			{
				if(is_array($files))
				{
					arsort($files, SORT_STRING);
				}
				
				if(isset($dirs) && is_array($dirs))
				{
					arsort($dirs, SORT_STRING);
				}
			}

			return array($dirs, $files);
		}

		// Returns an array with filenames and directory names and file sizes
		// Sorted by filesize
		if($configmd["show_size"] == true && $_GET["sort"] == "size")
		{
			if($_GET["sort"] == "size" && $_GET["in"] == "asc")
			{
				if(is_array($files))
				{
					ksort($files, SORT_NUMERIC);
				}
				
				if(is_array($dirs))
				{
					asort($dirs, SORT_STRING);
				}
			}

			if($_GET["sort"] == "size" && $_GET["in"] == "desc")
			{
				if(is_array($files))
				{
					krsort($files, SORT_NUMERIC);
				}
				
				if(is_array($dirs))
				{
					asort($dirs, SORT_STRING);
				}
			}

			return array($dirs, $files); 
		}

		// Returns an array with filenames and directory names and file sizes
		// Sorted by filetype
		if($_GET["sort"] == "filetype")
		{
			if($_GET["sort"] == "filetype" && $_GET["in"] == "asc")
			{
				if(is_array($files))
				{
					ksort($files, SORT_STRING);
				}
				
				if(is_array($dirs))
				{
					asort($dirs, SORT_STRING);
				}
			}

			if($_GET["sort"] == "filetype" && $_GET["in"] == "desc")
			{
				if(is_array($files))
				{
					krsort($files, SORT_STRING);
				}
				
				if(is_array($dirs))
				{
					asort($dirs, SORT_STRING);
				}
			}

			return array($dirs, $files);
		}

		// Returns an array with filenames and directory names and file sizes
		// Sorted by file last modified unixtime
		if($configmd["show_last_modified"] == true && $_GET["sort"] == "modified")
		{
			if($_GET["sort"] == "modified" && $_GET["in"] == "asc")
			{
				if(is_array($files))
				{
					ksort($files, SORT_NUMERIC);
				}
				
				if(is_array($dirs))
				{
					ksort($dirs, SORT_NUMERIC);
				}
			}

			if($_GET["sort"] == "modified" && $_GET["in"] == "desc")
			{
				if(is_array($files))
				{
					krsort($files, SORT_NUMERIC);
				}
				
				if(is_array($dirs))
				{
					krsort($dirs, SORT_NUMERIC);
				}
			}

			return array($dirs, $files);
		}
	}
  

	/**
	* @desc Image File extension
	* @param $filename, string. The filename to be checked out what image to use based on its extension 
	* 
	* @return string, Returns the image filename corresponding to the filename parameter
	*/ 
	function iconImage($filename)
	{
		global $configmd;

		$fileExtension = substr($filename, -4, 4);
		$fileExtension = strtolower($fileExtension);

		switch($fileExtension) 
		{
			case ".mp3":
			case ".wav":
				$fileImage = "mp3.png";
			break;
			
			case ".jpg":
			case "jpeg":
			case ".gif":
			case ".png":
			case ".bmp":
				$fileImage = "jpg.png";
			break;
			
			case ".zip":
			case ".rar":
				$fileImage = "zip.png";
			break;
			
			case ".avi":
			case ".mpg":
			case "mpeg":
			case ".wmv":
			case "divx":
			case ".mov":
			case ".swf":
				$fileImage = "avi.png";
			break;
			
			case ".exe":
			case ".bat":
				$fileImage = "exe.png";
			break;
			
			case ".pdf":
				$fileImage = "pdf.png";
			break;
			
			case ".htm":
			case "html":
				$fileImage = "html.png";
			break;
			
			case ".txt":
				$fileImage = "txt.png";
			break;
			
			case ".php":
				$fileImage = "php.png";
			break;
			
			case ".doc":
				$fileImage = "doc.png";
			break;
			
			case ".xls":
				$fileImage = "xls.png";
			break;
			
			case ".ppt":
				$fileImage = "ppt.png";
			break;
			
			default:
				$fileImage = "page_white.png";
		}

		return $configmd["class_root"].$fileImage;
	}
//}

display_md();
 
//$output = new synDirectory();