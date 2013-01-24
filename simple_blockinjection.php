<?php

/* ===============================================================================
 * 
 * 
 * SCRIPT PARA VARRER VARIÁVEIS DO SISTEMA E TENTAR BLOQUEAR INJECTION E XSS
 * 
 * Insira a chamada para esse script no parâmetro 'auto-prepend' no php.ini ou .htaccess
 * Mais informações: http://www.maheshchari.com/php-auto-append-prepend-file-using-htaccess/
 * 
 * Autor: Octávio Augusto. http://github.com/octaaugusto/simple_blockinjection
 * 
 * 
 * =============================================================================== */


  
/* ===============================================================================
 * 
 * Executa bloqueio e exibe as $badwords encontradas
 * 
 * =============================================================================== */ 
function _executeblock( $msg ){
	
	$msg = addslashes(htmlspecialchars(stripcslashes($msg), ENT_QUOTES));
	
	exit("Inject detect: <b style='color:red'> $msg </b>"); // mais seguro se comentar essa linha toda e não exibir mensagem para ajudar xploiter
	
}
/* =============================================================================== */



/* ===============================================================================
 * 
 * Retorna tipo de arquivo
 * 
 * =============================================================================== */
function _getmimetype( $file ) {
        
		
		// POR ENQUANTO O SCRIPT TESTA APENAS A EXTENSÃO DO ARQUIVO.
        return $filetype = strtolower(substr(strrchr( $file, '.' ), 1, 3));
        
        /* -------------------------------------------
		 * @todo: Melhorar script e testar mimetype
		 * -------------------------------------------
        
		$mimetypes = array(
                        "ez" => "application/andrew-inset",
                        "atom" => "application/atom+xml",
                        "hqx" => "application/mac-binhex40",
                        "cpt" => "application/mac-compactpro",
                        "doc" => "application/msword",
                        "lha" => "application/octet-stream",
                        "lzh" => "application/octet-stream",
                        "exe" => "application/octet-stream",
                        "so" => "application/octet-stream",
                        "dms" => "application/octet-stream",
                        "class" => "application/octet-stream",
                        "bin" => "application/octet-stream",
                        "dll" => "application/octet-stream",
                        "oda" => "application/oda",
                        "pdf" => "application/pdf",
                        "ps" => "application/postscript",
                        "eps" => "application/postscript",
                        "ai" => "application/postscript",
                        "smi" => "application/smil",
                        "smil" => "application/smil",
                        "mif" => "application/vnd.mif",
                        "xls" => "application/vnd.ms-excel",
                        "ppt" => "application/vnd.ms-powerpoint",
                        "wbxml" => "application/vnd.wap.wbxml",
                        "wmlc" => "application/vnd.wap.wmlc",
                        "wmlsc" => "application/vnd.wap.wmlscriptc",
                        "bcpio" => "application/x-bcpio",
                        "vcd" => "application/x-cdlink",
                        "pgn" => "application/x-chess-pgn",
                        "cpio" => "application/x-cpio",
                        "csh" => "application/x-csh",
                        "dir" => "application/x-director",
                        "dxr" => "application/x-director",
                        "dcr" => "application/x-director",
                        "dvi" => "application/x-dvi",
                        "spl" => "application/x-futuresplash",
                        "gtar" => "application/x-gtar",
                        "gz" => "application/x-gzip",
                        "hdf" => "application/x-hdf",
                        "php" => "application/x-httpd-php",
                        "phps" => "application/x-httpd-php-source",
                        "js" => "application/x-javascript",
                        "skm" => "application/x-koan",
                        "skt" => "application/x-koan",
                        "skp" => "application/x-koan",
                        "skd" => "application/x-koan",
                        "latex" => "application/x-latex",
                        "cdf" => "application/x-netcdf",
                        "nc" => "application/x-netcdf",
                        "sh" => "application/x-sh",
                        "shar" => "application/x-shar",
                        "swf" => "application/x-shockwave-flash",
                        "sit" => "application/x-stuffit",
                        "sv4cpio" => "application/x-sv4cpio",
                        "sv4crc" => "application/x-sv4crc",
                        "tar" => "application/x-tar",
                        "tcl" => "application/x-tcl",
                        "tex" => "application/x-tex",
                        "texi" => "application/x-texinfo",
                        "texinfo" => "application/x-texinfo",
                        "roff" => "application/x-troff",
                        "t" => "application/x-troff",
                        "tr" => "application/x-troff",
                        "man" => "application/x-troff-man",
                        "me" => "application/x-troff-me",
                        "ms" => "application/x-troff-ms",
                        "ustar" => "application/x-ustar",
                        "src" => "application/x-wais-source",
                        "xht" => "application/xhtml+xml",
                        "xhtml" => "application/xhtml+xml",
                        "zip" => "application/zip",
                        "au" => "audio/basic",
                        "snd" => "audio/basic",
                        "midi" => "audio/midi",
                        "kar" => "audio/midi",
                        "mid" => "audio/midi",
                        "mp3" => "audio/mpeg",
                        "mp2" => "audio/mpeg",
                        "mpga" => "audio/mpeg",
                        "aifc" => "audio/x-aiff",
                        "aif" => "audio/x-aiff",
                        "aiff" => "audio/x-aiff",
                        "m3u" => "audio/x-mpegurl",
                        "rm" => "audio/x-pn-realaudio",
                        "ram" => "audio/x-pn-realaudio",
                        "rpm" => "audio/x-pn-realaudio-plugin",
                        "ra" => "audio/x-realaudio",
                        "wav" => "audio/x-wav",
                        "pdb" => "chemical/x-pdb",
                        "xyz" => "chemical/x-xyz",
                        "bmp" => "image/bmp",
                        "gif" => "image/gif",
                        "ief" => "image/ief",
                        "jpe" => "image/jpeg",
                        "jpeg" => "image/jpeg",
                        "jpg" => "image/jpeg",
                        "png" => "image/png",
                        "tif" => "image/tiff",
                        "tiff" => "image/tiff",
                        "djvu" => "image/vnd.djvu",
                        "djv" => "image/vnd.djvu",
                        "wbmp" => "image/vnd.wap.wbmp",
                        "ras" => "image/x-cmu-raster",
                        "pnm" => "image/x-portable-anymap",
                        "pbm" => "image/x-portable-bitmap",
                        "pgm" => "image/x-portable-graymap",
                        "ppm" => "image/x-portable-pixmap",
                        "rgb" => "image/x-rgb",
                        "xbm" => "image/x-xbitmap",
                        "xpm" => "image/x-xpixmap",
                        "xwd" => "image/x-xwindowdump",
                        "igs" => "model/iges",
                        "iges" => "model/iges",
                        "mesh" => "model/mesh",
                        "silo" => "model/mesh",
                        "msh" => "model/mesh",
                        "vrml" => "model/vrml",
                        "wrl" => "model/vrml",
                        "css" => "text/css",
                        "htm" => "text/html",
                        "html" => "text/html",
                        "asc" => "text/plain",
                        "txt" => "text/plain",
                        "rtx" => "text/richtext",
                        "rtf" => "text/rtf",
                        "sgml" => "text/sgml",
                        "sgm" => "text/sgml",
                        "tsv" => "text/tab-separated-values",
                        "wml" => "text/vnd.wap.wml",
                        "wmls" => "text/vnd.wap.wmlscript",
                        "etx" => "text/x-setext",
                        "xml" => "text/xml",
                        "xsl" => "text/xml",
                        "mpe" => "video/mpeg",
                        "mpeg" => "video/mpeg",
                        "mpg" => "video/mpeg",
                        "mov" => "video/quicktime",
                        "qt" => "video/quicktime",
                        "mxu" => "video/vnd.mpegurl",
                        "avi" => "video/x-msvideo",
                        "movie" => "video/x-sgi-movie",
                        "ice" => "x-conference/x-cooltalk"
                         );

        return implode( '', array_keys( array_flip( $mimetypes ), $filetype ));
        */
}
/* =============================================================================== */



/* ===============================================================================
 * 
 * EFETUA TESTES
 * 
 * =============================================================================== */
function _simple_blockinjection(){
	
	
	// ----------------------------------------------
	// Quais variáveis deve testar
	// ----------------------------------------------
	$verify[] = $_GET;
	$verify[] = $_POST;
	$verify[] = $_ENV;
	$verify[] = $_COOKIE;
	$verify[] = $_SERVER;
	
	
	// ----------------------------------------------
	// Quais termos bloquear
	// $PONTOS: 0.5 para testar termos em conjunto, 1 para termo único (crítico)
	// ----------------------------------------------
	
	// GRAVES
	$BADWORD[] = "unlink";
	$PONTOS[] = 1;
	$BADWORD[] = "rmdir";
	$PONTOS[] = 1;
	$BADWORD[] = "fopen";
	$PONTOS[] = 1;
	$BADWORD[] = "fwrite";
	$PONTOS[] = 1;
	$BADWORD[] = "fgets";
	$PONTOS[] = 1;
	$BADWORD[] = "fputs";
	$PONTOS[] = 1;
	$BADWORD[] = "fscanf";
	$PONTOS[] = 1;
	$BADWORD[] = "readfile";
	$PONTOS[] = 1;
	$BADWORD[] = "mkdir";
	$PONTOS[] = 1;
	$BADWORD[] = "rmdir";
	$PONTOS[] = 1;
	
	
	$BADWORD[] = "gzinflate";
	$PONTOS[] = 1;
	$BADWORD[] = "gzinflate";
	$PONTOS[] = 1;
	$BADWORD[] = "base64_encode";
	$PONTOS[] = 1;
	$BADWORD[] = "base64_decode";
	$PONTOS[] = 1;
	$BADWORD[] = "gzwrite";
	$PONTOS[] = 1;
	$BADWORD[] = "gzcompress";
	$PONTOS[] = 1;
	$BADWORD[] = "gzputs";
	$PONTOS[] = 1;
	$BADWORD[] = "file_put_contents";
	$PONTOS[] = 1;
	$BADWORD[] = "http_put_data";
	$PONTOS[] = 1;
	$BADWORD[] = "fputcsv";
	$PONTOS[] = 1;
	$BADWORD[] = "http_put_file";
	$PONTOS[] = 1;
	$BADWORD[] = "ftp_put";
	$PONTOS[] = 1;
	$BADWORD[] = "ftp_fput";
	$PONTOS[] = 1;
	$BADWORD[] = "http_put_stream";
	$PONTOS[] = 1;
	$BADWORD[] = "chgrp";
	$PONTOS[] = 1;
	$BADWORD[] = "chown";
	$PONTOS[] = 1;
	$BADWORD[] = "chmod";
	$PONTOS[] = 1;
	
	$BADWORD[] = "rawurldecode";
	$PONTOS[] = 1;
	$BADWORD[] = "gzdecode";
	$PONTOS[] = 1;
	$BADWORD[] = "xmlrpc_decode_request";
	$PONTOS[] = 1;
	$BADWORD[] = "xmlrpc_decode";
	$PONTOS[] = 1;
	$BADWORD[] = "unicode_decode";
	$PONTOS[] = 1;
	$BADWORD[] = "session_decode";
	$PONTOS[] = 1;
	$BADWORD[] = "convert_uudecode";
	$PONTOS[] = 1;
	$BADWORD[] = "urldecode";
	$PONTOS[] = 1;
	$BADWORD[] = "imap_utf7_decode";
	$PONTOS[] = 1;
	
	$BADWORD[] = "iconv_mime_decode";
	$PONTOS[] = 1;
	$BADWORD[] = "html_entity_decode";
	$PONTOS[] = 1;
	$BADWORD[] = "http_chunked_decode";
	$PONTOS[] = 1;
	$BADWORD[] = "quoted_printable_decode";
	$PONTOS[] = 1;
	
	// $BADWORD[] = "<?";
	// $PONTOS[] = 1;
	$BADWORD[] = "<?php";
	$PONTOS[] = 1;
	
	// MÉDIAS
	$BADWORD[] = "select";
	$PONTOS[] = 0.5;
	$BADWORD[] = "insert";
	$PONTOS[] = 0.5;
	$BADWORD[] = "update";
	$PONTOS[] = 0.5;
	$BADWORD[] = "delete";
	$PONTOS[] = 0.5;
	$BADWORD[] = "from";
	$PONTOS[] = 0.5;
	$BADWORD[] = "into";
	$PONTOS[] = 0.5;
	$BADWORD[] = "drop";
	$PONTOS[] = 0.5;
	$BADWORD[] = "database";
	$PONTOS[] = 0.5;
	// ----------------------------------------------
	
	
	
	// ----------------------------------------------
	// Efetua varredura das variáveis
	// ----------------------------------------------
	foreach($verify as $item){
		
		
		// verifica se o valor do campo é array e agrega na variavel array principal
		// ............................
		foreach($item as $KEY => $VALOR){
			if(is_array($VALOR)){
				for($x=0; $VALOR[$x]; $x++){
					$item["{$KEY}_{$x}"] = $VALOR[$x];
				}
				unset($item[$KEY]);
			}
		}
		// ............................
	
		
		// ............................
		foreach($item as $KEY => $VALOR){
		
			$BLOCK = 0; // pontuação de provavel invasão
			
			for($x=0; $x<sizeof($BADWORD); $x++){
				
				if(is_int(strpos(strtolower(urldecode(stripslashes($item[$KEY]))), $BADWORD[$x]))) {
					$BLOCK += $PONTOS[$x];
					$BLOCKWORDS .= $BADWORD[$x].", ";
					
					// Efetua bloqueio se o item alcançar 1 ponto
					if($BLOCK >= 1) _executeblock($BLOCKWORDS);
				}
			}
		}
		// ............................
		
	}
	// ----------------------------------------------
	
	
	
	// ----------------------------------------------
	// BLOQUEIA ENVIO DE ARQUIVOS NOCIVOS
	// ----------------------------------------------
	if(isset($_FILES) && is_array($_FILES)){
		
		unset($KEY, $VALOR);
			
		foreach($_FILES as $KEY => $VALOR){
			
			unset($sendfiles);
			
			// se for apenas 1 arquivo enviado no mesmo campo campo
			if(!is_array($_FILES[$KEY]["name"])){
				$sendfiles['name'][] 		= $_FILES[$KEY]['name'];
				$sendfiles['tmp_name'][] 	= $_FILES[$KEY]['tmp_name'];
			}
			else{
				$sendfiles = $_FILES[$KEY];
			}
			
			
			// .............................................................
			// verifica extensão
			// .............................................................
			for($x=0; $x<sizeof($sendfiles["name"]) && $sendfiles["name"][$x] && $sendfiles["tmp_name"][$x]; $x++){
				
				$extension = _getmimetype($sendfiles["name"][$x]);
				
				if($extension != "jpg" AND
				   $extension != "jpe" AND
				   $extension != "gif" AND
				   $extension != "png" AND
				   $extension != "pdf" AND
				   $extension != "swf") 
						_executeblock("File: ".$sendfiles["name"][$x]." - ".$extension." - ".$KEY);
			}
			// .............................................................
			
		}
	}
	// ----------------------------------------------

}
/* =============================================================================== */



/* ===============================================================================
 * 
 * EXECUTA FUNÇÃO
 * 
 * =============================================================================== */

_simple_blockinjection();

/* =============================================================================== */


?>