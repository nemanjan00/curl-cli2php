<?php
$state = 0;

$url = "";
$headers = [];
$compressed = false;
$data = false;

for($i = 0; $i < count($argv); $i++){
	if($state == 0 && $argv[$i] == "curl"){
		$state = 1;
	}
	else if($state == 1){
		$url = $argv[$i];
		
		$state = 2;
	}
	else if($state == 2){
		if($argv[$i] == "-H"){
			$state = 3;
		}
		else if($argv[$i] == "--data"){
			$state = 4;
		}
		else if($argv[$i] == "--compressed"){
			$compressed = true;
		}
		else
		{
			echo "Error...  {$argv[$i]} \n";
		}
	}
	else if($state == 3){
		$headers[] = $argv[$i];

		$state = 2;		
	}
	else if($state == 4){
		$data = $argv[$i];

		$state = 2; 
	}
}

$output = "<?php\n";
$output.= "\$ch = curl_init();\n";

$output .= "curl_setopt(\$ch, CURLOPT_URL, \"$url\");\n\n";

if(count($headers) > 0){
	$output .= "\$headers = [\n";

	foreach($headers as $header){
		$output .= "\t\"$header\",\n";
	}

	$output .= "];\n\n";

	$output .= "curl_setopt(\$ch, CURLOPT_HTTPHEADER, \$headers);\n";
}

if($data !== false){
	$output .= "curl_setopt(\$ch, CURLOPT_POST, 1);\n";
	$output .= "curl_setopt(\$ch, CURLOPT_POSTFIELDS, \"$data\");\n";
}

if($compressed){
	$output .= "curl_setopt(\$ch, CURLOPT_ENCODING, '');";
}

$output .= "curl_setopt(\$ch, CURLOPT_RETURNTRANSFER, true);\n\n";
$output .= "\$server_output = curl_exec (\$ch);\n";
$output .= "curl_close(\$ch);\n\n";
$output .= "echo \$server_output; \n";

echo $output;

