<?php
/**
 * Don't let the machines win. You are humanity's last hope...
 **/

fscanf(STDIN, "%d",
    $width // the number of cells on the X axis
);
fscanf(STDIN, "%d",
    $height // the number of cells on the Y axis
);
$lines = [];
for ($i = 0; $i < $height; $i++)
{
    $lines[] = stream_get_line(STDIN, 31 + 1, "\n"); // width characters, each either 0 or .
}

for($y=0; $y<$height; $y++){
    for($x=0; $x<$width; $x++){
        if($lines[$y][$x]=="."){
            continue;
        }
        $rightx = $righty = $downx = $downy = -1;
        for($temporaryx = $x+1; $temporaryx < $width; $temporaryx++){
            if(isset($lines[$y][$temporaryx]) && $lines[$y][$temporaryx] == '0'){
                $rightx = $temporaryx;
                $righty = $y;
                break;
            }
        }

        for($temporaryy = $y+1; $temporaryy < $height; $temporaryy++){
            if(isset($lines[$temporaryy][$x]) && $lines[$temporaryy][$x] == '0'){
                $downx = $x;
                $downy = $temporaryy;
                break;
            }
        }
        echo "$x $y $rightx $righty $downx $downy\n";
    }
}
